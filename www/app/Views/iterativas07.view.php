<!--Inicio HTML -->
<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <form method="post" action="">
                <input type="hidden" name="order" value="1"/>
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary"><?php echo $tituloEjercicio ?></h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <form action="" method="post">
                        <div class="row">
                            <div class="col-12 col-lg-4">
                                <div class="mb-3">
                                </div>
                            </div>
                        </div>
                </div>
                <div class="card-footer">
                    <div class="col-12 text-right">
                        <input type="button" value="Sacar bola" name="sacar_bola" class="btn btn-primary ml-2"/>
                        <input type="button" value="Reiniciar" name="reiniciar" class="btn btn-primary ml-2"/>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!--Fin HTML -->