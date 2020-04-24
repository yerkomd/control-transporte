<?php
class Proveedor_model extends CI_Model
{
    public function obtenerProveedores()
    {
        $this->db->select('*');
        $this->db->from('proveedor');
        $this->db->where('Estado','1');
        return $this->db->get()->result();
    }
    public function BuscarCI($CI)
    {
        $this->db->select('*');
        $this->db->from('proveedor');
        $this->db->where('CI',$CI);
        $this->db->where('Estado','1');
        $respuesta = $this->db->get()->result();

        if (isset($respuesta)) {
            return $respuesta;
        } else {
            return false;
        }
        
    }
    public function insertar($ci, $nombres, $apellidos, $direccion, $departamento, $telefono01, $telefono02, $calificacion, $descripcion)
    {
        $data = array(
            'CI' => $ci,
            'Nombres' => $nombres,
            'Apellidos' => $apellidos,
            'Calificacion' => $calificacion,
            'Descripcion' => $descripcion,
            'Direccion' => $direccion,
            'Departamento' => $departamento,
            'Telefono_01' => $telefono01,
            'Telefono_02' => $telefono02,
            'Estado' => '1',
        );
        $this->db->insert('proveedor',$data);
        return $this->db->insert_id();
    }
}
