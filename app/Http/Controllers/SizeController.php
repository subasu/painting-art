<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SizeController extends Controller
{
    // below function is related to return
    public function sizesManagement()
    {
        $pageTitle = 'مدیریت و نمایش اندازه ها';
        $data = Size::all();
        return view('admin.sizesManagement',compact('data','pageTitle'));
    }

    //below function is related to return view of add size
    public function addSizes()
    {
        $pageTitle = 'افزودن اندازه ها';
        return view('admin.addSizes',compact('pageTitle'));
    }

    //below function is related to add new size in data base
    public function addNewSize(Request $request)
    {
        $count = count($request->sideways);
        $i = 0;
        while($i < $count)
        {
            $newSize = new Size();
            $newSize->model_id    = $request->modelId;
            $newSize->sideways    = trim($request->sideways[$i]);
            $newSize->width       = trim($request->width[$i]);
            $newSize->length      = trim($request->length[$i]);
            $newSize->diameter    = trim($request->diameter[$i]);
            $newSize->save();
            $i++;
        }

        if($newSize)
        {
            return response()->json(['message' => 'اطلاعات با موفقیت ثبت شد', 'code' => '1']);
        }else
        {
            return response()->json(['message' => 'خطایی در ثبت اطلاعات رخ داده است ، با بخش پشتیبانی تماس بگیرید']);
        }
    }


    //below function is related to edit size
    public function editSize($id)
    {
        $pageTitle = 'ویرایش اندازه';
        $data = Size::where('id',$id)->get();
        if(count($data) > 0)
        {
            return view('admin.editSize',compact('data','pageTitle'));
        }else
        {
            return view('errors.403');
        }
    }

    //below function is related toi edit size title
    public function editSizeInformation(Request $request)
    {
        if(!$request->ajax())
        {
            abort(403);
        }else
        {
            $update = Size::find($request->id);
            $update->title    = trim($request->title);
            $update->width    = trim($request->width);
            $update->length   = trim($request->length);
            $update->diameter = trim($request->diameter);
            $update->save();
            if($update)
            {
                return response()->json(['message' => 'ویرایش با موفقیت انجام شد' , 'code' => '1']);
            }
            else
            {
                return response()->json(['message' => 'خطایی رخ د اده است ، با بخش پشتیبانی تماس بگیرید ']);
            }
        }
    }


    //below function is related to make size enable or disable
    public function enableOrDisableSize(Request $request)
    {
        if(!$request->ajax())
        {
            abort(403);
        }
        else
        {
            switch ($request->active)
            {
                case 1 :
                    $update = DB::table('sizes')->where('id',$request->sizeId)->update(['active' => 0 ]);
                    if($update)
                    {
                        return response()->json(['message' => 'اندازه  مورد نظر شما غیر فعال گردید' , 'code' => '1']);
                    }else
                    {
                        return response()->json(['message' => 'خطایی رخ داده است ، با بخش پشتیبانی تماس بگیرید']);
                    }
                    break;

                case 0 :
                    $update = DB::table('sizes')->where('id',$request->sizeId)->update(['active' => 1 ]);
                    if($update)
                    {
                        return response()->json(['message' => 'اندازه مورد نظر شما  فعال گردید' , 'code' => '1']);
                    }else
                    {
                        return response()->json(['message' => 'خطایی رخ داده است ، با بخش پشتیبانی تماس بگیرید']);
                    }
                    break;

            }
        }
    }
}
