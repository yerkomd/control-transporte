<?php
    class datos_Persona {
        
        function __construct(){
            parent::__construct();
            
        }
    }

    class Persona_model extends CI_Model {
        
        public function insertar($ci,$nombres,$apellidop,$apellidom,$fechan,$email,$direccion,$ciudad,$telefono01,$telefono02){

            $data = array(
                'CI' => $ci,
                'Nombres' => $nombres,
                'Apellido_p' => $apellidop,
                'Apellido_m' => $apellidom,
                'Fecha_nacimiento' => $fechan,
                'Email' => $email,
                'Direccion' => $direccion,
                'Ciudad' => $ciudad,
                'Telefono_01' => $telefono01,
                'Telefono_02' => $telefono02

            );
            
            $this->db->insert('persona', $data);

        }
        
        function id_persona($ci){

            $this->db->where('CI',$ci);
            $this->db->from('persona');
            $persona = $this->db->get();

            $row = $persona->row_array();

            if (isset($row)){
                return  $row['ID_persona'];
            }
            else{return false;}

        }

    }