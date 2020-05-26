<!-- page content -->

<div class="right_col" role="main">

  <div class="" role="main">
    <div class="row tile_count">
      <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-truck"></i>Balance de camiones</span>
        <div class="count green"><?php echo number_format($balance_camiones, 2)  ?> BS</div>
        <span class="count_bottom">Balance de los camiones del año actual</span>
      </div>
      <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-money"></i> Ingreso por comisión</span>
        <div class="count green"><?php echo number_format($comision['comision'], 2)  ?> BS</div>
        <span class="count_bottom"> Ingreso por comision del año actual</span>
      </div>
      <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-money"></i> Liquidez</span>
        <div class="count green"><?php echo number_format($BalanceCuentas, 2)  ?> BS</div>
        <span class="count_bottom">Liquides de las cuentas de la empresa</span>
      </div>
      <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-money"></i> Cuentas por cobrar</span>
        <div class="count green"><?php echo number_format($CuentasPorCobrar, 2)  ?> BS</div>
        <span class="count_bottom"> Balance de las cuentas de los clientes</span>
      </div>
      <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-money"></i> Cuentas por pagar</span>
        <div class="count red"><?php echo number_format($CuentasPorPagar, 2) ?> Bs</div>
        <span class="count_bottom"> Balance de las cuentas por pagar</span>
      </div>
      <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-money"></i> Balance</span>
        <div class="count <?php echo ($Balance >= 0) ? 'green' : 'red' ?>"><?php echo number_format(abs($Balance), 2) ?> Bs</div>
        <span class="count_bottom"> Balance de la empresa</span>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Tablas de reportes</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>

              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content" style="display:none">
            <div class="" role="tabpanel" data-example-id="togglable-tabs">
              <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                <li role="tablaProdcutos" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Tabla de balance de clientes</a>
                </li>

              </ul>
              <div id="myTabContent" class="tab-content">
                <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                  <table class="table table-bordered" id="tablaDetalleCliente">
                    <thead>
                      <tr>
                        <th>ID cliente</th>
                        <th>Nombres</th>
                        <th>Apellidos </th>
                        <th>Balance</th>
                        <th>Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      if (isset($DetalleBalanceCliente)) {
                        foreach ($DetalleBalanceCliente as $row) { ?>
                          <tr>
                            <td><?php echo $row['ID_cliente'] ?></td>
                            <td><?php echo $row['Nombre'] ?></td>
                            <td><?php echo $row['Apellidos'] ?></td>
                            <td><?php echo $row['balance'] ?></td>
                            <td>
                              <button class="btn btn-warning btn-sm" id="btn-editar"><i class="fas fa-pencil-alt"></i> Editar</button>
                            </td>
                          </tr>
                      <?php }
                      }
                      ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>ID cliente</th>
                        <th>Nombres</th>
                        <th style="text-align:right">Total de general:</th>
                        <th colspan="2" style="text-align: left"></th>
                      </tr>
                    </tfoot>
                  </table>
                  <!-- Tabla responsiva-->
                </div>
              </div>
            </div><!-- Termina el contenido del row-->
          </div>
        </div>

      </div>

    </div>

  </div>
</div>

<!-- /page content -->