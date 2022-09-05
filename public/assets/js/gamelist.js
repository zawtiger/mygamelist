//This is for the mdal
var myModal = new bootstrap.Modal(document.getElementById('myModal'), {
  keyboard: false
})

// JavaScript for game list
function search(){
  let search_value = $("#search").val();
  $.post("AjaxPOST", {
  AjaxCtr: 'AjMyGameList',
  task: 'search',
  search_value: search_value,
  }, function(in_vars, status){
    var returned = JSON.parse(in_vars);
    $('#game_list_area').html(returned['html']);
  });
}



function add_edit_game(selected_id){
  $.post("AjaxPOST", {
    AjaxCtr: 'AjMyGameList',
    task: 'edit_view',
    selected_id: selected_id,

  }, function(in_vars, status){

    var returned = JSON.parse(in_vars);
    $('#myModal_title').html(returned['title']);
    $('#myModal_body').html(returned['html']);
    $('#myModal_footer').html(returned['footer']);
    myModal.show()

  });
}



function save(){
  // load vars
  let err = 0;
  let errT = "";

  let publisher = $('#publisher').val();
  let name = $('#name').val();
  let nickname = $('#nickname').val();
  let rating = $('#rating').val();


  //validate
    if(publisher == ""){
      err++;
      errT += "Publisher name is required and cannot be left blank!\n";
    }

    if(name == ""){
      err++;
      errT += "Game title is required and cannot be left blank!\n";
    }

    if(err == 0){
      $.post("AjaxPOST", {
        AjaxCtr: 'AjMyGameList',
        task: 'save',
        publisher: publisher,
        name: name,
        nickname: nickname,
        rating: rating,

      }, function(in_vars, status){

        var returned = JSON.parse(in_vars);
        if(returned['results'] > 0){
          $('#game_list_area').html(returned['html']);
          myModal.hide()
        } else {
          alert(errT);
        }


      });
    }
}
