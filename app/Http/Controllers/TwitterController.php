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

    public function ListMine()
    {
       $id    = Auth::id();
       $twits = DB::select("SELECT * FROM twitters WHERE id_user = ? ORDER BY fecha DESC ",[$id]);


      return [  	'Info' => 'Kit Fisto',
                  'List' => $twits ];
    }

    public function DeleteData(Request $request)
    {
      $id      = Auth::id();
      $id_t    = trim($request->input('Id_twit'));
      $results = DB::delete('DELETE FROM twitters WHERE id_twitt = ? AND id_user = ? ', [$id_t,$id]);    //twitters::findOrFail($id_t);
      //$results = DB::table('twitters')->where('id_twitt',$id_t)->delete();
      //$results->delete();

      if (!$results) {
         $successfull = 'error';
      }else{
         $successfull = 'successfull';
      }

      return [
                'Event' => $successfull
      ];

    }

    public function UploadData(Request $request)
    {
      $id      = Auth::id();
      $id_t    = trim($request->input('Id_twit'));
      $data    = trim($request->input('Informacion'));

      $query = DB::update('UPDATE twitters SET Data = ? WHERE id_twitt = ? AND id_user = ? ', [$data,$id_t,$id]);

      if (!$query) {
         $successfull = 'error';
      }else{
         $successfull = 'successfull';
      }

      return [
                'Event' => $successfull
      ];
    }
}
