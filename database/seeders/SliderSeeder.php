<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i=1 ; $i<6 ;$i++){
            Slider::create([
                'file_name'=> 'slider'.$i.'.jpg',
            ]);
        }
    }
}
