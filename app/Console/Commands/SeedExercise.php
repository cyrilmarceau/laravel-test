<?php

namespace App\Console\Commands;

use Database\Seeders\ExerciseSeeder;
use Illuminate\Console\Command;

class SeedExercise extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:seed-exercise';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seed predefined exercise';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $seeder = new ExerciseSeeder();
        $seeder->run();
        $this->info('Exercises seeded successfully!');
    }
}
