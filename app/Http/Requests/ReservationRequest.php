<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ReservationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (Auth::check()) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'date'=>'required|regex:<^[0-9]{4}-[0-9]{2}-[0-9]{2}$>|after:today|before:1 month',
            'time'=>'required|regex:<^[0-9]{2}:[0-9]{2}$>',
            'number'=>'required|regex:<^[0-9]{1,2}$>',
        ];
    }

    public function messages()
    {
    return [
        'date.required' => '日付は必須項目です',
        'date.regex' => '日付は半角数字と-にて10桁でご記入下さい',
        'time.required' => '時間は必須項目です',
        'time.regex' => '時間を選択してください',
        'number.required' => '人数は必須項目です',
        'number.regex' => '人数を選択してください',
    ];
    }
}
