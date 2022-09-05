<?php

class Model extends Query
{
  public $cond = [];
  public $order = "ORDER BY id ASC";
  public $limit = "LIMIT 10";
  private $prep = [];


  function get_games_list()
  {

    if($_POST['search_value'] != ""){
      $this->cond[] = " AND MATCH(publisher, name, nickname) AGAINST(? IN NATURAL LANGUAGE MODE)";
      $this->prep[] = $_POST['search_value'];
    }

    $this->cond = implode("", $this->cond);
    $query = "SELECT id,publisher,name,nickname,rating FROM game_list WHERE 1 {$this->cond} {$this->order} {$this->limit}";

    return $this->getQuery($query,$this->prep);
  }


  public function save_game_list()
  {
    extract($_POST);

    if((int)$_SESSION['selected_id'] == 0){
      $query = "INSERT INTO game_list (publisher,name,nickname,rating) VALUES (?,?,?,?)";
      $this->prep = [$publisher,$name,$nickname,$rating];
    } else {
      $query = "UPDATE game_list SET publishe=?,name=?,nickname=?,rating=? FROM game_list WHERE id = ?";
      $this->prep = [$publisher,$name,$nickname,$rating,(int)$_SESSION['selected_id']];
    }

    return $this->setQuery($query,$this->prep);
  }


}
