<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">


</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-sm-8 mx-auto">
            
            <h2>Reto Listado de Usuarios CRUD</h2>

                <!-- border-0: no quiero con bordes, shadow=quiero hacer una sombra-->
                <div class="card border-0 shadow">
                    <div class="card-body">

                        <!-- voy a indicarle que al dar click en enviar muestre alguna información-->
                        <!-- $errors es una variable global-->
                        @if($errors->any())
                        <div class="alert alert-danger">
                            <!-- as $error: quiere decir que pasamos todo a una variable-->
                            @foreach($errors->all() as $error)
                            <!-- coloco un -: por temas de diseño y luego el $error imprimo el error -->
                            - {{ $error }} <br>
                            @endforeach
                        </div>
                        @endif

                        <form action="{{ route('users.store') }}" method="Post">
                            <div class="form-row">
                                <!-- para colocar 3 columnas utilizo col-sm-3-->
                                <div class="col-sm-3">
                                    <!-- el name="name": hace referencia al campo de nuestra tabla-->
                                    <input type="text" name="name" class="form-control" placeholder="Nombre" value="{{ old('name') }}">
                                </div>
                                <div class="col-sm-4">
                                    <!-- el name="name": hace referencia al campo de nuestra tabla-->
                                    <input type="text" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
                                </div>
                                <div class="col-sm-3">
                                    <!-- el name="name": hace referencia al campo de nuestra tabla-->
                                    <input type="password" name="password" class="form-control" placeholder="Password">
                                </div>
                                <div class="col-auto">
                                    @csrf
                                    <!-- input o button es lo mismo podemos utilizar el button o el imput-->
                                    <button type="submit" class="btn btn-primary">Enviar</button>

                                </div>

                            </div>


                        </form>

                    </div>


                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <!-- para colocar un espacio en blanco es: &nbsp;-->
                            <th>&nbsp;</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->nombre }}</td>
                            <td>{{ $user->email }}</td>
                            <td>

                                <form action="{{ route('users.destroy', $user) }}" method="POST">
                                    @method('DELETE')
                                    @csrf

                                    <input type="submit" value="Eliminar" class="btn btn-sm btn-danger"
                                        onclick="return confirm('¿Desea Eliminar...?')">

                                </form>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>


                </table>
            </div>


        </div>

    </div>

</body>

</html>