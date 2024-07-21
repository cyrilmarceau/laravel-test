<?php

namespace App\Console\Commands;

use Database\Seeders\MuscleGroupSeeder;
use Illuminate\Console\Command;

class SeedMuscleGroupCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:seed-muscle-group';

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
        $seeder = new MuscleGroupSeeder();
        $seeder->run();
        $this->info('Muscle groups seeded successfully!');
    }
}
