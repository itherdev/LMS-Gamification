$(document).ready(function(){

  // =======================================================
  // THE FUNCTIONS
  // =======================================================





  // =======================================================
  // PLAY_KUIS
  // =======================================================








  // =======================================================
  // HEADER LINKS AND VIEW CONTROLLERS
  // =======================================================
  function setview(form){
    $(".visitor").hide();
    $(".player").hide();
    $(".gm").hide();
    $("#"+form).show();
  }


  $(".link_header").click(function(){
    var tid = $(this).prop("id");
    var rid = tid.split("__");
    var id = rid[1];
    if(id=="player_questions") {$("#btn_refresh_list_question").show();}
    //else{alert(id);}
    setview(id);
    // alert(id);
  })

  $(".change_room").click(function(){
    var tid = $(this).prop("id");
    var rid = tid.split("__");
    var id = rid[1];
    $("#change_room_id").val(id);
    setview("change_room");
  })






  // =======================================================
  // LOGIN PLAYER
  // =======================================================
  $(".input_login").keyup(function(){
    var nickname = $("#nickname").val();
    var password = $("#password").val();
    $("#btn_login").prop("disabled",true);
    if (nickname.length<3) {
      $("#nickname_ket").text("Nickname minimal 3 karakter");
      return;
    }
    $("#nickname_ket").text("");

    if (password.length<5) {
      $("#password_ket").text("Password minimal 5 karakter");
      return; 
    }
    $("#password_ket").text("");
    $("#btn_login").prop("disabled",false);
    $("#nickname2").val(nickname);
    $("#password2").val(password);

  })

  $("#btn_login").click(function(){

    var nickname = $("#nickname").val();
    var password = $("#password").val();
    var link_ajax = "ajax/ajax_login.php?nickname="+nickname+"&password="+password;

    $("#pesan_login").html("Hai there... Let's Login to Play!");

    if (nickname.length<3) {
      $("#pesan_login").html("<font color=red>Nice try... but nickname too short.</font>");
      return;
    }

    if (password.length<5) {
      $("#pesan_login").html("<font color=red>Nice try... but password too short.</font>");
      return;
    }

    $.ajax({
      url:link_ajax,
      success:function(a){
        // alert(a);
        a = a.trim();
        if (a=="1"){
          $("#blok_login").hide();
          $("#blok_login_sukses").show();
          $("#pesan_login").html("You right Boss!");
        }else if(a=="0"){
          $("#pesan_login").html("<font color=red>Nice try... but nickname or password incorrect.</font>");
        }
      }
    })
  })
})



// =======================================================
  // Progress Profil PLAYER
  // =======================================================

$(function() {

  $(".progress").each(function() {

    var value = $(this).attr('data-value');
    var left = $(this).find('.progress-left .progress-bar');
    var right = $(this).find('.progress-right .progress-bar');

    if (value > 0) {
      if (value <= 50) {
        right.css('transform', 'rotate(' + percentageToDegrees(value) + 'deg)')
      } else {
        right.css('transform', 'rotate(180deg)')
        left.css('transform', 'rotate(' + percentageToDegrees(value - 50) + 'deg)')
      }
    }

  })

  function percentageToDegrees(percentage) {

    return percentage / 100 * 360

  }

});