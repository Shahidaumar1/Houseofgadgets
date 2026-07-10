<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Slide;

class SlideSeeder extends Seeder
{
    public function run(): void
    {
        Slide::truncate();
        Slide::insert([
            ['title'=>'iPhone 15','image_path'=>'https://your-cdn/slider/iphone15.jpg','link_url'=>'/book-a-repair','sort_order'=>1,'is_active'=>1],
            ['title'=>'Samsung S24','image_path'=>'https://your-cdn/slider/s24.jpg','link_url'=>'/categories','sort_order'=>2,'is_active'=>1],
        ]);
    }
}
