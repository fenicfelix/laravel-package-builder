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
    protected $signature = 'app:test-weevo {task?}';

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

        if ($this->argument('task') == 'create') {
            $this->createDelivery();
        } elseif ($this->argument('task') == 'get') {
            $this->getDelivery();
        } elseif ($this->argument('task') == 'status') {
            $this->getDeliveryStatus();
        } else {
            $this->info('Please provide a valid step argument (1 or 2).');
        }

        $this->info('Weevo instance resolved successfully.');
    }

    private function createDelivery()
    {
        $this->info('Creating a delivery request.');
        // post a delivery request
        $weevo = new Weevo(
            config('weevo.username'),
            config('weevo.api_key'),
            config('weevo.api_secret')
        );

        $this->info('Weevo instance resolved successfully.');

        $result = $weevo->createDelivery([
            "externalId" => "1234562",
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
                    "unitPrice" => 100
                ],
                [
                    "name" => "Item 2",
                    "sku" => "123234235",
                    "quantity" => 2,
                    "unitPrice" => 200
                ]
            ],
            'vehicleType' => 'bike', // Optional: bike, motorcycle, car, van, truck
            'amountCharged' => 300, // Optional
            'instructions' => 'Deliver on time' // As requested by the customer
        ]);

        $this->info('Create Delivery Result: ' . json_encode($result));
    }

    private function getDelivery()
    {
        $this->info("Getting delivery details for trip id TR-00106");
        // TR-00106"
        // post a delivery request
        $weevo = new Weevo(
            config('weevo.username'),
            config('weevo.api_key'),
            config('weevo.api_secret')
        );

        $this->info('Weevo instance resolved successfully.');

        $result = $weevo->getDelivery(
            "TR-00106"
        );

        $this->info('Get Result: ' . json_encode($result));
    }

    private function getDeliveryStatus()
    {
        $this->info("Getting delivery details for trip id TR-00106");
        // TR-00106"
        // post a delivery request
        $weevo = new Weevo(
            config('weevo.username'),
            config('weevo.api_key'),
            config('weevo.api_secret')
        );

        $this->info('Weevo instance resolved successfully.');

        $result = $weevo->getOrderStatus(
            "TR-00106"
        );

        $this->info('Get Result: ' . json_encode($result));
    }
}
