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
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="input_palabras">Introduce un texto: </label>
                                    <textarea name="input_palabras" id="input_palabras" rows="10" class="form-control">
                                        <?php echo $input['input_palabras'] ?? '' ?>
                                    </textarea>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="card-footer">
                    <div class="col-12 text-right">
                        <input type="submit" value="Enviar" name="enviar" class="btn btn-primary ml-2"/>
                    </div>
                    <div class="col-12">
                        <?php if (isset($errors['palabras'])) { ?>
                            <div class='alert alert-danger'><?php echo $errors['palabras'] ?></div>
                        <?php } elseif ($cuentapalabras !== "") { ?>
                            <div class='col-12'><div class='alert alert-success'>Cuenta de las palabras:
                                    <?php echo $cuentapalabras ?></div></div>
                        <?php } ?>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!--Fin HTML -->