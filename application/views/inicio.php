<!-- page content -->

<div class="right_col" role="main">

  <div class="" role="main">
    <div class="row tile_count">
      <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-truck"></i>Balance de camiones</span>
        <div class="count green"><?php echo number_format($balance_camiones, 2)  ?> BS</div>
        <span class="count_bottom"><i class="green">4% </i> From last Week</span>
      </div>
      <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-dollar"></i> Ingreso por comisión</span>
        <div class="count green"><?php echo number_format($comision['comision'], 2)  ?> BS</div>
        <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> From last Week</span>
      </div>
      <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-dollar"></i> Liquidez</span>
        <div class="count green">2,500</div>
        <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
      </div>
      <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-dollar"></i> Cuentas por cobrar</span>
        <div class="count green"><?php echo number_format($CuentasPorCobrar, 2)  ?> BS</div>
        <span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>12% </i> From last Week</span>
      </div>
      <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-dollar"></i> Cuentas por pagar</span>
        <div class="count red"><?php echo number_format($CuentasPorPagar, 2) ?> Bs</div>
        <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
      </div>
      <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-dollar"></i> Balance</span>
        <div class="count <?php echo ($Balance >= 0) ? 'green' : 'red' ?>"><?php echo number_format(abs($Balance), 2) ?> Bs</div>
        <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
      </div>
    </div>

  </div>
</div>

<!-- /page content -->