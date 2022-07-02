<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response as HttpResponse;
use Illuminate\Support\Facades\Response;

class ApiController extends Controller
{
    protected $statusCode;

    /**
     * @return mixed
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
        return $this;
    }

    public function responseNotFound($message = "Not Found")
    {
        return $this->setStatusCode(HttpResponse::HTTP_NOT_FOUND)->responseWithError($message);
    }

    public function response($message)
    {
        return Response::json($message, $this->statusCode);
    }

    public function responseWithError($message)
    {
        return $this->response(['errors' => ['message' => $message]]);
    }

    public function responseWithData($data, $message = null)
    {
        if ($message != null) {
            $response['message'] = $message;
        }

        $response['data'] = $data;

        return $this->response($response);
    }
}
