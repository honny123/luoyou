<?php
class Member_model extends CI_Model {

  function get_member_info(){
    return $this->db->get("t_member")->result();
  }
  function get_by_id($member_id){
    return $this->db->get_where("t_member",array("member_id"=>$member_id))->row();
  } 
  function remove_member_by_id($str){
    $this->db->query("update t_member set is_delete = 1 where member_id in($str)");
    if($this->db->affected_rows()>0){
      return TRUE;
    }else{
      return FALSE;
    }
  }
  function edit_member_by_id($str){
    $this->db->query("update t_member set is_delete = 0 where member_id in($str)");
    if($this->db->affected_rows()>0){
      return TRUE;
    }else{
      return FALSE;
  }
}
}
