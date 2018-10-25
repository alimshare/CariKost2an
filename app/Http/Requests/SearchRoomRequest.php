<?php

namespace App\Http\Requests;

use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Foundation\Http\FormRequest;

class SearchRoomRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'search.name'   => 'string|min:3',
            'search.city'   => 'string|min:3',
            'search.price.min'  => 'numeric',
            'search.price.max'  => 'numeric|gte:search.price.min'
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'search.name.min'        => 'Room name must be at least 3 characters.',
            'search.name.string'     => 'Room name must be string.',
            
            'search.city.min'        => 'City must be at least 3 characters.',
            'search.city.string'     => 'City must be string.',

            'search.price.min.numeric'   => 'Digit Only',
            'search.price.max.numeric'   => 'Digit Only',
            'search.price.max.gte'   => 'Max price must be greater than or equal Min price.',
        ];
    }
    
    /**
     * Handle a failed validation attempt.
     *
     * @param  \Illuminate\Contracts\Validation\Validator  $validator
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->errors();
        throw new HttpResponseException(
            response()->json(['errors' => $errors], JsonResponse::HTTP_BAD_REQUEST));
    }
}
