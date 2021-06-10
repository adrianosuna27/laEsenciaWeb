<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title></title>
    <style>
        .clearfix:after {
            content: "";
            display: table;
            clear: both;
        }

        a {
            color: #5D6975;
            text-decoration: underline;
        }

        body {
            position: relative;
            margin: 0 auto;
            color: #001028;
            background: #FFFFFF;
            font-family: Arial, sans-serif;
            font-size: 12px;
            font-family: Arial;
        }

        header {
            padding: 10px 0;
            margin-bottom: 30px;
        }

        #logo {
            text-align: center;
            margin-bottom: 10px;
        }

        #logo img {
            width: 90px;
        }

        h1 {
            border-top: 1px solid #5D6975;
            border-bottom: 1px solid #5D6975;
            color: #5D6975;
            font-size: 2.4em;
            line-height: 1.4em;
            font-weight: normal;
            text-align: center;
            margin: 0 0 20px 0;
            background: url({{asset($url.'dimension.png')}});
        }

        #project {
            float: left;
        }

        #project span {
            color: #5D6975;
            text-align: right;
            width: 52px;
            margin-right: 10px;
            display: inline-block;
            font-size: 0.8em;
        }

        #company {
            float: right;
            text-align: right;
        }

        #project div,
        #company div {
            white-space: nowrap;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 20px;
        }

        table tr:nth-child(2n-1) td {
            background: #F5F5F5;
        }

        table th,
        table td {
            text-align: center;
        }

        table th {
            padding: 5px 20px;
            color: #5D6975;
            border-bottom: 1px solid #C1CED9;
            white-space: nowrap;
            font-weight: normal;
        }

        table .service,
        table .desc {
            text-align: center;
        }

        table td {
            padding: 20px;
            text-align: right;
        }

        table td.service,
        table td.desc {
            vertical-align: top;
        }

        table td.unit,
        table td.qty,
        table td.total {
            font-size: 1.2em;
        }

        table td.grand {
            border-top: 1px solid #5D6975;;
        }

        #notices .notice {
            color: #5D6975;
            font-size: 1.2em;
        }

        footer {
            color: #5D6975;
            width: 100%;
            height: 30px;
            position: absolute;
            bottom: 0;
            border-top: 1px solid #C1CED9;
            padding: 8px 0;
            text-align: center;
        }
    </style>
</head>
<body>
<header class="clearfix">
{{--    <div id="logo">--}}
{{--        <img src="logo.png">--}}
{{--    </div>--}}
    <h1>FACTURA</h1>
    <div id="project">
        <div><span>TIENDA</span> La Esencia</div>
        <div><span>CLIENTE</span> {{$user->nombre.' '.$user->apellidos}}</div>
        <div><span>DIRECCIÓN</span> {{$user->direccion.', '.$user->cp}}</div>
        <div><span>TELEFONO</span> {{$user->telefono}}</div>
        <div><span>EMAIL</span> <a>{{$user->email}}</a></div>
    </div>
</header>
<main>
    <table>
        <thead>
        <tr>
            <th class="service">ARTICULO</th>
            <th class="desc">BOTELLA DE VINO</th>
            <th>CANTIDAD</th>
            <th>PRECIO UNIDAD</th>
            <th>PRECIO TOTAL</th>
        </tr>
        </thead>
        <tbody>
        @foreach($lineas as $l)
            @if($l->id_pedido == $pedido->id)
                <tr>
                    <td class="service"><img class="rounded" height="75px" width="75px"
                                             src="{{asset($url.$l->vino->imagen)}}">
                    </td>
                    <td class="desc">{{$l->vino->nombre}}</td>
                    <td class="qty">{{$l->cantidad}}</td>
                    <td class="unit">{{$l->precio_unidad}} €</td>
                    <td class="total">{{$l->precio_total_producto}} €</td>
                </tr>

            @endif
        @endforeach
        <tr>
            <td colspan="4" class="grand total">PRECIO FINAL</td>
            <td class="grand total">{{$pedido->precio_total}} €</td>
        </tr>
        </tbody>
    </table>
    <div id="notices">
        <div>ATENCION:</div>
        <div class="notice">Usted dispone de 30 dias para devollver los productos o descambiarlos.</div>
    </div>
</main>
<footer>
    La factura se creó en una computadora y es válida sin la firma y el sello.
</footer>

<div class="betternet-wrapper"></div>
</body>
</html>