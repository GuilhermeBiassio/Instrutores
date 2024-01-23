<?php

namespace App\Http\Controllers;

use App\Models\Instructor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\InstructorsFormRequest;

class InstructorsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $dados = Instructor::all();
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
        $dados = Instructor::create($request->all());
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
    public function edit($id)
    {
        $data = Instructor::find($id);
        // dd($data->id);
        return view('instructors.edit')
            ->with('action', route('instructors.update', $data->id))
            ->with('dados', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(InstructorsFormRequest $request, $id)
    {
        $data = Instructor::find($id);
        $data->fill($request->all());
        $data->save($request->all());
        return to_route('instructors.index')->with('success.message', 'Dados atualizados com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Instructor $instrutores)
    {
        //
    }

    public function search()
    {
        return view('instructors.search');
    }

    public function filter(Request $request)
    {
        if (Auth::user()->is_admin == 1) {
            $data = Instructor::whereBetween('data_instrucao', [$request->start, $request->end])
                ->where('usuario', '=', $request->employee)
                ->orWhere('motorista', '=', $request->driver);

            dd($data);
        } else {
            $data = Instructor::whereBetween('data_instrucao', [$request->start, $request->end])->where('usuario', '=', Auth::user()->id)->get();
        }

        return view('instructors.index')->with('dados', $data);
    }
}
