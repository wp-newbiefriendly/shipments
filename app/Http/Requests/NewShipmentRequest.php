<?php

namespace App\Http\Requests;

use App\Rules\UserClient;
use Illuminate\Foundation\Http\FormRequest;

class NewShipmentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:128',
            'fromCity' => 'required|string|max:64',
            'fromCountry' => 'required|string|max:64',
            'toCity' => 'required|string|max:64',
            'toCountry' => 'required|string|max:64',
            'price' => 'required|numeric|min:0',
            'status' => 'required|in:in_progress,unassigned,completed,problem',
            'details' => 'required|nullable|string',
            'documents' => 'required|array',
            'documents.*' => 'required|file|mimes:pdf,jpeg,png,jpg,docx,doc|max:10240',
            'clientId' => ['required', new UserClient()]
        ];
    }

}
