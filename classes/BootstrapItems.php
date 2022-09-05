<?php

class BootstrapItems
{

   public static function load_modal(){

    $html = "";


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
