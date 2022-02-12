<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    function obtenerLista()
	{
		$cliente =  Cliente::all();


		$response = new \stdClass();
		$response->success=true;
		$response->data=$cliente;

		return response()->json($response,200);
	}

    function obtenerItem($id)
	{
		$cliente =  Cliente::find($id);


		$response = new \stdClass();
		$response->success=true;
		$response->data=$cliente;

		return response()->json($response,200);
	}


	function update(Request $request)
	{
		$cliente =  Cliente::find($request->id);

		if($cliente)
		{
            $cliente->nombre=$request->nombre;
            $cliente->apellidos=$request->apellidos;
            $cliente->documento_identidad=$request->documento_identidad;
            $cliente->numero_identidad=$request->numero_identidad;
            $cliente->pais=$request->pais;
            $cliente->Direccion=$request->Direccion;
            $cliente->Telefono=$request->Telefono;
			$cliente->save();
		}

		$response = new \stdClass();
		$response->success=true;
		$response->data=$cliente;

		return response()->json($response,200);
	}

	function patch(Request $request)
	{
		$cliente =  Cliente::find($request->id);

		if($cliente)
		{

			if(isset($request->id))
			$cliente->id=$request->id;

			if(isset($request->nombre))
			$cliente->nombre=$request->nombre;
            $cliente->apellidos=$request->apellidos;
            $cliente->documento_identidad=$request->documento_identidad;
            $cliente->numero_identidad=$request->numero_identidad;
            $cliente->pais=$request->pais;
            $cliente->Direccion=$request->Direccion;
            $cliente->Telefono=$request->Telefono;
			$cliente->save();
		}

		$response = new \stdClass();
		$response->success=true;
		$response->data=$cliente;

		return response()->json($response,200);
	}


	function store(Request $request)
	{
		$cliente = new Cliente();
		$cliente->nombre=$request->nombre;
        $cliente->apellidos=$request->apellidos;
        $cliente->documento_identidad=$request->documento_identidad;
        $cliente->numero_identidad=$request->numero_identidad;
        $cliente->pais=$request->pais;
        $cliente->Direccion=$request->Direccion;
        $cliente->Telefono=$request->Telefono;
		$cliente->save();

		$response = new \stdClass();
		$response->success=true;
		$response->data=$cliente;

		return response()->json($response,200);
	}

	function delete($id)
	{
		$response = new \stdClass();
		$response->success=true;
		$response_code=200;


		$cliente = Cliente::find($id);

		if($cliente)
		{
			$cliente->delete();
			$response->success=true;
			$response_code=200;
		}
		else
		{
			$response->error=["El cliente fue eliminado de la base de datos"];
			$response->success=false;
			$response_code=500;
		}

		return response()->json($response,$response_code);

	}
}
