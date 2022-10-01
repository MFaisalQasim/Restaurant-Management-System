<?php

namespace App\Http\Controllers;

use App\Profile;
use App\Role;
use App\User;
use App\Restaurant;
use Carbon\Carbon;
use Illuminate\Cache\RetrievesMultipleKeys;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use File;

class UsersController extends Controller
{
    public function getIndex($id){
        // return "here";
        if (auth()->user()->hasRole('developer')) {
            $users = User::get();
        }
        else {
            $users = User::where('restaurant_id', '=', $id)->get();
        }
        return view('users.index',compact('users'));
    }

    public function create($restaurant_id){
        $roles = Role::all();
        $restaurant = Restaurant::get();
        return view('users.create',compact('roles','restaurant','restaurant_id'));
    }
    public function save(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'email'                => "required|email|unique:users,email,{$request->id}",
            'password' => 'required|min:6|confirmed',
            'status' => 'required',
            'surname' => 'required',
            // 'date_of_employment' => 'required',
            // 'hourly_salary' => 'required',
            // 'telephone_number' => 'required',
            'restaurant_id' => 'required',
            // 'role' => 'required',

        ],[
            // 'pic_file.required' => 'Profile picture required',
            // 'dob.required' => 'Date of Birth required'
        ]);
        try {
        $user           = User::firstOrCreate([
            'name'=>$request->name,
        'email'=> $request->email,
        'status'  => $request->status ,
        'surname' => $request->surname,
    ]);

        $user->date_of_joining = $request->date_of_employment;
        $user->date_of_leaving = $request->end_of_work_date;
        $user->salary = $request->hourly_salary;
        $user->telephone = $request->telephone_number;
        $user->restaurant_id = $request->restaurant_id;
        $user->password = bcrypt($request->password);


        $user->save();

        if ($file = $request->file('pic_file')) {
            $extension = $file->extension()?: 'png';
            $destinationPath = storage_path('/app/public/uploads/users/');
            $safeName = str_random(10) . '.' . $extension;
            $file->move($destinationPath, $safeName);
            $request['pic'] = $safeName;
        }else{
            $request['pic'] = 'no_avatar.jpg';
        }
        $profile = $user->profile;
        if($user->profile == null){
            $profile = new  Profile();
        }
        if($request->dob != null){
          $date =  Carbon::parse($request->dob)->format('Y-m-d');
        }else{
            $date = $request->dob;
        }
        $profile->user_id = $user->id;
        $profile->bio = $request->bio;
        $profile->gender = $request->gender;
        $profile->dob = $date;
        $profile->place_of_birth = $request->place_of_birth;
        $profile->PESEL = $request->PESEL;
        $profile->id_number = $request->id_number;
        $profile->passport_number = $request->passport_number;
        $profile->country_of_issue = $request->country_of_issue;
        $profile->mother_name = $request->mother_name;
        $profile->father_name = $request->father_name;
        $profile->citizenship = $request->citizenship;
        $profile->bank_account_number = $request->bank_account_number;
        $profile->student = $request->student;
        $profile->name_of_the_university = $request->name_of_the_university;
        $profile->until_when_the_student = $request->until_when_the_student;
        
        $profile->state = $request->state;
        $profile->city = $request->city;
        $profile->address = $request->address;
        $profile->postal = $request->postal;
        $profile->pic = $request['pic'];
        $profile->save();

        $role = Role::find($request->role);
        $user->assignRole($role->name);

        Session::flash('message','User has been added');
        return redirect()->back();
        // return redirect('user/create/'. $restaurant_id);
            } catch (\Throwable $th) {
                return redirect()->back()->with('alert', 'You have enter some wrong or  in complete data!');
            }            return redirect()->back()->with('alert', 'You have enter some wrong or  in complete    data!');
        
    }

    public function edit(Request $request){
        $user = User::findOrfail($request->id);
        $roles = Role::all();
        return view('users.edit',compact('user','roles'));
    }

    public function update(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'role' => 'required',

        ],[
            // 'pic_file.required' => 'Profile picture required',
            // 'dob.required' => 'Date of Birth required'
        ]);

        $user =  User::findOrfail($request->id);

        if($request->password){
            $user->password = bcrypt($request->password);
        }
        $user->email = $request->email;
        $user->name = $request->name;
        $user->restaurant_id = $request->restaurant_id;
        $user->save();

        $profile = $user->profile;
        if($user->profile == null){
            $profile = new  Profile();
        }
        if($request->dob != null){
            $date =  Carbon::parse($request->dob)->format('Y-m-d');
        }else{
            $date = $request->dob;
        }


        if ($file = $request->file('pic_file')) {
            $extension = $file->extension()?: 'png';
            $destinationPath = storage_path('/app/public/uploads/users/');
            $safeName = str_random(10) . '.' . $extension;
            $file->move($destinationPath, $safeName);
            //delete old pic if exists
            if (File::exists($destinationPath . $user->pic)) {
                File::delete($destinationPath . $user->pic);
            }
            //save new file path into db
            $profile->pic = $safeName;
        }


        $profile->user_id = $user->id;
        $profile->bio = $request->bio;
        $profile->gender = $request->gender;
        $profile->dob = $date;
        $profile->country = $request->country;
        $profile->state = $request->state;
        $profile->city = $request->city;
        $profile->address = $request->address;
        $profile->postal = $request->postal;
        $profile->save();



        $role = Role::find($request->role);
        if(!$user->hasRole($role->name)){
            $user->roles()->first()->pivot->delete();
            $user->assignRole($role->name);
        }

        Session::flash('message','User has been updated');
        return redirect()->back();
    }

    public function delete($id){
       $user =  User::findOrfail($id);
       $user->delete();
       Session::flash('message','User has been deleted');
       return back();
    }

    public function getDeletedUsers(){
        $users = User::onlyTrashed()->get();
        return view('users.deleted',compact('users'));
    }

    public function restoreUser(Request $request){
        $user =  User::onlyTrashed()->where('id','=',$request->id);
        $user->restore();
        Session::flash('message','User has been restored');
        return back();
    }

    public function getSettings(){
        $user = auth()->user();
        return view('users.account-settings',compact('user'));
    }

    public function saveSettings(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
        ]);

        $user =  auth()->user();

        if($request->password){
            $user->password = bcrypt($request->password);
        }
        $user->email = $request->email;
        $user->name = $request->name;
        $user->save();

        $profile = $user->profile;
        if($user->profile == null){
            $profile = new  Profile();
        }
        if($request->dob != null){
            $date =  Carbon::parse($request->dob)->format('Y-m-d');
        }else{
            $date = $request->dob;
        }

        if ($file = $request->file('pic_file')) {
            $extension = $file->extension()?: 'png';
            $destinationPath = storage_path('/app/public/uploads/users/');
            $safeName = str_random(10) . '.' . $extension;
            $file->move($destinationPath, $safeName);
            //delete old pic if exists
            if (File::exists($destinationPath . $user->pic)) {
                File::delete($destinationPath . $user->pic);
            }
            $profile->pic = $safeName;
        }

        $profile->user_id = $user->id;
        $profile->bio = $request->bio;
        $profile->gender = $request->gender;
        $profile->dob = $date;
        $profile->country = $request->country;
        $profile->state = $request->state;
        $profile->city = $request->city;
        $profile->address = $request->address;
        $profile->postal = $request->postal;
        $profile->save();
        Session::flash('message','Account has been updated');
        return redirect()->back();
    }
    public function callAction($method, $parameters)
    {
        return parent::callAction($method, array_values($parameters));
    }

}
