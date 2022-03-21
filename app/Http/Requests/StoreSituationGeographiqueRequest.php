<?php

namespace App\Http\Requests;

use App\Models\SituationGeographique;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSituationGeographiqueRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('situation_geographique_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'code'    => [
                'string',
                'required',
            ],
            'libelle' => [
                'string',
                'required',
            ],
        ];
    }
}
