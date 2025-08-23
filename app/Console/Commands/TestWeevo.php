<?php

namespace App\Console\Commands;

use Akika\LaravelWeevo\Weevo;
use Illuminate\Console\Command;

class TestWeevo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:test-weevo';

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
        $this->info('TestWeevo command executed successfully.');

        // post a delivery request
        $weevo = new Weevo(
            config('weevo.username'),
            config('weevo.api_key'),
            config('weevo.api_secret')
        );

        $result = $weevo->createDelivery([
            "external_id" => "123456",
            "pickup" => [
                "name" => "John Doe",
                "phone" => "+254700000000",
                "email" => "johndoe@example.com"
            ],
            "dropoff" => [
                "name" => "Jane Smith",
                "phone" => "+254700000001",
                "email" => "janesmith@example.com"
            ],
            "package" => [
                "weight" => 1.5,
                "dimensions" => [
                    "length" => 30,
                    "width" => 20,
                    "height" => 10
                ]
            ]
        ]);

        $this->info('Create Delivery Result: ' . json_encode($result));

        $this->info('Weevo instance resolved successfully.');
    }
}
