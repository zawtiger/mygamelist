<?php

class MyGameList extends Controller
{

  public function add_new_button()
  {
    $html .= "<button class=\"btn btn-success m-1 shadow\" onclick=\"add_edit_game('0');\">ADD NEW GAME</button>";
    return $html;
  }



  public function search_box()
  {
    $f = new BootstrapForms;
    $f->group_class = " shadow m-1";

    $f->id = "search";
    $f->label = "Search";
    $f->function = "onkeyup=\"search();\"";
    return $f->floating_labels();
  }



  public function show_game_list()
  {
    $html .= "<table class=\"table table-striped table-sm m-3 shadow\">";
    $html .= "<thead class=\"table-dark\">";
            $html .= "<tr class=\"small\">";
              $html .= "<th>Game Title</th>";
              $html .= "<th>Publisher</th>";
              $html .= "<th>Nickname</th>";
              $html .= "<th>Rating</th>";
            $html .= "</tr>";
    $html .= "</thead>";


    $M = new Model;
    $rows = $M->get_games_list();

    $html .= "<tbody>";

    foreach($rows AS $row){
      extract($row);
      $html .= "<tr class=\"small\">";
        $html .= "<th>{$name}</th>";
        $html .= "<td><i>{$publisher}</i></td>";
        $html .= "<td>{$nickname}</td>";
        $html .= "<td>{$rating}/5</td>";
      $html .= "</tr>";
    }


    $html .= "</tbody>";
    $html .= "</table>";

    return $html;
  }


  public function edit_game_info()
  {
    $f = new BootstrapForms;
    $f->group_class = " shadow m-1";

    $f->id = "publisher";
    $f->label = "Publisher";
    ${$f->id} = $f->floating_labels();

    $f->id = "name";
    $f->label = "Game Title";
    ${$f->id} = $f->floating_labels();

    $f->id = "nickname";
    $f->label = "Nickname";
    ${$f->id} = $f->floating_labels();

    $f->id = "rating";
    $f->label = "Rating";
    $f->drop_options = ['',1,2,3,4,5];
    ${$f->id} = $f->floating_labels_select();

    $html .= "<div class=\"row\">";
      $html .= "<div class=\"col-sm\">{$publisher}</div>";
      $html .= "<div class=\"col-sm\">{$name}</div>";
      $html .= "<div class=\"col-sm\">{$nickname}</div>";
      $html .= "<div class=\"col-sm\">{$rating}</div>";
    $html .= "</div>";

    return $html;
  }




//======================================================= END OF CLASS ===============================
}
