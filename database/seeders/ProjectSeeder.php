<?php

namespace Database\Seeders;

use App\Models\Type;
use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(faker $faker): void
    {

        $types = Type::all();

        for ($i=0; $i < 100; $i++) { 
            $newProject = new Project();
            $newProject->type_id = ($faker->randomElement($types))->id;
            $newProject->title = ucfirst($faker->words(5, true));
            $newProject->description = $faker->paragraph(6, true);
            $newProject->slug = $faker->slug();
            $newProject->image = $faker->imageUrl(360, 360,'dogs', true);
            $newProject->save();
        }
    }
}
