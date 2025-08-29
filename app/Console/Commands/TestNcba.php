<?php

namespace App\Console\Commands;

use Akika\LaravelNcba\Ncba;
use Illuminate\Console\Command;

class TestNcba extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:test-ncba';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test NCBA Commands';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Testing payment command...');
        $this->info('------------ Initialization ------------');
        $apiKey = "2448dbbd07fc1fbc83ed4ae1b99ca4d209e7b64d0dcae4db8ae0bcf6d05a0c33";
        $username = "juliusci4";
        $password = "CbmsD)BP8r";
        $ncba = new Ncba($apiKey, $username, $password);

        try {
            $authenticate = $ncba->authenticate();
            $this->info('Authenticate: ' . json_encode($authenticate));

            if ($authenticate == null || $authenticate['status'] != '00') {
                $this->info('Authentication failed');
                return;
            }

            $token = $authenticate['accessToken'];
            $this->info('Token: ' . $token);
        } catch (\Throwable $th) {
            $this->error('Error: ' . $th->getMessage());
        }


        $this->info('Test is completed');
    }
}
