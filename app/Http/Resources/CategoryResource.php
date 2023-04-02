<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'             => $this->id,
            'name'           => $this->name,
            'bg_hex_color'   => $this->bg_hex_color,
            'text_hex_color' => $this->text_hex_color,
        ];
    }
}
