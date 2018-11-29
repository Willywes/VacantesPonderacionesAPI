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
            'message' => $message ? $message : 'error inesperado.'
        ]);
    }

    private function response_success($message = null, $object = null)
    {
        return response()->json([
            'status' => 'success',
            'message' => $message ? $message : 'acción correcta.',
            'object' => $object
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

    public function parkings(){
        try {
            $parkings = Parking::with('user')->orderBy('created_at', 'asc')->get();
            return $this->response_success('listado de parkings', $parkings);
        } catch (\Exception $ex) {
            return $this->response_error($ex->getMessage());
        }
    }

}