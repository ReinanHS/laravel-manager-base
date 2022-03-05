<?php

namespace Reinanhs\LaravelManagerBase\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;

class HealthController extends Controller
{
    public function __invoke(): JsonResponse
    {
        return response()->json([
            'version' => config('laravel-manager-base.version')
        ]);
    }
}