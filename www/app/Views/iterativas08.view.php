<!--Inicio HTML -->
<?php if (isset($errors['json'])) { ?>
    <div class='alert alert-danger'><?php echo $errors['json'] ?></div>
<?php } elseif (!empty($resultado)) { ?>
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Resultados por asignatura</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class='col-12'>
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Nombre asignatura</th>
                                        <th>Media</th>
                                        <th>Aprobados</th>
                                        <th>Suspensos</th>
                                        <th>Mejor calificación</th>
                                        <th>Peor calificación</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($resultado['asignaturas'] as $nombreAsignatura => $datosAsignatura) {
                                    ?>
                                    <tr>
                                        <td><?php echo $nombreAsignatura ?></td>
                                        <td><?php echo $datosAsignatura['media'] ?? "-" ?></td>
                                        <td><?php echo $datosAsignatura['aprobados'] ?? "-" ?></td>
                                        <td><?php echo $datosAsignatura['suspensos'] ?? "-" ?></td>
                                        <td><?php echo $datosAsignatura['max']['alumno'] . " : " .
                                            $datosAsignatura['max']['nota'] ?? "-" ?></td>
                                        <td><?php echo $datosAsignatura['min']['alumno'] . " : " .
                                            $datosAsignatura['min']['nota'] ?? "-" ?></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-12">
            <div class="card bg-gradient-success">
                <div class="card-header">
                    <h6 class="font-weight-bold">Todo aprobado</h6>
                </div>
                <div class="card-body">
                    <ul>
                        <?php
                        foreach ($resultado['suspensos'] as $alumno => $suspensos) {
                            if ($suspensos === 0) {
                                ?>
                                    <li> <?php echo $alumno; ?> </li>
                                <?php
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-12">
            <div class="card bg-gradient-warning">
                <div class="card-header">
                    <h6 class="font-weight-bold">Al menos un suspenso</h6>
                </div>
                <div class="card-body">
                    <ul>
                        <?php
                        foreach ($resultado['suspensos'] as $alumno => $suspensos) {
                            if ($suspensos > 0) {
                                ?>
                                <li> <?php echo $alumno; ?> </li>
                                <?php
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-12">
            <div class="card bg-gradient-danger">
                <div class="card-header">
                    <h6 class="font-weight-bold">No promocionan</h6>
                </div>
                <div class="card-body">
                    <ul>
                        <?php
                        foreach ($resultado['suspensos'] as $alumno => $suspensos) {
                            if ($suspensos > 1) {
                                ?>
                                <li> <?php echo $alumno; ?> </li>
                                <?php
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
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
                            <label for="input_json">Introduce un array en formato JSON como <a target="_blank"
                                        href="https://centros.edu.xunta.gal/iespazomerce/aulavirtual/pluginfile.php/
                                        103167/mod_book/chapter/3738/json_ejercicio_8.txt">este</a> :
                            </label>
                            <textarea name="input_json" id="input_json" rows="10" class="form-control" ><?php
                                echo $input['input_json'] ?? '' ?></textarea>
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
<!--Fin HTML -->