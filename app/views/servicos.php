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

<body>
    <div class="content">

        <?php require_once('template/topo.php'); ?>

        <main>
    <section id="service-txt">
        <div class="service-container-txt">
            <div class="service-inner-txt container">
                <div class="service-img">
                    <figure class="img-back">
                        <img src="http://localhost/escola/public/assets/img/service-img.png" alt="Imagem de fundo">
                    </figure>
                    <figure class="img-front">
                        <img src="http://localhost/escola/public/assets/img/service-img2.png" alt="Imagem circular">
                    </figure>
                </div>

                <article>
                    <h4>Serviços</h4>
                    <h2>Transforme seu olhar com cílios incríveis e volumosos.</h2>
                    <p>Quer cílios mais longos, espessos e volumosos? Eleve sua rotina matinal ao próximo nível, dizendo adeus ao rímel e dando boas-vindas a uma rotina prática e rápida! Nossa missão é oferecer extensões de cílios perfeitamente aplicadas que representam elegância, sofisticação e a verdadeira perfeição dos cílios.</p>
                </article>
            </div>
        </div>
    </section>

    <section id="services">
        <div class="service-container container">
            <div class="service-title">
                <h4>Tratamentos Faciais & Corporais</h4>
                <h3>Cuidados com a Pele por andfaison</h3>
                <img src="http://localhost/escola/public/assets/img/title-barra.png" alt="">
            </div>

            <div class="service-cards">
                <?php foreach ($cursos as $index => $curso): ?>
                    <ul>
                        <li>
                            <div class="img-fundo">
                                <img src="http://localhost/escola/public/assets/img/fe-1-<?php echo $index + 1; ?>.png" alt="Imagem dinâmica">
                            </div>
                        </li>
                        <li>^^^^</li>
                        <li>
                            <h4><?php echo $curso['nome_curso']; ?></h4>
                        </li>
                        <li>
                            <p><?php echo $curso['descricao_curso']; ?></p>
                        </li>
                    </ul>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section id="vermais">
        <div class="vermais-container">
            <article>
                <h2>Deseja cílios mais longos, espessos e volumosos?</h2>
                <p>Leve sua rotina matinal para o próximo nível, dizendo adeus ao rímel e dando boas-vindas a uma rotina mais rápida e prática!</p>
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
</body>


</html>