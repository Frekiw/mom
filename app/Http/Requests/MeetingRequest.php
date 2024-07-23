<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MeetingRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
{
    return [
        'stmeeting_id' => 'required|exists:stmeetings,id_stmeeting',
        'forward_id' => 'required',
        'title' => 'required',
        'date' => 'required',
        'password' => 'required',
        'notes' => 'required',
    ];
}
}
