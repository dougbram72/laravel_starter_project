<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShiftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create shifts based on the provided data
        $shifts = [
            [
                'name' => 'D-1',
                'start_time' => '07:00',
                'end_time' => '19:00',
                'next_day' => false,
                'shift_group' => 'Day',
                'is_active' => true,
            ],
            [
                'name' => 'D-2',
                'start_time' => '07:00',
                'end_time' => '19:00',
                'next_day' => false,
                'shift_group' => 'Day',
                'is_active' => true,
            ],
            [
                'name' => 'N-1',
                'start_time' => '19:00',
                'end_time' => '07:00',
                'next_day' => true,
                'shift_group' => 'Night',
                'is_active' => true,
            ],
            [
                'name' => 'N-2',
                'start_time' => '19:00',
                'end_time' => '07:00',
                'next_day' => true,
                'shift_group' => 'Night',
                'is_active' => true,
            ],
        ];
        
        foreach ($shifts as $shift) {
            \App\Models\Shift::create($shift);
        }
    }
}
