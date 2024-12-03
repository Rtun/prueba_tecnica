<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="card">
  <div class="card-body">
    <a href="{{route('login.destroy')}}" class="btn btn-danger">Logout</a>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">Id</th>
            <th scope="col">Nombre</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rol as $r)    
            <tr>
            <th scope="row">{{$r->idrol}}</th>
            <td>{{$r->name}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="col-md-6">
    <a href="{{route('usuarios')}}" class="btn btn-primary">Usuarios</a>
    <a href="{{route('modulos')}}" class="btn btn-success">Modulos</a>
    </div>
  </div>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>