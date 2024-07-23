<?php
    include_once "topo.php"
?>


<em> Somos uma loja de imoveis tradicional</em>

<section class="cards">


    <?php
        for ($i=0; $i < 10; $i++) { 
            include "card.php";
        }

    ?>

</section>


<?php
    include_once "rodape.php"
?>
