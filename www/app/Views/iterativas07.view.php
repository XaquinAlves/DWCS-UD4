<!--Inicio HTML -->
<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <form method="get" action="">
                <input type="hidden" name="order" value="1"/>
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary"><?php echo $tituloEjercicio ?></h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <form action="" method="post">
                        <div class="row align-content-center">
                            <?php if ($_GET === [] && $bingo['carton'] === []) { ?>
                                    <a href="./iterativas07do"
                                       class="btn btn-primary ml-2 text-center">Empezar bingo</a>
                            <?php } else { ?>
                            <div class="col-12 col-lg-4">
                                Carton : <?php echo implode(", ", $bingo['carton']) ?>
                            </div>
                            <div class="col-12 col-lg-4">
                                Bolas : <?php echo implode(", ", $bingo['bolas']) ?>
                            </div>
                            <?php } if ($win) {?>
                                <div class="alert-success col-12 col-lg-4">GANADOR</div>
                            <?php } ?>
                        </div>
                </div>
                <div class="card-footer">
                    <div class="col-12 text-right">
                        <?php if ($bingo['carton'] !== []) { ?>
                        <a href="./iterativas07do?sec=test&<?php echo http_build_query($bingo) ?>"
                           class="btn btn-primary ml-2">Sacar bola</a>
                        <a href="./iterativas07do" class="btn btn-danger ml-2">Reiniciar</a>
                        <?php } ?>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!--Fin HTML -->