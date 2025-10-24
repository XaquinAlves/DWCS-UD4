<!--Inicio HTML -->
<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <form method="post" action="">
                <input type="hidden" name="order" value="1"/>
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary"><?= $tituloEjercicio ?></h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <form action="" method="post">
                        <div class="row">
                            <div class="col-12 col-lg-4">
                                <div class="mb-3">
                                    <label for="alias">Introduce una matriz de numeros: </label>
                                    <input type="text" class="form-control" name="input_matriz" id="input_matriz"
                                           value="<?= $input['input_matriz'] ?? '' ?>" />
                                </div>
                            </div>
                        </div>
                </div>
                <div class="card-footer">
                    <div class="col-12 text-right">
                        <input type="submit" value="Enviar" name="enviar" class="btn btn-primary ml-2"/>
                    </div>
                    <div class="col-12">
                        <?php if(isset($ordenados)){ ?>
                            <div class='col-12'><div class='alert alert-success'>Matriz ordenada: <?= $ordenados ?></div></div>
                        <?php } else if (isset($errors)) { ?>
                            <div class='col-12'><div class='alert alert-danger'><?= $errors['matriz'] ?></div></div>
                        <?php } ?>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!--Fin HTML -->