<?php

namespace App\Http\Controllers\Dash\Root\Offices;

use App\Http\Controllers\Controller;

class DeviceController extends Controller
{
    public function __invoke()
    {
        return view('pages.root.offices.device.index');
    }
}
