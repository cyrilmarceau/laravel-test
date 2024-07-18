<?php

namespace App\Console\Commands;

use Database\Seeders\MuscleGroupsSeeder;
use Illuminate\Console\Command;

class SeedMuscleGroups extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:seed-muscle-groups';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $seeder = new MuscleGroupsSeeder();
        $seeder->run();
        $this->info('Muscle groups seeded successfully!');
    }
}
