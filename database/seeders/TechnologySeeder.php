<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Technology;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr= [
            'Laravel',
            'PHP',
            'Vite',
            'Sass',
            'VueJS',
            'JS',
            'CSS',
            'HTML'
        ];

        foreach($arr as $a){
            $tech = new Technology();

            $tech->name = $a;
            $tech->slug = Str::slug($tech->name, '-');
            
            $tech->save();
        }
    }
}
