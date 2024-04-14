<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClienteController extends Controller

{
    public function index(){
        $clientes = Cliente::orderBy('id','ASC')->paginate(10);
        return view('cliente.list', compact('clientes'));
       
    }
    public function create(){
       return view('cliente.create');
       
    }

    public function store(Request $request){

        $validator=Validator::make($request->all(),[
            'nombre' => 'required',
            'ruc' => 'required',
            'telefono' => 'required',
            'direccion' => 'required',
            'activo' => 'boolean'

        ]);
        if($validator->passes()){
            $cliente = new Cliente();
            $cliente->nombre = $request->nombre;
            $cliente->ruc = $request->ruc;
            $cliente->telefono = $request->telefono;
            $cliente->direccion = $request->direccion;
            $cliente->activo = $request->activo;
            $cliente->save();

            $request->session()->flash('success', 'Cliente agregado con éxito');

            return redirect()->route('clientes.index');


        }else{
        return redirect()->route('clientes.create')->withErrors($validator)->withInput();
}
    }

    public function edit($id) {

        $cliente = Cliente::findOrFail($id);
       

       

        return view('cliente.edit', ['cliente' => $cliente]);
    }


    public function update($id, Request $request){

        
        $validator=Validator::make($request->all(),[
            'nombre' => 'required',
            'ruc' => 'required',
            'telefono' => 'required',
            'direccion' => 'required',
            'activo' => 'boolean'

        ]);
        if($validator->passes()){
            $cliente = Cliente::find($id);
            $cliente->nombre = $request->nombre;
            $cliente->ruc = $request->ruc;
            $cliente->telefono = $request->telefono;
            $cliente->direccion = $request->direccion;
            $cliente->activo = $request->activo;
            $cliente->save();

            $request->session()->flash('success', 'El registro del cliente fue actualizado con éxito');

            return redirect()->route('clientes.index');


        }else{
        return redirect()->route('clientes.edit', $id)->withErrors($validator)->withInput();
}

    }

    public function destroy($id, Request $request){
        $cliente = Cliente::findOrFail($id);
        $cliente -> delete();

        $request->session()->flash('success', 'El registro del cliente fue eliminado con éxito');
        return redirect()->route('clientes.index');
    }

    
}