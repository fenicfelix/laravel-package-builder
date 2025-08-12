<?php

namespace App\Console\Commands;

use Akika\LaravelMpesa\Mpesa;
use Illuminate\Console\Command;

class TestMpesa extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:test-mpesa';

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
        $this->info('Testing Mpesa integration...');

        $mpesa = new Mpesa();

        $this->info('Fetching Mpesa token...');
        try {
            $token = $mpesa->getToken();
            $this->info('Mpesa token fetched successfully.');
            $this->info("Mpesa Token: $token");
        } catch (\Exception $e) {
            $this->error('Failed to fetch Mpesa token: ' . $e->getMessage());
            return;
        } finally {
            $this->info('Token retrieval process completed.');
        }
    }
}
