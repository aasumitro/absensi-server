<?php

namespace App\Http\Controllers\Api\Mobile\References;

use App\Http\Controllers\Api\ApiController;
use App\Models\Managers\PreferenceManager;
use App\Traits\ApiResponder;
use Symfony\Component\HttpFoundation\Response;

class AbsentTypeController extends ApiController
{
    use ApiResponder, PreferenceManager;

    public function index()
    {
        return ApiResponder::success(
            $this->fetchAbsentTypes(),
            'Successfully [GET] Absent Type',
            Response::HTTP_CREATED
        );
    }
}
