<?php
/**
 * Created by PhpStorm.
 * User: Artan
 * Date: 1/23/2018
 * Time: 3:11 PM
 */

namespace App\Http\SelfClasses;
use App\Models\Gallery;

class AddNewGallery
{
   public function addNewGallery($request)
   {
       $count = count($request->file);
       $i     = 0;
       while($i < $count)
       {
           $gallery = new Gallery();
           $file = $request->file[$i];
           $src  = $file->getClientOriginalName();
           $file->move('public/dashboard/Gallery', $src);
           $gallery->image_src = $src;
           $gallery->title      = trim($request->title[$i]);
           $gallery->save();
           $i++;
       }if($gallery)
       {
           return true;
       }else
           {
               return($request);
               return('خطایی رخ داده است ، لطفا بخش پشتباتی تماس بگیرید');
           }
   }
}