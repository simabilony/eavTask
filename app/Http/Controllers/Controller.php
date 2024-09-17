<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use OpenApi\Annotations as OA;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    /**
    * @OA\Info(
    *     version="3.0",
    *     title="API Documentation",
    * )
    *    @OA\PathItem(path="/api")
    *   @OA\Server(url="http://eavtask.test")
    * @OA\SecurityScheme(
    *   securityScheme="bearerAuth",
    *   type="http",
    * scheme="bearer"
    *)
    */
}
