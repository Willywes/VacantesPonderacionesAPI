<?php
/**
 * Created by PhpStorm.
 * User: willywes
 * Date: 28-11-18
 * Time: 22:22
 */

namespace App\Http\Controllers;

use App\Parking;
use App\User;
use Illuminate\Http\Request;

class AparcateController extends Controller
{

    private function response_error($message = null)
    {
        return response()->json([
            'status' => 'error',
            'message' => $message ? $message : 'error inesperado.',
            'entity' => null
        ]);
    }

    private function response_success($message = null, $entity = null)
    {
        return response()->json([
            'status' => 'success',
            'message' => $message ? $message : 'acción correcta.',
            'entity' => $entity
        ]);
    }

    public function login(Request $request)
    {

        try {
            $user = User::where('email', $request->email)->where('password', $request->password)->first();

            if ($user) {
                return $this->response_success('usuario autenticado correctamente', $user);
            }

            return $this->response_error('usuario o contraseña incorrecta');
        } catch (\Exception $ex) {
            return $this->response_error($ex->getMessage());
        }

    }

    public function parkings(Request $request){

        $city = strtolower($request->city);
        $period = strtolower($request->period);
        $date = $request->date;
        $price = $request->price;

        try {

            $parkings = Parking::with('user');

            if($city){
                $parkings = $parkings->where('city', $city);
            }

            if($period){
                $parkings = $parkings->where('period', $period);
            }

            if($price){

                $parkings = $parkings->orderBy('price', 'asc');

            }else if($date){

                $parkings = $parkings->orderBy('created_at', 'desc');

            }else {

                $parkings = $parkings->orderBy('id', 'asc');

            }



            $parkings = $parkings->get();

            return $this->response_success('listado de parkings', $parkings);
        } catch (\Exception $ex) {
            return $this->response_error($ex->getMessage());
        }
    }

}