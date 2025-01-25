<?php

use Akika\LaravelNcba\Ncba;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/health', function () {
    // $bankCode = null, $branchCode = null, $country = null, $currency = null
    $ncba = new Ncba('07', '000', 'Kenya', 'KES');
    // echo $ncba->checkApiHealth();

    // echo $ncba->mpesa('Felix Ogucha Nyabwari', date('ymdhis'), 100, '254723293349', 'Other', 'AAA0003');

    // echo $ncba->checkTransactionStatus('FTC250124JEQS');

    // echo $ncba->ift('Felix Ogucha', date('ymdhis'), '4376410044', 100, 'Test payment');

    // echo $ncba->eft('Felix Ogucha', date('ymdhis'), '4376410044', 100, 'Test payment');

    // echo $ncba->rtgs('Felix Ogucha', '4376410044', 100, '1002', date('ymdhis'), 'Test payment');

    // $ncba = new Ncba('404', '11000', 'Kenya', 'KES'); // Pesalink has a different bank code
    // echo $ncba->pesalink('Felix Ogucha', date('ymdhis'), '4376410044', 100, 'Test payment');

    //($beneficiaryAccountName, $reference, $account, $amount, $narration)
});
