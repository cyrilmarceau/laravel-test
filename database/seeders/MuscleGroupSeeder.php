<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class MuscleGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $muscleGroups = [
            ["slug" => "chest", "name" => "Poitrine"],
            ["slug" => "back", "name" => "Dos"],
            ["slug" => "shoulders", "name" => "Épaules"],
            ["slug" => "biceps", "name" => "Biceps"],
            ["slug" => "triceps", "name" => "Triceps"],
            ["slug" => "forearms", "name" => "Avant-bras"],
            ["slug" => "abdominals", "name" => "Abdominaux"],
            ["slug" => "obliques", "name" => "Obliques"],
            ["slug" => "upper_back", "name" => "Haut du dos"],
            ["slug" => "lower_back", "name" => "Bas du dos"],
            ["slug" => "quadriceps", "name" => "Quadriceps"],
            ["slug" => "hamstrings", "name" => "Ischio-jambiers"],
            ["slug" => "calves", "name" => "Mollets"],
            ["slug" => "glutes", "name" => "Fessiers"],
            ["slug" => "hip_flexors", "name" => "Fléchisseurs de la hanche"],
            ["slug" => "adductors", "name" => "Adducteurs"],
            ["slug" => "abductors", "name" => "Abducteurs"],
            ["slug" => "neck", "name" => "Cou"],
        ];

        foreach ($muscleGroups as $muscleGroup) {
            $muscleGroup['created_at'] = Carbon::now();
            $muscleGroup['updated_at'] = Carbon::now();

            DB::table('muscle_groups')->updateOrInsert(
                ['slug' => $muscleGroup['slug']],
                $muscleGroup
            );
        }
    }
}
