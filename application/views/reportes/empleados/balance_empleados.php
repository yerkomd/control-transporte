<div class="row">
    <div class="col-xs-12 text-center">
        <b>Balance de empleado</b><br>
        Nombre : <?php ?> <br>
        CI : <?php ?><br>
    </div>
</div>
<br>
</br>
<div class="row">
    <div class="col-xs-12">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th width="20%">Fecha</th>
                    <th width="60%">Descripcion</th>
                    <th width="20%">Egresos Bs</th>

                </tr>
            </thead>
            <tbody>
                <?php

                if (count($pago_empleado) > 0) {
                    foreach ($pago_empleado as $row) { ?>
                        <tr>
                            <td><?php echo $row['Fecha'] ?></td>
                            <td><?php echo $row['Descripcion'] ?></td>
                            <td ALIGN="center"><?php echo number_format($row['Monto'], 2) ?></td>

                        </tr>
                <?php }
                }

                ?>
            </tbody>

        </table>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th width="20%">Fecha</th>
                    <th width="60%">Descripcion</th>
                    <th width="20%">Ingresos Bs</th>

                </tr>
            </thead>
            <tbody>
                <?php

                if (count($ingreso_empleado) > 0) {
                    foreach ($ingreso_empleado as $row) { ?>
                        <tr>
                            <td><?php echo $row['Fecha'] ?></td>
                            <td><?php echo $row['Descripcion'] ?></td>
                            <td ALIGN="center"><?php echo number_format($row['Monto'], 2) ?></td>

                        </tr>
                <?php }
                }

                ?>

            </tbody>

        </table>

    </div>
</div>