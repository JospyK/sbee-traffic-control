<?php

namespace App\Http\Requests;

use App\Models\Traffic;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateTrafficRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('traffic_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            // 'sortie'  => [
            //     'date_format:' . config('panel.time_format'),
            //     'nullable',
            // ],
            // 'user_id' => [
            //     'required',
            //     'integer',
            // ],
        ];
    }
}
