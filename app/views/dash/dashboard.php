<!DOCTYPE html>
<html lang="pt">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>escola - Excelência em Serviços Automotivos | Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="escola Excelência em Serviços Automotivos | Dashboard">
    <meta name="author" content="Miguel">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css" integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q=" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.3.0/styles/overlayscrollbars.min.css" integrity="sha256-dSokZseQNT08wYEWiz5iLI8QPlKxG+TswNRD8k35cpg=" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.min.css" integrity="sha256-Qsx5lrStHZyR9REqhUF8iQt73X06c8LGIUPzpOhwRrI=" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />


    <link rel="stylesheet" href="http://localhost/escola/public/vendors/dash/css/adminlte.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet">



    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css" integrity="sha256-4MX+61mt9NVvvuPjUWdUdyfZfxSB1/Rf9WtqRHgG5S0=" crossorigin="anonymous">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/css/jsvectormap.min.css" integrity="sha256-+uGLJmmTKOqBr+2E6KDYs/NRsHxSkONXFHUL0fy2O/4=" crossorigin="anonymous">


    <script src="https://unpkg.com/smooth-scrollbar@8.6.3/dist/smooth-scrollbar.js"></script>

    <link rel="stylesheet" href="http://localhost/escola/public/assets/css/style.css">

</head>

<body class="layout-fixed sidebar-expand-lg bg-dash">






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
                                        $caminhoArquivo = $_SERVER['DOCUMENT_ROOT'] . "/escola/public/uploads/" . $prof['foto_professor'];

                                        if ($prof['foto_professor'] != "") {
                                            if (file_exists($caminhoArquivo)) {
                                                echo ("http://localhost/escola/public/uploads/" . htmlspecialchars($prof['foto_professor'], ENT_QUOTES, 'UTF-8'));
                                            } else {
                                                echo ("http://localhost/escola/public/uploads/sem-foto-servico.png");
                                            }
                                        } else {
                                            echo ("http://localhost/escola/public/uploads/sem-foto-servico.png");
                                        }
                                        ?>" class="user-image rounded-circle shadow" alt="<?php echo $prof['nome_professor']; ?>">
                            <span class="d-none d-md-inline"><?php echo $prof['nome_professor']; ?></span>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                            <li class="user-header" style="  background-color: #ffe1c3ad;"> <img src="<?php
                                                                                                        $caminhoArquivo = $_SERVER['DOCUMENT_ROOT'] . "/escola/public/uploads/" . $prof['foto_professor'];

                                                                                                        if ($prof['foto_professor'] != "") {
                                                                                                            if (file_exists($caminhoArquivo)) {
                                                                                                                echo ("http://localhost/escola/public/uploads/" . htmlspecialchars($prof['foto_professor'], ENT_QUOTES, 'UTF-8'));
                                                                                                            } else {
                                                                                                                echo ("http://localhost/escola/public/uploads/sem-foto-servico.png");
                                                                                                            }
                                                                                                        } else {
                                                                                                            echo ("http://localhost/escola/public/uploads/sem-foto-servico.png");
                                                                                                        }
                                                                                                        ?>" class="user-image rounded-circle shadow" alt="<?php echo $prof['nome_professor']; ?>">
                                <p>
                                    <?php echo $prof['nome_professor'] . " - " . $prof['cargo_professor']; ?>
                                    <small><?php echo $prof['endereco_professor'] . " - " . $prof['telefone_professor']; ?></small>
                                </p>
                            </li>
                            <li class="user-footer" style="  background-color: #ffe1c3ad;">
                                <a href="http://localhost/escola/public/professors/perfil" class="btn btn-primary btn-flat" data-bs-toggle="modal" data-bs-target="#staticBackdrop ">Perfil</a>
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
                <a href="" class="brand-link">
                    <img src="http://localhost/escola/public/assets/img/logo.png" alt="escola Logo" class="brand-image opacity-75 logo-escola">
                </a>
            </div>

            <div class="sidebar-wrapper">
                <nav class="mt-2">
                    <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">

                        <!-- Dashboard Principal -->
                        <li class="nav-item">
                            <a href="http://localhost/escola/public/dashboard/index" class="nav-link">
                                <i class="nav-icon bi bi-speedometer2"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>

                        <!-- Gestão de Cursos -->
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon bi bi-gear"></i>
                                <p>
                                    Gestão de Turmas
                                    <i class="bi bi-chevron-down float-end"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="http://localhost/escola/public/turmas/sala" class="nav-link">
                                        <i class="bi bi-star nav-icon"></i>
                                        <p>Turmas</p>
                                    </a>
                                </li>



                            </ul>
                        </li>

                        <!-- Gestão de Alunos -->
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon bi bi-people"></i>
                                <p>
                                    Gestão de Alunos
                                    <i class="bi bi-chevron-down float-end"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="http://localhost/escola/public/alunos/listar" class="nav-link">
                                        <i class="bi bi-person nav-icon"></i>
                                        <p>Alunos</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="http://localhost/escola/public/alunos/desativados" class="nav-link">
                                        <i class="bi bi-person nav-icon"></i>
                                        <p>Alunos Desativados</p>
                                    </a>
                                </li>

                            </ul>
                        </li>

                        <!-- Gestão de Recursos Humanos -->
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon bi bi-briefcase"></i>
                                <p>
                                    Recursos Humanos
                                    <i class="bi bi-chevron-down float-end"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="http://localhost/escola/public/professors/listar" class="nav-link">
                                        <i class="bi bi-person-badge nav-icon"></i>
                                        <p>Funcionários</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="http://localhost/escola/public/professors/desativados" class="nav-link">
                                        <i class="bi bi-person-badge nav-icon"></i>
                                        <p>Funcionários Desativados</p>
                                    </a>
                                </li>
                            </ul>
                        </li>



                        <!-- Separador para o Site -->
                        <li class="nav-header">SITE</li>

                        <!-- Recursos do Site -->
                        <!-- Gestão de Cursos -->
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon bi bi-gear"></i>
                                <p>
                                    Gestão de Cursos
                                    <i class="bi bi-chevron-down float-end"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="http://localhost/escola/public/servicos/listar" class="nav-link">
                                        <i class="bi bi-star nav-icon"></i>
                                        <p>Cursos</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="http://localhost/escola/public/servicos/adicionar" class="nav-link">
                                        <i class="bi bi-star nav-icon"></i>
                                        <p>Adcionar</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="http://localhost/escola/public/servicos/desativados" class="nav-link">
                                        <i class="bi bi-star nav-icon"></i>
                                        <p>Desativados</p>
                                    </a>
                                </li>

                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="http://localhost/escola/public/contato/listar" class="nav-link">
                                <i class="nav-icon bi bi-envelope"></i>
                                <p>Contato</p>
                            </a>
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
                                <li class="breadcrumb-item"><a href="#">Listar</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Cursos
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="app-content bg-dash">
                <div class="container-fluid">

                   
                        <div class="row">
                            <div class="col-lg-3 col-md-4 col-6 mb-4">
                                <div class="small-box" style="background: #9a5c1fad; color: #ffffff; border-radius: 15px; padding: 20px; box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.2);">
                                    <div class="inner">
                                        <h3 style="font-size: 2rem;"><?php echo $dados['contadorAluno']['total_alunos_ativos']; ?></h3>
                                        <p style="font-weight: bold;">Alunos Matriculados</p>
                                    </div>
                                    <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24" width="40" height="40">
                                        <path d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003"></path>
                                    </svg>
                                    <a href="http://localhost/escola/public/alunos/listar" class="small-box-footer" style="font-weight: bold; color: #ffffff; text-decoration: underline;">Mais informações</a>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-4 col-6 mb-4">
                                <div class="small-box" style="background: #9a5c1fad; color: #ffffff; border-radius: 15px; padding: 20px; box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.2);">
                                    <div class="inner">
                                        <h3 style="font-size: 2rem;"><?php echo $dados['contadorProfessor']['total_professores_ativos']; ?></h3>
                                        <p style="font-weight: bold;">Funcionários</p>
                                    </div>
                                    <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24" width="40" height="40">
                                        <path d="M12 2a6 6 0 100 12 6 6 0 000-12zM2 20c0-4 4-6 10-6s10 2 10 6"></path>
                                    </svg>
                                    <a href="http://localhost/escola/public/professors/listar" class="small-box-footer" style="font-weight: bold; color: #ffffff; text-decoration: underline;">Mais informações</a>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-4 col-6 mb-4">
                                <div class="small-box" style="background: #9a5c1fad; color: #ffffff; border-radius: 15px; padding: 20px; box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.2);">
                                    <div class="inner">
                                        <h3 style="font-size: 2rem;"><?php echo $dados['contadorCurso']['total_cursos_ativos']; ?></h3>
                                        <p style="font-weight: bold;">Cursos Disponíveis</p>
                                    </div>
                                    <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24" width="40" height="40">
                                        <path d="M3 6l9 6 9-6-9-6zM3 18l9 6 9-6M3 12l9 6 9-6"></path>
                                    </svg>
                                    <a href="http://localhost/escola/public/servicos/listar" class="small-box-footer" style="font-weight: bold; color: #ffffff; text-decoration: underline;">Mais informações</a>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-4 col-6 mb-4">
                                <div class="small-box" style="background: #9a5c1fad; color: #ffffff; border-radius: 15px; padding: 20px; box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.2);">
                                    <div class="inner">
                                        <h3 style="font-size: 2rem;">4</h3>
                                        <p style="font-weight: bold;">Turmas</p>
                                    </div>
                                    <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24" width="40" height="40">
                                        <path d="M3 6l9 6 9-6-9-6zM3 18l9 6 9-6M3 12l9 6 9-6"></path>
                                    </svg>
                                    <a href="http://localhost/escola/public/turmas/sala" class="small-box-footer" style="font-weight: bold; color: #ffffff; text-decoration: underline;">Mais informações</a>
                                </div>
                            </div>


                        </div>
                    






                    <div class="row">
                        <div id="loader" style="display: flex; justify-content: center; align-items: center; height: 100vh;">
                            <div class="spinner-border" role="status">
                                <span class="visually-hidden">Carregando...</span>
                            </div>
                        </div>

                        <div id="conteudo" style="display: none;">
                            <?php
                            if (isset($conteudo)) {
                                $this->carregarViews($conteudo, $dados);
                            } else {
                                echo '<h2>Bem-vindo ' . $prof['nome_professor'] . '!</h2>';
                            }
                            ?>
                        </div>

                        <script>
                            document.addEventListener("DOMContentLoaded", function() {
                                setTimeout(function() {
                                    document.getElementById("loader").style.display = "none";
                                    document.getElementById("conteudo").style.display = "block";
                                }, 1000);
                            });
                        </script>

                        <style>
                            #loader {
                                display: flex;
                                justify-content: center;
                                align-items: center;
                                height: 100vh;
                                background: #ffd8b9;
                                /* Fundo do Loader */
                            }

                            #loader .spinner-border {
                                color: #9a5c1f;
                                /* Cor do Spinner */
                                width: 4rem;
                                height: 4rem;
                            }
                        </style>


                    </div>

                </div>
            </div>

        </main>

        <!-- RODAPE -->
        <footer class="app-footer text-white py-4" style="      background-color:rgba(139, 82, 26, 0.68);">


            <div class="container">
                <footer class="py-3 ">
                    <ul class="nav justify-content-center pb-3 mb-3">
                        <li class="nav-item"><a href="http://localhost/escola/public/home" class="nav-link px-2 ">Home</a></li>
                        <li class="nav-item"><a href="http://localhost/escola/public/sobre" class="nav-link px-2 ">Sobre</a></li>
                        <li class="nav-item"><a href="http://localhost/escola/public/servicos" class="nav-link px-2 ">Serviços</a></li>
                        <li class="nav-item"><a href="http://localhost/escola/public/contato" class="nav-link px-2 ">Contato</a></li>
                    </ul>
                    <p class="text-center ">&copy; Laska 2024 Company, Inc</p>
                </footer>
            </div>





        </footer>









        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content shadow-lg border-0 rounded-4">
                    <div class="modal-header" style="background: #ffd8b9; color: #9a5c1f;">
                        <h1 class="modal-title fs-5 fw-bold" id="staticBackdropLabel">Detalhes do Professor</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-4">
                        <div class="row align-items-start">
                            <!-- Foto do Professor -->
                            <div class="col-lg-4 col-md-5 text-center mb-3">
                                <div class="card shadow-lg border-0 rounded-4 p-3" style="background: #fff;">
                                    <div class="image-container mx-auto" style="width: 100%; max-width: 200px; aspect-ratio: 1/1; overflow: hidden; border-radius: 50%;">
                                        <img src="<?php
                                                    $caminhoArquivo = $_SERVER['DOCUMENT_ROOT'] . "/escola/public/uploads/" . $prof['foto_professor'];
                                                    if (!empty($prof['foto_professor']) && file_exists($caminhoArquivo)) {
                                                        echo "http://localhost/escola/public/uploads/" . htmlspecialchars($prof['foto_professor'], ENT_QUOTES, 'UTF-8');
                                                    } else {
                                                        echo "http://localhost/escola/public/uploads/sem-foto-servico.png";
                                                    }
                                                    ?>"
                                            alt="Foto do Professor"
                                            class="img-fluid shadow"
                                            style="width: 100%; height: 100%; object-fit: cover;">
                                    </div>
                                    <input type="file" name="foto_professor" id="foto_professor" style="display: none;" accept="image/*">
                                </div>
                            </div>

                            <!-- Informações do Professor -->
                            <div class="col-lg-8 col-md-7">
                                <div class="card shadow-lg border-0 rounded-4 p-4" style="background: #ffffff;">
                                    <div class="row g-3">
                                        <?php
                                        $campos = [
                                            "Nome do Professor" => $prof['nome_professor'],
                                            "Admissão" => $prof['data_admissao_professor'],
                                            "Email" => $prof['email_professor'],
                                            "Senha" => $prof['senha_professor'],
                                            "CPF/CNPJ" => $prof['cpf_cnpj_professor'],
                                            "Status" => $prof['status'],
                                            "Telefone" => $prof['telefone_professor'],
                                            "Endereço" => $prof['endereco_professor'],
                                            "Bairro" => $prof['bairro_professor'],
                                            "Cidade" => $prof['cidade_professor'],
                                            "Estado" => $prof['sigla_uf']
                                        ];
                                        foreach ($campos as $label => $valor) {
                                            echo '<div class="col-lg-6 col-md-12">
                          <label class="form-label fw-bold" style="color: #9a5c1f;">' . $label . ':</label>
                          <input type="text" class="form-control" value="' . $valor . '" readonly>
                        </div>';
                                        }
                                        ?>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Rodapé do Modal -->
                    <div class="modal-footer" style="background: #ffd8b9;">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
                        <a href="http://localhost/escola/public/professors/editar/<?php echo $prof['id_professor']; ?>"><button type="button" class="btn btn-primary" style="background: #9a5c1f; color:#ffffff; font-weight: bold; border-radius: 12px;">Editar</button></a>
                    </div>
                </div>
            </div>
        </div>










    </div>




    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.3.0/browser/overlayscrollbars.browser.es6.min.js" integrity="sha256-H2VM7BKda+v2Z4+DRy69uknwxjyDRhszjXFhsL4gD3w=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha256-whL0tQWoY1Ku1iskqPFvmZ+CHsvmRWx/PIoEvIeWh4I=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha256-YMa+wAM6QkVyz999odX7lPRxkoYAan8suedu4k2Zur8=" crossorigin="anonymous"></script>


    <script src="http://localhost/kioficina/public/vendors/dash/js/adminlte.js"></script>







</body>


</html>