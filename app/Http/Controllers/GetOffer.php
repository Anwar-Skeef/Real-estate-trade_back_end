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

class GetOffer extends Controller
{
    public function getAllOffers(Request $request)
    {
        $size = OfferTable::get(['offer_number']);

        for ($i = 0; $i < count($size); $i++) {
            $offersInfo = collect(OfferTable::get(['offer_number', 'city', 'details'])[$i]);
            $images = collect(ImageTable::get(['img0'])[$i]);
            $offers[$i] =  $offersInfo->merge($images);
        }

        return returnData($offers, "Success");
    }

    public function getOffer(Request $req)
    {
        $offer = OfferTable::where('offer_number', $req->offerNumber)->first();

        return returnData($offer, "Offer details");
    }
    public function getOfferImage(Request $req)
    {
        $offerImage = ImageTable::where('offer_number', $req->offerNumber)->get();

        return returnData($offerImage, "Offer Image");
    }

    public function getOfferComment(Request $request)
    {
        $comments = CommentTable::where('offer_number', $request->offerNumber)->get();

        return returnData($comments, "All Comments For This Offer");
    }


    public function getOfferSite(Request $request)
    {
        $sites = OfferSite::where('offer_number', $request->offerNumber)->get();

        return returnData($sites, "All Comments For This Offer");
    }
}
