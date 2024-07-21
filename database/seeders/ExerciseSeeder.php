<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\MuscleGroup;
use Illuminate\Database\Seeder;

class ExerciseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $exercises = [
            ['name' => 'Side raise', 'description' => 'Side raise description', 'muscle_groups' => ['shoulders']],
            ['name' => 'Front raise', 'description' => 'Front raise description', 'muscle_groups' => ['shoulders']],
            ['name' => 'Overhead press', 'description' => 'Overhead press description', 'muscle_groups' => ['shoulders']],
            ['name' => 'Face pull', 'description' => 'Face pull description', 'muscle_groups' => ['shoulders']],
            ['name' => 'Dumbbell bird', 'description' => 'Dumbbell bird description', 'muscle_groups' => ['shoulders']],
            ['name' => 'Incline bench press', 'description' => 'Incline bench press description', 'muscle_groups' => ['chest']],
            ['name' => 'Low cable crossover', 'description' => 'Low cable crossover description', 'muscle_groups' => ['chest']],
            ['name' => 'Mid cable crossover', 'description' => 'Mid cable crossover description', 'muscle_groups' => ['chest']],
            ['name' => 'Dumbbell shrugs', 'description' => 'Dumbbell shrugs description', 'muscle_groups' => ['shoulders', 'back']],
            ['name' => 'T-bar row', 'description' => 'T-bar row description', 'muscle_groups' => ['back']],
        ];

        foreach ($exercises as $exerciseData) {
            $exercise = Exercise::create([
                'name' => $exerciseData['name'],
                'description' => $exerciseData['description'],
            ]);

            foreach ($exerciseData['muscle_groups'] as $muscleGroupName) {
                $muscleGroup = MuscleGroup::where('slug', $muscleGroupName)->first();
                $exercise->muscleGroups()->attach($muscleGroup->id);
            }
        }
    }
}
