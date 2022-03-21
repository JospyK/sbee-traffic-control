<?php

namespace App\Http\Requests;

use App\Models\Direction;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDirectionRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('direction_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'code'    => [
                'string',
                'nullable',
            ],
            'libelle' => [
                'string',
                'nullable',
            ],
        ];
    }
}
