<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\unidades;

class unidadesController extends Controller
{
    //


    public function index(){
        $unidades=unidades::all();

        $data=array(
            'code'=>200,
            'status'=>'ok',
            'unidades'=>$unidades,

        );
        return response()->json($data,$data['code']);
    }


    public function getbyid(Request $request){
        $json=$request->input('json',null);
        $params=json_decode($json);
        $params_array=json_decode($json,true);

        if(!empty($params_array)){
            $validate=\Validator::make($params_array,[
                'Id'=>'required',
                

            ]);

            if($validate->fails()){
                $data=array(
                    'status'=>'error',
                    'code'=>400,
                    'message'=>'Error validando datos enviados',
                    'erros'=>$validate->errors()

                );
            }else{
                $id=$params_array['Id'];
                $unidades=unidades::where('Id',$id)->get();
              

                $data=array(
                    'status'=>'ok',
                    'code'=>200,
                    'unidades'=>$unidades
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
    public function getbydni(Request $request){
        $json=$request->input('json',null);
        $params=json_decode($json);
        $params_array=json_decode($json,true);

        if(!empty($params_array)){
            $validate=\Validator::make($params_array,[
                'Dni_conductor'=>'required',
                

            ]);

            if($validate->fails()){
                $data=array(
                    'status'=>'error',
                    'code'=>400,
                    'message'=>'Error validando datos enviados',
                    'erros'=>$validate->errors()

                );
            }else{
                $dni=$params_array['Dni_conductor'];
                $unidades=unidades::where('Dni_Conductor',$dni)->get();


                count($unidades)>0 ?
                $data=array(
                    'status'=>'ok',
                    'code'=>200,
                    'message'=>'Unidad encontrada correctamente',
                    'unidades'=>$unidades
                )
                :
                $data=array(
                    'status'=>'ok',
                    'code'=>200,
                    'message'=>'Unidad no encontrada'
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

    public function getbyplaca(Request $request){
        $json=$request->input('json',null);
        $params=json_decode($json);
        $params_array=json_decode($json,true);

        if(!empty($params_array)){
            $validate=\Validator::make($params_array,[
                'Placa'=>'required',
            ]);

            if($validate->fails()){
                $data=array(
                    'status'=>'error',
                    'code'=>400,
                    'message'=>'Error validando datos enviados',
                    'erros'=>$validate->errors()

                );
            }else{
                $placa=$params_array['Placa'];
                $unidades=unidades::where('Placa_unidad',$placa)->get();


                count($unidades)>0 ?
                $data=array(
                    'status'=>'ok',
                    'code'=>200,
                    'message'=>'Unidad encontrada correctamente',
                    'unidades'=>$unidades
                )
                :
                $data=array(
                    'status'=>'ok',
                    'code'=>200,
                    'message'=>'Unidad no encontrada'
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

    public function save(Request $request){
        $json=$request->input('json',null);
        $params=json_decode($json);
        $params_array=json_decode($json,true);

        if(!empty($params_array)){
            $validate=\Validator::make($params_array,[
                'Cod_Unidad'=>'required',
                'Dni_Conductor'=>'required',
                'Nombre_Conductor'=>'required',
                'ApellidoPaterno_Conductor'=>'required',
                'ApellidoMaterno_Condjuctor'=>'required',
                'Fecha_Nacimiento'=>'required',
                'Licencia_Conducir'=>'required',
                'Fecha_Vigencia'=>'required',
                'Placa_Unidad'=>'required',
                'Color_Unidad'=>'required',
                'Marca_Unidad'=>'required',
                'Modelo'=>'required',
                'NMotor'=>'required',
                'Anio_Unidad'=>'required',
                'Sw_Vigencia'=>'required',

            ]);


            if($validate->fails()){
                $data=array(
                    'status'=>'error',
                    'code'=>400,
                    'message'=>'Error validando datos enviados',
                    'erros'=>$validate->errors()

                );
            }else{
                $Cod_Unidad=$params_array['Cod_Unidad'];
                $Dni_Conductor=$params_array['Dni_Conductor'];
                $Nombre_Conductor=$params_array['Nombre_Conductor'];
                $ApellidoPaterno_Conductor=$params_array['ApellidoPaterno_Conductor'];
                $ApellidoMaterno_Conductor=$params_array['ApellidoMaterno_Conductor'];
                $Fecha_Nacimiento=$params_array['Fecha_Nacimiento'];
                $Licencia_Conducir=$params_array['Licencia_Conducir'];
                $Fecha_Vigencia=$params_array['Fecha_Vigencia'];
                $Placa_Unidad=$params_array['Placa_Unidad'];
                $Color_Unidad=$params_array['Color_Unidad'];
                $Marca_Unidad=$params_array['Marca_Unidad'];
                $Modelo=$params_array['Modelo'];
                $NMotor=$params_array['NMotor'];
                $Anio_Unidad=$params_array['Anio_Unidad'];
                $Sw_Vigencia=$params_array['Sw_Vigencia'];

                $unidad=new unidades();
                $unidad->Cod_Unidad=$Cod_Unidad;
                $unidad->Dni_Conductor=$Dni_Conductor;
                $unidad->Nombre_Conductor=$Nombre_Conductor;
                $unidad->ApellidoPaterno_Conductor=$ApellidoPaterno_Conductor;
                $unidad->ApellidoMaterno_Conductor=$ApellidoMaterno_Conductor;
                $unidad->Fecha_Nacimiento=$Fecha_Nacimiento;
                $unidad->Licencia_Conducir=$Licencia_Conducir;
                $unidad->Fecha_Vigencia=$Fecha_Vigencia;
                $unidad->Placa_Unidad=$Placa_Unidad;
                $unidad->Color_Unidad=$Color_Unidad;
                $unidad->Marca_Unidad=$Marca_Unidad;
                $unidad->Modelo=$Modelo;
                $unidad->NMotor=$NMotor;
                $unidad->Anio_Unidad=$Anio_Unidad;
                $unidad->Sw_Vigencia='1';
                $unidad->save();

                $data=array(
                    'status'=>'ok',
                    'code'=>200,
                    'message'=>'Creado correctamente',
                    'insert'=>$params_array

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

    public function desactivarunidad(Request $request){
        $json=$request->input('json',null);
        $params=json_decode($json);
        $params_array=json_decode($json,true);

        if(!empty($params_array)){
            $validate=\Validator::make($params_array,[
               'Id'=>'required'

            ]);


            if($validate->fails()){
                $data=array(
                    'status'=>'error',
                    'code'=>400,
                    'message'=>'Error validando datos enviados',
                    'erros'=>$validate->errors()

                );
            }else{
                $id=$params_array['Id'];
                
                $unidades=unidades::where('Id',$id)->update([
                    'Sw_Vigencia'=>'0'
                ]);
              
                $data=array(
                    'status'=>'ok',
                    'code'=>200,
                    'message'=>'Desactivada correctamente',
                    'insert'=>$params_array

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
    public function activarunidad(Request $request){
        $json=$request->input('json',null);
        $params=json_decode($json);
        $params_array=json_decode($json,true);

        if(!empty($params_array)){
            $validate=\Validator::make($params_array,[
               'Id'=>'required'

            ]);


            if($validate->fails()){
                $data=array(
                    'status'=>'error',
                    'code'=>400,
                    'message'=>'Error validando datos enviados',
                    'erros'=>$validate->errors()

                );
            }else{
                $id=$params_array['Id'];
                
                $unidades=unidades::where('Id',$id)->update([
                    'Sw_Vigencia'=>'1'
                ]);
              
                $data=array(
                    'status'=>'ok',
                    'code'=>200,
                    'message'=>'Desactivada correctamente',
                    'insert'=>$params_array

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
    public function eliminaunidad(Request $request){
        $json=$request->input('json',null);
        $params=json_decode($json);
        $params_array=json_decode($json,true);

        if(!empty($params_array)){
            $validate=\Validator::make($params_array,[
               'Id'=>'required'

            ]);


            if($validate->fails()){
                $data=array(
                    'status'=>'error',
                    'code'=>400,
                    'message'=>'Error validando datos enviados',
                    'erros'=>$validate->errors()

                );
            }else{
                $id=$params_array['Id'];
                
                $unidades=unidades::where('Id',$id)->delete();
              
                $data=array(
                    'status'=>'ok',
                    'code'=>200,
                    'message'=>'Unidad eliminada correctamente',
                  

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
