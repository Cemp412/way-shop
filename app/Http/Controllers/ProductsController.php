<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use RealRashid\SweetAlert\Facades\Alert;

use App\Product;
use App\Category;
use Image;


class ProductsController extends Controller
{
    public function addproduct(Request $request)
    { 
    	if($request->ismethod('post'))
    	{
    		$data =$request->all();
    		// echo "<pre>";
    		// print_r($data); die;
    		$product = new Product;
            $product->category_id = $data['category_id'];
    		$product->product_name = $data['product_name'];
            
    		$product->product_code = $data['product_code'];
    		$product->product_color = $data['product_color'];
            if(!empty($data['product_description'])){
    		    $product->product_description = $data['product_description'];
        }else{
                $product->product_description = "";   
        }

    		$product->product_price = $data['product_price'];

            //upload image
            if($request->hasfile('image')){
                $img_tmp = Input::file('image');
                if($img_tmp->isValid()){
                    
               
                 //image path code
                 $extension = $img_tmp->getClientOriginalExtension();
                 $filename = rand(111,99999).'.'.$extension;
                 $img_path = 'uploads/product/'.$filename;

                 //image resize
                 Image::make($img_tmp)->resize(500,500)->save($img_path);
                 $product->image = $filename;
                }
            }
        $product->save();
          return redirect('/admin/view-products')->with('flash_message_success', 'Product has been added successfully..!');
      }

        //Categories Dropdown Menu code
         $categories =Category::where(['parent_id' => 0])->get();
         $categories_dropdown = "<option value = '' selected disabled>Select</option>";
         foreach($categories  as $cat){
            $categories_dropdown .= "<option value='".$cat->id."'>".$cat->name."</option>";
            $sub_categories = category::where(['parent_id' =>$cat->id])->get();

            foreach($sub_categories as $sub_cat){
                $categories_dropdown .="<option value='".$sub_cat->id."'>&nbsp;--&nbsp;".$sub_cat->name."</option>";
             }
          }

        
    	
    	return view('admin.products.add_products')->with(compact('categories_dropdown'));
    }


     public function viewproducts()
    {
        $pro = Product::orderBy('id','desc')->get();
        //print_r($pro);
        
        return view('admin.products.viewproduct',compact('pro'));
        
    }

    public function editproduct(Request $request, $id)
    {
        if($request->isMethod('post')){
            $data = $request->all();
             //upload image
            if($request->hasfile('image')){
                echo $img_tmp = Input::file('image');
                if($img_tmp->isValid())
                {
                    
               
                 //image path code
                 $extension = $img_tmp->getClientOriginalExtension();
                 $filename = rand(111,99999).'.'.$extension;
                 $img_path = 'uploads/product/'.$filename;

                 //image resize
                 Image::make($img_tmp)->resize(500,500)->save($img_path);
                }
            }
            else{
             $filename = $data['current_image'];
           }

        if(empty($data['product_description'])){
            $data['product_description'] = '';
        }

        Product::where(['id' =>$id])->update([
            'product_name' =>$data['product_name'],
            'category_id' =>$data['category_id'],
            'product_code' =>$data['product_code'],
            'product_color' =>$data['product_color'],
            'product_description' =>$data['product_description'],
            'product_price' =>$data['product_price'],
            'image' =>$filename]);
         return redirect()->back()->with('flash_message_success', 'Product has been updated');
        }

        $productDetails = Product::where(['id' =>$id])->first();
         
         //Categories Dropdown code

         $categories = Category::where(['parent_id' => 0])->get();
         $categories_dropdown ="<option value ='' selected disabled>Select</option>";
         foreach ($categories as $cat) {
             if($cat->id ==$productDetails->category_id){
                $selected = "selected";
              }else{
                $selected ="";
              }
              $categories_dropdown .="<option value='".$cat->id."'".$selected.">".$cat->name."</option>";
            

            //code for subcategories
              $sub_categories = Category::where(['parent_id' =>$cat->id])->get();
              foreach ($sub_categories as $sub_cat) {

               if($cat->id == $productDetails->category_id){
                 $selected = "selected";
                }else{
                 $selected ="";
                }
                $categories_dropdown .="<option value='".$sub_cat->id."'".$selected.">&nbsp;--&nbsp;".$sub_cat->name."</option>";
              }
          }
         return view('admin.products.edit_product')->with(compact('productDetails', 'categories_dropdown'));
    }


    public function deleteproduct($id = null)
    {
       Product::where(['id' =>$id])->delete();
        Alert::success('Deleted successfully', 'Success Message');

       return redirect()->back()->with('flash_message_error', 'Product Deleted');
    }


    public function updateStatus(Request $request, $id= null)
    {
        $data = $request->all();
        Products::where('id', $data['id'])->update(['status' =>$data['status']]);
    }


    public function products($id)
    {   
        $productDetails = Product::where('id', $id)->first();
        return view('way-shop.product_details')->with(compact('productDetails'));
    }


    public function addAttributes(Request $request, $id = null)
    {
        $productDetails = Product::where(['id' => $id])->first();
        if($request->isMethod('post')){
            $data = $request->all();
            echo "<pre>";print_r($data);die;
        }
      return view('admin.products.add_attributes')->with(compact('productDetails'));
    }
}
