<?php

      Class ActionPubModel extends CI_Model{
        function __construct()
        {
            $this->db = $this->load->database("default",TRUE);
        }
        function supprPub($id_pub, $id_util) {
            $sql = "delete form publication where id_pub='".$id_pub."'  and id_util='".$id_util."'  ";
            $this->db->query($sql);
    
    
        }

      } 


?>