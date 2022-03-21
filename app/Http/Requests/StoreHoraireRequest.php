<?php

namespace App\Http\Requests;

use App\Models\Horaire;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreHoraireRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('horaire_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name'    => [
                'required',
                'unique:horaires',
            ],
            'arrivee' => [
                'required',
                'date_format:' . config('panel.time_format'),
            ],
            'depart'  => [
                'required',
                'date_format:' . config('panel.time_format'),
            ],
            'users.*' => [
                'integer',
            ],
            'users'   => [
                'array',
            ],
        ];
    }
}
