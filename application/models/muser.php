<?php

class Muser extends CI_Model {


    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }


    function insert_user()
    {
         $password = do_hash("pulpo");
        $data = array(
            'realname' => 'Karel Barthelemy' ,
            'login' => 'karel' ,
            'password' => $password,
            'admin' => 1
        );

        $this->db->insert('users', $data);
    }

    function  get_user($user)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('login', $user);
        $query = $this->db->get();
        return $query;
    }

    function get_all_user()
    {
        $this->db->select('user');
        $this->db->from('usb_devices');
        $this->db->distinct();
        $query = $this->db->get();
        return $query;
    }

    function get_by_user($user)
    {
        $this->db->select('*');
        $this->db->from('watch_usb');
        $this->db->where('user', $user);
        $query = $this->db->get();
        return $query;

    }

    function get_user_pc($user,$pc)
    {

        $this->db->select('*');
        $this->db->from('watch_usb');
        $this->db->where('user', $user);
        $this->db->where('pc', $pc);
        $query = $this->db->get();
        return $query;

    }

    function get_user_pc_action($user,$pc,$action)
    {
        $this->db->select('*');
        $this->db->from('watch_usb');
        $this->db->where('user', $user);
        $this->db->where('pc', $pc);
        $this->db->where('action',$action);
        $query = $this->db->get();
        return $query;

    }

    function get_user_pc_action_tipo($usuario,$pc,$accion,$tipo)
    {
        $this->db->select('*');
        $this->db->from('watch_usb');
        $this->db->where('user', $usuario);
        $this->db->where('pc', $pc);
        $this->db->where('action',$accion);
        $this->db->like('extension1',$tipo);
        $query = $this->db->get();
        return $query;

    }

    function get_user_tipo($usuario,$tipo)
    {
        $this->db->select('*');
        $this->db->from('watch_usb');
        $this->db->where('user', $usuario);
        $this->db->like('extension1',$tipo);
        $query = $this->db->get();
        return $query;
    }

    function get_user_accion($usuario,$accion)
    {
        $this->db->select('*');
        $this->db->from('watch_usb');
        $this->db->where('user', $usuario);
        $this->db->like('action',$accion);
        $query = $this->db->get();
        return $query;
    }

    function  check_password($user,$password)
    {
        $password = do_hash($password);
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('login', $user);
        $this->db->where('password', $password);
        $query = $this->db->get();
        return $query;
    }

    function cant_copy_user($user)
    {    $this->db->select('*');
        $this->db->where('user',$user );
        $this->db->where('action','Copied' );
        $this->db->from('watch_usb');
        $query = $this->db->count_all_results();
        return $query;
    }

    function list_copy_user($user)
    {
        $this->db->select('*');
        $this->db->where('user',$user );
        $this->db->where('action','Copied' );
        $this->db->from('watch_usb');
        $this->db->limit(20);
        $this->db->order_by("time", "desc");
        $query = $this->db->get();
        return $query;
    }

    function cant_remove_user($user)
    {
        $this->db->where('user',$user );
        $this->db->where('action','Removed' );
        $this->db->from('watch_usb');
        $query = $this->db->count_all_results();
        return $query;
    }

    function list_remove_user ($user)
    {
        $this->db->select('*');
        $this->db->where('user',$user );
        $this->db->where('action','Removed' );
        $this->db->from('watch_usb');
        $this->db->limit(20);
        $this->db->order_by("time", "desc");
        $query = $this->db->get();
        return $query;


    }

    function cant_modify_user($user)
    {
        $this->db->where('user',$user );
        $this->db->where('action','Modified' );
        $this->db->from('watch_usb');
        $query = $this->db->count_all_results();
        return $query;
    }

    function list_modify_user($user)
    {
        $this->db->select('*');
        $this->db->where('user',$user );
        $this->db->where('action','Modified' );
        $this->db->from('watch_usb');
        $this->db->limit(20);
        $this->db->order_by("time", "desc");
        $query = $this->db->get();
        return $query;

    }

    function list_user_ext($user)
    {
        $query = $this->db->query("select extension1 as extension , COUNT(extension1) as cantidad from watch_usb WHERE  `user` = '$user' and extension1 !='' and action = 'Copied' GROUP BY extension1 ORDER BY COUNT(extension1) DESC LIMIT 10");
        return $query;
    }

    function list_user_pc($user)
    {
        $query = $this->db->query("select pc , COUNT(pc) as cantidad from watch_usb WHERE  `user` = '$user' and action ='Copied' GROUP BY pc ORDER BY COUNT(pc) DESC LIMIT 10");
        return $query;
    }

    function most_copy_user()
    {
        $query = $this->db->query("select DISTINCT user , COUNT(extension1) as cantidad from watch_usb WHERE  action ='Copied' GROUP BY user ORDER BY COUNT(extension1) DESC LIMIT 20");
        return $query;
    }


    function most_copy_pc()
    {
        $query = $this->db->query("select DISTINCT pc , COUNT(extension1) as cantidad from watch_usb WHERE  action ='Copied' GROUP BY user ORDER BY COUNT(extension1) DESC LIMIT 20");
        return $query;
    }

    function remove_today($hoy)
    {
        $this->db->select('COUNT(action)');        
        $this->db->where('action','Removed' );
        $this->db->like('time',$hoy );
        $this->db->from('watch_usb');
        $query =  $this->db->count_all_results();
        return $query;
               
    }

    function copy_today($hoy)
    {

        $this->db->select('COUNT(action)');        
        $this->db->where('action','Copied' );
        $this->db->like('time',$hoy );
        $this->db->from('watch_usb');
        $query =  $this->db->count_all_results();
        return $query;

    }

    function modified_today($hoy)
    {
        $this->db->select('COUNT(action)');        
        $this->db->where('action','Modified' );
        $this->db->like('time',$hoy );
        $this->db->from('watch_usb');
        $query =  $this->db->count_all_results();
        return $query; 
    }

}