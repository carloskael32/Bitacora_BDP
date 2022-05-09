<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">



    <title>Bitacora BDP</title>

    <style>
        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            max-width: 500px;
            margin: auto;
            text-align: center;
            font-family: arial;
        }

        .title {
            color: grey;
            font-size: 18px;
        }

        button {
            border: none;
            outline: 0;
            display: inline-block;
            padding: 8px;
            color: white;
            background-color: #000080;
            text-align: center;
            cursor: pointer;
            width: 100%;
            font-size: 18px;
          
        
        }

        a{
            text-decoration: none;
            font-size: 22px;
            color: black;
                
        }

        button:hover,
        a:hover {
            opacity: 0.9;
        }
    </style>
</head>

<body>

    <br><br>



    <div class="card">
        <img src="{{asset('/img/logo.png')}}"  width="250" alt="">

        <hr>
        <h2>Buenos Dias Estimad@.</h2>
        <br>
        <p style=" font-size: 18px;">El dia de ayer no realizo el registro de la bitacora del CPD (Centro de Procesamiento de Datos). </p>

        <p class="title">El registro de la bitacora se debe realizar diariamente segun:
            El Manual de Procedimiento de Infraestructura de Tecnologia de la Informacion
            <b>- Codigo: </b> 06-A06-01-024
        </p>
      

        <a href="{{url('/bitacora/create')}}" style="color:black;"><button><u>Registrar Bitacora</u></button></a>



    </div>


</body>

</html>

