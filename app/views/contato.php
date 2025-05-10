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



    <link rel="stylesheet" href="http://localhost/escola/public/assets/css/style.css">


    <title> <?php echo isset($titulo) ? $titulo : 'Home - Silios'; ?> </title>
</head>
<style>
  body{
    background-color: #f0c9a9;
  }
</style>

<body>
    <div class="content">

        <?php require_once('template/topo.php'); ?>


        <main>
            <section id="contato">
                <article>

                    <div class="form">
                        <div class="locations">

                            <div class="icone">
                                <h2>Onde Estamos?</h2>
                            </div>


                            <div class="location">
                                <div class="icone">
                                    <img src="http://localhost/escola/public/img/location-svg.svg" alt="">
                                </div>
                                <div>
                                    <strong>UNIDADE</strong>
                                    <p>Av marechal.5° 00
                                        SP-Penha</p>
                                </div>

                            </div>
                            <hr>


                            <div class="location">


                                <div class="icone">

                                    <img src="http://localhost/escola/public/img/email-svg.svg" alt="">

                                </div>
                                <div>
                                    <strong>E-MAIL</strong>

                                    <p>liliane.fs@live.com</p>
                                </div>



                            </div>
                            <hr>


                            <div class="location">


                                <div class="icone">

                                    <img src="http://localhost/escola/public/img/tel-svg.svg" alt="">

                                </div>
                                <div>
                                    <strong>Telefone</strong>

                                    <p> (11 94918-7330)</p>
                                </div>



                            </div>
                            <hr>
                        </div>

                        <div class="contact-form">

                            <div>
                                <h2>Fale Conosco</h2>
                                <p>Pelo canal de atendimento ao cliente estamos disponíveis para atendê-lo(a) da melhor
                                    forma </p>
                            </div>


                            <form method="POST" action="contato/enviarEmail">
                                <input type="text" placeholder="Nome" name="nome" required>
                                <div class="important">
                                    <input type="email" placeholder="E-mail" name="email" required>
                                    <input type="tel" placeholder="Telefone" name="tel" required>
                                </div>

                                <label for="subject" class="form-label">Assunto</label>
                                <input type="text" name="assunto" id="asunto">


                                <textarea placeholder="Mensagem" name="msg"></textarea>
                                <button type="submit" value="Enviar Mensagem">Enviar</button>
                            </form>
                        </div>
                    </div>

                    <div>


                </article>



            </section>

            

    </div>
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