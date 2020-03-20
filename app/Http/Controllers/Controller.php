<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Category;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public static function mainCategories(){
    	$mainCategories = Category::where(['parent_id' => 0])->get();
    	//$subCategories = Category::where(['parent_id' => 1])->get();
    	$mainCategories = json_decode(json_encode($mainCategories));
    	/*echo "<pre>"; print_r($mainCategories); die;*/
    	return $mainCategories;
    }


      public static function subCategories(){
    	//$mainCategories = Category::where(['parent_id' => 0])->get();
    		$subCategories = Category::where(['parent_id' => 1])->get();
    	$subCategories = json_decode(json_encode($subCategories));
    	/*echo "<pre>"; print_r($mainCategories); die;*/
    	return $subCategories;
    }

     public static function subCategories1(){
    	//$mainCategories = Category::where(['parent_id' => 0])->get();
    		$subCategories1 = Category::where(['parent_id' => 3])->get();
    	$subCategories1 = json_decode(json_encode($subCategories1));
    	/*echo "<pre>"; print_r($mainCategories); die;*/
    	return $subCategories1;
    }
}
