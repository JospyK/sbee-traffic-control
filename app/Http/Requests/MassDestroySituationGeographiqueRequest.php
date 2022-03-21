<?php

namespace App\Http\Requests;

use App\Models\SituationGeographique;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroySituationGeographiqueRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('situation_geographique_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:situation_geographiques,id',
        ];
    }
}
