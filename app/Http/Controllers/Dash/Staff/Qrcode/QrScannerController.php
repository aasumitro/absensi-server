<?php

namespace App\Http\Controllers\Dash\Staff\Qrcode;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QrScannerController extends Controller
{
    public function index()
    {
        return view('pages.staff.qrcode.scanner.index');
    }
}
