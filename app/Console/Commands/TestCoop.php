<?php

namespace App\Console\Commands;

use Akika\LaravelCoop\Coop;
use Illuminate\Console\Command;

class TestCoop extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:test-coop {}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run all tests for the Coop package';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Running tests for the Coop package...');

        $coop = new Coop();

        $token = $coop->fetchToken();
        $this->info('Fetched Token: ' . $token);

        // Mini statement test
        $miniStatement = $coop->miniStatement('12345678912345', '2025-08-01', '2025-08-31');
        $this->info('Mini Statement: ' . json_encode($miniStatement));

        // Full statement test
        $fullStatement = $coop->fullStatement('12345678912345', '2025-08-01', '2025-08-31');
        $this->info('Full Statement: ' . json_encode($fullStatement));

        $this->info('Tests completed successfully.');
    }
}
