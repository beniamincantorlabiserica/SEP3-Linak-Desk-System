<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserInfo;

class UserInfoController extends Controller
{
    public function addUserInfo(Request $request)
    {
        $request->validate([
            'UserID' => 'required|string|unique:user_infos,UserID',
            'Age' => 'required|integer',
            'Height' => 'required|numeric',
            'Weight' => 'required|numeric',
        ]);

        $userInfo = UserInfo::create([
            'UserID' => $request->UserID,
            'Age' => $request->Age,
            'Height' => $request->Height,
            'Weight' => $request->Weight,
        ]);

        return response()->json(['message' => 'User information added successfully!', 'data' => $userInfo]);
    }

    public function getUserInfo()
    {
        $userInfos = UserInfo::all();
        return response()->json(['data' => $userInfos]);
    }
}
