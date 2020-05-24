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
        <span class="count_top"><i class="fa fa-dollar"></i> Ingreso por comisión</span>
        <div class="count green"><?php echo number_format($comision['comision'], 2)  ?> BS</div>
        <span class="count_bottom"> Ingreso por comision del año actual</span>
      </div>
      <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-dollar"></i> Liquidez</span>
        <div class="count green"><?php echo number_format($BalanceCuentas, 2)  ?> BS</div>
        <span class="count_bottom">Liquides de las cuentas de la empresa</span>
      </div>
      <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-dollar"></i> Cuentas por cobrar</span>
        <div class="count green"><?php echo number_format($CuentasPorCobrar, 2)  ?> BS</div>
        <span class="count_bottom"> Balance de las cuentas de los clientes</span>
      </div>
      <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-dollar"></i> Cuentas por pagar</span>
        <div class="count red"><?php echo number_format($CuentasPorPagar, 2) ?> Bs</div>
        <span class="count_bottom"> Balance de las cuentas por pagar</span>
      </div>
      <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-dollar"></i> Balance</span>
        <div class="count <?php echo ($Balance >= 0) ? 'green' : 'red' ?>"><?php echo number_format(abs($Balance), 2) ?> Bs</div>
        <span class="count_bottom"> Balance de la empresa</span>
      </div>
    </div>

  </div>
</div>

<!-- /page content -->