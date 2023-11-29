<?php

namespace App\Http\Controllers;

use App\Http\Requests\InstructorsFormRequest;
use App\Models\Instrutores;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        return view("instrutores.create")->with('action', route('instrutores.store'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(InstructorsFormRequest $request)
    {
        $dados = Instrutores::create($request->all());
        return to_route('instrutores.index')->with('success.message', "Dados cadastrados com sucesso!");
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
        // dd($instrutores->id);
        return view('instrutores.edit')
            ->with('action', route('instrutores.update', $instrutores->id))
            ->with('dados', $instrutores);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(InstructorsFormRequest $request, Instrutores $instrutores)
    {
        $instrutores->fill($request->all());
        $instrutores->save($request->all());
        return to_route('instrutores.index')->with('success.message', 'Dados atualizados com sucesso!');
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
