<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use RealRashid\SweetAlert\Facades\Alert;

use App\Banners;
use Image;


class BannersController extends Controller
{
    public function banners()
    {
        $bannerDetails = Banners::get();
    	return view('admin.banner.banners' , compact('bannerDetails'));
    }

    public function addBanner(Request $request)
    {
    	if($request->isMethod('post')){
    		$data = $request->all();
    		$banner = new Banners;
    		$banner->name = $data['banner_name'];
    		$banner->text_style = $data['text_style'];
    		$banner->sort_order = $data['sort_order'];
    		$banner->content = $data['banner_content'];    	
    		$banner->link = $data['link'];
    		

    		//upload image
            if($request->hasfile('image')){
                echo $img_tmp = Input::file('image');
                if($img_tmp->isValid()){
                    
               
                 //image path code
                 $extension = $img_tmp->getClientOriginalExtension();
                 $filename = rand(111,99999).'.'.$extension;
                 $banner_path = 'uploads/banners/'.$filename;

                 //image resize
                 Image::make($img_tmp)->resize(500,500)->save($banner_path);
                 $banner->image = $filename;
                }
            }
            $banner->save();
            return redirect('/admin/banners')->with('flash_message_success', 'Banners has been added sucessfully');
        }

    	return view('admin.banner.add_banner');
    }

   

    public function editBanner(Request $request, $id)
    {
        if($request->isMethod('post')){
            $data = $request->all();

            //upload image
            if($request->hasFile('image')){
                $image_tmp = Input::file('image');
                if($image_tmp->isValid()){
                    //upload image and resize it
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = rand(111, 99999). '.'.$extension;
                    $banner_path = 'uploads/banners/' .$filename;
                    Image::make($image_tmp)->save($banner_path);
                }
            }elseif(!empty($data['current_image'])){
                $filename = $data['current_image'];
            }else{
               
                $filename = '';
            }


           Banners::where('id' ,$id)->update([
                'name'=>$data['banner_name'],
                'text_style'=>$data['text_style'],
                'content' =>$data['banner_content'],
                'link' => $data['link'],
                'sort_order' => $data['sort_order'],
                'image' =>$filename]);
             return redirect('/admin/banners')->with('flash_message_success', 'Banner Updated');
        }

        $bannerDetails = Banners::where(['id'=> $id])->get()->first();
    	return view('admin.banner.edit_banner', compact('bannerDetails'));

    }
}
