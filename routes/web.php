<?php

use Akika\LaravelNcba\Ncba;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/health', function () {
    // $bankCode = null, $branchCode = null, $country = null, $currency = null
    $ncba = new Ncba('07', '000', 'Kenya', 'KES');
    echo $ncba->checkApiHealth();

    // echo $ncba->mpesa('254723293349', 'Felix Ogucha Nyabwari', 100, 'AAA0003', 'Other', date('ymdhis'));

    // echo $ncba->checkTransactionStatus('FTC250124JEQS');

    $result = $ncba->ift('4376410044', 'Felix Ogucha', 100, 'Test payment', date('ymdhis'));
    echo $result;

    $result = json_decode($result, true);
    echo $result["Response Code"];

    // echo $ncba->eft('4376410044', 'Felix Ogucha', 100, 'Test payment', date('ymdhis'));

    // echo $ncba->rtgs('4376410044', 'Felix Ogucha', 100, '1002', 'Test payment', date('ymdhis'));

    // $ncba = new Ncba('404', '11000', 'Kenya', 'KES'); // Pesalink has a different bank code
    // echo $ncba->pesalink('4376410044', 'Felix Ogucha', 100, 'Test payment', date('ymdhis'));
});
