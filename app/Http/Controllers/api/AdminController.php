<?php
namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;
use App\User;
use App\Admin;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Validator;


class AdminController extends Controller

{


 public $successStatus = 200;
    
    public function login(Request $request){
    	if($request->isMethod('post')){
    		$data = $request->input();

          // echo "<pre>"; print_r($data); die;
            $adminCount = Admin::where(['username' => $data['username'],'password'=>md5($data['password']),'status'=>1])->count(); 
            if($adminCount > 0){
                //echo "Success"; die;
                Session::put('adminSession', $data['username']);
               // $success['token'] =  $data->createToken('MyApp')-> accessToken; 
                // return response()->json(['success' => $success], $this-> successStatus);
          return response()->json(['success' => 'Log In Successful'], 200);

        	}else{
                //echo "failed"; die;
                //alert()->error('Title','Lorem Lorem Lorem');
               // return response()->json(['error'=>'Unauthorised'], 401); 
           return response()->json(['error'=>'Unauthorised'], 401);
        	}
    	}


    	return view('admin.admin_login');
    }

    public function dashboard(){
        /*if(Session::has('adminSession')){
            // Perform all actions
        }else{
            //return redirect()->action('AdminController@login')->with('flash_message_error', 'Please Login');
            return redirect('/admin')->with('flash_message_error','Please Login');
        }*/
        return view('admin.dashboard');
    }

    public function settings(){

        $adminDetails = Admin::where(['username'=>Session::get('adminSession')])->first();

        //echo "<pre>"; print_r($adminDetails); die;

        return view('admin.settings')->with(compact('adminDetails'));
    }

    public function chkPassword(Request $request){
        $data = $request->all();
        //echo "<pre>"; print_r($data); die;
        $adminCount = Admin::where(['username' => Session::get('adminSession'),'password'=>md5($data['current_pwd'])])->count(); 
            if ($adminCount == 1) {
                //echo '{"valid":true}';die;
                echo "true"; die;
            } else {
                //echo '{"valid":false}';die;
                echo "false"; die;
            }

    }

    public function updatePassword(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            $adminCount = Admin::where(['username' => Session::get('adminSession'),'password'=>md5($data['current_pwd'])])->count();

            if ($adminCount == 1) {
                // here you know data is valid
                $password = md5($data['new_pwd']);
                Admin::where('username',Session::get('adminSession'))->update(['password'=>$password]);
                return redirect('/admin/settings')->with('success', '  ');
                
            }else{
                return redirect('/admin/settings')->with('error', ' ');
            }

            
        }
    }

    public function logout(){
        Session::flush();
        return redirect('/admin')->with('success', '  ');
       
    }

    public function viewAdmins(){

       
       // $admins = Admin::get();
        //$admins = json_decode(json_encode($admins));
       // echo "<pre>"; print_r($admins); die;

         $user = Admin::all();
        return response()->json(['success' => $user], $this-> successStatus); 
        //return view('admin.admins.view_admins')->with(compact('admins'));
    }

    public function addAdmin(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            /*echo "<pre>";print_r($data); die;*/
            $adminCount = Admin::where('username',$data['username'])->count();
            if($adminCount>0){
                return redirect()->back()->with('error','Admin / Sub Admin already exists! Please choose another.');
            }else{
                if(empty($data['status'])){
                    $data['status'] = 0;
                }
                if($data['type']=="Admin"){
                    $admin = new Admin;
                    $admin->type = $data['type'];
                    $admin->username = $data['username'];
                    $admin->password = md5($data['password']);
                    $admin->status = $data['status'];
                    $admin->save();
                    return redirect()->back()->with('success','Admin added successfully!');    
                }else if($data['type']=="Sub Admin"){
                    if(empty($data['categories_view_access'])){
                        $data['categories_view_access'] = 0;
                    }
                    if(empty($data['categories_edit_access'])){
                        $data['categories_edit_access'] = 0;
                    }
                    if(empty($data['categories_full_access'])){
                        $data['categories_full_access'] = 0;
                    }else{
                        if($data['categories_full_access']==1){
                            $data['categories_view_access'] = 1;
                            $data['categories_edit_access'] = 1;    
                        }    
                    }

                    if(empty($data['products_access'])){
                        $data['products_access'] = 0;
                    }
                    if(empty($data['orders_access'])){
                        $data['orders_access'] = 0;
                    }
                    if(empty($data['users_access'])){
                        $data['users_access'] = 0;
                    }
                    $admin = new Admin;
                    $admin->type = $data['type'];
                    $admin->username = $data['username'];
                    $admin->password = md5($data['password']);
                    $admin->status = $data['status'];
                    $admin->categories_view_access = $data['categories_view_access'];
                    $admin->categories_edit_access = $data['categories_edit_access'];
                    $admin->categories_full_access = $data['categories_full_access'];
                    $admin->products_access = $data['products_access'];
                    $admin->orders_access = $data['orders_access'];
                    $admin->users_access = $data['users_access'];
                    $admin->save();
                    return redirect()->back()->with('success','Sub Admin added successfully!');     
                }
                
            }
        }
        return view('admin.admins.add_admin');
    }

    public function editAdmin(Request $request, $id){
        $adminDetails = Admin::where('id',$id)->first();
        /*$adminDetails = json_decode(json_encode($adminDetails)); 
        echo "<pre>"; print_r($adminDetails); die;*/
        if($request->isMethod('post')){
            $data = $request->all();
            /*echo "<pre>"; print_r($data); die;*/
            if(empty($data['status'])){
                $data['status'] = 0;
            }
            if($data['type']=="Admin"){
                Admin::where('username',$data['username'])->update(['password'=>md5($data['password']),'status'=>$data['status']]);
                return redirect()->back()->with('success','Admin updated successfully!');    
            }else if($data['type']=="Sub Admin"){
                if(empty($data['categories_view_access'])){
                    $data['categories_view_access'] = 0;
                }
                if(empty($data['categories_edit_access'])){
                    $data['categories_edit_access'] = 0;
                }
                if(empty($data['categories_full_access'])){
                    $data['categories_full_access'] = 0;
                }else{
                    if($data['categories_full_access']==1){
                        $data['categories_view_access'] = 1;
                        $data['categories_edit_access'] = 1;    
                    }    
                }
                if(empty($data['products_access'])){
                    $data['products_access'] = 0;
                }
                if(empty($data['orders_access'])){
                    $data['orders_access'] = 0;
                }
                if(empty($data['users_access'])){
                    $data['users_access'] = 0;
                }
                Admin::where('username',$data['username'])->update(['password'=>md5($data['password']),'status'=>$data['status'],'categories_view_access'=>$data['categories_view_access'],'categories_edit_access'=>$data['categories_edit_access'],'categories_full_access'=>$data['categories_full_access'],'products_access'=>$data['products_access'],'orders_access'=>$data['orders_access'],'users_access'=>$data['users_access']]);
                return redirect()->back()->with('success','Sub Admin updated successfully!');     
            }

        }
        return view('admin.admins.edit_admin')->with(compact('adminDetails'));
    }
}
