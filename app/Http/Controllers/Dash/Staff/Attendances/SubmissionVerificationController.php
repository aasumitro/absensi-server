<?php

namespace App\Http\Controllers\Dash\Staff\Attendances;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubmissionVerificationController extends Controller
{
    public function __invoke()
    {
        return view('pages.staff.attendance.submission.index');
    }
}
