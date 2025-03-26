<?php

namespace App\Console\Commands;

use Akika\LaravelMwaloni\Mwaloni;
use Illuminate\Console\Command;

class TestPaymentCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:test-payment-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test Mwaloni Payment Command';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Testing payment command...');
        $serviceId = "SRV-00002"; // SRV-00002, SRV-00005, SRV-00008
        $username = "juliusci4";
        $password = "CbmsD)BP8r";
        $apiKey = "2448dbbd07fc1fbc83ed4ae1b99ca4d209e7b64d0dcae4db8ae0bcf6d05a0c33";

        $mwaloni = new Mwaloni($serviceId, $username, $password, $apiKey);

        $this->info('----------------- Authenticate -----------------');
        $response = $mwaloni->authenticate();
        $this->info('Authenticate: ' . json_encode($response));

        if ($response == null || $response['status'] != '00') {
            $this->info('Authentication failed');
            return;
        }

        $token = $response['data']['token'];
        $this->info('Token: ' . $token);

        $mwaloni->setToken($token);

        $this->info('----------------- fetch balance -----------------');
        $response = $mwaloni->fetchBalance();
        $this->info('Balance Response: ' . json_encode($response));

        // $this->info('----------------- send money to mobile -----------------');
        // $response = $mwaloni->mobile("TEST00070", "+254723293349", 20, "Test Payment");
        // $this->info('Daraja to Mobile Response: ' . json_encode($response));

        // $this->info('----------------- send money to till -----------------');
        // $response = $mwaloni->till("TEST00081", "Mwaloni Ltd", "245738", 21, "Test Till Payment");
        // $this->info('Daraja to Till Response: ' . json_encode($response));

        $this->info('----------------- send money to paybill -----------------');
        $response = $mwaloni->paybill("245738", "TEST00082", "Mwaloni Ltd", "245738", 22, "Test paybill Payment");
        $this->info('Daraja to Paybill Response: ' . json_encode($response));

        // $this->info('----------------- send money ift -----------------');
        // $response = $mwaloni->ift("TEST00060", "12344567789", "Mwaloni Ltd", "Nairobi", "254", 14, "KES", "Test Payment");
        // $this->info('IFT Response: ' . json_encode($response));

        // $this->info('----------------- send money to eft -----------------');
        // $response = $mwaloni->eft("TEST00061", "12344567789", "Mwaloni Ltd", "01", "Equity Bank", "KE", "EQRYEURL", "Nairobi", 15, "KES", "Test Payment");
        // $this->info('EFT Response: ' . json_encode($response));

        // $this->info('----------------- send money through pesalink -----------------');
        // $response = $mwaloni->pesalink("TEST00062", "12344567789", "Mwaloni Ltd", "01", "NCBA Bank", "KE", "TESTCIFFROMBANK", "Nairobi", 16, "KES", "Test Payment");
        // $this->info('PesaLink Response: ' . json_encode($response));

        // $this->info('----------------- send money through rtgs -----------------');
        // $response = $mwaloni->rtgs("TEST00063", "12344567789", "Mwaloni Ltd", "01", "NCBA Bank", "Nairobi", "TESTCIFFROMBANK", "KE", 17, "KES", "Test RTGS");
        // $this->info('RTGS Response: ' . json_encode($response));

        // $this->info('----------------- get payment status -----------------');
        // $response = $mwaloni->getStatus("TEST00063");
        // $this->info('Payment Status Response: ' . json_encode($response));

        // $this->info('----------------- contact lookup -----------------');
        // $response = $mwaloni->contactLookup("254723293349");
        // $this->info('Contact Lookup Response: ' . json_encode($response));

        // $this->info('----------------- send sms -----------------');
        // $response = $mwaloni->sendSms("+254723293349", "Test SMS");
        // $this->info('Send SMS Response: ' . json_encode($response));
    }
}
