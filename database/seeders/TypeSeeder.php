<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $types=[
            'News','Sport','Muisc','Art','Movies','Books','Games'
        ];

        foreach ($types as $type){
            $newType=new Type();
            $newType->name=$type;
            $newType->slug=$type;
            $newType->color=$faker->hexColor();
            $newType->save();
        }
    }
}
