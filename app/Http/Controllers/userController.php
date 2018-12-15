<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use App\employee;

class userController extends Controller
{
    //To make a single shareable object among all functions this class
    private static $emp_obj;
    public function __construct()
    {
         
        userController::$emp_obj = new employee();
        
    }

    // Authenticate user access
    public function login(Request $request)
    {
        if ($request->isMethod('post'))
        {
            //private static $emp_obj = new employee();
            if ($request->has(['email', 'pswd']))
            {
                
                $email = $request->input('email');
                $pwd = $request->input('pswd');

                //$emp_obj = new employee();

                // Eloquent ORM syntax
                //for single column return
                // $emp_obj = $emp_obj::where([
                //                              ['email', $email],
                //                             ['pwd', $pwd],  ])->value('uname');

                // for more than one column but not all
                // $unameAndId = $emp_obj::select('uname', 'id as u_id')->where([
                //                                                     ['email', $email],
                //                                                      ['pwd', $pwd],  ])->get();
                
                //return $emp_obj;
                // for all columns..

                $user = userController::$emp_obj::where('email', $email)->first();
                if ($user != NULL)
                {
                    //$h_pwd = $emp_obj->pwd;
                    // $emp_obj->pwd is our hashed value
                    if (Hash::check($pwd, $user->pwd))
                    {
                        //$id = session->regenerate();
                        $id = Hash::make($email);    // to hash variable
                        if (Hash::check($email, $id))    // to check hased value
                        { 
                            session()->put('uid', $user->id);
                        // session()->put('uid2', $id2);
                             return Redirect::to('/home'); //->with('name', $emp_obj);
                            //return view('home')->with('name', $emp_obj);
                        }
                        
                        else {
                            return view('home')->with('name', $pwd);
                        }
                    }

                    
                }
                elseif($user == NULL) 
                {
                    return view('login');
                }
            } 

            // return view('register');

            // $email = $request->email;
            // print_r($email);
            // $pwd = Input::get('pswd');
            // //return $email;
            //return view('/'); //->with('email', $email);
           // return view('login');
        }

        elseif ($request->isMethod('get')) {
            if (session()->has('uid'))
            {
                session()->forget('uid');
            }
            return view('login');
        }
        
    
    }

    public function home(Request $request)
    {
        if (!session()->has('uid'))
        {
            return Redirect::to('/login');
        }
        $uid = $request->session()->get('uid');
        //$emp_obj = new employee();
        $user = userController::$emp_obj->find($uid);
        return view('home')->with('name', $user);
    }


    // user egistration function
    public function register(Request $request)
    {

        
        if ($request->isMethod('post'))
        {
            
            if ($request->has(['uname', 'email', 'pswd', 'desc']))
            {
                //$emp = new employee();

                userController::$emp_obj->uname = $request->input('uname');
                userController::$emp_obj->email = $request->input('email');
                $password = $request->input('pswd');
                userController::$emp_obj->pwd = Hash::make($password);   // storing hashed password is good practise
                userController::$emp_obj->desc = $request->input('desc');

                userController::$emp_obj->save();

                if (userController::$emp_obj != NULL)
                {
                    session()->put('uid', userController::$emp_obj->id);
                    return Redirect::to('/home')->with('name', userController::$emp_obj);
                }

                else {
                    return view('register');
                }

                
                //return view('home')->with('name', $emp->uname);

            }
        }

        elseif ($request->isMethod('get')) {
            return view('register');
        } 
        
    }

    // function to edit user info
    public function editInfo(Request $request, $id)
    {
        if (!session()->has('uid'))
        {
            return Redirect::to('/login');
        }

        if ($request->isMethod('post'))
        {
            
            
            if ($request->has(['uname', 'email', 'desc']))
            {
                //$emp = new employee();

                // requested employee
                // $user = userController::$emp_obj::find($request->session()->get('uid'))
                // ->update([
                //     'uname' =>  $request->input('uname'),
                //     'email' => $request->input('email'),
                //     'desc' => $request->input('desc'),
                // ]);
                // $user->uname = $request->input('uname');
                // $user->email = $request->input('email');
                // //$password = $request->input('pswd');
                // //$emp->pwd = Hash::make($password);   // storing hashed password is good practise
                // $user->desc = $request->input('desc');

                // $user->update($user->id);
                //$user->save();

                //$s=employee::find($id);
                $s = userController::$emp_obj::find($request->session()->get('uid'));
                $s->uname =$request -> Input('uname');
                $s->email =$request -> Input('email');
                $s->desc =$request -> Input('desc');
            
                $s->update();
         // return Redirect()->back();
            
                return view('editinfo')->with('user', $s);

            }
        }

        elseif ($request->isMethod('get')) {
            //$u = new employee();

            $u_info = userController::$emp_obj::find($id);

            return view('editinfo')->with('user', $u_info);
        } 

        
    }
}