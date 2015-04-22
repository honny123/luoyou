<?php
class Article_model extends CI_Model {
  
  function get_all(){
    $this->db->select('*');
    $this->db->from("t_article");
    $this->db->join("t_category","t_article.category_id=t_category.category_id");
    $this->db->where("t_article.is_delete",0);
    $this->db->order_by("article_id", "desc");
    $articles = $this->db->get()->result();
    foreach($articles as $article){
      $author = $article->member_id;
      if($author==0){
        $article->author = "管理员";
      }else{
        $article->author = $this->db->get_where("t_member",array("member_id"=>$author))->row()->nickname;
      }
    }
    return $articles;
  }
  function save($article){
    $this -> db -> insert('t_article', $article);
    return $this -> db -> insert_id();
  }
  function get_article_info_by_id($article_id){
    $this->db->select("*");
    $this->db->from("t_article");
    $this->db->join("t_category","t_article.category_id=t_category.category_id");
    $this->db->where("t_article.article_id",$article_id);
    $article = $this->db->get()->row();
    if($article->member_id==0){
      $article->author = "管理员";
    }else{
      $article->author = $this->db->get_where("t_member",array("member_id"=>$article->member_id))->row()->nickname;
    }
    if($article->is_top==0){
      $article->is_top = "不置顶";
    }else{
      $article->is_top = "置顶";
    } 
    return $article;
  }
  function delete($str){
    $this->db->query("update t_article set is_delete = 1 where article_id in($str)");  
      if($this->db->affected_rows()>0){
         return TRUE;
      }
      return FALSE;
  }
  public function update($article_id,$data){
    $this->db->where('article_id',$article_id);
    $this->db->update('t_article',$data);
  }
}
