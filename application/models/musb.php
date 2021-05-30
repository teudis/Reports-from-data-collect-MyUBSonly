<?php
class Musb extends CI_Model {


    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }


    function  get_top_file()
    {
        $query = $this->db->query("Select extension1 , count(extension1) as cantidad FROM watch_usb WHERE extension1 !=''  GROUP BY extension1 ORDER BY count(extension1) DESC LIMIT 5");
        return $query;
    }


    function get_all()
    {
        $query = $this->db->query("Select * FROM watch_usb  ORDER BY time DESC LIMIT 100");
        return $query;
    }

    function flash_inserted()
    {

        $query = $this->db->query("Select * FROM usb_devices  ORDER BY time DESC LIMIT 100");
        return $query;


    }

    function most_insert_pc()
    {
        $query = $this->db->query("Select DISTINCT pc, COUNT(action) as cantidad from  usb_devices where action = 'Connected Devices'  GROUP BY pc ORDER BY COUNT(action) DESC LIMIT 20");
        return $query;

    }


    function get_by_pc($pc)
    {
        $this->db->select('*');
        $this->db->from('watch_usb');
        $this->db->where('pc', $pc);
        $query = $this->db->get();
        return $query;
    }

    function get_by_pc_action($pc,$accion)
    {
        $this->db->select('*');
        $this->db->from('watch_usb');
        $this->db->where('pc', $pc);
        $this->db->where('action', $accion);
        $query = $this->db->get();
        return $query;
    }

    function  get_by_pc_tipo($pc,$tipo)
    {

        $this->db->select('*');
        $this->db->from('watch_usb');
        $this->db->where('pc', $pc);
        $this->db->like('extension1',$tipo);
        $query = $this->db->get();
        return $query;


    }

    function get_by_pc_tipo_accion($pc,$tipo,$accion)
    {
        $this->db->select('*');
        $this->db->from('watch_usb');
        $this->db->where('pc', $pc);
        $this->db->like('extension1',$tipo);
        $this->db->where('action', $accion);
        $query = $this->db->get();
        return $query;
    }

    function get_by_accion($accion)
    {
        $this->db->select('*');
        $this->db->from('watch_usb');
        $this->db->where('action', $accion);
        $query = $this->db->get();
        return $query;
    }

     function get_by_accion_tipo($accion,$tipo)
     {
         $this->db->select('*');
         $this->db->from('watch_usb');
         $this->db->where('action', $accion);
         $this->db->like('extension1', $tipo);
         $query = $this->db->get();
         return $query;
     }

    function get_by_tipo($tipo)
    {
        $this->db->select('*');
        $this->db->from('watch_usb');
        $this->db->like('extension1', $tipo);
        $query = $this->db->get();
        return $query;
    }

    function usb_date($inicio, $fin)
    {
        $query = $this->db->query("Select * from usb_devices where time BETWEEN '$inicio' AND '$fin' ORDER BY time DESC");
        return $query;
    }

    function usb_action($fecha_inicio,$fecha_final)
    {
        $query = $this->db->query("Select * from watch_usb where time BETWEEN '$fecha_inicio' AND '$fecha_final' ORDER BY time DESC");
        return $query;
    }

    function usb_pc($fecha_inicio,$fecha_final)
    {
        $query = $this->db->query("Select DISTINCT pc from watch_usb where time BETWEEN '$fecha_inicio' AND '$fecha_final' ORDER BY time DESC");
        return $query;
    }




}