<?php

use Akika\LaravelNcba\Ncba;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/health', function () {
    // $bankCode = null, $branchCode = null, $country = null, $currency = null
    $ncba = new Ncba('ncba', 'ncba', 'Kenya', 'KES');
    // echo $ncba->checkApiHealth();

    echo $ncba->mpesa('Felix Ogucha Nyabwari', 'Test3', 100, '254723293349', 'Other', 'AAA0003');
});
