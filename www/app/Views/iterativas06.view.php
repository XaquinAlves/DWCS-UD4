<!--Inicio HTML -->
<div class="row">
    <div class="col-12">
        <div class="col-12">
            <?php if(isset($errors['erasto'])){ ?>
                <div class='alert alert-danger'><?= $errors['erasto'] ?></div>
            <?php } else if ($cribado !== "") { ?>
                <div class='col-12'><div class='alert alert-success'>Numeros primos entre 1 e
                        <?php echo $input['input_erasto'] ?>: <?php echo $cribado ?></div></div>
            <?php } ?>
        </div>
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
                                <label for="input_erasto">Introduce un número: </label>
                                <input type="text" class="form-control" name="input_erasto" id="input_erasto"
                                       value="<?php echo $input['input_erasto'] ?? '' ?>" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="col-12 text-right">
                        <input type="submit" value="Enviar" name="enviar" class="btn btn-primary ml-2"/>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!--Fin HTML -->