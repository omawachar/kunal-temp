<?php

namespace App\Http\Controllers\api;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserCollection;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Validator;

class UserApiController extends Controller
{
    public function index(Request $request){
    
        try {
            $query = User::latest()->paginate(config('Settings.pagination'))->all();
            return new UserCollection($query);
        } catch (\Exception $e) {
            return metaData(false, $request, 30001, '', 502, errorDesc($e), 'Error occured in server side ');
        }
    }

    public function store(StoreUserRequest $request)
    {
        try {
            $user = User::create($request->all());
            $metaData = metaData(true, $request, '3002', 'success', 200, '');
            return (new UserResource($user))->additional($metaData);
        } catch (\Exception $e) {
            return metaData(false, $request, 30002, '', 502, errorDesc($e), 'Error occured in server side ');
        }
    }


    public function edit(Request $request)
    {
        // return $request->all();
        $validator = Validator::make($request->all(), [
            'id' => ['required', Rule::exists('users')],
        ], [
            'id.required' => 'ID is required.',
            'id.exists' => 'Invalid ID',
        ]);
        if ($validator->fails()) {
            return $metaData = metaData('false', $request, '30003', '', '502', '', $validator->messages());
        }
        try {
            $user = User::find($request->id);
            $metaData = metaData(true, $request, '30003', 'success', 200, '');
            return (new UserResource($user))->additional($metaData);
        } catch (\Exception $e) {
            return metaData(false, $request, 30003, '', 502, errorDesc($e), 'Error occured in server side ');
        }
    }


    public function update(UpdateUserRequest $request)
    {
        try {
            User::where('id', $request->id)->update($request);
            $updatedUser = User::find($request->id);
            $metaData = metaData(true, $request, '3004', 'success', 200, '');
            return (new UserResource($updatedUser))->additional($metaData);
        } catch (\Exception $e) {
            return metaData(false, $request, '30004', '', 502, errorDesc($e), 'Error occured in server side ');
        }
    }


    public function destroy(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'id' => ['required', Rule::exists('users', 'id')]
        ], [
            'id.required' => 'ID is required.',
            'id.exists' => 'Invalid ID',

        ]);

        if ($validator->fails()) {
            return metaData('false', $request, '30003', '', '502', '', $validator->messages());
        }
        try {
            User::find($request->id)->delete();
            $metaData = metaData(true, $request, '3004', 'success', 200, '');
            return  merge($metaData, ['data' => ['deleted_id' => $request->id]]);
        } catch (\Exception $e) {
            return metaData(false, $request, '30005', '', 502, errorDesc($e), 'Error occured in server side ');
        }
    }


}
