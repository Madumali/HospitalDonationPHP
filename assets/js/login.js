
 $(document).on("click", "#loginbtn", function(e){
  e.preventDefault();
      var username = $("#uname").val();
      var password = $("#pass").val();
      var btn = $("#loginbtn").val();
     
      if (username.length == "" && password.length == ""){
      $("#check_name").html("Please fill out Username").fadeIn();
      $("#check_pass").html("Please fill out Password").fadeIn();
      $("#check_name").addClass("error");
      $("#check_pass").addClass("error");
     
     // return false;
  }else {
      $.ajax({
        url:"/HospitalDonation/controller/logUser.php",	
        method:"POST",
        data: { username:username, 
                password:password, 
                btn:btn 
              },
          success: function (feedback) {
              $("#error").html(feedback);
              
          }
      });
  }
});





// function submitForm() {		
//     var data = $("#login-form").serialize();				
//     $.ajax({				
//         type : 'POST',
//         url  : '../../controller/login.php',
//         data : data,
//         beforeSend: function(){	
//             $("#error").fadeOut();
//             $("#login").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; sending ...');
//         },
//         success : function(response){						
//             if(response=="ok"){									
//                 $("#login").html('<img src="../img/ajax-loader.gif" /> &nbsp; Signing In ...');
//                 setTimeout(' window.location.href = "donor_add.php"; ',4000);
//             } else {									
//                 $("#error").fadeIn(1000, function(){						
//                     $("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+response+' !</div>');
//                     $("#login").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign In');
//                 });
//             }
//         }
//     });
//     return false;
// }   


// $("#log form").on("click","#loginbtn", function(e){
// 	e.preventDefault();	
// var uname=$("#uname").val();
//  var pass=$("#pass").val();
//  var btn =$("#loginbtn").val();
// //  alert (uname);
//  if(uname!="" && pass!="")
//  {
 
//   $.ajax
//   ({
//   type:'post',
//   url:'../../controller/login.php',
//   data:{
   
//    uname:uname,
//    pass:pass,
//    btn:btn
//   },
//   success:function(response) {
   
//   if(response=="success")
//   {
//     $('#error').html('DDDDD');
//     window.location.href="../../view/donorManagement/donor_add.php";
//   } else {
//     $('#error').html('Enter Correct');
//   }
  
//   }
//   });
//  }

//  else
//  {
//     $('#error').html('Enter All Details');
//  }


// });