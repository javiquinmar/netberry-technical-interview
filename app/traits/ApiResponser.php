<?php

namespace App\Traits;

trait ApiResponser{

    protected function successResponse($data, $message = null, $code = 200)
	{
		return response()->json([
			'status'  => 'Success', 
			'message' => $message, 
			'data'    => $data
		], $code);
	}

	protected function errorResponse($message = 'Lo sentimos, ocurrió un error inesperado', $code = 500)
	{
		return response()->json([
			'status'  =>'Error',
			'message' => $message,
			'data'    => null
		], $code);
	}

}