<?php

namespace App\Console\Commands;

use Akika\LaravelMwaloni\Mwaloni;
use Illuminate\Console\Command;

class TestMwaloniCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:test-mwaloni-command';

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
        $mwaloni = new Mwaloni(
            'SV-00001',
            'testuser',
            'password',
            'api-key-1234567890abcdef'
        );
        $orderNumber = "STG-88677";
        $accountNumber = "001000028617";
        $accountName = "Interfarm Kenya Limited";
        $bankName = "Family Bank Ltd";
        $bankCountryCode = "KE";
        $bankCIF = "0070";
        $amount = 3200;
        $currencyCode = "KES";
        $description = "Ad Hoc";
        $result = $mwaloni->pesalink($orderNumber, $accountNumber, $accountName, $bankName, $bankCountryCode, $bankCIF, $amount, $currencyCode, $description);

        // $swiftCode = "FAMIKENX";
        // $result = $mwaloni->rtgs($orderNumber, $accountNumber, $accountName, $bankName, $swiftCode, $bankCountryCode, $amount, $currencyCode, $description);

        $this->info('RESULT: ' . json_encode($result));
    }
}
