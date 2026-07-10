<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AppointmentTimeSlot;
use App\Models\Branch;
use Carbon\Carbon;

class AppointmentTimeSlotsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $branches = Branch::all();

        foreach ($branches as $branch) {
            foreach (['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'] as $day) {
                AppointmentTimeSlot::create([
                    'branch_id' => $branch->id,
                    'day' => $day,
                    'opening_time' => '09:00',  // Replace with your actual opening time
                    'closing_time' => '17:00',  // Replace with your actual closing time
                    'lunch_start' => '12:00',   // Replace with your actual lunch start time
                    'lunch_end' => '13:00',     // Replace with your actual lunch end time
                    'status' => 1,
                    // You can add additional time slots or columns if needed
                    'second_opening_time' => null,
                    'second_closing_time' => null,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }
        }
    }
}
