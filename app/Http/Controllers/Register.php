<?php

namespace App\Http\Controllers;

use App\Mail\Verified;
use App\Models\UserTable;
use App\Traits\GenerallResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class Register extends Controller
{

    // use GenerallResponse;
    public function signup(Request $req)
    {
        $existingEmail = UserTable::where('email', $req->email)->first();
        $existingName = UserTable::where('name', $req->name)->first();

        if ($existingEmail) {
            return returnError('', 'This email already exists');
        } else {
            if ($existingName)
                return returnError('', 'This name is taken');

            UserTable::create([
                'name' => $req->name,
                'email' => $req->email,
                'password' => $req->password,
                'token_verify' => $req->tokenVerify,
                'verified' => $req->verified
            ]);
            return reutrnData($req->name, "done");
        }
    }
    // ['name'=>$req->name]
    public function login(Request $req)
    {

        $existing = UserTable::where('email', $req->email)->first();
        if ($existing) {
            if ($existing->name != $req->name)
                return returnError('', 'wrong user name');
            if ($existing->password != $req->password)
                return returnError('', 'wrong password');
            else
                return reutrnData($existing->name, "done");
        } else {
            return returnError('', 'you are not exist on system ');
        }
    }

    public function sendEmail(Request $req)
    {
        Mail::to($req->email)->send(new Verified($req->token));
    }

    public function getToken(Request $req)
    {
        $token = UserTable::where('email', $req->email)->get(['token_verify']);
        if ($token) {
            return reutrnData($token, "token verify");
        }
    }
    public function upDateVerify(Request $req)
    {


        UserTable::where('email', $req->email)->update(['verified' => 'true']);
        return returnSuccessMsg('success', 200);
    }
}

function returnError($errNum, $msg)
{
    return response()->json([
        'status' => false,
        'errNum' => $errNum,
        'msg' => $msg,

    ]);
}
function returnSuccessMsg($msg = "", $errNum = "100")
{
    return response()->json([
        'status' => true,
        'errNum' => $errNum,
        'msg' => $msg
    ]);
}
function reutrnData($Data, $msg = "")
{
    return response()->json([
        'status' => true,
        'msg' => $msg,
        'data' => $Data

    ]);
}
