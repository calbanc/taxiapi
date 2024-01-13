<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\contratos;


class contratosController extends Controller
{
    //

    public function index(){
        $contratos=contratos::all();

        $data=array(
            'code'=>200,
            'status'=>'ok',
            'contratos'=>$contratos,

        );
        return response()->json($data,$data['code']);
    }
    public function searchbyruc(Request $request){
        $json=$request->input('json',null);
        $params=json_decode($json);
        $params_array=json_decode($json,true);

        if(!empty($params_array)){
            $validate=\Validator::make($params_array,[
                'Rut_Empresa'=>'required',
            ]);

            if($validate->fails()){
                $data=array(
                    'status'=>'error',
                    'code'=>400,
                    'message'=>'Error validando datos enviados',
                    'erros'=>$validate->errors()

                );
            }else{
                $rutempresa=$params_array['Rut_Empresa'];
                $contrato=contratos::where('Rut_Empresa',$rutempresa)->get();
                $data=array(
                    'status'=>'ok',
                    'code'=>200,
                    'contratos'=>$contrato
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
