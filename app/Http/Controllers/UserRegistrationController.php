<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;
use Illuminate\Support\Facades\Hash;
use Auth;
use Image;
class UserRegistrationController extends Controller
{
    public function showRegistrationForm(){
        if(Auth::user()->role=='Admin'){
        	return view('admin.users.registration-form');
        }
        return redirect('/home');
    }
    public function userSave(Request $request){
    	$this->validator($request->all())->validate();
        event(new Registered($user = $this->create($request->all())));
        $users = User::all();
        return view('admin.users.user-list',['users'=>$users]);
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'role' => ['required'],
            'name' => ['required', 'string', 'max:255'],
            'mobile' => ['required', 'string', 'max:15'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:5', 'confirmed'],
        ]);
    }
    protected function create(array $data)
    {
        return User::create([
            'role' => $data['role'],
            'name' => $data['name'],
            'mobile' => $data['mobile'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
    public function userList(){
        if(Auth::user()->role='Admin'){
            $users = User::all();
            return view('admin.users.user-list',['users'=>$users]); 
        }   
        return redirect('/home');	
    }
    public function userProfile($userId){
        $user = User::find($userId);
        return view('admin.users.profile',['user'=>$user]);
    }
    public function ChangeUserInfo($id){
        $user = User::find($id);
        return view('admin.users.change-user-info',['user'=>$user]);
    }
    public function userInfoUpdate(Request $request){
        $this->validate($request,[
            'name'=>'required|string|max:255',
            'mobile'=>'required|string|max:255',
            'email'=>'required|string|max:255|email'
        ]);
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->mobile = $request->mobile;
        $user->email = $request->email;
        $user->save();
        return redirect('user-profile/'.$request->id)->with('message','Operation Successful');
    }
    public function ChangeUserAvatar($id){
        $user = User::find($id);
        return view('admin.users.change-user-avatar',['user'=>$user]);
    }
    public function updateUserPhoto(Request $request){

        $avatar = mt_rand().$request->avatar->getClientOriginalName();
        Image::make($request->avatar)->resize(300,300)->save("admin/assets/images/$avatar");

        $user = User::find($request->id);
        $user->avatar = $avatar;
        $user->save();
        return redirect('user-profile/'.$request->id)->with('message','Operation Successful');       
        //$avatar = $request->avatar->store('files');
    }
    public function changeUserPassword($id){
        return view('admin.users.change-user-password',['id'=>$id]);
    }
    public function userPasswordUpdate(Request $request){
        $this->validate($request,[
                            'new_password'=>'required|string|min:5'
                        ]);

        $oldPassword = $request->password;
        $user = User::find($request->id);

        if(Hash::check($oldPassword,$user->password)){
            $user->password = Hash::make($request->new_password);
            $user->save();
            return redirect('user-profile/'.$request->id)->with('message','Operation Successful');       

        }
        else{
            return redirect('user-profile/'.$request->id)->with('error_message','Old password does not match');       
        }
    }
}
