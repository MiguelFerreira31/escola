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
            <section id="sobre-page">
                <div class="sobre-container-page">
                    <div class="sobre-inner container">
                        <article>
                            <h4>Sobre nós</h4>
                            <h2>Estamos dedicados a criar uma experiência luxuosa e transformadora</h2>
                        </article>
                    </div>
                </div>
            </section>

            <section id="about-txt">
                <div class="about-container">
                    <div class="about-inner container">
                        <article>
                            <h4>Nossa Missão</h4>
                            <h2>Movidos pelo desejo de acentuar o fascínio dos olhos</h2>
                            <p>Quer cílios mais longos, espessos e volumosos? Eleve sua rotina matinal a um novo nível, dizendo adeus ao rímel e dando boas-vindas a uma rotina rápida e prática! Nossa missão é entregar extensões de cílios perfeitamente aplicadas que refletem elegância, sofisticação e a verdadeira perfeição dos cílios.</p>
                        </article>
                        <figure><img src="http://localhost/escola/public/assets/img/siliostt.png" alt="Imagem ilustrativa"></figure>
                    </div>
                </div>
            </section>

            <section id="about-cursos">
                <div class="about-cursos-container">
                    <div class="about-inner container">
                        <div class="about-title">
                            <h4>Nossos cursos</h4>
                            <h2>Empoderando os Olhos, Uma Extensão de Cada Vez</h2>
                        </div>

                        <div class="about-cards">
    <ul>
        <li><img src="http://localhost/escola/public/assets/img/silios1.png" alt="Extensão de cílios clássica"></li>
        <li>
            <h4>Extensão Clássica</h4>
        </li>
        <li>
            <p>A técnica clássica consiste na aplicação de um fio sintético sobre cada fio natural, proporcionando um efeito elegante e natural.</p>
        </li>
    </ul>
    <ul>
        <li><img src="http://localhost/escola/public/assets/img/silios2.png" alt="Extensão de cílios volume russo"></li>
        <li>
            <h4>Volume Russo</h4>
        </li>
        <li>
            <p>Com fios ultrafinos e leves, essa técnica permite criar um efeito volumoso e dramático, ideal para realçar o olhar.</p>
        </li>
    </ul>
    <ul>
        <li><img src="http://localhost/escola/public/assets/img/silios3.png" alt="Extensão de cílios híbrida"></li>
        <li>
            <h4>Extensão Híbrida</h4>
        </li>
        <li>
            <p>A junção das técnicas clássica e volume oferece um efeito equilibrado entre naturalidade e preenchimento, perfeito para qualquer ocasião.</p>
        </li>
    </ul>
    <ul>
        <li><img src="http://localhost/escola/public/assets/img/silios4.png" alt="Manutenção e cuidados com cílios"></li>
        <li>
            <h4>Cuidados e Manutenção</h4>
        </li>
        <li>
            <p>Saiba como manter suas extensões impecáveis por mais tempo com dicas essenciais de higiene e manutenção adequada.</p>
        </li>
    </ul>
</div>

                    </div>
                </div>
            </section>

            <section id="about-valores">
                <div class="about-valores-container">
                    <div class="about-inner-valores container">
                        <div class="about-valores-img">
                            <div class="about-valores-title">
                                <h4>Nossos Valores</h4>
                                <h2>Criando looks cativantes que refletem a personalidade individual</h2>
                            </div>
                            <figure><img src="http://localhost/escola/public/assets/img/silios-sobre.png" alt="Imagem dos valores"></figure>
                        </div>
                        <div class="about-valores-txt">
                            <ul>
                                <li><img src="http://localhost/escola/public/assets/img/star-silios.png" alt="Ícone de precisão"></li>
                                <li>
                                    <h4>Precisão e Artesanato</h4>
                                </li>
                                <li>
                                    <p>Cada extensão de cílios que sai do nosso estúdio é uma obra-prima, criada com precisão e dedicação.</p>
                                </li>
                            </ul>
                            <ul>
                                <li><img src="http://localhost/escola/public/assets/img/star-silios.png" alt="Ícone de foco no cliente"></li>
                                <li>
                                    <h4>Abordagem Centrada no Cliente</h4>
                                </li>
                                <li>
                                    <p>No coração do nosso trabalho está um foco profundo em nossos clientes, com o compromisso de criar relacionamentos baseados em confiança e cuidado genuíno.</p>
                                </li>
                            </ul>
                            <ul>
                                <li><img src="http://localhost/escola/public/assets/img/star-silios.png" alt="Ícone de inovação"></li>
                                <li>
                                    <h4>Inovação e Educação</h4>
                                </li>
                                <li>
                                    <p>Não nos limitamos à aplicação de cílios; buscamos constantemente expandir os limites da inovação no setor, trazendo sempre as últimas tendências e técnicas.</p>
                                </li>
                            </ul>
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