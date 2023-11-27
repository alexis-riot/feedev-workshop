<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFeedbackRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'questions' => ['required', 'array'],
            'questions.*.id' => ['required', 'exists:questions,id'],
            'questions.*.value' => ['required', 'string'],
        ];
    }

    public function attributes()
    {
       return  collect($this->get('questions'))->mapWithKeys(
           fn ($question, $index) => ['questions.' . $index . '.value' => str($question['title'])->lower()]
       )->toArray();
    }
}
