<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class PlantRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth('sanctum')->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'user_id' => ['nullable', 'exists:users,id'],
            'plant_id' => ['nullable', 'exists:plants,id'],
            'is_default' => ['boolean'],
            'name' => ['required', 'string', 'max:255'],
            'image' => ['nullable', 'image'],
            'watering' => ['required', 'numeric'],
            'temperature' => ['required', 'numeric'],
            'humidity' => ['required', 'numeric'],
            'soil_Humidity' => ['required', 'numeric'],
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'user_id' => auth('sanctum')->user()->id,
            'plant_id' => Route::current()->parameter('plant')?->id
        ]);
    }
}
