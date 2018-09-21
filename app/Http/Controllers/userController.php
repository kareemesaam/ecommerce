<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
class usercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index',compact('users'));
    }

 

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function change($id)
    {
        $user = User::find($id);
       
        if($user->isAdmin == 1 && Auth::user()->id == $user->id){
            $user->isAdmin=1 ;
        }elseif ($user->isAdmin == 1 && Auth::user()->id !== $user->id) {
            $user->isAdmin=0 ;
        }
        else{
            $user->isAdmin=1;
        }
        $user->save();
        return back();
    }

 

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $user = User::find($id);
        $user->delete();
        return back()->with('success','user deleted successfully');
    }
}
