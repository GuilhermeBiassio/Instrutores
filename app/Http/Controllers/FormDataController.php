<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class FormDataController extends Controller
{
    public function employee(Request $request)
    {
        $data = Employee::where('ID_FUNCIONARIO', '=', $request->employee)
            ->select('funcionario.NOME_FUNCIONARIO')
            ->get();
        // dd($data->isEmpty());
        if (!$data->isEmpty()) {
            $json = json_encode($data);
            return $json;
        } else {
            return json_encode([
                [
                    'NOME_FUNCIONARIO' => 'Nenhum registro!'
                ]
            ]);
        }
    }
}
