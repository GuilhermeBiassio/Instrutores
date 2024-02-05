<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\BusLine;
use App\Models\Employee;
use App\Models\Instructor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
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
            ->with([
                'message' => $message,
                'dados' => $dados
            ])
        ;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $drivers = Employee::select('ID_FUNCIONARIO', 'NOME_FUNCIONARIO')
            ->orderBy('NOME_FUNCIONARIO', 'asc')
            ->get();
        $cars = Car::select('idcarro')
            ->orderBy('idcarro', 'asc')
            ->get();
        $bus_lines = BusLine::select('ID_LINHA', 'NOME_LINHA')
            ->distinct('ID_LINHA')
            ->orderBy('ID_LINHA', 'asc')
            ->get();
        // dd($bus_line);
        return view("instructors.create")->with([
            'action' => route('instructors.store'),
            'drivers' => $drivers,
            'cars' => $cars,
            'bus_lines' => $bus_lines
        ]);
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
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Instructor::find($id);
        if (Auth::user()->id == $data->usuario || Auth::user()->is_admin == 2) {
            // dd($data->id);
            return view('instructors.edit')
                ->with([
                    'action' => route('instructors.update', $data->id),
                    'dados' => $data
                ]);
        } else {
            return Redirect::back()->with('error.message', 'Você não tem permissão para acessar esses dados!');
        }
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
        $validate = $request->validate(
            [
                'start' => 'required',
                'end' => 'required',
                'employee' => 'integer | nullable',
                'driver' => 'integer | nullable'
            ],
            [
                'start' => 'A data inicial é obrigatória',
                'end' => 'A data final é obrigatória',
                'employee' => 'O campo Funcionário deve ser um número inteiro',
                'driver' => 'O campo Motorista deve ser um número inteiro'
            ]
        );
        if (Auth::user()->is_admin == (1 || 2)) {
            $data = Instructor::whereBetween('data_instrucao', [$request->start, $request->end])
                ->when(
                    request('employee') != NULL,
                    function ($q) {
                        return $q->where('usuario', '=', request('employee'));
                    }
                )
                ->when(
                    request('driver') != NULL,
                    function ($q) {
                        return $q->where('motorista', '=', request('driver'));
                    }
                )
                ->join('users', 'instrutores.usuario', '=', 'users.id')
                ->select('users.name', 'instrutores.*')
                ->orderBy('usuario', 'desc')
                ->paginate();

        } else {
            $data = Instructor::whereBetween('data_instrucao', [$request->start, $request->end])->where('usuario', '=', Auth::user()->id)
                ->join('users', 'instrutores.usuario', '=', 'users.id')
                ->select('users.name', 'instrutores.*')
                ->paginate();
        }

        // dd($data);

        return view('instructors.index')->with([
            'dados' => $data,
            'request' => $request->input()
        ]);
    }

    public function print(Request $request)
    {
        $info = array();
        $dates = Instructor::whereBetween('data_instrucao', [$request->start, $request->end])
            ->when(
                request('employee') != NULL,
                function ($q) {
                    return $q->where('usuario', '=', request('employee'));
                }
            )
            ->when(
                request('driver') != NULL,
                function ($q) {
                    return $q->where('motorista', '=', request('driver'));
                }
            )
            ->select('data_instrucao')
            ->distinct()
            ->orderBy('data_instrucao', 'desc')
            ->get();
        foreach ($dates as $date) {
            $data = Instructor::where('data_instrucao', '=', $date->data_instrucao)
                ->when(
                    request('employee') != NULL,
                    function ($q) {
                        return $q->where('usuario', '=', request('employee'));
                    }
                )
                ->when(
                    request('driver') != NULL,
                    function ($q) {
                        return $q->where('motorista', '=', request('driver'));
                    }
                )
                ->orderBy('usuario', 'desc')
                ->join('users', 'instrutores.usuario', '=', 'users.id')
                ->select('users.name', 'instrutores.*')
                ->get();
            $info[] = [
                'date' => $date->data_instrucao,
                'data' => $data
            ];
        }
        // dd($info);

        return view('instructors.print')->with('dados', $info);
    }
}
