<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\viajes;
use App\Models\unidades;
class viajesController extends Controller
{
    //

    public function index(){
        $viajes=viajes::all();

        $data=array(
            'code'=>200,
            'status'=>'ok',
            'viajes'=>$viajes
        );

        return response()->json($data,$data['code']);
    }

    public function searchbyfecha(Request $request){
        $json=$request->input('json',null);
        $params=json_decode($json);
        $params_array=json_decode($json,true);

        if(!empty($params_array)){
            $validate=\Validator::make($params_array,[
                'Fecha'=>'required',
                

            ]);

            if($validate->fails()){
                $data=array(
                    'status'=>'error',
                    'code'=>400,
                    'message'=>'Error validando datos enviados',
                    'erros'=>$validate->errors()

                );
            }else{
                $fecha=$params_array['Fecha'];
                $viajes=viajes::where('fecha',$fecha)->get();
              

                $data=array(
                    'status'=>'ok',
                    'code'=>200,
                    'viajes'=>$viajes
                );



            }

        }else{
            $data=array(
                'code'=>'400',
                'status'=>'error',
                'message'=>'Debe enviar datos'
            );
        }
        return response()->json($data,$data['code']);
    }

    public function insert(Request $request){
        $json=$request->input('json',null);
        $params=json_decode($json);
        $params_array=json_decode($json,true);

        if(!empty($params_array)){
            $validate=\Validator::make($params_array,[
                'Fecha'=>'required',
                'Hora'=>'required',
                'nombrecontacto'=>'required',
                'origen'=>'required',
                'telefono'=>'required',
                'sw_cerrado'=>'required'
                

            ]);

            if($validate->fails()){
                $data=array(
                    'status'=>'error',
                    'code'=>400,
                    'message'=>'Error validando datos enviados',
                    'erros'=>$validate->errors()

                );
            }else{
                $fecha=$params_array['Fecha'];
                $viajes=viajes::where('fecha',$fecha)->get();
              

                $data=array(
                    'status'=>'ok',
                    'code'=>200,
                    'viajes'=>$viajes
                );



            }

        }else{
            $data=array(
                'code'=>'400',
                'status'=>'error',
                'message'=>'Debe enviar datos'
            );
        }
        return response()->json($data,$data['code']);
    }


}
