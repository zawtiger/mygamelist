<?php

//Creating routes because we want to be able to scale in the future.
Route::set('index.php',function() {
  $P = new MyGameList;
  $P->page_title = "My Game List";
  $P->CreateView('MyGameList');
});

// AJAX ===========
if($_POST['AjaxCtr']){
  Route::set('AjaxPOST',function() {
    $AjaxCtr = $_POST['AjaxCtr'];
    $AjaxCtr::CreateView('AjaxView');
  });
}
