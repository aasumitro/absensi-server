<?php

namespace App\Http\Controllers\Dash\Staff\Reports;

use App\Http\Controllers\Controller;

class SummaryReportController extends Controller
{
    public function __invoke()
    {
        return view('pages.staff.report.summaries.index');
    }
}
