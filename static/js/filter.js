$(document).ready(function(){
  $("#guestSearch").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#guestTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});

$(document).ready(function(){
  $("input[name='pet']").click(function() {
    if ($("#petYes").is(":checked")) {
      $("#pet_price").show();
    } else {
      $("#pet_price").hide();
    }
  });
});
