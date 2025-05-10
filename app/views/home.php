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

            <section id="home">

                <div class="home-container">

                    <div class="home-inner container">

                        <div class="carrousel-home">
                            <div class="swiper mySwiper2">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <img src="http://localhost/escola/public/assets/img/home1.png" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="http://localhost/escola/public/assets/img/home3.png" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="http://localhost/escola/public/assets/img/home5.png" />
                                    </div>

                                </div>

                            </div>

                        </div>

                        <article>

                            <h4>Laska Studio</h4>

                            <h2>
                                Onde seu talento floresce e sua jornada começa.
                            </h2>
                            <p>Descubra um aprendizado que valoriza suas habilidades e abre portas para o futuro, transformando sonhos em realidade com dedicação e carinho.</p>


                            <ul>
                                <li>
                                    <h3><span id="counter1">10</span>+</h3>
                                    <p>Anos na beleza</p>
                                </li>
                                <li>
                                    <h3> <span id="counter2">4</span> K+</h3>
                                    <p>Clientes felizes</p>
                                </li>
                            </ul>

                            <a href="http://localhost/escola/public/sobre"><button>Veja mais</button></a>


                        </article>
                        <div class="carrousel-home">
                            <div class="swiper mySwiper2">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <img src="http://localhost/escola/public/assets/img/home2.png" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="http://localhost/escola/public/assets/img/home4.png" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="http://localhost/escola/public/assets/img/home6.png" />
                                    </div>

                                </div>

                            </div>

                        </div>


                    </div>


                </div>
            </section>




            <?php require_once('template/cursos.php'); ?>

            <section id="sobre">
                <div class="sobre-container ">
                    <figure>


                    </figure>


                    <div class="sobre-txt">
                        <article>
                            <h4>Sobre Nós</h4>

                            <h3>NÓS SOMOS AVALIADOS POR <span>AULAS DINÂMICAS</span></h3>

                            <p>Nosso compromisso é oferecer aulas interativas e práticas, focadas no aperfeiçoamento das técnicas de extensão de cílios. Com instrutoras experientes e uma abordagem moderna, garantimos um aprendizado eficiente e de alta qualidade para nossas alunas.</p>
                        </article>


                        <div class="sobre-numbers">
                            <div class="number">
                                <h3>20+</h3>
                                <h4>Turmas</h4>
                            </div>
                            <div class="number">
                                <h3>10+</h3>
                                <h4>Experiencia</h4>
                            </div>
                            <div class="number">
                                <h3>200+</h3>
                                <h4>Alunos</h4>
                            </div>


                        </div>

                        <a href="http://localhost/escola/public/servicos"><button>Veja mais</button></a>

                    </div>


                </div>
            </section>

            <?php require_once('template/professor.php'); ?>

            <section id="vermais">
                <div class="vermais-container">
                    <article>

                        <h2>Você gostaria de cílios mais longos, espessos e volumosos?</h2>
                        <p>Leve sua rotina matinal para o próximo nível, dizendo adeus ao rímel e dando boas-vindas a uma rotina matinal rápida!</p>

                        <a href="http://localhost/escola/public/sobre"><button>Veja mais</button></a>
                    </article>
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


    </div>



</body>


</html>