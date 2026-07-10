<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PostCodeArea;

class PostCodeAreasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $postCodeAreas = [
            ['post_code_area' => 'E1', 'price' => '£13.00'],
            ['post_code_area' => 'E1W', 'price' => '£13.00'],
            ['post_code_area' => 'E2', 'price' => '£13.00'],
            ['post_code_area' => 'E3', 'price' => '£13.00'],
            ['post_code_area' => 'E4', 'price' => '£19.00'],
            ['post_code_area' => 'E5', 'price' => '£19.00'],
            ['post_code_area' => 'E6', 'price' => '£13.00'],
            ['post_code_area' => 'E7', 'price' => '£13.00'],
            ['post_code_area' => 'E8', 'price' => '£13.00'],
            ['post_code_area' => 'E9', 'price' => '£13.00'],
            ['post_code_area' => 'E10', 'price' => '£13.00'],
            ['post_code_area' => 'E11', 'price' => '£13.00'],
            ['post_code_area' => 'E12', 'price' => '£13.00'],
            ['post_code_area' => 'E13', 'price' => '£13.00'],
            ['post_code_area' => 'E14', 'price' => '£13.00'],
            ['post_code_area' => 'E14 4', 'price' => '£13.00'],
            ['post_code_area' => 'E14 5', 'price' => '£13.00'],
            ['post_code_area' => 'E15', 'price' => '£13.00'],
            ['post_code_area' => 'E16', 'price' => '£13.00'],
            ['post_code_area' => 'E17', 'price' => '£13.00'],
            ['post_code_area' => 'E18', 'price' => '£13.00'],
            ['post_code_area' => 'E20', 'price' => '£13.00'],
            ['post_code_area' => 'WC1', 'price' => '£13.00'],
            ['post_code_area' => 'WC2', 'price' => '£13.00'],
            ['post_code_area' => 'EC1', 'price' => '£13.00'],
            ['post_code_area' => 'EC2', 'price' => '£13.00'],
            ['post_code_area' => 'EC3', 'price' => '£13.00'],
            ['post_code_area' => 'EC4', 'price' => '£13.00'],
            ['post_code_area' => 'IG1', 'price' => '£13.00'],
            ['post_code_area' => 'IG2', 'price' => '£19.00'],
            ['post_code_area' => 'IG3', 'price' => '£19.00'],
            ['post_code_area' => 'IG4', 'price' => '£19.00'],
            ['post_code_area' => 'IG5', 'price' => '£19.00'],
            ['post_code_area' => 'IG6', 'price' => '£19.00'],
            ['post_code_area' => 'IG7', 'price' => '£19.00'],
            ['post_code_area' => 'IG8', 'price' => '£19.00'],
            ['post_code_area' => 'IG9', 'price' => '£19.00'],
            ['post_code_area' => 'IG10', 'price' => '£19.00'],
            ['post_code_area' => 'IG11', 'price' => '£19.00'],
            ['post_code_area' => 'N1', 'price' => '£13.00'],
            ['post_code_area' => 'N4', 'price' => '£19.00'],
            ['post_code_area' => 'N5', 'price' => '£19.00'],
            ['post_code_area' => 'N6', 'price' => '£19.00'],
            ['post_code_area' => 'N7', 'price' => '£19.00'],
            ['post_code_area' => 'N8', 'price' => '£19.00'],
            ['post_code_area' => 'N13', 'price' => '£19.00'],
            ['post_code_area' => 'N14', 'price' => '£19.00'],
            ['post_code_area' => 'N15', 'price' => '£19.00'],
            ['post_code_area' => 'N16', 'price' => '£19.00'],
            ['post_code_area' => 'N19', 'price' => '£19.00'],
            ['post_code_area' => 'N22', 'price' => '£19.00'],
            ['post_code_area' => 'NW1', 'price' => '£19.00'],
            ['post_code_area' => 'NW2', 'price' => '£19.00'],
            ['post_code_area' => 'NW3', 'price' => '£19.00'],
            ['post_code_area' => 'NW4', 'price' => '£19.00'],
            ['post_code_area' => 'NW5', 'price' => '£19.00'],
            ['post_code_area' => 'NW6', 'price' => '£19.00'],
            ['post_code_area' => 'NW8', 'price' => '£19.00'],
            ['post_code_area' => 'NW9', 'price' => '£19.00'],
            ['post_code_area' => 'NW10', 'price' => '£19.00'],
            ['post_code_area' => 'NW11', 'price' => '£19.00'],
            ['post_code_area' => 'SE1', 'price' => '£13.00'],
            ['post_code_area' => 'SE5', 'price' => '£13.00'],
            ['post_code_area' => 'SE8', 'price' => '£19.00'],
            ['post_code_area' => 'SE10', 'price' => '£19.00'],
            ['post_code_area' => 'SE11', 'price' => '£19.00'],
            ['post_code_area' => 'SE14', 'price' => '£19.00'],
            ['post_code_area' => 'SE15', 'price' => '£19.00'],
            ['post_code_area' => 'SE16', 'price' => '£13.00'],
            ['post_code_area' => 'SE17', 'price' => '£13.00'],
            ['post_code_area' => 'SE18', 'price' => '£19.00'],
            ['post_code_area' => 'SW1', 'price' => '£13.00'],
            ['post_code_area' => 'SW2', 'price' => '£19.00'],
            ['post_code_area' => 'SW3', 'price' => '£19.00'],
            ['post_code_area' => 'SW4', 'price' => '£19.00'],
            ['post_code_area' => 'SW5', 'price' => '£19.00'],
            ['post_code_area' => 'SW6', 'price' => '£19.00'],
            ['post_code_area' => 'SW7', 'price' => '£19.00'],
            ['post_code_area' => 'SW8', 'price' => '£19.00'],
            ['post_code_area' => 'SW9', 'price' => '£19.00'],
            ['post_code_area' => 'SW10', 'price' => '£19.00'],
            ['post_code_area' => 'SW11', 'price' => '£19.00'],
            ['post_code_area' => 'SW12', 'price' => '£19.00'],
            ['post_code_area' => 'W1', 'price' => '£13.00'],
            ['post_code_area' => 'W2', 'price' => '£19.00'],
            ['post_code_area' => 'W8', 'price' => '£19.00'],
            ['post_code_area' => 'W9', 'price' => '£19.00'],
            ['post_code_area' => 'W10', 'price' => '£19.00'],
            ['post_code_area' => 'W11', 'price' => '£19.00'],
            ['post_code_area' => 'W12', 'price' => '£19.00'],
            ['post_code_area' => 'W14', 'price' => '£19.00'],

        ];

        foreach ($postCodeAreas as $data) {
            PostCodeArea::create($data);
        }
    }

}
