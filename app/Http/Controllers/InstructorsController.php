<?php

namespace App\Http\Controllers;


use App\Models\Instructors;
use Illuminate\Http\Request;
use App\Http\Requests\InstructorsFormRequest;

class InstructorsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $dados = Instructors::all();
        $message = $request->session()->get('success.message');
        return view("instructors.index")
            ->with('message', $message)
            ->with('dados', $dados)
        ;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("instructors.create")->with('action', route('instructors.store'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(InstructorsFormRequest $request)
    {
        $dados = Instructors::create($request->all());
        return to_route('instructors.index')->with('success.message', "Dados cadastrados com sucesso!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Instructors $instrutores, Request $request)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Instructors $instrutores)
    {
        // dd($instrutores->id);
        return view('instructors.edit')
            ->with('action', route('instructors.update', $instrutores->id))
            ->with('dados', $instrutores);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(InstructorsFormRequest $request, Instrutores $instrutores)
    {
        $instrutores->fill($request->all());
        $instrutores->save($request->all());
        return to_route('instructors.index')->with('success.message', 'Dados atualizados com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Instructors $instrutores)
    {
        //
    }

    public function search()
    {
        return view('instructors.search');
    }

    public function filter(Request $request)
    {
        dd($request);
    }
}
