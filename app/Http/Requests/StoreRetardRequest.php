<?php

namespace App\Http\Requests;

use App\Models\Retard;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreRetardRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('retard_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'duree'      => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'user_id'    => [
                'required',
                'integer',
            ],
            'traffic_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
