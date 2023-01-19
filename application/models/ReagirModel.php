<?php
class ReagirModel extends CI_Model{
    function __construct(){

        parent::__construct();
        

    }

/*
	private $db,
    $id_reaction,
    $id_pub,
    $id_util,
    $date_reagir='';
	

	public function get_property($propertyName) {
        return $this->$propertyName;
    }
    
    public function set_property($propertyName, $propertyValue) {
        $this->$propertyName = $propertyValue;
    }

    public function setData($data = array()) {
        $this->id_pub = $data["id_pub"];
        $this->id_util = $data["id_util"];
    }
    //raha miclick jaime
    public function exists() {
        $this->db->query("SELECT * FROM `reagir` 
        WHERE `id_pub` = ? AND `id_util` = ?", array(
            $this->id_pub,
            $this->id_util
        ));

        return $this->db->count() > 0 ? true : false;
    }*/

    //hanisy jaime
    function add($id_session, $id_pub) {
        $output = "error !!!";
        $sql1 = "select count(*) as reagir from reagir where id_util='".$id_session."' and id_pub='".$id_pub."';";
        $query1 = $this->db->query($sql1);
        foreach ($query1->result() as $row)
            {
                if($row->reagir == "0"){
                    $sql = "insert into reagir (id_util, id_pub) values ('".$id_session."','".$id_pub."');";
                        if($this->db->query($sql)){
                            $output = "added";
                        }
                }else{
                    $sql = "delete from reagir where id_util='".$id_session."' and id_pub='".$id_pub."';";
                        if($this->db->query($sql)){
                            $output = "removed";
                    }
                }
            }


        
        
        echo $output;
    }

    function act($list) {
        $liste = array();
        $output = "error !!!";

        for ($i=0; $i < count($list); $i++) { 
            $sql1 = "select count(*) as reagir from reagir where id_pub='".$list[$i]."';";
            $query1 = $this->db->query($sql1);
            foreach ($query1->result() as $row)
                {
                    $liste[$i] = $row->reagir;
                }
        }
        

        echo json_encode($liste);
    }
    
/*
    public function delete() {
        $this->db->query("DELETE FROM `reagir` WHERE `id_pub` = ? AND `id_util` = ?",
            array(
                $this->id_pub,
                $this->id_util
            )
        );

        return $this->db->error() == false ? true : false;
    }

      public static function delete_post_likes($id_pub) {
        db::getInstance()->query("DELETE FROM `reagir` WHERE `id_pub` = ?",
            array(
                $id_pub
            )
        );

        return DB::getInstance()->error() == false ? true : false;
    }
    //like isakin post

    public function get_post_users_likes_by_post($id_pub) {
        $this->db->query("SELECT * FROM `reagir` WHERE id_pub = ?", array($id_pub));
        $users = array();
        if($this->db->count() > 0) {
            $fetched_like_users = $this->db->results();
            foreach($fetched_like_users as $user) {
                $u = new UtilisateurModel();
                $u->fetchUser("id", $user->id);

                $users[] = $u;
            }
        }

        return $users;
    }


    public function toString() {
        return 'Post with id: ' . $this->id_pub . " and owner of id: " . $this->id_pub . " published at: " . $this->date_reagir . "<br>";
    }
    */


}
?>