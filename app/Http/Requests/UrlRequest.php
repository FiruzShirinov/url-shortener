<?php

namespace App\Http\Requests;

use App\Models\Url;
use Illuminate\Foundation\Http\FormRequest;

class UrlRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'original' => 'required|string|unique:urls,original|regex:/^(?:[-A-Za-z0-9]+\.)+[A-Za-z]{2,6}$/',
            'shortened' => 'required|string|unique:urls,shortened',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'original' => 'Ссылка для сокращения',
            'shortened' => 'Сокращенная ссылка',
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        $lastLetter = 'a';
        $url = Url::latest()->first();
        if ($url) {
            $explodedUrlShortened = explode('site.ru/', $url->shortened);
            $lastLetter = end($explodedUrlShortened);
            $lastLetter++;
        }

        $this->merge([
            'shortened' => "site.ru/{$lastLetter}",
        ]);
    }
}
