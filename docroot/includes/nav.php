<?php 
    @$page = $_GET['page'];
?>
<div>
    <h3 class="float-md-start mb-0">Amigo Secreto | A Grande Família</h3>
        <?php 
            if (empty($page)) {
        ?>
            <nav class="nav nav-masthead justify-content-center float-md-end">
            <a class="nav-link fw-bold py-1 px-0 active" aria-current="page" href="./">Home</a>
            <a class="nav-link fw-bold py-1 px-0" href="cadastrar.php">Participar</a>
            <?php
                @$mode = addslashes($_GET['mode']);

                if ($mode == 'admin') {
                    echo '<a class="nav-link fw-bold py-1 px-0" href="sortear.php?mode=' . $mode . '">Sortear</a>';
                    echo '<a class="nav-link fw-bold py-1 px-0" href="relatorio.php?mode=' . $mode . '">Relatório</a>';
                }
            ?>
        <?php } ?>
    </nav>
</div>