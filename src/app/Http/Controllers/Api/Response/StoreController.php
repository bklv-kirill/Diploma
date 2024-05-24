<?php

namespace App\Http\Controllers\Api\Response;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Response\ResponseRequest;
use App\Models\User;
use Illuminate\Http\Response;

class StoreController extends Controller
{

    public function __invoke(ResponseRequest $request): Response
    {
        sleep(1);

        $requestData = $request->validated();

        $user = User::query()->find($requestData['currentAuthUserId']);
        $user->responses()->attach($requestData['vacancyId']);

        return response(['status' => 'success'], 200);
    }

}
