<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\JsonResponse;

class CategoryController extends ApiController
{
    public function index(): JsonResponse
    {
        try {
            $categories = CategoryResource::collection(Category::all());
            return $this->successResponse($categories);    
        } catch (\Throwable $th) {
            return $this->errorResponse('Lo sentimos, ocurrió un error al cargar las categorías');
        }
    }
}
