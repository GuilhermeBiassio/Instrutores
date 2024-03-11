<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        .parent {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-template-rows: 1fr;
            grid-column-gap: 0px;
            grid-row-gap: 0px;
        }

        .div1 {
            grid-area: 1 / 1 / 5 / 2;
        }

        .div2 {
            grid-area: 1 / 2 / 2 / 3;
        }

        .div3 {
            grid-area: 1 / 3 / 2 / 4;
        }

        .center {
            text-align: center;
        }

        .font {
            font-family: 'Courier New', Courier, monospace;
            font-size: 11px;
        }

        .bold {
            font-weight: bold;
        }

        ul {
            list-style: none;
        }

        .flex {
            display: flex;
        }

        .justify-center {
            justify-content: center;
        }

        .border-bottom {
            border-bottom: 1px solid #000;
        }

        .border-top {
            border-top: 2px double #000;
            margin-top: 2px;
        }

        @media print {
            #print {
                display: none;
            }

            .break {
                page-break-before: always;
            }
        }
    </style>
    <title>Report</title>
</head>

<body class="font">
    <button class="btn btn-primary" onclick="print()" id="print">Imprimir</button>
    @foreach ($dados as $dado)
        <div class="flex justify-center border-bottom border-top">
            <h3><b>DATA INSTRUÇÃO:</b> {{ date('d/m/Y', strtotime($dado['date'])) }}</h4>
        </div>
        @foreach ($dado['data'] as $value)
            <div class="parent border-bottom">
                <div class="div1">
                    <ul>
                        <li><b>INSTRUTOR:{{ $value->usuario . ' - ' . $value->name }}</b></li>
                        <li><b>STATUS:</b>{{ $value->status }}</li>
                        <li><b>CADASTRO:</b>{{ date('d/m/Y H:i', strtotime($value->updated_at)) }}</li>
                        <li><b>MOTORISTA:</b>{{ $value->motorista }}</li>
                    </ul>
                </div>
                <div class="div2">
                    <ul>
                        <li><b>CARRO:</b>{{ $value->carro }}</li>
                        <li><b>INI. PERCURSO:</b>{{ $value->inicio_percurso }}</li>
                        <li><b>FIM PERCURSO:</b>{{ $value->final_percurso }}</li>
                        <li><b>LINHA:</b>{{ $value->linha }}</li>
                    </ul>
                </div>
                <div class="div3">
                    <ul>
                        <li><b>OBSERVAÇÕES:</b></br>{{ $value->observacoes }}</li>
                    </ul>
                </div>
            </div>
        @endforeach
    @endforeach
</body>

</html>
