<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        .parent {
            display: grid;
            grid-template-columns: repeat(12, 1fr);
            grid-template-rows: 1fr;
            grid-column-gap: 0px;
            grid-row-gap: 0px;
        }

        .div1 {
            grid-area: 1 / 1 / 2 / 2;
        }

        .div2 {
            grid-area: 1 / 2 / 2 / 3;
        }

        .div3 {
            grid-area: 1 / 3 / 2 / 4;
        }

        .div4 {
            grid-area: 1 / 4 / 2 / 5;
        }

        .div5 {
            grid-area: 1 / 5 / 2 / 6;
        }

        .div6 {
            grid-area: 1 / 6 / 2 / 7;
        }

        .div7 {
            grid-area: 1 / 7 / 2 / 8;
        }

        .div8 {
            grid-area: 1 / 8 / 2 / 11;
        }

        .div9 {
            grid-area: 1 / 11 / 2 / 12;
        }

        .div10 {
            grid-area: 1 / 12 / 2 / 12;
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
    <div class="parent bold">
        <div class="center div1">INSTRUTOR</div>
        <div class="center div2">STATUS</div>
        <div class="center div3">MOTORISTA</div>
        <div class="center div4">CARRO</div>
        <div class="center div5">INI. PERCURSO</div>
        <div class="center div6">FIM PERCURSO</div>
        <div class="center div7">LINHA</div>
        <div class="center div8">OBS</div>
        <div class="center div9">DT INSTRUÇÃO</div>
        <div class="center div10">DT CADASTRO</div>
    </div>
    <hr>
    @foreach ($dados as $dado)
        <div class="parent">
            <div class="center div1">{{ $dado->usuario }}</div>
            <div class="center div2">{{ $dado->status }}</div>
            <div class="center div3">{{ $dado->motorista }}</div>
            <div class="center div4">{{ $dado->carro }}</div>
            <div class="center div5">{{ $dado->inicio_percurso }}</div>
            <div class="center div6">{{ $dado->final_percurso }}</div>
            <div class="center div7">{{ $dado->linha }}</div>
            <div class="center div8">{{ $dado->observacoes }}</div>
            <div class="center div9">{{ date('d/m/Y', strtotime($dado->data_instrucao)) }}</div>
            <div class="center div10">{{ date('d/m/Y H:i', strtotime($dado->updated_at)) }}</div>
        </div>
        <hr>
    @endforeach

    <script>
        window.onload = function() {
            window.print();
        }
    </script>
</body>

</html>
