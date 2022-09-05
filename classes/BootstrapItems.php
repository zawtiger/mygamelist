<?php

class BootstrapItems
{
  public static $modal_id = "myModal";
  public static $modal_contents = "<i class=\"fas fa-sync-alt m-3 fa-spin\" style=\"font-size:50px;\"></i>";
  public static $modal_class = "";
  public static $keyboard = "false";
  public static $modal_close_function;

  public static function load_modal(){

    $html .= "<!-- Modal -->
    <div class=\"modal fade\" id=\"".self::$modal_id."\" data-bs-backdrop=\"static\" data-bs-keyboard=\"".self::$keyboard."\" tabindex=\"-1\" aria-labelledby=\"staticBackdropLabel\" aria-hidden=\"true\">
      <div class=\"modal-dialog ".self::$modal_class."\">
        <div class=\"modal-content\">
          <div class=\"modal-header\" id=\"".self::$modal_id."\">
            <h5 class=\"modal-title\" id=\"".self::$modal_id."_title\">VIEW</h5>
            <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" onclick=\"".self::$modal_close_function."\" aria-label=\"Close\"></button>
          </div>
          <div class=\"modal-body\"  id=\"".self::$modal_id."_body\">";
            self::$modal_contents;
          $html .= "</div>
          <div class=\"modal-footer\" id=\"".self::$modal_id."_footer\">
            <button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">Close</button>

          </div>
        </div>
      </div>
    </div>";

    return $html;
  }

}
