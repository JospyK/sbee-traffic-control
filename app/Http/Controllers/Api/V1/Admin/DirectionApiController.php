<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDirectionRequest;
use App\Http\Requests\UpdateDirectionRequest;
use App\Http\Resources\Admin\DirectionResource;
use App\Models\Direction;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DirectionApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('direction_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DirectionResource(Direction::all());
    }

    public function store(StoreDirectionRequest $request)
    {
        $direction = Direction::create($request->all());

        return (new DirectionResource($direction))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Direction $direction)
    {
        abort_if(Gate::denies('direction_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DirectionResource($direction);
    }

    public function update(UpdateDirectionRequest $request, Direction $direction)
    {
        $direction->update($request->all());

        return (new DirectionResource($direction))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Direction $direction)
    {
        abort_if(Gate::denies('direction_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $direction->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
