<?php

namespace App\Http\Requests;

use App\Models\User;
use App\Rules\UserTrucker;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateShipmentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:128',
            'from_city' => 'required|string|max:64',
            'from_country' => 'required|string|max:64',
            'to_city' => 'required|string|max:64',
            'to_country' => 'required|string|max:64',
            'price' => 'required|numeric|min:0',
            'status' => 'required|in:in_progress,unassigned,completed,problem',
            'details' => 'required|nullable|string',
            'user_id' => ['required', new UserTrucker()]
        ];
    }
}
