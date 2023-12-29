<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    //

    public function edit(){
        // $categories = ["Local News","World News","Sports","Foods","travel"];
        // $arr =[];
        // foreach($categories as $category){
        //     $arr[]=[
        //         "title"=> $category,
        //         "slug"=> Str::slug($category),
        //         // "user_id"=> rand(1,11),
        //         'user_id'=>User::where("role","admin")->get()->random()->id,
        //         "updated_at"=>now(),
        //         "created_at"=>now(),
        //     ];

          
           
        // }
        // Category::insert($arr);
        
        return view('profile');
    }

    public function update(Request $request){

        $request->validate([
            "name"=>"required|min:3|max:255",
            "email"=>"required|email|min:3|max:255",
        ]);


        $user= User::find(Auth::id());
        if($request->photo){
        $request -> validate([  
            "photo"=>"required|mimes:jpg,png,jpeg",
        ]);
        $file = $request->file("photo");
        $newFileName=uniqid()."_profile.".$file->getClientOriginalExtension();
        $dir= "/public/img/profile";
        // $file->move("store/",$newFileName);
        $file->storeAs($dir,$newFileName);
        // \Illuminate\Support\Facades\Storage::putFileAs($dir,$file,$newFileName);
        
      
       $user->img =$newFileName;
    }
       $user->name =$request->name;
       $user->email =$request->email;
       $user->update();

        return redirect()->route("profile.edit");

    }

    public function detail($url_name){
        
        $user = User::where('url_name',$url_name)->first();
       
        return view('user_detail',[
            "user" => $user,
            "articles"=> $user->articles()->paginate(7)
        ]);
    }

    public function changeRole(Request $request){

     $user = User::findOrFail($request->id);
     $user->role = "admin";
     $user->update();
     return back();
    }


}
