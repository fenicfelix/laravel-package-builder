<?php

namespace App\Http\Controllers;

use Akika\LaravelNcba\Ncba;

class TestController extends Controller
{
    public function health()
    {
        $ncba = new Ncba();
        $ncba->checkApiHealth();
    }
}
