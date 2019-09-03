<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public static function returnApiSuccess($data, $resource = 'undefined', $links = null, $page = null, $per_page = null){
        if($links == null) {
            $links = new \stdClass();
        }

    	$response = [
            'code' => 200,
            'status' => 'ok',
            'message' => 'Obtenido con éxito',
            'resource' => $resource,
            'links' => $links,
            'page' => $page,
            'total' => count($data),
            'per_page' => $per_page,
            'data' => $data
        ];
        return response()->json($response, 200);
    }
    public function returnApiRowsSuccess($data, $resource = 'undefined', $links = null, $page = null, $per_page = null){
        if($links == null) {
            $links = new \stdClass();
        }

    	$response = [
            'code' => 200,
            'status' => 'ok',
            'message' => 'Obtenido con éxito',
            'name' => $resource,
           /* 'links' => $links,
            'page' => $page,
            'total' => count($data),
            'per_page' => $per_page,*/
            'resource' => $data
        ];
        return response()->json($response, 200);
    }
    public function getApiErrorFalse400($errors, $resource = 'undefined'){
        $response = [
            'code' => 400,
            'message' => 'Bad request',
            'resource' => $resource,
            'data' => [],
            'errors' => $errors
        ];
        return response()->json($response, 200);
    }

    public static function getApiError400($errors, $resource = 'undefined'){
        $response = [
            'code' => 400,
            'message' => 'Bad request',
            'resource' => $resource,
            'data' => [],
            'errors' => $errors
        ];
        return response()->json($response, 400);
    }

    public static function getApiError404($resource = 'undefined'){
    	$response = [
            'code' => 404,
            'message' => 'Not Found',
            'resource' => $resource,
            'data' => []
        ];
        return response()->json($response, 404);
    }

    public function getApiError401($resource = 'undefined'){
    	$response = [
            'code' => 401,
            'message' => 'Unauthorized',
            'resource' => $resource,
            'data' => []
        ];
        return response()->json($response, 401);
    }
}
