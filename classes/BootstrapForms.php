<?php

//Premade to make form items easier to load and customize if using Bootstrap

class BootstrapForms {

  public $label = "";
  public $id = "";
  public $type = "";
  public $inVar = "";
  public $placeholder = "";
  public $function = "";
  public $options = [];
  public $values = [];
  public $form_class = "";
  public $form_style = "";
  public $invalid = "";
  public $valid = "";
  public $button_css = "";
  public $label_class = "";
  public $post_input = "";
  public $group_class = "";
  public $group_style = "";
  public $dataList = [];
  public $drop_options = [];


  public function floating_labels(){

    $html .= "
    <div class=\"form-floating mb-3 {$this->group_class}\">
      <input type=\"{$this->type}\" class=\"form-control{$this->form_class}\" id=\"{$this->id}\" list=\"dO_{$this->id}\" value=\"{$this->inVar}\" placeholder=\"{$this->placeholder}\" {$this->function}>
      <label class=\"text-secondary\" for=\"{$this->id}\">{$this->label} <span id=\"ft_results{$this->id}\"></span></label>
    </div>";

    if($this->dataList){
      $html .= "<datalist id=\"dO_{$this->id}\">";
      foreach($this->dataList as $dli){
        $html .= "<option value=\"{$dli}\">";
      }
      $html .= "</datalist>";
    }
    return $html;
  }


  public function floating_labels_select(){

    $html .= "
    <div class=\"form-floating mb-3 {$this->group_class}\" style=\"{$this->group_style}\">
      <select class=\"form-select{$this->form_class}\" id=\"{$this->id}\" {$this->function}>";

      foreach($this->drop_options as $value => $label){

        if($this->inVar == $value){ $selected = "selected"; } else { $selected = ""; }
        $html .= "<option value=\"{$value}\" {$selected}>{$label}</option>";

      }


    $html .= "
      </select>
      <label class=\"text-dark\" for=\"{$this->id}\">{$this->label} <span id=\"ft_results{$this->id}\"> </span></label>
    </div>";

    return $html;
  }


  public function radio_buttons()
  {

    $html .= "<div class=\"btn-group me-2\" role=\"group\">";
    foreach($this->drop_options AS $b){
      $html .= "<input type=\"radio\" class=\"btn-check\" name=\"{$this->id}\" id=\"{$this->id}_{$b}\" value=\"{$b}\" autocomplete=\"off\">
        <label class=\"btn btn-outline-secondary btn-sm\" for=\"{$this->id}_{$b}\">{$b}</label>";
    }
    $html .= "</div>";

    return $html;
  }


}
