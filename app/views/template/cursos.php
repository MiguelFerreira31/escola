<section id="service">

    <div class="service-container container">
        <div class="service-title">
            <h4> Facial & Body Treatments</h4>
            <h3>Skincare by andfaison</h3>

            <img src="http://localhost/escola/public/assets/img/title-barra.png" alt="">
        </div>

        <div class="service-cards">
            <?php foreach ($cursos as $index => $curso): ?>
                <ul>
                    <li>
                        <div class="img-fundo">
                            <img src="http://localhost/escola/public/assets/img/fe-1-<?php echo $index + 1; ?>.png" alt="Dynamic Image">
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