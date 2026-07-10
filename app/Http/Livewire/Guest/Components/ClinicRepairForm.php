<?php

namespace App\Http\Livewire\Guest\Components;

use Carbon\Carbon;
use DateTime;
use DateTimeZone;
use DateInterval;
use Livewire\Component;
use App\Models\Branch;
use App\Models\AppointmentTimeSlot;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ClinicRepairForm extends Component
{
    public $selectedBranch;
    public $postalCode;
    public $branches;
    public $loadingLatLong = false;
    public $nearestBranches = [];
    public $selectedBranchId = null;
    public $mapLink;
    public $step = 0;
    public $currentMonth;
    public $selectedDate;
    protected $listeners = ['selectBranch', 'goBack', 'userMyLocation'];

    public $clinic = [
        'appointment_date' => null,
        'appointment_time' => null,
        'repair_note' => '',
        'postalCode' => '',
    ];

    protected $rules = [
        'clinic.appointment_date' => 'required|date',
        'clinic.appointment_time' => 'required|string|max:5',
        'clinic.repair_note' => 'nullable|string|max:500',
        'clinic.postalCode' => 'nullable'
    ];

    public function mount()
    {
        $this->initializeCurrentMonth();
        $this->getBranches();
        $this->loadClinicFormFromSession();
        
        if (is_null($this->clinic['appointment_date'])) {
            $this->selectDate(now()->format('Y-m-d'));
        }
    }
 public function goBack()
    {
        $this->emit('childGoBack');
    }
    public function initializeCurrentMonth()
    {
        $this->currentMonth = $this->currentMonth instanceof Carbon ? $this->currentMonth : now()->startOfMonth();
    }

    public function previousMonth()
    {
        $this->currentMonth->subMonth();
    }

    public function nextMonth()
    {
        $this->currentMonth->addMonth();
    }

    public function selectDate($date)
    {
        $selectedDate = Carbon::parse($date);
        $today = now()->startOfDay();
        $next14Days = $today->copy()->addDays(14);

        if ($selectedDate->between($today, $next14Days)) {
            $this->selectedDate = $date;
            $this->clinic['appointment_date'] = $date;
            $this->emit('dateSelected', $date);
        }
    }

    public function cancelDateSelection()
    {
        $this->selectedDate = $this->clinic['appointment_date'] = null;
    }

    public function getCalendarDaysProperty()
    {
        $calendar = [];
        $startDate = $this->currentMonth->copy()->startOfMonth()->startOfWeek(Carbon::MONDAY);
        $endDate = $this->currentMonth->copy()->endOfMonth()->endOfWeek(Carbon::SUNDAY);
        $today = now()->startOfDay();
        $next14Days = $today->copy()->addDays(14);

        while ($startDate <= $endDate) {
            $calendar[] = [
                'date' => $startDate->format('Y-m-d'),
                'day' => $startDate->format('j'),
                'class' => $this->getDateClass($startDate),
                'disabled' => !$startDate->between($today, $next14Days),
            ];
            $startDate->addDay();
        }

        return array_chunk($calendar, 7);
    }

    private function getDateClass($date)
    {
        $classes = [];
        if ($date->isToday()) $classes[] = 'today';
        if ($date->format('Y-m-d') === $this->selectedDate) $classes[] = 'selected';
        if ($date->month !== $this->currentMonth->month) $classes[] = 'text-muted';
        return implode(' ', $classes);
    }

    public function handleUpdateLocation($location)
    {
        $latitude = $location['latitude'];
        $longitude = $location['longitude'];
        $this->nearestBranches = $this->findNearestBranches($latitude, $longitude);
        $this->selectedBranchId = null;
        $this->updateMapLink();
    }

public function getLatLong()
{
    $postalCode = trim($this->postalCode);

    // Use a query with wildcard (*) for partial matches
    $url = "https://nominatim.openstreetmap.org/search?q={$postalCode}*&format=json&addressdetails=1&limit=5";

    $response = Http::withHeaders([
        'User-Agent' => 'MobileBitz/1.0 (admin@mobilebitz.co.uk)'
    ])->get($url);

    if ($response->successful()) {
        $data = $response->json();
        if (!empty($data)) {
            // Check if results are valid
            foreach ($data as $result) {
                if (isset($result['lat'], $result['lon'])) {
                    $latitude = $result['lat'];
                    $longitude = $result['lon'];

                    // Find nearest branches using obtained latitude and longitude
                    $this->nearestBranches = $this->findNearestBranches($latitude, $longitude);
                    if (!empty($this->nearestBranches)) {
                        $nearestBranch = $this->nearestBranches[0];
                        $this->selectedBranch = $nearestBranch;
                        $this->selectedBranchId = $nearestBranch['id'];
                        $this->clinic['name'] = $nearestBranch['name'];
                        $this->mapLink = $nearestBranch['map_link'];
                        session()->put('clinic_name', $this->clinic['name']);
                        session()->put('map_link', $this->mapLink);
                        return true;
                    }
                }
            }
        }
    }

    // Handle case where no results are found
    session()->flash('error', 'Failed to fetch geolocation data or incorrect postal code.');
    return false;
}


     public function userMyLocation($lat = 0, $lng = 0)
    {
        if ($lat != 0 && $lng != 0) {


            // Find nearest branches using obtained latitude and longitude
            $this->nearestBranches = $this->findNearestBranches($lat, $lng);
            if (!empty($this->nearestBranches)) {
                $nearestBranch = $this->nearestBranches[0];
                $this->selectedBranch = $nearestBranch;
                $this->selectedBranchId = $nearestBranch['id'];
                $this->clinic['name'] = $nearestBranch['name'];
                $this->mapLink = $nearestBranch['map_link'];
                session()->put('clinic_name', $this->clinic['name']);
                session()->put('map_link', $this->mapLink);
                return true;
            }
        }
        // Handle case where no results are found
        session()->flash('error', 'Failed to fetch geolocation data.');
        return false;
    }

    public function updated($property)
    {
        if (array_key_exists($property, $this->rules)) {
            $this->validate();
            session()->put('clinic_form', $this->clinic);
        }

        if ($property === 'postalCode') {
            Log::info('Postal code updated: ' . $this->postalCode);
            $this->getLatLong();
        }

        if ($property === 'selectedBranchId') {
            $this->selectedBranch = Branch::find($this->selectedBranchId);
            $this->updateMapLink();
        }

        if ($property === 'nearestBranches') {
            $this->sortNearestBranches();
        }

        $this->updateMapLink();
    }

    public function updateMapLink()
    {
        $this->mapLink = $this->selectedBranch->map_link ?? null;
    }

    public function submitForm()
    {
        $this->validate();
        session()->put('clinic_form', $this->clinic);
        $this->emit('formSubmitted');
    }

    public function render()
    {
        $availableDates = $this->getNext10Weekdays();
        $selectedDate = $this->clinic['appointment_date'];
        $timeSlots = $this->getAppointmentTimeSlots($selectedDate);
        Session::put('selectedDate', $this->clinic['appointment_date']);
        Session::put('timeSlots', $timeSlots);

        return view('livewire.guest.components.clinic-repair-form', [
            'availableDates' => $availableDates,
            'selectedDate' => $selectedDate,
            'timeSlots' => $timeSlots,
            'nearestBranches' => $this->nearestBranches,
            'branches' => $this->branches,
            'mapLink' => $this->mapLink,
        ]);
    }

    public function getBranches($limit = 100)
    {
        $this->branches = Branch::limit($limit)->get();
        $this->emit('branchesLoaded', $this->branches);
    }

    public function getAppointmentTimeSlots($selectedDate)
{
    if (!$this->selectedBranchId) {
        return [];
    }

    // Predefined time slots at 15-minute intervals
    $availableSlots = [
        '09:00', '09:15', '09:30', '09:45', '10:00', '10:15', '10:30', '10:45',
        '11:00', '11:15', '11:30', '11:45', '12:00', '12:15', '12:30', '12:45',
        '13:00', '13:15', '13:30', '13:45', '14:00', '14:15', '14:30', '14:45',
        '15:00', '15:15', '15:30', '15:45', '16:00', '16:15', '16:30', '16:45',
        '17:00', '17:15', '17:30', '17:45', '18:00', '18:15', '18:30', '18:45',
        '19:00', '19:15', '19:30', '19:45'
    ];

    // Retrieve the appointment time slots for the selected date
    $appointmentTimeSlots = AppointmentTimeSlot::where('branch_id', $this->selectedBranchId)
        ->where('day', Carbon::parse($selectedDate)->format('l'))
        ->where('status', 1)
        ->first();

    if ($appointmentTimeSlots) {
        $startTime = new DateTime($appointmentTimeSlots->opening_time, new DateTimeZone('Europe/London'));
        $endTime = new DateTime($appointmentTimeSlots->closing_time, new DateTimeZone('Europe/London'));
        $currentTimeInUK = new DateTime('now', new DateTimeZone('Europe/London'));

        // Adjust start time if the selected date is today
        if ($selectedDate === $currentTimeInUK->format('Y-m-d')) {
            // Start time should be at least 1 hour from the current time
            $currentTimeInUK->add(new DateInterval('PT1H'));
            $startTime = max($startTime, $currentTimeInUK);
        }

        // Filter available slots based on the start and end times
        return array_filter($availableSlots, function ($slot) use ($startTime, $endTime) {
            $slotTime = new DateTime($slot, new DateTimeZone('Europe/London'));
            return $slotTime >= $startTime && $slotTime <= $endTime;
        });
    }

    return [];
}

    public function resetBranchSelection()
    {
        $this->nearestBranches = [];
        $this->selectedBranchId = null;
        $this->mapLink = null;
    }

    public function loadClinicFormFromSession()
    {
        if (session()->has('clinic_form')) {
            $this->clinic = session()->get('clinic_form');
        }
    }

    public function getNext10Weekdays()
    {
        $next10Weekdays = collect([]);
        $currentDate = Carbon::now('Europe/London');

        while ($next10Weekdays->count() < 10) {
            $currentDate = $currentDate->addDay();
            if ($currentDate->isWeekday()) {
                $next10Weekdays->push($currentDate->toDateString());
            }
        }

        return $next10Weekdays->toArray();
    }

 public function findNearestBranches($latitude, $longitude)
    {
        $branches = Branch::all();

        $branches->transform(function ($branch) use ($latitude, $longitude) {
            $branch->distance = $this->calculateDistance($latitude, $longitude, $branch->latitude, $branch->longitude);
            return $branch;
        });

        return $branches->sortBy('distance')->values()->toArray();
    }

private function radians($degrees)
{
    return $degrees * (pi() / 180);
}


    public function calculateDistance($userLat, $userLng, $branchLat, $branchLng)
    {
        $earthRadius = 6371;
        $latDiff = deg2rad($branchLat - $userLat);
        $lngDiff = deg2rad($branchLng - $userLng);

        $a = sin($latDiff / 2) * sin($latDiff / 2) +
            cos(deg2rad($userLat)) * cos(deg2rad($branchLat)) *
            sin($lngDiff / 2) * sin($lngDiff / 2);

        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

        return $earthRadius * $c;
    }

    public function selectBranch($branchId)
    {
        $this->selectedBranch = Branch::find($branchId);
        $this->selectedBranchId = $branchId;
        $this->updateMapLink();
        $this->step = 1;

        if ($this->selectedBranch) {
            $this->postalCode = $this->selectedBranch->post_code;
            session()->put('clinic_name', $this->selectedBranch->name);
            session()->put('map_link', $this->mapLink);

            $latitude = $this->selectedBranch->latitude;
            $longitude = $this->selectedBranch->longitude;
            $this->emit('BranchSelected');
        }
    }

    protected function sortNearestBranches()
    {
        $this->nearestBranches = collect($this->nearestBranches)->sortBy('distance')->values()->toArray();
    }
}

