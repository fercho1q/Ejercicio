<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    {{--scripts--}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    <div class="content">
        <div id="container_pilotos"></div>
    </div>
</div>
</body>
</html>


<script type="text/javascript">
    $(function () {
        load_countries();
    });

    function load_countries() {
        ajaxRequest('{{ action("Controller@getPilotoList") }}', {type: 'get', data: {}},
            function (data) {
                $('#container_pilotos').html("");
                $('#container_pilotos').append(data.html);
            }
        );

    }

    function ajaxRequest(url, params, callback) {
        $.ajax({
            type: params.type,
            url: url,
            dataType: 'json',
            data: params.data,
            error: function (data) {

            },
            success: function (data) {
                callback(data);
            }
        });
    }

    function sumPuntos(id) {
        console.log(id);
        ajaxRequest('/piloto/sumPunto/ ' + id, {type: 'get', data: {}},
            function (data) {
                if (data == true)
                    load_countries();

            }
        );
    }


</script>
