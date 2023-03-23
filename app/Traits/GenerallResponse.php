<?php

namespace App\Traits;


trait GenerallResponse
{
    public function returnError($errNum, $msg)
    {
        return response()->json([
            'status' => false,
            'errNum' => $errNum,
            'msg' => $msg,

        ]);
    }
    public function returnSuccessMsg($msg = "", $errNum = "100")
    {
        return response()->json([
            'status' => true,
            'errNum' => $errNum,
            'msg' => $msg
        ]);
    }

    public function reutrnData($Data, $msg = "")
    {
        return response()->json([
            'status' => true,
            'msg' => $msg,
            'data' => $Data

        ]);
    }
}
