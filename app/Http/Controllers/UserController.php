<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Faker\Generator;

use App\User;

class UserController extends Controller
{
     public function InfoPartner(Request $request)
     {
       $id    = Auth::id();
       // $users = DB::table('users')
       //            ->where('id','=',$id);

       $users = DB::select("SELECT * FROM users WHERE id = ? ",[$id]);
       return [
              'pagination' => 'confirmacion',
              'Data' => $users

              ];

                  //'Info' => 'Kit Fisto',
    //  return [  	'Data' => $users ];

     }
}
