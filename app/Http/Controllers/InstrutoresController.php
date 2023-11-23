<?php

namespace App\Http\Controllers;

use App\Models\Instrutores;
use Illuminate\Http\Request;

class InstrutoresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //dd($request);
        $dados = Instrutores::query()->orderBy('created_at', 'desc')->get();
        $message = $request->session()->get('success.message');
        return view("instrutores.index")
            ->with('message', $message)
            ->with('dados', $dados)
        ;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("instrutores.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dados = Instrutores::create($request->all());
        $request->session()->flash('success.message', "Dados cadastrados com sucesso!");
        return to_route('instrutores.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Instrutores $instrutores, Request $request)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Instrutores $instrutores)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Instrutores $instrutores)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Instrutores $instrutores)
    {
        //
    }

    public function search()
    {
        return view('instrutores.search');
    }
}
