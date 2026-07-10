<?php

namespace App\Http\Livewire\Guest;

use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Carbon\Carbon;

class FixForm extends Component
{
    public $showFormFields = false;
    public $post_code;
    public $responseData = [];
    public $collection;
    public $addressName;
    public $currentMonth;
    public $selectedDate;
    public $selectedAddress;
    public $appointmentDate;
    public $appointmentTime;

    public $fixed = [
        'address_line_1' => '',
        'city' => '',
        'post_code' => '',
        'repair_note' => '',
        'repair_date' => '', // Default value
        'repair_time' => '', // Default value
    ];

    // Validation rules
    protected $rules = [
        'fixed.address_line_1' => 'required|string',
        'fixed.city' => 'required|string',
        'fixed.post_code' => 'required|string',
        'fixed.repair_date' => 'required|date|after_or_equal:today',
        'fixed.repair_time' => 'required|string',
    ];

    public function mount()
    {
        $this->currentMonth = now()->startOfMonth();

        if (session()->has('fix_form')) {
            $this->fixed = session()->get('fix_form');
        }
    }

    public function submitForm()
    {
        $this->validate(); // Validate all form fields

        // Store form data in session
        session()->put('fix_form', $this->fixed);

        // Emit an event to the parent component if validation is successful
        $this->emit('formSubmitted');
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
            $this->fixed['repair_date'] = $date;
            $this->emit('dateSelected', $date);
        }
    }

    public function cancelDateSelection()
    {
        $this->selectedDate = $this->fixed['repair_date'] = null;
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

    public function updated($property)
    {
        // Validate post_code_area
        if ($property === 'fixed.post_code_area' && !empty($this->fixed['post_code_area'])) {
            $parts = explode('-', $this->fixed['post_code_area']);
            if (isset($parts[1])) {
                $priceParts = explode('£', $parts[1]);
                if (isset($priceParts[1])) {
                    $againPriceParts = explode('.', $priceParts[1]);
                    $price = isset($againPriceParts[0]) ? (string) $againPriceParts[0] : '';
                    $this->emit('addCodePrice', $price);
                    $this->emit('addFixPrice', $price);
                }
            }
        }

        // Validate and store form data
        if (array_key_exists($property, $this->rules)) {
            $this->validate();
            session()->put('fix_form', $this->fixed);
        }
    }

    public function selectTimeSlot($timeSlot)
    {
        $this->fixed['repair_slot'] = $timeSlot;
        $this->emit('timeSlotSelected', $timeSlot);
    }

    public function updatedPostCode()
    {
        $this->changeApiData();
    }

    public function changeApiData()
    {
        $response = Http::get('https://www.doogal.co.uk/GetPostcode/' . $this->post_code . '?output=json');

        if ($response->successful()) {
            $this->responseData = $response->json();
            $this->showFormFields = isset($this->responseData['knownAddresses']) && is_array($this->responseData['knownAddresses']);
        } else {
            $this->responseData = ['error' => 'API call failed', 'knownAddresses' => []];
            $this->showFormFields = false;
        }
    }

    public function updatedSelectedAddress($value)
    {
        $this->fixed['address_line_1'] = $value;
        $this->fixed['post_code'] = $value;
        $addressParts = explode(',', $value);

        if (count($addressParts) >= 2) {
            $this->fixed['city'] = trim($addressParts[1]);
        }
    }

  public function getAppointmentTimeSlots()
{
    // Array for time slots
    $timeSlots = [
        '08:00 - 11:00',
        '11:00 - 14:00',
        '14:00 - 17:00',
        '17:00 - 20:00',
    ];

    // Array for corresponding FontAwesome icons
    $icons = [
        'fa fa-sun',        // Icon for 08:00 - 11:00
        'fa fa-coffee',     // Icon for 11:00 - 14:00
        'fa fa-briefcase',  // Icon for 14:00 - 17:00
        'fa fa-moon',       // Icon for 17:00 - 20:00
    ];

    // Combine time slots with icons
    return array_map(function($time, $icon) {
        list($startTime, $endTime) = explode(' - ', $time);

        // Format the times
        $startTimeFormatted = Carbon::createFromFormat('H:i', $startTime)->format('g:i A');
        $endTimeFormatted = Carbon::createFromFormat('H:i', $endTime)->format('g:i A');

        return [
            'time' => $startTimeFormatted . ' - ' . $endTimeFormatted,
            'icon' => $icon
        ];
    }, $timeSlots, $icons);
}



    public function get_all_postal_code()
    {
        return \App\Models\PostCodeArea::all();
    }

    public function render()
    {
        $timeSlots = $this->getAppointmentTimeSlots();

        return view('livewire.guest.fix-form', [
            'post_code_areas' => $this->get_all_postal_code(),
            'timeSlots' => $timeSlots,
            'calendarDays' => $this->calendarDays,
        ]);
    }

    public function isPublicHoliday($date, $publicHolidays)
    {
        foreach ($publicHolidays as $holiday) {
            if ($date->toDateString() === $holiday->date) {
                return true;
            }
        }
        return false;
    }
}
