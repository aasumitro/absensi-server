<?php

namespace App\Http\Controllers\Dash\Root;

use App\Http\Controllers\Controller;

class SystemSettingController extends Controller
{
    public function __invoke()
    {
        return view('pages.root.settings.system.index');
    }
}
