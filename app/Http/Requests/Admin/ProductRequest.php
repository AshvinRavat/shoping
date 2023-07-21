<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    { 
        $imageValidation = Route::currentRouteName() == "admin.product.create" ? "required" : 'nullable';
        
        return [
            'category_id' => ['required'],
            'tag_id' => ['required'],
            'name' => ['required', 'max:50'],
            'price' => ['required', 'integer', 'digits_between:2,5'],
            'description' => ['nullable', 'max:70'],
            'image' => [$imageValidation, 'image', 'mimes:jpeg,png,jpg', 'max:5024'],
            'stock' => ['required', 'max:6'],
            'payment_options' => ['required'],
            'published' => ['nullable'],
        ];
    }
}
