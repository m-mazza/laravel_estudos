<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClienteControlador extends Controller
{

    private $clientes = [
        ['id'=> 1, 'nome'=>'Marcus Mazza'],
        ['id'=> 2, 'nome'=>'Denis Dorow'],
        ['id'=> 3, 'nome'=>'Mário Siaci'],
        ['id'=> 4, 'nome'=>'Renata Fernandes'],
        ['id'=> 5, 'nome'=>'Marcelo Siaci']
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = $this->clientes;
        return view('clientes.index', compact(['clientes']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $id = count($this->clientes) + 1;
        $nome = $request->nome;
        $dados = ['id'=> $id, 'nome'=> $nome];
        $this->clientes[] = $dados;
        // return redirect()->route('clientes.index');

        $clientes = $this->clientes;
        return view('clientes.index', compact(['clientes']));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
