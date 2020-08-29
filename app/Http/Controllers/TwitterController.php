<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Faker\Generator;

use App\twitters;

class TwitterController extends Controller
{
    public function List(Request $request)
    {
      //$tasks = twitters::orderBy('Fecha', 'DESC')->paginate();
      $users = DB::table('twitters')
                ->join("users", "twitters.id_user", "=", "users.id")
                ->orderBy('Fecha', 'DESC')
                ->addSelect([
                     'twitters.Data',
                     'twitters.Fecha',
    		        		 'users.name AS Username'
    		        ])
                ->get();

      return [  	'Info' => 'Kit Fisto',
                  'List' => $users ];
    }

    public function CreateTwits(Request $request)
    {
      $Data   = trim($request->input('Data'));
      $Data2  = trim($request->get('Data'));
      $id     = Auth::id();

      if ($id) {

        $query = DB::insert('insert into twitters (Data, id_user) values (?, ?)', [$Data2, $id]);

        if (!$query) {
           $successfull = 'error';
        }else{
           $successfull = 'successfull';
        }

        return [  'Informacion' => [	'Info' => 'Kit Fisto',
                    'Event' => $successfull,
                    'Data2' => $Data2] ];
      }else {

        $successfull = 'No tiene Loguin';
        return [  'Informacion' => [	'Info' => 'Kit Fisto',
                    'Event' => $successfull,
                    'Data2' => $Data2 ] ];
      }


    }
}
