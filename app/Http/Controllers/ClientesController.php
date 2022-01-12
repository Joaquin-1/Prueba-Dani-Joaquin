<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = DB::table('clientes')
            ->get();

        //$paginador = $clientes->paginate(50);

        return view('clientes.index', [
            'clientes' => $clientes,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cliente = (object) [
            'nombre' => null,
            'dni'=> null,
            'localidad' => null,
            'fecha_nac' => null,
        ];

        return view('clientes.create', [
            'cliente' => $cliente,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    private function validar()
    {
        $validados = request()->validate([
            'nombre' => 'required|max:30',
            'dni' => 'required|max:9',
            'localidad' => 'required|max:30',
            'fecha_nac' => 'required|date',
        ]);

        return $validados;
    }




    public function store()
    {
        $validados = $this->validar();

        DB::table('clientes')->insert([
            'nombre' => $validados['nombre'],
            'dni' => $validados['dni'],
            'localidad' => $validados['localidad'],
            'fecha_nac' => $validados['fecha_nac'],
        ]);

        return redirect('/clientes')
            ->with('success', 'Cliente insertado con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    private function findCliente($id)
    {
        $clientes = DB::table('clientes')
            ->where('id', $id)
            ->get();

        abort_if($clientes->isEmpty(), 404);

        return $clientes->first();
    }


    public function edit($id)
    {
        $cliente = $this->findCliente($id);

        return view('clientes.edit', [
            'cliente' => $cliente,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validados = $this->validar();
        $this->findCliente($id);

        DB::table('clientes')
            ->where('id', $id)
            ->update([
            'nombre' => $validados['nombre'],
            'dni' => $validados['dni'],
            'localidad' => $validados['localidad'],
            'fecha_nac' => $validados['fecha_nac'],
        ]);

        return redirect('/clientes')
            ->with('success', 'Cliente modificado con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->findCliente($id);

        DB::delete('DELETE FROM clientes WHERE id = ?', [$id]);

        return redirect()->back()
            ->with('success', 'Cliente borrado correctamente');
    }
}
