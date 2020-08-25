<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
class ProFilesController extends Controller
{
    public function index()
    {
        return view('editmember');
    }

    public function update(Request $request)
    {
        // dd($request);
        if($request->file('user_img')){
            $path = $request->file('user_img')->store('public');  
            $path = str_replace('public/', '/storage/', $path);
            
        }
        $user = User::where('id',Auth::user()->id)
                    ->get()
                    ->first();
        
        $user->fill($request->all());
        
        if(isset($path)){
            $user->user_img = $path;
        }
        $user->save();
        return redirect('/editmember');
    }
}
