<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gestão Cliente - Novo Cliente</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Custom fonts for this template-->
    <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body>
    <div id="wrapper">

        {{-- Sidebar Inicio --}}
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-users"></i>
                </div>
                <div class="sidebar-brand-text mx-3"
                style="font-family: 'Nunito'">Gestão Clientes
            </div>
            </a>
    
            <!-- Divider -->
            <hr class="sidebar-divider my-0">
    
            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="/dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Início</span></a>
            </li>
    
            <!-- Divider -->
            <hr class="sidebar-divider">
    
            <!-- Heading -->
            <div class="sidebar-heading">
                Inclusão
            </div>
    
            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="/clientes/criar">
                    <i class="fas fa-fw fa-user-plus"></i>
                    <span>Cliente</span></a>
            </li>
    
            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="/compras/criar">
                    <i class="fas fa-dollar-sign fa-sm"></i>
                    <span>Compra</span></a>
            </li>
    
            <!-- Divider -->
            <hr class="sidebar-divider">
    
            <!-- Heading -->
                <div class="sidebar-heading">
                Gestão
            </div>
    
            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="/clientes">
                    <i class="fas fa-pen fa-sm"></i>
                    <span>Gerenciar Clientes</span></a>
            </li>
    
            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="/compras">
                    <i class="fas fa-layer-group fa-sm"></i>
                    <span>Gerenciar Compras</span></a>
            </li>
    
    
    
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
    
        </ul>
        {{-- Sidebar Fim --}}

        <div class="container">
            <br>

            <h1>Nova Compra</h1>
            <hr>
            <form action="/compras" method="POST">
                @csrf {{-- Prevenção do laravel de ataques a formularios --}}

                <div class="form-group">
                    <label for="data_compra"><b> Cliente</b></label>
                    <select name="cliente_id" id="cliente_id" class="form-control">
                        <option value="">Selecione um cliente</option>
                        @foreach($clientes as $cliente)
                            <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="data_compra"><b> Data da Compra</b></label>
                    <input type="date" name="data_compra" class="form-control" id="data_compra"
                        placeholder="00/00/0000"required>
                </div>

                <div class="form-group">
                    <label for="descricao"><b> Descrição</b></label>
                    <textarea type="text" name="descricao" class="form-control" id="descricao"
                        placeholder="Descrição da Compra" required></textarea>
                </div>


                <div class="form-group">
                    <label for="valor"><b> Valor da Compra</b></label>
                    <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text">R$</div>
                      </div>
                      <input type="number" name="valor" class="form-control" id="valor" step="0.01" min="0.01" required>
                    </div>
                  </div>
                  

                <div style="float:right; margin-top: 30px">
                    <a href="/clientes" class="btn btn-primary">
                        <ion-icon name="arrow-back-outline"></ion-icon> Voltar
                    </a>
                    <button type="submit" class="btn btn-success">
                        <ion-icon name="add-circle-outline"></ion-icon>Cadastrar
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/js/sb-admin-2.min.js"></script>

    {{-- Validador Telefone --}}

    <script src="/js/functions.js"></script>
    

</body>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>

</html>
