<?php

namespace App\Http\Controllers;

use App\Models\NewOrders;
use App\User;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;

class NewOrdersController extends Controller
{
    //
    public function newOrders()
    {
        $pageTitle = 'مدیریت سفارشات جدید';
        $data      = User::where('role_id',3)->with('newOrders')->get();
        foreach ($data[0]->newOrders as $datum)
        {
            $datum->persianDate = $this->toPersian($datum->created_at);
        }
        return view('admin.newOrders',compact('pageTitle','data'));
    }

    //
    public function toPersian($date)
    {
        if (count($date) > 0) {
            $gDate = $date;
            if ($date = explode('-', $gDate)) {
                $year = $date[0];
                $month = $date[1];
                $day = $date[2];
            }
            $date = Verta::getJalali($year, $month, $day);
            $myDate = $date[0] . '/' . $date[1] . '/' . $date[2];
            return $myDate;
        }
    }
}
