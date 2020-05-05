<?php
class Pagos_cuentas_model extends CI_Model
{
    public function obtenerPagosClientes()
    {
        $this->db->select('p.*, c.Nombre, c.Apellidos, c.CI, c.Direccion, c.Telefono_01, c.Telefono_02');
        $this->db->from('pago_cuentas p');
        $this->db->join('Cliente c', 'c.ID_Cliente = p.ID_Cliente');
        $this->db->limit(500);
        return $this->db->get()->result();
    }
    public function ingresarPagoCliente($ID_Cliente, $Fecha, $Descripcion, $Debe, $Haber)
    {
        $datos = array(
            'ID_Cliente' => $ID_Cliente,
            'fecha' => $Fecha,
            'Descripcion' => $Descripcion,
            'Debe' => $Debe,
            'Haber' => $Haber,
        );
        $this->db->insert('pago_cuentas', $datos);
        return $this->db->insert_id();
    }
    public function obtenerPagoCliente($ID_pago_cuentas)
    {
        $this->db->select('p.*, c.Nombre, c.Apellidos, c.CI, c.Direccion, c.Telefono_01, c.Telefono_02');
        $this->db->from('pago_cuentas p');
        $this->db->join('Cliente c', 'c.ID_Cliente = p.ID_Cliente');
        $this->db->where('ID_pago_cuentas', $ID_pago_cuentas);
        return $this->db->get()->row_array();
    }
    public function editarPagoCliente($ID_pago_cuentas, $ID_Cliente, $Fecha, $Descripcion, $Debe, $Haber)
    {
        $datos = array(
            'ID_Cliente' => $ID_Cliente,
            'fecha' => $Fecha,
            'Descripcion' => $Descripcion,
            'Debe' => $Debe,
            'Haber' => $Haber,
        );
        $this->db->where('ID_pago_cuentas',$ID_pago_cuentas);
        $this->db->update('pago_cuentas', $datos);

    }
    public function eliminarPago($ID_pago_cuentas)
    {
        $this->db->where('ID_pago_cuentas',$ID_pago_cuentas);
        $this->db->delete('pago_cuentas');
    }

    //Funciones de pago de talleres
    public function obtenerPagostalleres()
    {
        $this->db->select('p.*, t.NombreTaller, t.Departamento, t.Direccion');
        $this->db->from('pago_cuentas p');
        $this->db->join('taller t', 't.ID_taller = p.ID_taller');
        $this->db->limit(500);
        return $this->db->get()->result();
    }
    public function ingresarPagoTaller($ID_taller, $Fecha, $Descripcion, $Debe, $Haber)
    {
        $datos = array(
            'ID_taller' => $ID_taller,
            'fecha' => $Fecha,
            'Descripcion' => $Descripcion,
            'Debe' => $Debe,
            'Haber' => $Haber,
        );
        $this->db->insert('pago_cuentas', $datos);
        return $this->db->insert_id();
    }
    public function obtenerPagoTaller($ID_pago_cuentas)
    {
        $this->db->select('p.*, t.NombreTaller, t.Departamento, t.Direccion');
        $this->db->from('pago_cuentas p');
        $this->db->join('taller t', 't.ID_taller = p.ID_taller');
        $this->db->where('ID_pago_cuentas', $ID_pago_cuentas);
        return $this->db->get()->row_array();
    }
    public function editarPagoTaller($ID_pago_cuentas, $ID_taller, $Fecha, $Descripcion, $Debe, $Haber)
    {
        $datos = array(
            'ID_taller' => $ID_taller,
            'fecha' => $Fecha,
            'Descripcion' => $Descripcion,
            'Debe' => $Debe,
            'Haber' => $Haber,
        );
        $this->db->where('ID_pago_cuentas',$ID_pago_cuentas);
        $this->db->update('pago_cuentas', $datos);

    }
   
}