<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Auth;
use Session;
use App\Category;
use App\picture;
use Image;
use DB;
use App\Product;
use App\ProductsAttribute;
use App\ProductsImage;
use App\Coupon;
use App\User;
use App\Country;
use App\DeliveryAddress;
use App\Order;
use App\OrdersProduct;




class CategoryController extends Controller
{
    public function addCategory(Request $request){
    	if($request->isMethod('post')){
    		$data = $request->all();
    		//echo "<pre>"; print_r($data); die;

            if(empty($data['status'])){
                $status='0';
            }else{
                $status='1';
            }
            if(empty($data['meta_title'])){
                $data['meta_title'] = "";    
            }
            if(empty($data['meta_description'])){
                $data['meta_description'] = "";    
            }
            if(empty($data['meta_keywords'])){
                $data['meta_keywords'] = "";    
            }
    		$category = new Category;
           // $picture = new picture;
    		$category->name = $data['category_name'];
            $category->parent_id = $data['parent_id'];
    		$category->description = $data['description'];
    		$category->url = $data['url'];
            $category->meta_title = $data['meta_title'];
            $category->meta_description = $data['meta_description'];
            $category->meta_keywords = $data['meta_keywords'];

              if($request->hasFile('image')){
                $image_tmp = Input::file('image');
                if ($image_tmp->isValid()) {
                    // Upload Images after Resize
                    $extension = $image_tmp->getClientOriginalExtension();
                    $fileName = time().'.'.$extension;
                    $large_image_path = 'images/backend_images/product/large'.'/'.$fileName;
                    $medium_image_path = 'images/backend_images/product/medium'.'/'.$fileName;  
                    $small_image_path = 'images/backend_images/product/small'.'/'.$fileName;  

                    Image::make($image_tmp)->save($large_image_path);
                    Image::make($image_tmp)->resize(600, 600)->save($medium_image_path);
                    Image::make($image_tmp)->resize(300, 300)->save($small_image_path);

                    $category->image = $fileName; 

                }
            }



               if($request->hasFile('image1')){
                $image_tmp = Input::file('image1');
                if ($image_tmp->isValid()) {
                    // Upload Images after Resize
                    $extension = $image_tmp->getClientOriginalExtension();
                    $fileName = time().'.'.$extension;
                    $large_image_path = 'images/backend_images/product/large'.'/'.$fileName;
                    $medium_image_path = 'images/backend_images/product/medium'.'/'.$fileName;  
                    $small_image_path = 'images/backend_images/product/small'.'/'.$fileName;  

                    Image::make($image_tmp)->save($large_image_path);
                    Image::make($image_tmp)->resize(600, 600)->save($medium_image_path);
                    Image::make($image_tmp)->resize(300, 300)->save($small_image_path);

                    $category->image1 = $fileName; 

                }
            }
            

            $category->status = $status;
    		$category->save();

           // $categories = Category::where('status','1')->get();

    		return redirect()->back()->with('flash_message_success', 'Category has been added successfully');
    	}

        $levels = Category::where(['parent_id'=>0])->get();
        $categories =  Category::where('status','1')->get();

        
    	return view('admin.categories.add_category')->with(compact('levels'));
    }

    public function editCategory(Request $request,$id=null){

        if($request->isMethod('post')){
            $data = $request->all();
            /*echo "<pre>"; print_r($data); */

            if(empty($data['status'])){
                $status='0';
            }else{
                $status='1';
            }
            if(empty($data['meta_title'])){
                $data['meta_title'] = "";    
            }
            if(empty($data['meta_description'])){
                $data['meta_description'] = "";    
            }
            if(empty($data['meta_keywords'])){
                $data['meta_keywords'] = "";    
            }


            // Upload Image
            //Done with edit image part 
            if($request->hasFile('image')){
                $image_tmp = Input::file('image');
                if ($image_tmp->isValid()) {
                    // Upload Images after Resize
                    $extension = $image_tmp->getClientOriginalExtension();
                    $fileName = time().'.'.$extension;
                    $large_image_path = 'images/backend_images/product/large'.'/'.$fileName;
                    $medium_image_path = 'images/backend_images/product/medium'.'/'.$fileName;  
                    $small_image_path = 'images/backend_images/product/small'.'/'.$fileName;  

                    Image::make($image_tmp)->save($large_image_path);
                    Image::make($image_tmp)->resize(600, 600)->save($medium_image_path);
                    Image::make($image_tmp)->resize(300, 300)->save($small_image_path);

                }
            }else if(!empty($data['current_image'])){
                $fileName = $data['current_image'];
            }else{
                $fileName = '';
            }


            Category::where(['id'=>$id])->update(['status'=>$status,'name'=>$data['category_name'],'parent_id'=>$data['parent_id'],'description'=>$data['description'],'url'=>$data['url'],'meta_title'=>$data['meta_title'],'image'=>$fileName,'meta_description'=>$data['meta_description'],'meta_keywords'=>$data['meta_keywords']]);
            return redirect()->back()->with('flash_message_success', 'Category has been updated successfully');
        }

        $categoryDetails = Category::where(['id'=>$id])->first();
        $levels = Category::where(['parent_id'=>0])->get();


         $categories_drop_down = "<option value='' disabled>Select</option>";
        foreach($levels as $cat){
            if($cat->id==$categoryDetails->category_id){
                $selected = "selected";
            }else{
                $selected = "";
            }
            $categories_drop_down .= "<option value='".$cat->id."' ".$selected.">".$cat->name."</option>";
            $sub_categories = Category::where(['parent_id' => $cat->id])->get();
            foreach($sub_categories as $sub_cat){
                if($sub_cat->id==$categoryDetails->category_id){
                    $selected = "selected";
                }else{
                    $selected = "";
                }
                $categories_drop_down .= "<option value='".$sub_cat->id."' ".$selected.">&nbsp;&nbsp;--&nbsp;".$sub_cat->name."</option>";  
            }   
        }
        return view('admin.categories.edit_category')->with(compact('categoryDetails','levels'));
    }


public function deleteCategoryImage($id){

        // Get category Image
        //done delete category
        $CategoryImage = Category::where('id',$id)->first();

        // Get category Image Paths
        $large_image_path = 'images/backend_images/product/large/';
        $medium_image_path = 'images/backend_images/product/medium/';
        $small_image_path = 'images/backend_images/product/small/';

        // Delete Large Image if not exists in Folder
        if(file_exists($large_image_path.$CategoryImage->image)){
            unlink($large_image_path.$CategoryImage->image);
        }

        // Delete Medium Image if not exists in Folder
        if(file_exists($medium_image_path.$CategoryImage->image)){
            unlink($medium_image_path.$CategoryImage->image);
        }

        // Delete Small Image if not exists in Folder
        if(file_exists($small_image_path.$CategoryImage->image)){
            unlink($small_image_path.$CategoryImage->image);
        }

        // Delete Image from Category table
        Category::where(['id'=>$id])->update(['image'=>'']);

        return redirect()->back()->with('flash_message_success', 'Category image has been deleted successfully');
    }




    public function deleteCategory($id = null){
        Category::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success', 'Category has been deleted successfully');
    }

    public function viewCategories(){ 

        $categories = category::get();
        return view('admin.categories.view_categories')->with(compact('categories'));
    }

     
}
