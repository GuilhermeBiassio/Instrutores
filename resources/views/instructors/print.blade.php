<!DOCTYPE html>
<html lang="en">

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
    </style>
    <title>Report</title>
</head>

<body class="font">
    @foreach ($dados as $dado)
        <div class="parent">
            <div class="div1">
                <ul>
                    <li><b>INSTRUTOR:{{ $dado->usuario }}</b></li>
                    <li><b>STATUS:</b>{{ $dado->status }}</li>
                    <li><b>DT INSTRUÇÂO:</b>{{ date('d/m/Y', strtotime($dado->data_instrucao)) }}</li>
                    <li><b>CADASTRO:</b>{{ date('d/m/Y H:i', strtotime($dado->updated_at)) }}</li>
                </ul>
            </div>
            <div class="div2">
                <ul>
                    <li><b>MOTORISTA:</b>{{ $dado->motorista }}</li>
                    <li><b>CARRO:</b>{{ $dado->carro }}</li>
                    <li><b>INI. PERCURSO:</b>{{ $dado->inicio_percurso }}</li>
                    <li><b>FIM PERCURSO:</b>{{ $dado->final_percurso }}</li>
                </ul>
            </div>
            <div class="div3">
                <ul>
                    <li><b>LINHA:</b>{{ $dado->linha }}</li>
                    <li><b>OBS:</b>{{ $dado->observacoes }}</li>
                </ul>
            </div>
        </div>
        <hr>
    @endforeach



    <script>
        window.onload = function() {
            // window.print();
        }
    </script>
</body>

</html>
