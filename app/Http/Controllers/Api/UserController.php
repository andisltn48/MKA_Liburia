<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;

class UserController extends Controller
{

    public $successStatus = 200;

    //ini buat login
    public function login(){
        if(Auth::attempt(['username' => request('username'), 'password' => request('password')])){
            $user = Auth::user();
            $success['token'] =  $user->createToken('nApp')->accessToken;
            return response()->json([
                'status' => '200 OK',
                'message' =>'Login success',
                'token' => $success['token'],
                'data' => $user
                /// ini buat get data authenticated usernya
                 //$this->successStatus, 
                 ///$user = Auth::guard('api')->id()
                 ///auth('api')->user()
            ]);
            ///$success['username'] =  $user->username;
            ///return response()->json(['username'=>$user->username], 401);
            ///return response(['username'=>$username]);
        }
        else{
            return response()->json(['error'=>'Unauthorised'], 401);
        }
    }

    ///ini buat register
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fullname' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
            'phone' => 'required',
            'photo' => 'mimes:png,jpg,jpeg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);            
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('nApp')->accessToken;

        return response()->json([
            'status' => '200 OK',
            'message' =>'Register success',
            'token' => $success['token']
            ,'data' => $user
        //$success['username'] =  $user->username;
        ]);
        //return response()->json(['Register success!'=>$success], $this->successStatus);
    }   

    ///ini function buat logout
    public function logout(Request $request)
    {
        $logout = $request->user()->token()->revoke();
        if($logout){
            return response()->json([
                'message' => 'Successfully logged out'
            ]);
        }
    }

    ///ini buat show data (user)
    public function details(Request $request)
    {
        //$user = $request->user()->token();
        $user = $request->user();
        return response()->json(['success' => $user], $this->successStatus);
    }

    public function user_edit(Request $request)
    {
        //validate data
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'email' => 'required|email',
            'phone' => 'required'
        ]);
        $idusernya = auth()->user()->id;
        // $updated_user = Auth::user();
        if($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Bidang Yang Kosong',
                'data'    => $validator->errors()
            ],401);
        }
    
        $user = User::whereId($idusernya)->update($request->all());
        if ($user) {
            return response()->json([
                'success' => true,
                'message' => 'User Berhasil Diupdate!',
                'data' => Auth::user()
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'User Gagal Diupdate!',
            ], 401);
        }
    }

    public function user_delete($id) {
        $user = User::findOrFail($id);
        if($user)
           $user->delete(); 
        else
            return response()->json(error);
        return response()->json([
            'status' => '200 OK',
            'message' =>'delete_user success',
            'data' => $user
        ]);
    }
}
    

    // // public function delete(Request $request, User $user)
    // // {
    // //     //$user = Auth::user();
    // //     // $user = $request->user()->token();
    // //     // $user->delete();
    // //     $user->tokens()->where('id', $user->currentAccessToken()->id)->delete();
    // //     return response(['message' => ' Delete user success!']);
    // // }

    
/* 
    public function uploadTest(Request $request) {
        if(!$request->hasFile('image')) {
            return response()->json(['upload_file_not_found'], 400);
        }
        $file = $request->file('image');
        if(!$file->isValid()) {
            return response()->json(['invalid_file_upload'], 400);
        }
        $path = public_path() . '/uploads/images/store/';
        $file->move($path, $file->getClientOriginalName());
        return response()->json(compact('path'));
     }*/

     