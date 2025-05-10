<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- boxicons  -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <!-- AOS  -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Swiper  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <script src="https://unpkg.com/smooth-scrollbar@8.6.3/dist/smooth-scrollbar.js"></script>
  
   

    <link rel="stylesheet" href="assets/css/style.css">


    <title> <?php echo isset($titulo) ? $titulo : 'Home - Silios'; ?> </title>
</head>

<body>
    <div class="content">

    <?php require_once('template/topo.php'); ?>



        <main>

        

        <section id="login">
                <div class="login-container">

                    <div class="login-inner">

                        <div class="form-login">

                            <div class="form-title">
                                <h2>Login</h2>
                            </div>

                            <form method="POST" action="http://localhost/escola/public/auth/login">

                                <div class="form-input">
                                    <label for="email">E-mail:</label>
                                    <input type="email" name="email" id="email" class="" required>
                                </div>

                                <div class="form-input">
                                    <label for="senha">Senha:</label>
                                    <input type="password" name="senha" id="senha" class="" required>
                                </div>


                                <div class="form-input">
                                    <label for="tipo_usuario">Tipo de Usuário:</label>
                                    <select class="" name="tipo_usuario" id="tipo_usuario" class="" required>
                                        <option selected>Selecione</option>
                                        <option value="aluno">Aluno</option>
                                        <option value="professor">Professor</option>
                                    </select>
                                </div>




                                <button type="submit" class="btn-enviar">Enviar</button>



                            </form>

                        </div>


                        <div class="login-img">
                            <figure>
                                <img src="http://localhost/escola/public/assets/img/login-img.png" alt="">
                            </figure>
                        </div>


                    </div>



                </div>
            </section>







        </main>

        <?php require_once('template/rodape.php'); ?>




        <script src="https://cdn.jsdelivr.net/npm/rellax@1.12.0/rellax.min.js"></script>
   
    
     
        <script src="https://unpkg.com/smooth-scrollbar@8.6.3/dist/smooth-scrollbar.js"></script>

        <!-- bootstrap  -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.1/TweenMax.min.js"></script>

        <!-- aos  -->
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <!-- Jquery  -->
        <script type="text/javascript" src="//code.jquery.com/jquery-3.7.1.min.js"></script>
        <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <!-- ANIMAÇÃO BANNER -->


        <!-- Swiper  -->
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

        <!-- script -->
        <script src="http://localhost/escola/public/assets/js/script.js"></script>
</body>


</html>