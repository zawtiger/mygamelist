<?php


$MGL = new MyGameList;

// Add Modal, this will come in handy when the games get edited
BootstrapItems::$modal_class = "modal-dialog modal-xl";
$html .= BootstrapItems::load_modal();

$html .= "<script src=\"/assets/js/gamelist.js\" crossorigin=\"anonymous\"></script>";

$html .= "<div class=\"container-fluid\">";
  $html .= "<div class=\"row\">";

    $html .= "<div class=\"p-1 bg-dark col-sm d-flex justify-content-between align-items-start\">";
      $html .= $MGL->add_new_button();
      $html .= $MGL->search_box();
    $html .= "</div>";

  $html .= "</div>";


  $html .= "<div id=\"game_list_area\" class=\"row\">";
  //Load preexisting games
    $html .= $MGL->show_game_list();
  $html .= "</div>";

$html .= "</div>";




print Template::html_top();
print Template::banner();
print $html;
print Template::html_bottom();
