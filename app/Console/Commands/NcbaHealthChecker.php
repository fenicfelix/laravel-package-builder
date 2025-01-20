<?php

namespace App\Console\Commands;

use Akika\LaravelNcba\Ncba;
use Illuminate\Console\Command;

class NcbaHealthChecker extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ncba:health-checker';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check the health of the NCBA API';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Checking the health of the NCBA API...');

        $ncba = new Ncba();
        $this->info($ncba->checkApiHealth());
    }
}
