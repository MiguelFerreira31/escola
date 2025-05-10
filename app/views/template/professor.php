<section id="team">
    <div class="team-title">
        <h4> Nosso time</h4>
        <h3>Profissionais Experientes</h3>

        <img src="http://localhost/escola/public/assets/img/sec-shape-1.png" alt="">
    </div>
    <div class="team-container container">

        <div class="swiper mySwiper">
            <div class="swiper-wrapper">


                <?php foreach ($professor as $linha): ?>



                    <div class="swiper-slide">
                        <div class="member-container">
                            <div class="member"><img src="<?php
                                            $caminhoArquivo = $_SERVER['DOCUMENT_ROOT'] . "/escola/public/uploads/" . $linha['foto_professor'];

                                            if ($linha['foto_professor'] != "") {
                                                if (file_exists($caminhoArquivo)) {
                                                    echo ("http://localhost/escola/public/uploads/" . htmlspecialchars($linha['foto_professor'], ENT_QUOTES, 'UTF-8'));
                                                } else {
                                                    echo ("http://localhost/escola/public/uploads/professor/sem-foto-professor.jpg");
                                                }
                                            } else {
                                                echo ("http://localhost/escola/public/uploads/professor/sem-foto-professor.jpg");
                                            }
                                            ?>" alt=""></div>
                        </div>

                        <div class="member-txt">
                            <h3><?php echo $linha['nome_professor'] ?></h3>
                            <h4><?php echo $linha['cargo_professor'] ?></h4>
                        </div>

                    </div>





                <?php endforeach ?>

            </div>

        </div>


    </div>
</section>