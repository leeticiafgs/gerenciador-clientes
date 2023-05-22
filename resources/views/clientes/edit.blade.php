<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Cliente</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

    
    <div class="container">

        <h1>Editar Cliente: {{$cliente->nome}}</h1>
        <hr>
        <form action="/clientes/{{$cliente->id}}" method="post">
            @csrf  {{-- Prevenção do laravel de ataques a formularios --}}
            @method('PUT')
            <br>
            <div class="form-group">
                <label for="nome">Nome Completo</label>
                <input name="nome" type="nome" class="form-control" id="nome" value="{{$cliente->nome}}" required>
            </div>
            
            <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" id="email" value="{{$cliente->email}}" required> 
            </div>

            <div class="form-group">
                <label for="data_nascimento">Data de Nascimento</label>
                <input type="date" name="data_nascimento" class="form-control" id="data_nascimento" value="{{$cliente->data_nascimento}}" required>
            </div>

            <div class="form-group">
                <label for="telefone">Telefone</label>
                <input type="telefone" name="telefone" class="form-control" id="telefone" value="{{$cliente->telefone}}" required>
            </div>

            <div style="float:right; margin-top: 30px">   
                <button type="submit" class="btn btn-primary">
                    <ion-icon name="create-outline"></ion-icon>Alterar Cadastro
                </button>
            </div>
        </form>
    </div>
</body>

{{-- Scripts Inicio --}}
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
{{-- Scripts Fim --}}
</html>