<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    //
    public function pageHandle(Request $request)
    {
        switch($request->pageName)
        {
            case 'addGoogleMap' :
                if(DB::table('google_maps')() > 0)
                {
                    return response()->json(['message' => 'yes' , 'code' => 'success']);
                }else
                    {
                        return response()->json(['message' => 'no' , 'code' => 'error']);
                    }
            break;
        }
    }
}
