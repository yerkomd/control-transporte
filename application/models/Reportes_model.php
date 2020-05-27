<?php
class Reportes_model extends CI_Model
{

    public function Balance_camiones_gestion_actual()
    {
        $this->db->select('sum(total) - sum(ActViaje) - sum(Diesel) as ingreso');
        $this->db->from('camion');
        $this->db->join('detalle_transporte_ganado', 'camion.ID_camion = detalle_transporte_ganado.ID_camion');
        $this->db->where('camion.ID_contrato !=', 'NULL');
        $this->db->where('detalle_transporte_ganado.Fecha >=', date('Y') . '-01-01');
        $ingreso_camion = $this->db->get()->row_array();

        $this->db->select_sum('ImporteTotal');
        $this->db->from('detalle_mantenimiento');
        $this->db->where('ID_camion !=', 'NULL');
        $this->db->where('Fecha >=', date('Y') . '-01-01');
        $egreso_camion = $this->db->get()->row_array();

        $balance = (float) $ingreso_camion['ingreso'] - (float) $egreso_camion['ImporteTotal'];
        return $balance;
    }
    public function ingreso_comisiones_gestion_actual()
    {
        $this->db->select_sum('ComisionProveedor', 'comision');
        $this->db->from('detalle_transporte_ganado');
        $this->db->where('Fecha >=', date('Y') . '-01-01');
        return $this->db->get()->row_array();
    }
    public function CuentasPorPagar()
    {
        $this->db->select('(sum(Debe) - sum(Haber)) as BalancePagos');
        $this->db->from('pago_cuentas');
        $this->db->where('ID_taller !=', 'NULL');
        $this->db->or_where('ID_proveedor !=', 'NULL');
        $BalancePagos = $this->db->get()->row_array();

        $this->db->select('sum(ImporteTotal) as Total');
        $this->db->from('detalle_mantenimiento');
        $this->db->where('Porpagar', 1);
        $GastosCamionesPropios = $this->db->get()->row_array();

        $this->db->select('(sum(TotalProveedor) - sum(ActViaje)) as BalanceTransporteProveedores');
        $this->db->from('detalle_transporte_ganado');
        $this->db->where('TotalProveedor !=', 'NULL');
        $BalanceTransporteProveedores = $this->db->get()->row_array();

        $CuentasPorPagar =  $BalancePagos['BalancePagos'] + $GastosCamionesPropios['Total'] + $BalanceTransporteProveedores['BalanceTransporteProveedores'];
        return $CuentasPorPagar;
    }
    public function CuentasPorCobrar()
    {
        $this->db->select('(sum(Debe) - sum(Haber)) as Balance');
        $this->db->from('pago_cuentas');
        $this->db->or_where('ID_Cliente !=', 'NULL');
        $BalancePagoCuentas = $this->db->get()->row_array();

        $this->db->select_sum('Total', 'IngresoTransporte');
        $this->db->from('transporte');
        $IngresoTrasnporte = $this->db->get()->row_array();

        $Balance = $BalancePagoCuentas['Balance'] + $IngresoTrasnporte['IngresoTransporte'];
        return (float) $Balance;
    }
    public function BalanceCuentasEmpresa()
    {
        $this->db->select('(sum(Haber) - sum(Debe)) as BalanceCuenta');
        $this->db->from('pago_cuentas');
        $this->db->where('ID_cuenta_empresa !=', 'NULL');
        $BalanceCuentas = $this->db->get()->row_array();
        return (float) $BalanceCuentas['BalanceCuenta'];
    }
    public function obtenerDetalleBalanceClientes()
    {
        $this->db->select('b.ID_cliente, b.Nombre, b.Apellidos, (b.transporte + b.Balancepago) as balance');
        $this->db->from('balance_cliente b');
        return $this->db->get()->result_array();
    }
    public function obtenerDetalleBalanceProveedores()
    {
        $this->db->select('ID_proveedor, CI, Nombres, Apellidos, Telefono_01, Telefono_02, (CuentasPagar + Transporte) as balance');
        $this->db->from('balance_proveedores');
        return $this->db->get()->result_array();
    }
}
