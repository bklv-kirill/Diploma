<?php

namespace App\Http\Controllers\Api\Response;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Response\ResponseRequest;
use App\Models\User;

class DeleteController extends Controller
{

    public function __invoke(ResponseRequest $request)
    {
        sleep(1);

        $requestData = $request->validated();

        $user = User::query()->find($requestData['currentAuthUserId']);
        $user->responses()->detach($requestData['vacancyId']);

        return response(['status' => 'success'], 200);
    }

}
