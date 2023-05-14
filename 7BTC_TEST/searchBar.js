// Filter table


$(document).ready(function () {
    $('#dtBasicExample').fetchAll()();
    $('.dataTables_length').addClass('bs-select');
  });


  $(document).ready(function(){
    $("#hide").click(function(){
      $(".card-body1").hide(100020);
      $(".card-body").show();
    });
    $("#show").click(function(){
      $(".card-body1").show();
      $(".card-body").hide();
    });
  });