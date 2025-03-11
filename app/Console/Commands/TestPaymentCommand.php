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
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Testing payment command...');
        $mwaloni = new Mwaloni();

        $this->info('----------------- fetch balance -----------------');
        $response = $mwaloni->fetchBalance();
        $this->info('Balance Response: ' . json_encode($response));

        $this->info('----------------- send money through rtgs -----------------');
        $response = $mwaloni->rtgs("TEST00019", "12344567790", "Mwaloni Ltd", "01", "KE", "KES", 1290, "Test Payment");
        $this->info('RTGS Response: ' . json_encode($response));

        /*$this->info('----------------- send money to mobile -----------------');
        $response = $mwaloni->mobile("TEST00012", "+254723293349", 1220, "Test Payment");
        $this->info('Daraja to Mobile Response: ' . json_encode($response));

        $this->info('----------------- send money to till -----------------');
        $response = $mwaloni->till("TEST00013", "Mwaloni Ltd", "245738", 1232, "Test Payment");
        $this->info('Daraja to Till Response: ' . json_encode($response));

        $this->info('----------------- send money to paybill -----------------');
        $response = $mwaloni->paybill("245738", "TEST00014", "Mwaloni Ltd", "245738", 1233, "Test Payment");
        $this->info('Daraja to Paybill Response: ' . json_encode($response));

        $this->info('----------------- send money ift -----------------');
        $response = $mwaloni->ift("TEST00015", "12344567789", "Mwaloni Ltd", 1234, "Test Payment");
        $this->info('IFT Response: ' . json_encode($response));

        $this->info('----------------- send money to eft -----------------');
        $response = $mwaloni->eft("TEST00016", "12344567789", "Mwaloni Ltd", "01", "KE", "KES", 1235, "Test Payment");
        $this->info('EFT Response: ' . json_encode($response));

        $this->info('----------------- send money through pesalink -----------------');
        // pesalink($orderNumber, $accountNumber, $accountName, $bankCode, $bankCountryCode, $currencyCode, $amount, $description)
        $response = $mwaloni->pesalink("TEST00017", "12344567789", "Mwaloni Ltd", "01", "KE", "KES", 1236, "Test Payment");
        $this->info('PesaLink Response: ' . json_encode($response));

        $this->info('----------------- send money through rtgs -----------------');
        $response = $mwaloni->rtgs("TEST00018", "12344567789", "Mwaloni Ltd", "01", "KE", "KES", 1238, "Test Payment");
        $this->info('RTGS Response: ' . json_encode($response));

        $this->info('----------------- get payment status -----------------');
        $response = $mwaloni->getStatus("SRVC0444");
        $this->info('Payment Status Response: ' . json_encode($response));

        $this->info('----------------- contact lookup -----------------');
        // contactLookup($phone)
        $response = $mwaloni->contactLookup("+254723293349");
        $this->info('Contact Lookup Response: ' . json_encode($response));

        $this->info('----------------- send sms -----------------');
        // sendSms($phone, $message)
        $response = $mwaloni->sendSms("+254723293349", "Test SMS");
        $this->info('Send SMS Response: ' . json_encode($response));*/
    }
}
