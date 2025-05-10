
<html lang="pt-br">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Escola -  | Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="escola Excelência em Serviços  | Dashboard">
    <meta name="author" content="Miguel">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css" integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q=" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.3.0/styles/overlayscrollbars.min.css" integrity="sha256-dSokZseQNT08wYEWiz5iLI8QPlKxG+TswNRD8k35cpg=" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.min.css" integrity="sha256-Qsx5lrStHZyR9REqhUF8iQt73X06c8LGIUPzpOhwRrI=" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />


    <link rel="stylesheet" href="http://localhost/escola/public/vendors/dash/css/adminlte.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css" integrity="sha256-4MX+61mt9NVvvuPjUWdUdyfZfxSB1/Rf9WtqRHgG5S0=" crossorigin="anonymous">

    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/css/jsvectormap.min.css" integrity="sha256-+uGLJmmTKOqBr+2E6KDYs/NRsHxSkONXFHUL0fy2O/4=" crossorigin="anonymous">
    

    <script src="https://unpkg.com/smooth-scrollbar@8.6.3/dist/smooth-scrollbar.js"></script>

    <link rel="stylesheet" href="http://localhost/escola/public/assets/css/style.css">
   
</head>

<body class="layout-fixed sidebar-expand-lg bg-dash" >

<div class="content">




    <div class="app-wrapper">

        <!-- Cabecalho  -->
        <nav class="app-header navbar navbar-expand ">

            <div class="container-fluid">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-lte-toggle="sidebar" href="http://localhost/escola/public/home" role="button">
                            <i class="bi bi-list"></i>
                        </a>
                    </li>
                    <li class="nav-item d-none d-md-block"> <a href="http://localhost/escola/public/home" class="nav-link">Laska</a> </li>
                </ul>

                <ul class="navbar-nav ms-auto">



                    <li class="nav-item">
                        <a class="nav-link" href="#" data-lte-toggle="fullscreen">
                            <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i>
                            <i data-lte-icon="minimize" class="bi bi-fullscreen-exit" style="display: none;"></i>
                        </a>
                    </li>
                    <li class="nav-item dropdown user-menu">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img src="<?php
                                        $caminhoArquivo = $_SERVER['DOCUMENT_ROOT'] . "/escola/public/uploads/" . $aluno['foto_aluno'];

                                        if ($aluno['foto_aluno'] != "") {
                                            if (file_exists($caminhoArquivo)) {
                                                echo ("http://localhost/escola/public/uploads/" . htmlspecialchars($aluno['foto_aluno'], ENT_QUOTES, 'UTF-8'));
                                            } else {
                                                echo ("http://localhost/escola/public/uploads/sem-foto-servico.png");
                                            }
                                        } else {
                                            echo ("http://localhost/escola/public/uploads/sem-foto-servico.png");
                                        }
                                        ?>" class="user-image rounded-circle shadow" alt="<?php echo $aluno['nome_aluno']; ?>">
                            <span class="d-none d-md-inline"><?php echo $aluno['nome_aluno']; ?></span>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                            <li class="user-header" style="  background-color: #ffe1c3ad;"> <img src="<?php
                                                                                $caminhoArquivo = $_SERVER['DOCUMENT_ROOT'] . "/escola/public/uploads/" . $aluno['foto_aluno'];

                                                                                if ($aluno['foto_aluno'] != "") {
                                                                                    if (file_exists($caminhoArquivo)) {
                                                                                        echo ("http://localhost/escola/public/uploads/" . htmlspecialchars($aluno['foto_aluno'], ENT_QUOTES, 'UTF-8'));
                                                                                    } else {
                                                                                        echo ("http://localhost/escola/public/uploads/sem-foto-servico.png");
                                                                                    }
                                                                                } else {
                                                                                    echo ("http://localhost/escola/public/uploads/sem-foto-servico.png");
                                                                                }
                                                                                ?>" class="user-image rounded-circle shadow" alt="<?php echo $aluno['nome_aluno']; ?>">
                                <p>
                                    <?php echo $aluno['nome_aluno'] . " - " . $aluno['email_aluno']; ?>
                                    <small><?php echo $aluno['endereco_aluno'] . " - " . $aluno['telefone_aluno']; ?></small>
                                </p>
                            </li>
                            <li class="user-footer" style="  background-color: #ffe1c3ad;" >
                                <a href="http://localhost/escola/public/alunos/perfil" class="btn btn-primary btn-flat">Perfil</a>
                                <a href="http://localhost/escola/public/auth/sair" class=" btn btn-danger  btn-flat float-end">Sair</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>

        </nav>

        <!-- MENU LATERAL -->
        <aside class="app-sidebar shadow">

            <div class="sidebar-brand">
                <a href="http://localhost/escola/public/home" class="brand-link">
                    <img src="http://localhost/escola/public/assets/img/logo.png" alt="escola Logo" class="brand-image opacity-75 logo-escola">
                </a>
            </div>

            <div class="sidebar-wrapper">
                <nav class="mt-2">
                    <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">

                      

                        <!-- Gestão de Cursos -->
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon bi bi-gear"></i>
                                <p> Gestão de Matricula
                                    <i class="bi bi-chevron-down float-end"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="http://localhost/escola/public/matriculas/listar" class="nav-link">
                                    <i class="bi bi-star nav-icon"></i>
                                        <p>Matricula</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="http://localhost/escola/public/notas/listar" class="nav-link">
                                        <i class="bi bi-tools nav-icon"></i>
                                        <p>Notas e Avaliações</p>
                                    </a>
                                </li>
                              
                          

                            </ul>
                        </li>

                        <!-- Gestão de Alunos -->
                        <li class="nav-item has-treeview">
                            <a href="http://localhost/escola/public/alunos/perfil" class="nav-link">
                                <i class="nav-icon bi bi-people"></i>
                                <p>
                                   Meu perfil
                                  
                                </p>
                            </a>
                        <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="http://localhost/escola/public/alunos/perfil" class="nav-link">
                                        <i class="bi bi-person nav-icon"></i>
                                        <p>Editar</p>
                                    </a>
                                </li>
                                
                            
                            </ul>
                        </li>

                                                    
                      

                    
                      
                    

                    </ul> <!--end::Sidebar Menu-->
                </nav>
            </div>



        </aside>

        <main class="app-main">
            <div class="app-content-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0">Dashboard</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="#" style="color: #af6e40;">Area do Aluno</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                  Dashboard
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="app-content bg-dash">
                <div class="container-fluid">

                  
                    <div class="row">
                        <!-- Conteúdo -->
                        <?php



                        if (isset($conteudo)) {
                            $this->carregarViews($conteudo, $dados);
                        } else {
                            echo '<h2>Bem-vindo  ' . $aluno['nome_aluno'] . '!</h2>';
                        }


                        ?>
                    </div>

                </div>
            </div>


            
        </main>



    </div>
        <!-- RODAPE -->
        <div class="footer">
            <div class="container">
                <footer class="py-3 ">
                    <ul class="nav justify-content-center pb-3 mb-3">
                    <li class="nav-item"><a href="http://localhost/escola/public/home" class="nav-link px-2 ">Home</a></li>
                        <li class="nav-item"><a href="http://localhost/escola/public/sobre" class="nav-link px-2 ">Sobre</a></li>
                        <li class="nav-item"><a href="http://localhost/escola/public/servicos" class="nav-link px-2 ">Serviços</a></li>
                        <li class="nav-item"><a href="http://localhost/escola/public/contato" class="nav-link px-2 ">Contato</a></li>
                    </ul>
                    <p class="text-center ">&copy; 2024 Company, Inc</p>
                </footer>
            </div>



        </div>



    

<script src="http://localhost/escola/public/assets/js/script.js"></script>
    
    <script src="https://unpkg.com/smooth-scrollbar@8.6.3/dist/smooth-scrollbar.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.3.0/browser/overlayscrollbars.browser.es6.min.js" integrity="sha256-H2VM7BKda+v2Z4+DRy69uknwxjyDRhszjXFhsL4gD3w=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha256-whL0tQWoY1Ku1iskqPFvmZ+CHsvmRWx/PIoEvIeWh4I=" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>

    <script src="http://localhost/escola/public/vendors/dash/js/adminlte.js"></script>



    </div>






</body>


</html>