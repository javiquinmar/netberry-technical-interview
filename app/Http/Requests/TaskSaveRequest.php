<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;

class TaskSaveRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'       => ['required', 'min:3', 'max:255', Rule::unique('tasks', 'name')->ignore($this->task)], 
            'categories' => ['required','exists:categories,id']
        ];
    }
}
