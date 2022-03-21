<?php

namespace App\Http\Requests;

use App\Models\Traffic;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreTrafficRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('traffic_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'user_id'     => [
                'required',
                'exists:users,id',
            ],
            'temperature' => [
                'nullable',
                'numeric',
                'min:10',
                'max:90',
            ],
        ];
    }
}
