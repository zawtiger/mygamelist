<?php

class AjMyGameList extends MyGameList
{

  public $json = "";

  public function get_json(){

      if($_POST['task']=="search"){
        $call_back['html'] = $this->show_game_list();
      }


      if($_POST['task']=="edit_view"){
        extract($_POST);

        if($selected_id == 0){
          $title = "Adding new game";
        } else {
          $title = "Editing new game";
          $_SESSION['selected_id'] = $selected_id;
        }

        $footer .= "<button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">Close</button>
        <button type=\"button\" class=\"btn btn-success\" onclick=\"save();\">Save changes</button>";

        $html = $this->edit_game_info();
        $call_back['title'] = $title;
        $call_back['html'] = $html;
        $call_back['footer'] = $footer;

      }


      if($_POST['task']=="save"){

        $M = new Model;

        $results = $M->save_game_list();
        if($results > 0){ // if saved then show results
          $call_back['html'] = $this->show_game_list();
        }

        $call_back['results'] = $results;
      }



      //=========================================================================
      return json_encode($call_back);
  }

}
