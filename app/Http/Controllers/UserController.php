<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class UserController extends Controller
{
    public function index(Request $request) {
//        dd($request->all());
        $users = User::when($request->get('search'),function ($query,$search){
            $query->where("name","like","%{$search}%");
        })->when($request->get('order'),function ($query,$order){
            $query->orderBy('id',$order);
        })->latest("id")->paginate(10)->withQueryString();


        return Inertia::render('Users',[
            'users' => $users->appends($request->all()),
            'photo_path' => asset("storage/photo/"),
            'search' => $request->get('search','')
        ]);
    }

    public function create() {
        return Inertia::render('Create');
    }

    public function store(Request $request) {

//        return $request->photo;

        $request->validate([
            'name' => 'required|min:3|max:50',
            'email' => 'required|email|',
            'password' => 'required|min:4',
            'photo' => 'required|mimes:jpg,png,jpeg'
        ]);

        $file = $request->file("photo");
        $newFileName = uniqid()."_profile.".$file->getClientOriginalExtension();

        //save in local
        $dir = "public/photo";
        $request->file("photo")->storeAs($dir,$newFileName);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->profile_photo_path = $newFileName;
        $user->save();

        return redirect()->route('user.index')->with('success',"User has been created successfully.");
    }

    public function edit(User $user)
    {
        return Inertia::render('Edit',compact("user"));
    }

    public function update(Request $request, User $user) {
        $user->name = $request->name;
        $user->email = $request->email;
        $user->update();

        return redirect()->route('user.index')->with('success',"User has been updated successfully.");
    }

    public function destroy(User $user) {
        $userName = $user->name;
        $photo = $user->profile_photo_path;

        //delete photo from local
        $dir = "public/photo/";
        Storage::delete($dir.$photo);

        $user->delete();
        return redirect()->route('user.index')->with("success","$userName has been deleted successfully.");
    }
}
