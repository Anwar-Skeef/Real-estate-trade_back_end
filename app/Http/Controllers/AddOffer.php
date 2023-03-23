<?php

namespace App\Http\Controllers;

use App\Models\CommentTable;
use App\Models\ImageTable;
use App\Models\OfferSite;
use App\Models\OfferTable;


use Illuminate\Http\Request;
use Illuminate\Routing\Controller;



function returnError($errNum, $msg)
{
    return response()->json([
        'status' => false,
        'errNum' => $errNum,
        'msg' => $msg,

    ]);
}
function returnSuccessMsg($msg = "")
{
    return response()->json([
        'status' => true,

        'msg' => $msg
    ]);
}
function returnData($Data, $msg = "")
{
    return response()->json([
        'status' => true,
        'msg' => $msg,
        'data' => $Data

    ]);
}

class AddOffer extends Controller
{
    public function uploadFile(Request $request)
    {
        // $request->hasFile('img')
        $images = $request->file;
        $pathList = [];
        if ($images && (gettype($images) == 'array' || gettype($images) == 'object')) {
            // $pathlistKeys = [];
            foreach ($images  as $key => $img) {
                $compFileName = $img->getClientOriginalName();
                $fileNameOnly = pathinfo($compFileName, PATHINFO_FILENAME);
                $extension = $img->getClientOriginalExtension();
                $name = str_replace(' ', '_', $fileNameOnly) . '_' . time() . '.' . $extension;
                $path = $img->storeAs('public/images', $name);
                // array_push($pathlistKeys, "img$key");
                // array_push($pathList, $path);
                $pathList["img$key"] =  $path;
            }
            // $finalPath = array_combine($pathlistKeys, $pathList);
            ImageTable::create($pathList);
            return returnData($pathList, 'successfully');
        } else {

            return returnError(404, 'empty');
        }
    }

    public function addOffer(Request $request)
    {
        OfferTable::create([
            'user_email' => $request->email,
            'city' => $request->city,
            'neighborhood' => $request->neighborhood,
            'area' => $request->area,
            'rooms' => $request->rooms,
            'price' => $request->price,
            'details' => $request->details
        ]);
        OfferSite::create([
            'lat' => $request->lat,
            'lng' => $request->lng
        ]);
        return returnSuccessMsg("Success");
    }

    public function addComment(Request $request)
    {
        CommentTable::create([
            "offer_number" => $request->offer_number,
            "user_name" => $request->user_name,
            "comment" => $request->comment
        ]);
        return returnSuccessMsg("Success");
    }
}
//for only one file
// $image = $request->img;
// foreach ($image as $key => $value) {
// $compFileName = time() . $key . '.' . $value->getClientOriginalExtension();
// $path = public_path('upload');
// $value->move($path, $compFileName);
// }
// return response()->json(['data' => '', 'message' => 'successfully']);
