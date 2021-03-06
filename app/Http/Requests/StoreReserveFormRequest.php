<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Reserve;
use App\Rules\CheckAvailableFlight;

class StoreReserveFormRequest extends FormRequest
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
    public function rules(Reserve $reserve)
    {
        $status = $reserve->status();

        return [
            'user_id'       => 'required|exists:users,id',
            'flight_id'     => [
                'required',
                'exists:flights,id',
                new CheckAvailableFlight()
            ],
            'date_reserved' => 'required|date',
            'status'        => [
                'required',
                Rule::in(array_keys($status))
            ]
        ];
    }
}
