<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Category;

class CategoryController extends Controller
{
    public function addcategory(Request $request){
    	if($request->isMethod('post')){
    		$data = $request->all();
    		$category = new Category;
    		$category->name = $data['category_name'];
    		$category->parent_id = $data['parent_id'];
    		$category->url = $data['url'];
    		$category->description = $data['description'];
    		$category->save();
    		return redirect('/admin/add-category')->with('flash_message_success', 'Category Added Successfully');

    	}

        $levels = Category::where(['parent_id' => 0])->get();
    	return view('admin.category.add_category')->with(compact('levels'));
    }

    public function viewcategories(Request $request){
        $categories = Category::get();
        return view('admin.category.viewcategory')->with(compact('categories'));
    }

    public function editcategory(Request $request, $id){
        if($request->isMethod('post')){
            $data = $request->all();
            Category::where(['id'=>$id])->update([
                'name'=>$data['category_name'],
                'parent_id'=>$data['parent_id'],
                'description' =>$data['description'],
                'url' => $data['url']]);
             return redirect('/admin/view-category')->with('flash_message_success', 'Category Updated');
        }

       
        $categoryDetails = Category::where(['id' =>$id])->get()->first();
         $levels = Category::where(['parent_id'=> 0])->get();

       
          return view('admin.category.edit_category', compact('levels', 'categoryDetails'));

    }

    public function deletecategory($id)
    {
        Category::where(['id' =>$id])->delete();
        Alert::Success('Deleted', 'Success message');
        return redirect()->back()->with('flash_message_error', 'Category Deleted');

    }

     public function updateStatus(Request $request, $id)
    {
        $data = $request->all();
        Category::where('id', $data['id'])->update(['status' =>$data['status']]);
    }
}
