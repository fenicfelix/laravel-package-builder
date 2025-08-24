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

        $this->info('Weevo instance resolved successfully.');

        $result = $weevo->createDelivery([
            "externalId" => "123456",
            "branch" => 'WB-00001',
            "rider" => "WR-00005", // If not set, the system will assign a rider
            "dropoff" => [
                "name" => "Jane Smith",
                "phone" => "+254700000001",
                "email" => "janesmith@example.com",
                "address" => "456 Elm St, Nairobi",
                "latitude" => -1.2921,
                "longitude" => 36.8219
            ],
            "package" => [
                "weight" => 1.5,
                "dimensions" => [
                    "length" => 30,
                    "width" => 20,
                    "height" => 10
                ]
            ],
            'items' => [ // Optional
                [
                    "name" => "Item 1",
                    "sku" => "123234234",
                    "quantity" => 1,
                    "price" => 100
                ],
                [
                    "name" => "Item 2",
                    "sku" => "123234235",
                    "quantity" => 2,
                    "price" => 200
                ]
            ],
            'vehicleType' => 'bike', // Optional: bike, motorcycle, car, van, truck
            'amountCharged' => 300, // Optional
            'instructions' => 'Deliver on time' // As requested by the customer
        ]);

        $this->info('Create Delivery Result: ' . json_encode($result));

        $this->info('Weevo instance resolved successfully.');
    }
}
