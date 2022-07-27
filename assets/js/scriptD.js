

    var expanded = false;
    function showCheckboxes() {
        // setInterval(function(){
      var checkboxes = document.getElementById("checkboxes");
      if (!expanded) {
        
        checkboxes.style.display = "block";
        expanded = true;
    
      } else {
        checkboxes.style.display = "none";
        expanded = false;
      }
    // },2000);
    }



var expandeds = false;

function showCheckboxess() {
  var checkboxes = document.getElementById("checkboxess");
  if (!expandeds) {
    checkboxes.style.display = "block";
    expanded = true;
  } else {
    checkboxes.style.display = "none";
    expanded = false;
  }
}

$(document).on("click","#subUser", function(e){		//DONOR PERSON ADD
	e.preventDefault();
	
	var userName = $('#userName').val();
	var userNic = $('#userNic').val();
	var designation = $('#designation').val();
    var department = $('#department').val();
	var userEmail = $('#userEmail').val();
	var username = $('#username').val();
	var password = $('#password').val();
	
	var submitu = $("#subUser").val();
    var nm = $('#nicU').text();
    var uname = $('#username').text();
    var pass = $('#password').text();
    var msg = $('#emailMasgU').text();
    if(nm == 'Invalid' || uname == 'Invalid' || pass=='Invalid' || msg=='Invalid')
    {
       return false;
    }

    if(department != 1)
    {
        var role = 'front user';
    }
    else {
        var role = 'admin';
    }
// alert(role);
	//ajax call for person DONATION
	 $.ajax({

	url:"/HospitalDonation/controller/userDetail.php",	
	method:"POST",
	data: {
		userName:userName,
        role:role,
		userNic:userNic,
		designation:designation,
        department:department,						
	
        username:username,
        password:password,
        userEmail:userEmail, 
		submitu:submitu
																					// ../../controller/donorPersonDetail.php
		},
	success: function(data){
		
		$('#resultuser').html(data);
		$('#adduser')[0].reset();
	}
	
});

});  //end of donor person add donation


$(document).ready(function(){ 
    // donor person email,contact,nic
        $('#userEmail').keyup(function(){
            if(!validateEmailu()){
                //if the email is not validated set border red
                $('#userEmail').css("border","2px solid red");
                $('#emailMsgU').css('color', 'red');
                $("#emailMsgU").html('Invalid');
            } else {
                //if email is validated set border green
                $('#userEmail').css("border","2px solid green");
                $('#emailMsgU').css('color', 'green');
                //set label
                $("#emailMsgU").html('Valid');
                
            }
    
        });

        $('#userNic').keyup(function(e) {
            if (validateNicu()) {
                $('#nicU').html('Valid');
                $('#nicU').css('color', 'green');
                $('#userNic').css("border","2px solid green");
                
            }
            else {
                $('#nicU').html('Invalid');
                $('#nicU').css('color', 'red');
                $('#userNic').css("border","2px solid red");
            }
        });

    });

    function validateEmailu(){

		// get value of input email
		var email=$("#userEmail").val();
       
		// use reular e)xpressio
		 var reg = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/
		 if(reg.test(email)){
		 	return true;
		 }else{
		 	return false;
		 }

}
function validateNicu(){
    var a = $('#userNic').val();
    var filter = /^([0-9]{9}[x|X|v|V]|[0-9]{12})$/mg;
    if (filter.test(a)) {
        return true;
    }
    else {
        return false;
    }
    
}

$(function(){	
    //add dynamic fields to members
    
        $('#add').click(function(){
            
            var count=$("#dynamicfield input").length;
            var requested=parseInt($("#qty").val(),10);
    
            if(requested>=count){
                $('#teamTbody').empty();
                
                for(y=count;y<requested;y++){
    
                
                var $ct=$('<tr id="rowA'+y+'"><td> <input class="titleteam sizeinput" id="m'+y+'" onkeyup="this.value=this.value.toUpperCase();"/>  </td> <td> <input class="memberName sizeinput" id="m'+y+'" onkeyup="this.value=this.value.toUpperCase();"/>  </td> <td><input class = "nic sizeinput" id="mn'+y+'" onkeyup="this.value=this.value.toUpperCase();"/> <span class = "nicchk" id = "ck'+y+'"></span> </td> <td> <input class = "address1 sizeinput" id="maa'+y+'" onkeyup="this.value=this.value.toUpperCase();"/> </td> <td> <input class = "address2 sizeinput" id="ma'+y+'" onkeyup="this.value=this.value.toUpperCase();"/> </td> <td> <input class = "contact sizeinput" id="mc'+y+'" maxlength = 10/> </td> <td>  <input class ="email sizeinput" id="c'+y+'" type = "email" name = "email" onkeyup="this.value=this.value.toUpperCase();"/> <span class = "msgt" id="s'+y+'"></span> </td> <td><button type="button" name="remove" id="'+y+'" class="btn btn-danger btn_remove2">X</button></td></tr>').attr({
                        type:'text'
                    });
                    
                    $('#teamTbody').append($ct);
                  
                    }
    
    
            } else if(requested<count){
    
                var x =requested-1;
                $('#teamTbody td:gt("+x+")').remove();            
            }
            });
        
        $(document).on('click', '.btn_remove2', function(){
            var button_id = $(this).attr("id"); 
            $('#rowA'+button_id+'').remove();
        });
        });
    
    //end of team members field dynamically adding 1


    $("#active").click(function(){  //DONATION PAGE CHECKBOX FOR DONOR TEAM
	
        if($(this).is(":checked")){
            $("#donorTeamInfo").show();
            $("#donorinfo").hide();
            $("#teamDetails").show();
            $("#donorDetailfirst").hide();
            
    
        }else
            {
        
            $("#donorTeamInfo").hide();
            $("#donorinfo").show();
            $("#donorDetailfirst").show();
            $("#teamDetails").hide();
        }
    });   //end of #active function
      //end of #active function


    // DONOR TEAM-ADD DONATION-SUBMIT TO DONOR TABLE VIA AJAX
$("#donorTeamInfo form").on("click","#subD", function(e){		//DONOR TEAM ADD
	e.preventDefault();
    var title = [];
	var donMemberName = [];
	var donNic = [];
	var donAddress1 = [];
	var donAddress2 = [];
	var donContact = [];
	var donEmail = [];

    $('.titleteam').each(function(){
        title.push($(this).val());
    
            });
	
	$('.memberName').each(function(){
	donMemberName.push($(this).val());

		});
	$('.nic').each(function(){
	donNic.push($(this).val());

		});
	$('.address1').each(function(){
	donAddress1.push($(this).val());

		});
	$('.address2').each(function(){
	donAddress2.push($(this).val());

		});
	$('.contact').each(function(){
	donContact.push($(this).val());

		});
	$('.email').each(function(){
	donEmail.push($(this).val());

		});
	
	var donTeamName = $('#teamName').val();
    var donAddress = $('#teamAddress').val();
    var donTContact = $('#teamcontact').val();
    var donTEmail = $('#teamemail').val();
	var id =$('#qty').val();
	var submitD = $("#subD").val();

    if($('.nic').val()=='')
{
    alert('Enter Nic');
    $('.nic').css('border-color', '#cc0000');
    // itemName = "";
}
else{
    $('.nic').css('border-color', '');
    // itemName = {};
    
}


	//ajax call for team DONATION
	 $.ajax({

	url:"/HospitalDonation/controller/donorTeamDetails.php",	
	method:"POST",
	data: {
        title:title,
		donTeamName:donTeamName,
        donAddress:donAddress,
        donTEmail:donTEmail,
        donTContact:donTContact,
        // uniqId:uniqId,
		id:id,
		donMemberName:donMemberName,
		donNic:donNic,
		donAddress1:donAddress1,
		donAddress2:donAddress2,
		donContact:donContact,
		donEmail:donEmail,
		submitD:submitD
		},
	success: function(data){
		
		$('#resultT1').html(data);
		fetch_don_data();
		// $("input").val("");
		$('#addTeam')[0].reset();
		
	}
	
});

});  //end of donor team add donation


//ADD DONOR PERSON WHEN CLICK ON ADD DONATION BUTTON

$("#donorinfo form").on("click","#subD1", function(e){		//DONOR PERSON ADD
	e.preventDefault();
	
    var title = $("input[name = 'title']:checked").val();
	var donorName = $('#donorName').val();
	var donorNic = $('#donorNic').val();
	var addressLine1 = $('#addressLine1').val();
	var addressLine2 = $('#addressLine2').val();
	var donorEmail = $('#donorEmail').val();
	var donorMobile = $('#donorMobile').val();
	var donorMobile2 = $('#donorMobile2').val();
	var submitD1 = $("#subD1").val();
    var nm = $('#nic').text();
    var phn = $('#spnPhoneStatus').text();
    var phn2 = $('#spnPhoneStatus2').text();
    var msg = $('#emailMasg').text();
    if(nm == 'Invalid' || phn== 'Invalid' || phn2=='Invalid' || msg=='Invalid')
    {
       return false;
    }
    console.log("test",title);
	//ajax call for person DONATION
	 $.ajax({

	url:"/HospitalDonation/controller/donorPersonDetail.php",	
	method:"POST",
	data: {
		donorName:donorName,
		donorNic:donorNic,
		addressLine1:addressLine1,
		addressLine2:addressLine2,
		donorMobile:donorMobile,
		 donorMobile2:donorMobile2,							
		donorEmail:donorEmail,
        title:title,
		submitD1:submitD1
																					// ../../controller/donorPersonDetail.php
		},
	success: function(data){
       
		fetch_donP_data();
		$('#resultP1').html(data);
		$('#addPerson')[0].reset();
	}
	
});

});  //end of donor person add donation


fetch_don_data();
function fetch_don_data()    //FUNCTION TO FETCH DONOR team DATA
{

$.ajax({

	url:"/HospitalDonation/controller/fetch_donor_team.php",	
	method:"POST",
	
	success:function(respons){
		
		$('#appendTeam').html(respons);	
       
	}
});
}

// fetch_all_donor()
// function fetch_all_donor()    //FUNCTION TO FETCH DONOR team DATA TO LIST
// {

// $.ajax({

// 	url:"../../controller/search_donor.php",	
// 	method:"POST",
	
// 	success:function(respons){
// 		// console.log("test");
// 		$('#searchbody').html(respons);	
// 	}
// });
// }



fetch_donP_data();
function fetch_donP_data()    //FUNCTION TO FETCH DONOR PERSON DATA
{

$.ajax({

	url:"/HospitalDonation/controller/fetch_donor_person.php",	
	method:"POST",
	
	success:function(respons){
		//$('#teamName').html(respons(teamName));
		$('#append').html(respons);	
       
	}
});
}
fetch_donPP_data();
function fetch_donPP_data()    //FUNCTION TO FETCH DONOR PERSON DATA
{

$.ajax({

	url:"/HospitalDonation/controller/sendback.php",	
	method:"POST",
	
	success:function(respons){
		//$('#teamName').html(respons(teamName));
		$('#appendP').html(respons);	
       
	}
});
}



// function fetch_all_item(page, query='')    //FUNCTION TO FETCH DONATION ITEM DATA TO LIST
// {

// $.ajax({

// 	url:"../../controller/search_item.php",	
// 	method:"POST",
//     data: {
//         page:page,
//         query:query
//     }, 
	
// 	success:function(data){
		
// 		$('#searchitem').html(data);	
// 	}
// });
// }
// fetch_all_item()
// $(document).on("click", ".page_item", function(){

//     var page = $(this).attr("id");
//     var query = $('#btn_Isearch').val();
//     fetch_all_item(page,query);

// });


// GET DONOR FOR EDIT MODE
$(document).on("click","#editdP",function(e){
	e.preventDefault();

	var editp = $(this).attr("value");
   // alert(edit);
	$.ajax({
			url:'/HospitalDonation/controller/dp_editp.php',
			type:'POST',
			data:{
				editp:editp
			},
			success:function(data)
			{
				$('#edit_viewd').html(data);
			}

		});
});
$(document).on("click","#editdPP",function(e){
	e.preventDefault();

	var editp = $(this).attr("value");
   // alert(edit);
	$.ajax({
			url:'/HospitalDonation/controller/dp_editp.php',
			type:'POST',
			data:{
				editp:editp
			},
			success:function(data)
			{
				$('#edit_viewd').html(data);
			}

		});
});
// UPDATE RECORD DONOR
$(document).on("click","#update1", function(e){
	e.stopImmediatePropagation();   //this will prevent two click events 

	var eddonorName = $('#edit_donorName').val();
	var eddonorNic = $('#edit_donorNic').val();
	var edaddressLine1 = $('#edit_addressLine1').val();
	var edaddressLine2 = $('#edit_addressLine2').val();
	var eddonorEmail = $('#edit_donorEmail').val();
	var eddonorMobile = $('#edit_donorMobile').val();
	var eddonorMobile2 = $('#edit_donorMobile2').val();
    var edit_id =$('#edit_id').val();
	var update1 = $("#update1").val();
    var nm = $('#editnic').text();
    var phn = $('#editspnPhoneStatus').text();
    var phn2 = $('#editspnPhoneStatus2').text();
    var msg = $('#editemailMasg').text();
    if(nm == 'Invalid' || phn == 'Invalid' || phn2 =='Invalid' || msg =='Invalid')
    {
       return false;
    }
    // alert(eddonorName);
	$.ajax({
			url:'/HospitalDonation/controller/donorPersonDetail.php',
			type:'POST',
			data:{
                edit_id:edit_id,
                eddonorName:eddonorName,
                eddonorNic:eddonorNic,
                edaddressLine1:edaddressLine1,
                edaddressLine2:edaddressLine2,
                eddonorMobile:eddonorMobile,
                eddonorMobile2:eddonorMobile2,							
                eddonorEmail:eddonorEmail,
                update1:update1
			},
			success:function(data)
			{
                fetch_donP_data();
				$('#showresult').html(data);
          
			}

		});
});

$(document).on("click","#deletedP",function(e){
	e.preventDefault();
if(window.confirm("Do you want delete record?")){
	var del = $(this).attr("value");
    $.ajax({
            url:'/HospitalDonation/controller/deletedonor.php',
			type:'POST',
			data:{
				del:del
			},
			success:function(data)
			{
                fetch_donP_data();
				$('#mainFormResultD').html(data);
			}
        });
} else {
    return false;
}
	
});

$(document).on("click","#editdT",function(e){
	e.preventDefault();

	var editdT = $(this).attr("value");
	
	$.ajax({
			url:'/HospitalDonation/controller/dp_editT.php',
			type:'POST',
			data:{
				editdT:editdT
			},
			success:function(data)
			{
				$('#edit_viewdT').html(data);
			}

		});
});


// update TEAM ONE BY ONE
$(document).on("click","#update2", function(e){
	e.stopImmediatePropagation();   //this will prevent two click events 
    var edteamNameT = $('#edit_teamNameT').val();
	var eddonorNameT = $('#edit_donorNameT').val();
	var eddonorNicT = $('#edit_donorNicT').val();
	var edaddressLine1T = $('#edit_addressLine1T').val();
	var edaddressLine2T = $('#edit_addressLine2T').val();
	var eddonorEmailT = $('#edit_donorEmailT').val();
	var eddonorMobileT = $('#edit_donorMobileT').val();
	// var eddonorMobile2T = $('#edit_donorMobile2T').val();
    var edit_idT =$('#edit_idT').val();
	var update2 = $("#update2").val();
    var nmT = $('#editnicT').text();
    var phnT = $('#editspnPhoneStatusT').text();
    // var phn2T = $('#editspnPhoneStatus2T').text();
    var msgT = $('#editemailMasgT').text();
    if(nmT == 'Invalid' || phnT== 'Invalid' || msgT=='Invalid')
    {
       return false;
    }
    // alert(edit_id);
	$.ajax({
			url:'/HospitalDonation/controller/donorTeamDetails.php',
			type:'POST',
			data:{
                edit_idT:edit_idT,
                edteamNameT:edteamNameT,
                eddonorNameT:eddonorNameT,
                eddonorNicT:eddonorNicT,
                edaddressLine1T:edaddressLine1T,
                edaddressLine2T:edaddressLine2T,
                eddonorMobileT:eddonorMobileT,
                //  eddonorMobile2T:eddonorMobile2T,							
                eddonorEmailT:eddonorEmailT,
                update2:update2
			},
			success:function(data)
			{
                fetch_don_data();;
				$('#showresultT').html(data);
          
			}

		});
});

$(document).on("click","#deletedT",function(e){
	e.preventDefault();
    if(window.confirm("Do you want delete record?")){
	var delT = $(this).attr("value");

    $.ajax({
        url:'/HospitalDonation/controller/deletedonor.php',
        type:'POST',
        data:{
            delT:delT
        },
        success:function(data)
        {
            fetch_don_data();
			$('#mainFormResultD').html(data);
        }
    });
} else {
return false;
}
	
});



$(document).on('click', '#item_save1', function(e){
    e.preventDefault();
   
    var request=$("#ItemTbody tr").length;
    var count = $("#itemTable tr").length;
    
var itemName = [];
var itemNamet = [];
var qty = [];
var description = [];


$('.ItemTinput').each(function(){
itemNamet.push($(this).find("option:selected").text());

    });
    $('.ItemTinput').each(function(){
        itemName.push($(this).val());
        
            });
    // $('.ItemTinput').each(function(){
    //     itemnametext.push($(this ).val());
        
    //         });
$('.ItemTinputQ').each(function(){
qty.push($(this).val());

    });
$('.ItemTdes').each(function(){
description.push($(this).val());

    });

    
// alert(itemName);
if($('.ItemTinput').val()=='')
{
    alert('Enter Item');
    $('.ItemTinput').css('border-color', '#cc0000');
    // itemName = "";
}
else{
    $('.ItemTinput').css('border-color', '');
    // itemName = {};
    
}
if($('.ItemTinput').val()!='')
{
    if($('#item_save1').text() == 'save')
    {
       
  
    if(request>=count){
        $('#itemTable').empty();
        for(t=0;t<request;t++){

    out = '<tr id = "rw_'+t+'">';
    out += '<td > <input type="hidden" name = "hidden_code[]" id = "code'+t+'" value="SC" class ="Item_code" onkeyup="this.value=this.value.toUpperCase();">SC </td>';
    out += '<td style ="display:none ;">'+itemName[t]+'<input type="hidden" name = "hidden_itemname[]" id = "hidden_item'+t+'" value = "'+itemName[t]+'" class ="Item_name" onkeyup="this.value=this.value.toUpperCase();"> </td>';
    out += '<td >'+itemNamet[t]+'<input type="hidden" name = "hidden_itemname[]" id = "hidden_item'+t+'" value = "'+itemNamet[t]+'"  onkeyup="this.value=this.value.toUpperCase();"> </td>';
    // out += '<td >'+itemnametext[t]+'<input type="hidden" name = "hidden_itemname[]" id = "hidden_item'+t+'" value = "'+itemnametext[t]+'" class ="Item_name" onkeyup="this.value=this.value.toUpperCase();"> </td>';
    out += '<td >'+qty[t]+'<input type="hidden" name = "hidden_qty[]" id = "hidden_qty'+t+'" value = "'+qty[t]+'" class ="Item_qty" onkeyup="this.value=this.value.toUpperCase();"> </td>';
    out += '<td >'+description[t]+'<input type="hidden" name = "hidden_des[]" id = "hidden_des'+t+'" value = "'+description[t]+'" class = "Item_des" onkeyup="this.value=this.value.toUpperCase();"> </td>';
    out += '<td> ';  
    out += '<button type = "button" class = "btn btn-danger remove_detailsc" id = "'+t+'" name = "del_item">Delete</button></td>';
    // out += '<td> <button type = "button" class = "btn btn-danger" id = "'+cnt+'" name = "del_item">Delete</button> </td>';
    out +='</tr>';
    $('#itemTable').append(out);  	
        }
    }
    
}  else {

var edid =$('#hidden_row_id').val();
var inm = $('#edit_Itemnamesc').val();
var cd = $('#codenamesc').val();
var qt = $('#edit_qtysc').val();
var des = $('#edit_descriptionsc').val();


alert (inm);

    // out = '<tr id = "rw_'+r+'">';
    out = '<td ><input type="hidden"class ="Item_code" name = "hidden_code" id = "code'+edid+'" value="'+cd+'" class = "Item_c" onkeyup="this.value=this.value.toUpperCase();">'+cd+' </td>';
    out += '<td>'+inm+'<input type="hidden" class ="Item_name" name = "hidden_itemname" id = "hidden_item'+edid+'" value = "'+inm+'" class = "Item_n" onkeyup="this.value=this.value.toUpperCase();" > </td>';
    out += '<td>'+qt+'<input type="hidden" class ="Item_qty" name = "hidden_qty" id = "hidden_qty'+edid+'" value = "'+qt+'" class = "Item_q" onkeyup="this.value=this.value.toUpperCase();"> </td>';
    out += '<td>'+des+'<input type="hidden" class ="Item_des" name = "hidden_des" id = "hidden_des'+edid+'" value = "'+des+'" class = "Item_d" onkeyup="this.value=this.value.toUpperCase();"> </td>';
    out += '<td id =""> <button type = "button" class = "btn btn-warning view_detailsc" id = "'+edid+'" name = "edit_item">Edit</button>';  
    out += '<button type = "button" class = "btn btn-danger remove_detailsc" id = "'+edid+'" name = "del_item">Delete</button></td>';
    // out +='</tr>';
    $('#rw_'+edid+'').append(out);
    // $('#scdv').empty();
    // $('#scdv').append('#all');
    // $('#item_save1').text('Save');
}
$('#modalDialog').modal('hide');
}

// $('#sc').hide();
});

// $('#modalDialog').on('hidden.bs.modal', function(){
//     // $(this).find('input').val('').end();
//     // $('#sc').remove();
//     $(this).find('form').remove().end();
   
// 

//VIEW TABLE ITEMS

////VIEW TABLE ITEMS

$(document).on('click', '.view_detailsc', function(){


var sc_row_id = $(this).attr("id");
//var scrow = $('#rw_'+sc_row_id+'').val();
var code = $('#code'+sc_row_id+'').val();
var item_namesc = $('#hidden_item'+sc_row_id+'').val();
var qty_sc = $('#hidden_qty'+sc_row_id+'').val();
var des_sc = $('#hidden_des'+sc_row_id+'').val();
alert(sc_row_id);


$('#scdv').empty();
bn ='<div class="labelfield">';
        bn +='<p>';
            bn +='<label for=""> Item Code: </label>';
            bn +='</p>';
            bn +='<br>';
            bn +='<p>';
            bn +='<label for=""> Item Name: </label>';
            bn +='</p>';
            bn +='<br>'; 
            bn +='<p>';
            bn +='<label for=""> Item Amount: </label>';
            bn +='</p> <br>';
            bn +='<p>';
            bn +='<label for=""> Description: </label>';
            bn +='</p>';
        bn +='</div>';
        bn +='<div class="inputfield">';
            bn +='<p>';
                bn +='<input id="codenamesc" value = "'+code+'" class = "itemCode" onkeyup="this.value=this.value.toUpperCase();"></input>';
            bn +='<select name="code_select" id="code_select" onchange="selectitemsc();">' ;
                bn +='<option value="">SI</option>';
                bn +='<option value="">SC</option>';
                bn +='<option value="">CI</option>';
                bn +='<option value="">DR</option>';
                bn +='<option value="">GI</option>';
                bn +='<option value="">FD</option>';
            bn +='</select></p>';
            bn +='<p>';
                
            bn +='<input type="text" name="edit_Itemname" id="edit_Itemnamesc" value = "'+item_namesc+'"  class = "itemnm" onkeyup="this.value=this.value.toUpperCase();"></p>';
            bn +='<p>';
                
            bn +='<input type="text" name="edit_qty" id="edit_qtysc" value = "'+qty_sc+'" class = "itemq" onkeyup="this.value=this.value.toUpperCase();"></p>';
            bn +='<p>';
                
            bn +='<input type="text" name="edit_description" id="edit_descriptionsc" value = "'+des_sc+'" class = "itemdes" onkeyup="this.value=this.value.toUpperCase();"></p>';
            bn +='</div>';
            $('#scdv').append(bn);
            
                
           
$('#hidden_row_id').val(sc_row_id);
$('#item_save1').text('Edit');
$('#modalDialog').modal('show');
$("#scdv").show();
$("#sc").hide();

});

$(document).on('click', '.remove_detailsc', function(){
var id = $(this).attr("id");
$('#rw_'+id+'').remove();
});







//SI ITEM ADDING TO FORM

$(document).on('click', '#item_save2', function(e){
    e.preventDefault();
    var ct1 = "SI";
    var request2=$("#ItemTbody1 tr").length;
    var count2 = $("#itemTable1 tr").length;
    request2+1;
    count2+1;
var itemName2 = [];
var itemNamet2 = [];
var qty2 = [];
var description2 = [];

$('.ItemTinput2').each(function(){
itemName2.push($(this).val());

    });
$('.ItemTinput2').each(function(){
itemNamet2.push($(this).find("option:selected").text());
        
});
$('.ItemTinputQ2').each(function(){
qty2.push($(this).val());

    });
$('.ItemTdes2').each(function(){
description2.push($(this).val());

    });
// alert(itemName2);
if($('.ItemTinput2').val()=='')
{
    alert('Enter Item');
    $('.ItemTinput2').css('border-color', '#cc0000');
    itemName2 = {};
}
else{
    $('.ItemTinput2').css('border-color', '');
    
    
}
if($('.ItemTinput2').val()!='')
{

if($('#item_save2').text() == 'save')
{
   

    if(request2>count2){
        
        for(t=count2;t<request2;t++){

    
    out2 = '<tr id = "rwi_'+t+'">';
    out2 += '<td ><input type="hidden" class ="Item_code" name = "hidden_code[]" id = "codesi'+t+'" value = "'+ct1+'"  class="Item_ci" onkeyup="this.value=this.value.toUpperCase();"> '+ct1+'</td>';
    out2 += '<td style ="display:none ;">'+itemName2[t]+'<input type="hidden" name = "hidden_itemname[]" id = "hidden_item'+t+'" value = "'+itemName2[t]+'" class ="Item_name" onkeyup="this.value=this.value.toUpperCase();"> </td>';
    out2 += '<td >'+itemNamet2[t]+'<input type="hidden"  name = "hidden_itemname" id = "hidden_itemsi'+t+'" value = "'+itemName2[t]+'" class="Item_ni" onkeyup="this.value=this.value.toUpperCase();"> </td>';
    out2 += '<td >'+qty2[t]+'<input type="hidden" class ="Item_qty" name = "hidden_qty" id = "hidden_qtysi'+t+'" value = "'+qty2[t]+'" class="Item_qi" onkeyup="this.value=this.value.toUpperCase();"> </td>';
    out2 += '<td >'+description2[t]+'<input type="hidden" class ="Item_des" name = "hidden_des" id = "hidden_dessi'+t+'" value = "'+description2[t]+'" class="Item_di" onkeyup="this.value=this.value.toUpperCase();"> </td>';
    out2 += '<td>   <button type = "button" class = "btn btn-danger remove_detailsi" id = "'+t+'" name = "del_item">Delete</button> </td>';
    // out += '<td> <button type = "button" class = "btn btn-danger" id = "'+cnt+'" name = "del_item">Delete</button> </td>';
    out2+='</tr>';

    $('#itemTable1').append(out2);
    // $('#SIFRM')[0].reset();
        }
    }

}else {

var edid_si = $('#hidden_row_id2').val();
var inm_si = $('#edit_ItemnameSI').val();
var cd_si = $('#codenameSI').val();
var qt_si = $('#edit_qtySI').val();
var des_si = $('#edit_descriptionSI').val();


 $('.testing2').each(function(){
edid_si.push([this.value]);

	});



 $('.itemCode').each(function(){
cd_si.push([this.value]);

    });
$('.itemnm').each(function(){
inm_si.push([this.value]);

    });
$('.itemq').each(function(){
qt_si.push([this.value]);

    });
$('.itemdes').each(function(){
des_si.push([this.value]);

    });
alert (inm_si);
// $('#rwi_'+edid_si+'').empty();
    // out = '<tr id = "rw_'+r+'">';
    out = '<td><input type="hidden" class ="Item_code" name = "hidden_code" id = "codesi'+edid_si+'" value="'+cd_si+'" class = "Item_ci" onkeyup="this.value=this.value.toUpperCase();">'+cd_si+' </td>';
    out += '<td>'+inm_si+'<input type="hidden" class ="Item_name" name = "hidden_itemname" id = "hidden_itemsi'+edid_si+'" value = "'+inm_si+'" class = "Item_ni" onkeyup="this.value=this.value.toUpperCase();"> </td>';
    out += '<td>'+qt_si+'<input type="hidden" class ="Item_qty" name = "hidden_qty" id = "hidden_qtysi'+edid_si+'" value = "'+qt_si+'" class = "Item_qi" onkeyup="this.value=this.value.toUpperCase();" > </td>';
    out += '<td>'+des_si+'<input type="hidden" class ="Item_des" name = "hidden_des" id = "hidden_dessi'+edid_si+'" value = "'+des_si+'" class = "Item_di" onkeyup="this.value=this.value.toUpperCase();"> </td>';
    out += '<td> <button type = "button" class = "btn btn-warning view_detailsi" id = "'+edid_si+'" name = "edit_item">Edit</button>';  
    out += '<button type = "button" class = "btn btn-danger remove_detailsi" id = "'+edid_si+'" name = "del_item">Delete</button></td>';
    // out +='</tr>';
    $('#rwi_'+edid_si+'').append(out);
}


$('#modalDialog1').modal('hide');
}

});

$(document).on('click', '.view_detailsi', function(){


var si_row_id = $(this).attr("id");
var codesi = $('#codesi'+si_row_id+'').val();
var item_namesi = $('#hidden_itemsi'+si_row_id+'').val();
var qty_si = $('#hidden_qtysi'+si_row_id+'').val();
var des_si = $('#hidden_dessi'+si_row_id+'').val();
// alert(item_namesi);


$('#sidv').empty();
bn ='<div class="labelfield">';
        bn +='<p>';
            bn +='<label for=""> Item Code: </label>';
            bn +='</p>';
            bn +='<br>';
            bn +='<p>';
            bn +='<label for=""> Item Name: </label>';
            bn +='</p>';
            bn +='<br>'; 
            bn +='<p>';
            bn +='<label for=""> Item Amount: </label>';
            bn +='</p> <br>';
            bn +='<p>';
            bn +='<label for=""> Description: </label>';
            bn +='</p>';
        bn +='</div>';
        bn +='<div class="inputfield">';
            bn +='<p>';
                bn +='<input id="codenameSI" value = "'+codesi+'" class = "itemCode" onkeyup="this.value=this.value.toUpperCase();"></input>';
            bn +='<select name="code_select" id="code_select1" onchange="selectitemsi();">' ;
                bn +='<option value="">SI</option>';
                bn +='<option value="">SC</option>';
                bn +='<option value="">CI</option>';
                bn +='<option value="">DR</option>';
                bn +='<option value="">GI</option>';
                bn +='<option value="">FD</option>';
            bn +='</select></p>';
            bn +='<p>';
                
            bn +='<input type="text" name="edit_Itemname" id="edit_ItemnameSI" value = "'+item_namesi+'"  class = "itemnm" onkeyup="this.value=this.value.toUpperCase();"></p>';
            bn +='<p>';
                
            bn +='<input type="text" name="edit_qty" id="edit_qtySI" value = "'+qty_si+'" class = "itemq" onkeyup="this.value=this.value.toUpperCase();"></p>';
            bn +='<p>';
                
            bn +='<input type="text" name="edit_description" id="edit_descriptionSI" value = "'+des_si+'" class = "itemdes" onkeyup="this.value=this.value.toUpperCase();"></p>';
            bn +='</div>';
            $('#sidv').append(bn);
            // $('#all').html('');

// $('#Im'+sc_row_id+'').val(item_namesc);
// $('#codename').val(code);
// $('#Iq'+sc_row_id+'').val(qty_sc);
// $('#Id'+sc_row_id+'').val(des_sc);
$('#hidden_row_id2').val(si_row_id);
$('#item_save2').text('Edit');
$('#modalDialog1').modal('show');
$("#sidv").show();
$("#si").hide();
});

$(document).on('click', '.remove_detailsi', function(){
var id = $(this).attr("id");
$('#rwi_'+id+'').remove();
});





//CI ITEM ADDING TO FOERM
$('#item_save3').on('click',function(){
    var ct2 = "CI";
    var request3=$("#ItemTbody2 tr").length;
    var count3 = $("#itemTable2 tr").length;
var itemName3 = [];
var itemNamet3 = [];
var qty3 = [];
var description3 = [];

$('.ItemTinput3').each(function(){
itemName3.push([this.value]);

    });
    $('.ItemTinput3').each(function(){
        itemNamet3.push($(this).find("option:selected").text());
                
        });

$('.ItemTinputQ3').each(function(){
qty3.push([this.value]);

    });
$('.ItemTdes3').each(function(){
description3.push([this.value]);

    });

if($('.ItemTinput3').val()=='')
{
    alert('Enter Item');
    $('.ItemTinput3').css('border-color', '#cc0000');
    itemName3 = {};
}
else{
    $('.ItemTinput3').css('border-color', '');
    
    
}
if($('.ItemTinput3').val()!='')
{

if($('#item_save3').text() == 'save')
{

if(request3>=count3){
        
        for(t=count3;t<request3;t++){


    
    out3 = '<tr id = "rwc_'+t+'">';
    out3 += '<td ><input type="hidden" name = "hidden_code[]" id = "codeci'+t+'" value = "'+ct2+'" class ="Item_code" onkeyup="this.value=this.value.toUpperCase();"> '+ct2+'</td>';
    out3 += '<td style ="display:none ;">'+itemName3[t]+'<input type="hidden" name = "hidden_itemname[]" id = "hidden_item'+t+'" value = "'+itemName3[t]+'" class ="Item_name" onkeyup="this.value=this.value.toUpperCase();"> </td>';
    out3 += '<td >'+itemNamet3[t]+'<input type="hidden" name = "hidden_itemname[]" id = "hidden_itemci'+t+'" value = "'+itemName3[t]+'" onkeyup="this.value=this.value.toUpperCase();"> </td>';
    out3 += '<td >'+qty3[t]+'<input type="hidden" name = "hidden_qty[]" id = "hidden_qtyci'+t+'" value = "'+qty3[t]+'" class ="Item_qty" onkeyup="this.value=this.value.toUpperCase();"> </td>';
    out3 += '<td >'+description3[t]+'<input type="hidden" name = "hidden_des[]" id = "hidden_desci'+t+'" value = "'+description3[t]+'" class ="Item_des" onkeyup="this.value=this.value.toUpperCase();"> </td>';
    out3 += '<td>   <button type = "button" class = "btn btn-danger remove_detailci" id = "'+t+'" name = "del_item">Delete</button> </td>';
    // out += '<td> <button type = "button" class = "btn btn-danger" id = "'+cnt+'" name = "del_item">Delete</button> </td>';
    out3+='</tr>';

    $('#itemTable2').append(out3);
    
}

}
}else {

var edid_ci = $('#hidden_row_id3').val();
var inm_ci = $('#edit_ItemnameCI').val();
var cd_ci = $('#codenameCI').val();
var qt_ci = $('#edit_qtyCI').val();
var des_ci = $('#edit_descriptionCI').val();



alert (inm_ci);
    // out = '<tr id = "rw_'+r+'">';
    out = '<td><input type="hidden" class ="Item_code" name = "hidden_code" id = "codeci'+edid_ci+'" value="'+cd_ci+'" class = "Item_cc" onkeyup="this.value=this.value.toUpperCase();">'+cd_ci+' </td>';
    out += '<td>'+inm_ci+'<input type="hidden" class ="Item_name" name = "hidden_itemname" id = "hidden_itemci'+edid_ci+'" value = "'+inm_ci+'" class = "Item_nc" onkeyup="this.value=this.value.toUpperCase();"> </td>';
    out += '<td>'+qt_ci+'<input type="hidden" class ="Item_qty" name = "hidden_qty" id = "hidden_qtyci'+edid_ci+'" value = "'+qt_ci+'" class = "Item_qc" onkeyup="this.value=this.value.toUpperCase();"> </td>';
    out += '<td>'+des_ci+'<input type="hidden" class ="Item_des" name = "hidden_des" id = "hidden_desci'+edid_ci+'" value = "'+des_ci+'" class = "Item_dc" onkeyup="this.value=this.value.toUpperCase();"> </td>';
    out += '<td> <button type = "button" class = "btn btn-warning view_detailci" id = "'+edid_ci+'" name = "edit_item">Edit</button>';  
    out += '<button type = "button" class = "btn btn-danger remove_detailci" id = "'+edid_ci+'" name = "del_item">Delete</button></td>';
    // out +='</tr>';
    $('#rwc_'+edid_ci+'').html(out);
}



$('#modalDialog2').modal('hide');
}

});

$(document).on('click', '.view_detailci', function(){


var ci_row_id = $(this).attr("id");
var codeci = $('#codeci'+ci_row_id+'').val();
var item_nameci = $('#hidden_itemci'+ci_row_id+'').val();
var qty_ci = $('#hidden_qtyci'+ci_row_id+'').val();
var des_ci = $('#hidden_desci'+ci_row_id+'').val();
alert(item_nameci);


$('#cidv').empty();
bn ='<div class="labelfield">';
        bn +='<p>';
            bn +='<label for=""> Item Code: </label>';
            bn +='</p>';
            bn +='<br>';
            bn +='<p>';
            bn +='<label for=""> Item Name: </label>';
            bn +='</p>';
            bn +='<br>'; 
            bn +='<p>';
            bn +='<label for=""> Item Amount: </label>';
            bn +='</p> <br>';
            bn +='<p>';
            bn +='<label for=""> Description: </label>';
            bn +='</p>';
        bn +='</div>';
        bn +='<div class="inputfield">';
            bn +='<p>';
                bn +='<input id="codenameCI" value = "'+codeci+'" class = "itemCode" onkeyup="this.value=this.value.toUpperCase();"></input>';
            bn +='<select name="code_select" id="code_select2" onchange="selectitemci();">' ;
                bn +='<option value="">SI</option>';
                bn +='<option value="">SC</option>';
                bn +='<option value="">CI</option>';
                bn +='<option value="">DR</option>';
                bn +='<option value="">GI</option>';
                bn +='<option value="">FD</option>';
            bn +='</select></p>';
            bn +='<p>';
                
            bn +='<input type="text" name="edit_Itemname" id="edit_ItemnameCI" value = "'+item_nameci+'"  class = "itemnm" onkeyup="this.value=this.value.toUpperCase();"></p>';
            bn +='<p>';
                
            bn +='<input type="text" name="edit_qty" id="edit_qtyCI" value = "'+qty_ci+'" class = "itemq" onkeyup="this.value=this.value.toUpperCase();"></p>';
            bn +='<p>';
                
            bn +='<input type="text" name="edit_description" id="edit_descriptionCI" value = "'+des_ci+'" class = "itemdes" onkeyup="this.value=this.value.toUpperCase();"></p>';
            bn +='</div>';
            $('#cidv').append(bn);
            // $('#all').html('');

// $('#Im'+sc_row_id+'').val(item_namesc);
// $('#codename').val(code);
// $('#Iq'+sc_row_id+'').val(qty_sc);
// $('#Id'+sc_row_id+'').val(des_sc);
$('#hidden_row_id3').val(ci_row_id);
$('#item_save3').text('Edit');
$('#modalDialog2').modal('show');
$("#cidv").show();
$("#ci").hide();
});

$(document).on('click', '.remove_detailci', function(){
var id = $(this).attr("id");
$('#rwc_'+id+'').remove();
});






$('#item_save4').on('click',function(){
    var ct3 = "DR";
    var request4=$("#ItemTbody3 tr").length;
    var count4 = $("#itemTable3 tr").length;
var itemName4 = [];
var itemNamet4 = [];
var qty4 = [];
var description4 = [];

$('.ItemTinput4').each(function(){
itemName4.push([this.value]);

    });

    $('.ItemTinput4').each(function(){
        itemNamet4.push($(this).find("option:selected").text());
                
        });
$('.ItemTinputQ4').each(function(){
qty4.push([this.value]);

    });
$('.ItemTdes4').each(function(){
description4.push([this.value]);

    });

if($('.ItemTinput4').val()=='')
{
    alert('Enter Item');
    $('.ItemTinput4').css('border-color', '#cc0000');
    itemName4 = {};
}
else{
    $('.ItemTinput4').css('border-color', '');
    
    
}
if($('.ItemTinput4').val()!='')
{

if($('#item_save4').text() == 'save')
{

if(request4>=count4){
        
        for(t=count4;t<request4;t++){


    
    out4 = '<tr id = "rwd_'+t+'">';
    out4 += '<td><input type="hidden" class ="Item_code" name = "hidden_code[]" id = "codedr'+t+'" value = "'+ct3+'" class = "Item_cd" onkeyup="this.value=this.value.toUpperCase();"> '+ct3+'</td>';
    out4 += '<td style ="display:none ;">'+itemName4[t]+'<input type="hidden" name = "hidden_itemname[]" id = "hidden_item'+t+'" value = "'+itemName4[t]+'" class ="Item_name" onkeyup="this.value=this.value.toUpperCase();"> </td>';
    out4 += '<td>'+itemNamet4[t]+'<input type="hidden"  name = "hidden_itemname[]" id = "hidden_itemdr'+t+'" value = "'+itemName4[t]+'" class = "Item_nd" onkeyup="this.value=this.value.toUpperCase();"> </td>';
    out4 += '<td>'+qty4[t]+'<input type="hidden" class ="Item_qty" name = "hidden_qty[]" id = "hidden_qtydr'+t+'" value = "'+qty4[t]+'" class = "Item_qd" onkeyup="this.value=this.value.toUpperCase();"> </td>';
    out4 += '<td>'+description4[t]+'<input type="hidden" class ="Item_des" name = "hidden_des[]" id = "hidden_desdr'+t+'" value = "'+description4[t]+'" class = "Item_dd" onkeyup="this.value=this.value.toUpperCase();"> </td>';
    out4 += '<td>   <button type = "button" class = "btn btn-danger remove_detaildr" id = "'+t+'" name = "del_item">Delete</button> </td>';
    // out += '<td> <button type = "button" class = "btn btn-danger" id = "'+cnt+'" name = "del_item">Delete</button> </td>';
    out4+='</tr>';
{/* <button type = "button" class = "btn btn-warning view_detaildr" id = "'+t+'" name = "edit_item">Edit</button> */}
    $('#itemTable3').append(out4);
    
}

}
}else {

var edid_dr = $('#hidden_row_id4').val();
var inm_dr = $('#edit_Itemnamedr').val();
var cd_dr = $('#codenamedr').val();
var qt_dr = $('#edit_qtydr').val();
var des_dr = $('#edit_descriptiondr').val();



alert (inm_dr);
    // out = '<tr id = "rw_'+r+'">';
    out = '<td ><input type="hidden"class ="Item_code" name = "hidden_code" id = "codedr'+edid_dr+'" value="'+cd_dr+'" class = "Item_cd" onkeyup="this.value=this.value.toUpperCase();">'+cd_dr+' </td>';
    out += '<td>'+inm_dr+'<input type="hidden" class ="Item_name" name = "hidden_itemname" id = "hidden_itemdr'+edid_dr+'" value = "'+inm_dr+'" class = "Item_nd" onkeyup="this.value=this.value.toUpperCase();"> </td>';
    out += '<td>'+qt_dr+'<input type="hidden" class ="Item_qty" name = "hidden_qty" id = "hidden_qtydr'+edid_dr+'" value = "'+qt_dr+'" class = "Item_qd" onkeyup="this.value=this.value.toUpperCase();"> </td>';
    out += '<td>'+des_dr+'<input type="hidden" class ="Item_des" name = "hidden_des" id = "hidden_desdr'+edid_dr+'" value = "'+des_dr+'" class = "Item_dd" onkeyup="this.value=this.value.toUpperCase();"> </td>';
    out += '<td> <button type = "button" class = "btn btn-warning view_detaildr" id = "'+edid_dr+'" name = "edit_item">Edit</button>';  
    out += '<button type = "button" class = "btn btn-danger remove_detaildr" id = "'+edid_dr+'" name = "del_item">Delete</button></td>';
    // out +='</tr>';
    $('#rwd_'+edid_dr+'').html(out);
}

$('#modalDialog3').modal('hide');
}

});

$(document).on('click', '.view_detaildr', function(){


var dr_row_id = $(this).attr("id");
var codedr = $('#codedr'+dr_row_id+'').val();
var item_namedr = $('#hidden_itemdr'+dr_row_id+'').val();
var qty_dr = $('#hidden_qtydr'+dr_row_id+'').val();
var des_dr = $('#hidden_desdr'+dr_row_id+'').val();
alert(item_namedr);


$('#drdv').empty();
bn ='<div class="labelfield">';
        bn +='<p>';
            bn +='<label for=""> Item Code: </label>';
            bn +='</p>';
            bn +='<br>';
            bn +='<p>';
            bn +='<label for=""> Item Name: </label>';
            bn +='</p>';
            bn +='<br>'; 
            bn +='<p>';
            bn +='<label for=""> Item Amount: </label>';
            bn +='</p> <br>';
            bn +='<p>';
            bn +='<label for=""> Description: </label>';
            bn +='</p>';
        bn +='</div>';
        bn +='<div class="inputfield">';
            bn +='<p>';
                bn +='<input id="codenamedr" value = "'+codedr+'" class = "itemCode" onkeyup="this.value=this.value.toUpperCase();"></input>';
            bn +='<select name="code_select" id="code_select3" onchange="selectitemdr();">' ;
                bn +='<option value="">SI</option>';
                bn +='<option value="">SC</option>';
                bn +='<option value="">CI</option>';
                bn +='<option value="">DR</option>';
                bn +='<option value="">GI</option>';
                bn +='<option value="">FD</option>';
            bn +='</select></p>';
            bn +='<p>';
                
            bn +='<input type="text" name="edit_Itemname" id="edit_Itemnamedr" value = "'+item_namedr+'"  class = "itemnm" onkeyup="this.value=this.value.toUpperCase();"></p>';
            bn +='<p>';
                
            bn +='<input type="text" name="edit_qty" id="edit_qtydr" value = "'+qty_dr+'" class = "itemq" onkeyup="this.value=this.value.toUpperCase();"></p>';
            bn +='<p>';
                
            bn +='<input type="text" name="edit_description" id="edit_descriptiondr" value = "'+des_dr+'" class = "itemdes" onkeyup="this.value=this.value.toUpperCase();"></p>';
            bn +='</div>';
            $('#drdv').append(bn);
            // $('#all').html('');

// $('#Im'+sc_row_id+'').val(item_namesc);
// $('#codename').val(code);
// $('#Iq'+sc_row_id+'').val(qty_sc);
// $('#Id'+sc_row_id+'').val(des_sc);
$('#hidden_row_id4').val(dr_row_id);
$('#item_save4').text('Edit');
$('#modalDialog3').modal('show');
$("#drdv").show();
$("#dr").hide();
});

$(document).on('click', '.remove_detaildr', function(){
var id = $(this).attr("id");
$('#rwd_'+id+'').remove();
});






$('#item_save5').on('click',function(){
    var ct5 = "GI";
    var request5=$("#ItemTbody4 tr").length;
    var count5 = $("#itemTable4 tr").length;
var itemName5 = [];
var itemNamet5 = [];
var qty5 = [];
var description5 = [];

$('.ItemTinput5').each(function(){
itemName5.push([this.value]);
});

$('.ItemTinput5').each(function(){
    itemNamet5.push($(this).find("option:selected").text());
});

$('.ItemTinputQ5').each(function(){
qty5.push([this.value]);

    });
$('.ItemTdes5').each(function(){
description5.push([this.value]);

    });

if($('.ItemTinput5').val()=='')
{
    alert('Enter Item');
    $('.ItemTinput5').css('border-color', '#cc0000');
    itemName5 = {};
}
else{
    $('.ItemTinput5').css('border-color', '');
    
    
}
if($('.ItemTinput5').val()!='')
{

if($('#item_save5').text() == 'save')
{

if(request5>=count5){
        
        for(t=count5;t<request5;t++){


    
    out5 = '<tr id = "rwg_'+t+'">';
    out5 += '<td ><input type="hidden"class ="Item_code" name = "hidden_code[]" id = "codegi'+t+'" value = "'+ct5+'" class = "Item_cg" onkeyup="this.value=this.value.toUpperCase();"> '+ct5+'</td>';
    out5 += '<td style ="display:none ;">'+itemName5[t]+'<input type="hidden" name = "hidden_itemname[]" id = "hidden_item'+t+'" value = "'+itemName5[t]+'" class ="Item_name" onkeyup="this.value=this.value.toUpperCase();"> </td>';
    out5 += '<td>'+itemNamet5[t]+'<input type="hidden"  name = "hidden_itemname[]" id = "hidden_itemgi'+t+'" value = "'+itemName5[t]+'" class = "Item_ng" onkeyup="this.value=this.value.toUpperCase();"> </td>';
    out5 += '<td>'+qty5[t]+'<input type="hidden" class ="Item_qty" name = "hidden_qty[]" id = "hidden_qtygi'+t+'" value = "'+qty5[t]+'" class = "Item_qg" onkeyup="this.value=this.value.toUpperCase();"> </td>';
    out5+= '<td>'+description5[t]+'<input type="hidden" class ="Item_des" name = "hidden_des[]" id = "hidden_desgi'+t+'" value = "'+description5[t]+'" class = "Item_dg" onkeyup="this.value=this.value.toUpperCase();"> </td>';
    out5 += '<td>   <button type = "button" class = "btn btn-danger remove_detailgi" id = "'+t+'" name = "del_item">Delete</button> </td>';
    // out += '<td> <button type = "button" class = "btn btn-danger" id = "'+cnt+'" name = "del_item">Delete</button> </td>';
    out5 +='</tr>';

    $('#itemTable4').append(out5);
    
}

}
}

else {

var edid_gi = $('#hidden_row_id5').val();
var inm_gi = $('#edit_Itemnamegi').val();
var cd_gi = $('#codenamegi').val();
var qt_gi = $('#edit_qtygi').val();
var des_gi = $('#edit_descriptiongi').val();



alert (inm_gi);
    // out = '<tr id = "rw_'+r+'">';
    out = '<td><input type="hidden" name = "hidden_code"  class ="Item_code" id = "codegi'+edid_gi+'" value="'+cd_gi+'" class = "Item_cg" onkeyup="this.value=this.value.toUpperCase();">'+cd_gi+' </td>';
    out += '<td>'+inm_gi+'<input type="hidden" class ="Item_name" name = "hidden_itemname" id = "hidden_itemgi'+edid_gi+'" value = "'+inm_gi+'" class = "Item_ng" onkeyup="this.value=this.value.toUpperCase();"> </td>';
    out += '<td>'+qt_gi+'<input type="hidden" class ="Item_qty" name = "hidden_qty" id = "hidden_qtygi'+edid_gi+'" value = "'+qt_gi+'" class = "Item_qg" onkeyup="this.value=this.value.toUpperCase();"> </td>';
    out += '<td>'+des_gi+'<input type="hidden" class ="Item_des" name = "hidden_des" id = "hidden_desgi'+edid_gi+'" value = "'+des_gi+'" class = "Item_dg" onkeyup="this.value=this.value.toUpperCase();"> </td>';
    out += '<td> <button type = "button" class = "btn btn-warning view_detailgi" id = "'+edid_gi+'" name = "edit_item">Edit</button>';  
    out += '<button type = "button" class = "btn btn-danger remove_detailgi" id = "'+edid_gi+'" name = "del_item">Delete</button></td>';
    // out +='</tr>';
    $('#rwg_'+edid_gi+'').html(out);
}

$('#modalDialog4').modal('hide');
}

});

$(document).on('click', '.view_detailgi', function(){


var gi_row_id = $(this).attr("id");
var codegi = $('#codegi'+gi_row_id+'').val();
var item_namegi = $('#hidden_itemgi'+gi_row_id+'').val();
var qty_gi = $('#hidden_qtygi'+gi_row_id+'').val();
var des_gi = $('#hidden_desgi'+gi_row_id+'').val();
alert(item_namegi);


$('#gidv').empty();
bn ='<div class="labelfield">';
        bn +='<p>';
            bn +='<label for=""> Item Code: </label>';
            bn +='</p>';
            bn +='<br>';
            bn +='<p>';
            bn +='<label for=""> Item Name: </label>';
            bn +='</p>';
            bn +='<br>'; 
            bn +='<p>';
            bn +='<label for=""> Item Amount: </label>';
            bn +='</p> <br>';
            bn +='<p>';
            bn +='<label for=""> Description: </label>';
            bn +='</p>';
        bn +='</div>';
        bn +='<div class="inputfield">';
            bn +='<p>';
                bn +='<input id="codenamegi" value = "'+codegi+'" class = "itemCode" onkeyup="this.value=this.value.toUpperCase();"></input>';
            bn +='<select name="code_select" id="code_select4" onchange="selectitemgi();">' ;
                bn +='<option value="">SI</option>';
                bn +='<option value="">SC</option>';
                bn +='<option value="">CI</option>';
                bn +='<option value="">DR</option>';
                bn +='<option value="">GI</option>';
                bn +='<option value="">FD</option>';
            bn +='</select></p>';
            bn +='<p>';
                
            bn +='<input type="text" name="edit_Itemname" id="edit_Itemnamegi" value = "'+item_namegi+'"  class = "itemnm" onkeyup="this.value=this.value.toUpperCase();"></p>';
            bn +='<p>';
                
            bn +='<input type="text" name="edit_qty" id="edit_qtygi" value = "'+qty_gi+'" class = "itemq" onkeyup="this.value=this.value.toUpperCase();"></p>';
            bn +='<p>';
                
            bn +='<input type="text" name="edit_description" id="edit_descriptiongi" value = "'+des_gi+'" class = "itemdes" onkeyup="this.value=this.value.toUpperCase();"></p>';
            bn +='</div>';
            $('#gidv').append(bn);
            // $('#all').html('');

// $('#Im'+sc_row_id+'').val(item_namesc);
// $('#codename').val(code);
// $('#Iq'+sc_row_id+'').val(qty_sc);
// $('#Id'+sc_row_id+'').val(des_sc);
$('#hidden_row_id5').val(gi_row_id);
$('#item_save5').text('Edit');
$('#modalDialog4').modal('show');
$("#gidv").show();
$("#gi").hide();
});

$(document).on('click', '.remove_detailgi', function(){
var id = $(this).attr("id");
$('#rwg_'+id+'').remove();
});







$('#item_save6').on('click',function(){
    var ct6 = "FD";
    var request6=$("#ItemTbody5 tr").length;
    var count6 = $("#itemTable5 tr").length;
var itemName6 = [];
var itemNamet6 = [];
var qty6 = [];
var description6 = [];

$('.ItemTinput6').each(function(){
itemName6.push([this.value]);
});

$('.ItemTinput6').each(function(){
    itemNamet6.push($(this).find("option:selected").text());
});

$('.ItemTinputQ6').each(function(){
qty6.push([this.value]);

    });
$('.ItemTdes6').each(function(){
description6.push([this.value]);

    });

if($('.ItemTinput6').val()=='')
{
    alert('Enter Item');
    $('.ItemTinput6').css('border-color', '#cc0000');
    itemName6 = {};
}
else{
    $('.ItemTinput6').css('border-color', '');
    
    
}
if($('.ItemTinput6').val()!='')
{

if($('#item_save6').text() == 'save')
{

if(request6>=count6){
        
        for(t=count6;t<request6;t++){


    
    out6 = '<tr id = "rws_'+t+'">';
    out6 += '<td><input type="hidden" class ="Item_code" name = "hidden_code[]" id = "codefd'+t+'" value = "'+ct6+'" class = "Item_cf" onkeyup="this.value=this.value.toUpperCase();"> '+ct6+'</td>';
    out6 += '<td style ="display:none ;">'+itemName6[t]+'<input type="hidden" name = "hidden_itemname[]" id = "hidden_item'+t+'" value = "'+itemName6[t]+'" class ="Item_name" onkeyup="this.value=this.value.toUpperCase();"> </td>';
    out6 += '<td>'+itemNamet6[t]+'<input type="hidden"  name = "hidden_itemname[]" id = "hidden_itemfd'+t+'" value = "'+itemName6[t]+'" class = "Item_nf" onkeyup="this.value=this.value.toUpperCase();"> </td>';
    out6 += '<td>'+qty6[t]+'<input type="hidden" class ="Item_qty" name = "hidden_qty[]" id = "hidden_qtyfd'+t+'" value = "'+qty6[t]+'" class = "Item_qf" onkeyup="this.value=this.value.toUpperCase();"> </td>';
    out6+= '<td>'+description6[t]+'<input type="hidden" class ="Item_des" name = "hidden_des[]" id = "hidden_desfd'+t+'" value = "'+description6[t]+'" class = "Item_df" onkeyup="this.value=this.value.toUpperCase();"> </td>';
    out6 += '<td>   <button type = "button" class = "btn btn-danger remove_detailfd" id = "'+t+'" name = "del_item">Delete</button> </td>';
    // out += '<td> <button type = "button" class = "btn btn-danger" id = "'+cnt+'" name = "del_item">Delete</button> </td>';
    out6 +='</tr>';

    $('#itemTable5').append(out6);
    
}

}
}

else {

var edid_fd = $('#hidden_row_id6').val();
var inm_fd = $('#edit_Itemnamefd').val();
var cd_fd = $('#codenamefd').val();
var qt_fd = $('#edit_qtyfd').val();
var des_fd = $('#edit_descriptionfd').val();


alert (inm_fd);
    // out = '<tr id = "rw_'+r+'">';
    out = '<td ><input type="hidden" name = "hidden_code"class ="Item_code" id = "codefd'+edid_fd+'" value="'+cd_fd+'" class = "Item_cf" onkeyup="this.value=this.value.toUpperCase();">'+cd_fd+' </td>';
    out += '<td>'+inm_fd+'<input type="hidden" class ="Item_name" name = "hidden_itemname" id = "hidden_itemfd'+edid_fd+'" value = "'+inm_fd+'" class = "Item_nf" onkeyup="this.value=this.value.toUpperCase();"> </td>';
    out += '<td>'+qt_fd+'<input type="hidden" class ="Item_qty" name = "hidden_qty" id = "hidden_qtyfd'+edid_fd+'" value = "'+qt_fd+'" class = "Item_qf" onkeyup="this.value=this.value.toUpperCase();"> </td>';
    out += '<td>'+des_fd+'<input type="hidden" class ="Item_des" name = "hidden_des" id = "hidden_desfd'+edid_fd+'" value = "'+des_fd+'" class = "Item_df" onkeyup="this.value=this.value.toUpperCase();"> </td>';
    out += '<td> <button type = "button" class = "btn btn-warning view_detailfd" id = "'+edid_fd+'" name = "edit_item">Edit</button>';  
    out += '<button type = "button" class = "btn btn-danger remove_detailfd" id = "'+edid_fd+'" name = "del_item">Delete</button></td>';
    // out +='</tr>';
    $('#rws_'+edid_fd+'').html(out);
    
}

$('#modalDialog5').modal('hide');
}

});

$(document).on('click', '.view_detailfd', function(){

var fd_row_id = $(this).attr("id");
var codefd = $('#codefd'+fd_row_id+'').val();
var item_namefd = $('#hidden_itemfd'+fd_row_id+'').val();
var qty_fd = $('#hidden_qtyfd'+fd_row_id+'').val();
var des_fd = $('#hidden_desfd'+fd_row_id+'').val();
alert(item_namefd);


$('#fddv').html("");
bn ='<div class="labelfield">';
        bn +='<p>';
            bn +='<label for=""> Item Code: </label>';
            bn +='</p>';
            bn +='<br>';
            bn +='<p>';
            bn +='<label for=""> Item Name: </label>';
            bn +='</p>';
            bn +='<br>'; 
            bn +='<p>';
            bn +='<label for=""> Item Amount: </label>';
            bn +='</p> <br>';
            bn +='<p>';
            bn +='<label for=""> Description: </label>';
            bn +='</p>';
        bn +='</div>';
        bn +='<div class="inputfield">';
            bn +='<p>';
                bn +='<input id="codenamefd" value = "'+codefd+'" class = "itemCode" onkeyup="this.value=this.value.toUpperCase();"></input>';
            bn +='<select name="code_select" id="code_select5" onchange="selectitemfd();">' ;
                bn +='<option value="">SI</option>';
                bn +='<option value="">SC</option>';
                bn +='<option value="">CI</option>';
                bn +='<option value="">DR</option>';
                bn +='<option value="">GI</option>';
                bn +='<option value="">FD</option>';
            bn +='</select></p>';
            bn +='<p>';
                
            bn +='<input type="text" name="edit_Itemname" id="edit_Itemnamefd" value = "'+item_namefd+'"  class = "itemnm" onkeyup="this.value=this.value.toUpperCase();"></p>';
            bn +='<p>';
                
            bn +='<input type="text" name="edit_qty" id="edit_qtyfd" value = "'+qty_fd+'" class = "itemq" onkeyup="this.value=this.value.toUpperCase();"></p>';
            bn +='<p>';
                
            bn +='<input type="text" name="edit_description" id="edit_descriptionfd" value = "'+des_fd+'" class = "itemdes" onkeyup="this.value=this.value.toUpperCase();"></p>';
            bn +='</div>';
            $('#fddv').html(bn);
            // $('#all').html('');

// $('#Im'+sc_row_id+'').val(item_namesc);
// $('#codename').val(code);
// $('#Iq'+sc_row_id+'').val(qty_sc);
// $('#Id'+sc_row_id+'').val(des_sc);
$('#hidden_row_id6').val(fd_row_id);
$('#item_save6').text('Edit');
$('#modalDialog5').modal('show');
$("#fddv").show();
$("#fd").hide();

});

$(document).on('click', '.remove_detailfd', function(){
var id = $(this).attr("id");
$('#rws_'+id+'').remove();
});

// SAVE DONATIONS WITH ITEMS
$(document).on("click","#Lsaved", function(e){		
e.preventDefault();


var allCode = [];
var allItemName = [];
var allQty = [];
var allDes = [];


$('.Item_code').each(function(){
    allCode.push($(this).val());
        });

$('.Item_name').each(function(){
allItemName.push($(this).val());
    });

    $('.Item_qty').each(function(){
        allQty.push($(this).val());
            });
            $('.Item_des').each(function(){
                allDes.push($(this).val());
                    });

var saveBtn = $('#Lsaved').val();
var tablename = $('#donName').val();
var tableteamname = $('#donTeam').val();


var check = $('#active').is(':checked');

if(check == true)
{
    var check = "done";
} else {
    var check = "fail";
}					
    
// alert(tableteamname);
//ajax call 
$.ajax({

url:"/HospitalDonation/controller/donateItem.php",	
method:"POST",
data: {
    allCode:allCode,
    allItemName:allItemName,
    allQty:allQty,
    allDes:allDes,
    tablename:tablename,
    tableteamname:tableteamname,
    check:check,
    
    saveBtn:saveBtn
    },
success: function(data){
    // $('#mainFormResultD').empty();
    $('#mainFormResultD').html(data);

    $("#itemTable").text("");
        $("#itemTable1").text("");
        $("#itemTable2").text("");
        $("#itemTable3").text("");
        $("#itemTable4").text("");
        $("#itemTable5").text("");
    $('#itemlistd')[0].reset();
    
    
}


}); 
}); 

// SAVE DONATIONS in list WITH ITEMS
$(document).on("click","#LsavedList", function(e){		
    e.preventDefault();
    
    
    var allCode = [];
    var allItemName = [];
    var allQty = [];
    var allDes = [];
    
    
    $('.Item_code').each(function(){
        allCode.push($(this).val());
            });
    
    $('.Item_name').each(function(){
    allItemName.push($(this).val());
        });
    
        $('.Item_qty').each(function(){
            allQty.push($(this).val());
                });
                $('.Item_des').each(function(){
                    allDes.push($(this).val());
                        });
    
    var saveBtnlist = $('#LsavedList').val();
    var defaultname = $('#donnameL').val();
    
    
    $.ajax({
    
    url:"/HospitalDonation/controller/donateItem.php",	
    method:"POST",
    data: {
        allCode:allCode,
        allItemName:allItemName,
        allQty:allQty,
        allDes:allDes,
        defaultname:defaultname,
        saveBtnlist:saveBtnlist
        
        },
    success: function(data){
        // $('#mainFormResultD').html("");
        $('#mainFormResultDs').html(data);
    
        // $("#itemTable").find("tr:gt(0)").remove();
        $("#itemTable").text("");
        $("#itemTable1").text("");
        $("#itemTable2").text("");
        $("#itemTable3").text("");
        $("#itemTable4").text("");
        $("#itemTable5").text("");
        $('#itemlistds')[0].reset();
        
        
    }
    
    
    }); 

    }); 

   

// VALIDATIONS

$(document).ready(function(){ 
// donor person email,contact,nic
	$('#donorEmail').keyup(function(){
		if(!validateEmail()){
			//if the email is not validated set border red
			$('#donorEmail').css("border","2px solid red");
            $('#emailMsg').css('color', 'red');
			$("#emailMsg").html('Invalid');
		} else {
			//if email is validated set border green
			$('#donorEmail').css("border","2px solid green");
            $('#emailMsg').css('color', 'green');
			//set label
			$("#emailMsg").html('Valid');
			
		}

	});

    $('#edit_donorEmail').keyup(function(){
		if(!validateEmaile()){
			//if the email is not validated set border red
			$('#edit_donorEmail').css("border","2px solid red");
            $('#editemailMsg').css('color', 'red');
			$("#editemailMsg").html('Invalid');
		} else {
			//if email is validated set border green
			$('#edit_donorEmail').css("border","2px solid green");
            $('#editemailMsg').css('color', 'green');
			//set label
			$("#editemailMsg").html('Valid');
			
		}

	});

    $('#edit_donorEmailT').keyup(function(){
		if(!validateEmailT()){
			//if the email is not validated set border red
			$('#edit_donorEmailT').css("border","2px solid red");
            $('#editemailMsgT').css('color', 'red');
			$("#editemailMsgT").html('Invalid');
		} else {
			//if email is validated set border green
			$('#edit_donorEmailT').css("border","2px solid green");
            $('#editemailMsgT').css('color', 'green');
			//set label
			$("#editemailMsgT").html('Valid');
			
		}

	});

    $('#donorMobile').keyup(function(e) {
        if (validateContact()) {
            $('#spnPhoneStatus').html('Valid');
            $('#spnPhoneStatus').css('color', 'green');
            $('#donorMobile').css("border","2px solid green");
            
        }
        else {
            $('#spnPhoneStatus').html('Invalid');
            $('#spnPhoneStatus').css('color', 'red');
            $('#donorMobile').css("border","2px solid red");
        }
    });
    $('#edit_donorMobile').keyup(function(e) {
        if (validateContacte()) {
            $('#editspnPhoneStatus').html('Valid');
            $('#editspnPhoneStatus').css('color', 'green');
            $('#edit_donorMobile').css("border","2px solid green");
            
        }
        else {
            $('#editspnPhoneStatus').html('Invalid');
            $('#editspnPhoneStatus').css('color', 'red');
            $('#edit_donorMobile').css("border","2px solid red");
        }
    });

    $('#edit_donorMobileT').keyup(function(e) {
        if (validateContactT()) {
            $('#editspnPhoneStatusT').html('Valid');
            $('#editspnPhoneStatusT').css('color', 'green');
            $('#edit_donorMobileT').css("border","2px solid green");
            
        }
        else {
            $('#editspnPhoneStatusT').html('Invalid');
            $('#editspnPhoneStatusT').css('color', 'red');
            $('#edit_donorMobileT').css("border","2px solid red");
        }
    });

    $('#donorMobile2').keyup(function(e) {
        if (validateContactA()) {
            $('#spnPhoneStatus2').html('Valid');
            $('#spnPhoneStatus2').css('color', 'green');
            $('#donorMobile2').css("border","2px solid green");
            
        }
        else {
            $('#spnPhoneStatus2').html('Invalid');
            $('#spnPhoneStatus2').css('color', 'red');
            $('#donorMobile2').css("border","2px solid red");
        }
    });

    $('#edit_donorMobile2').keyup(function(e) {
        if (validateContactAe()) {
            $('#editspnPhoneStatus2').html('Valid');
            $('#editspnPhoneStatus2').css('color', 'green');
            $('#edit_donorMobile2').css("border","2px solid green");
            
        }
        else {
            $('#editspnPhoneStatus2').html('Invalid');
            $('#editspnPhoneStatus2').css('color', 'red');
            $('#edit_donorMobile2').css("border","2px solid red");
        }
    });
    $('#edit_donorMobile2T').keyup(function(e) {
        if (validateContactAT()) {
            $('#editspnPhoneStatus2T').html('Valid');
            $('#editspnPhoneStatus2T').css('color', 'green');
            $('#edit_donorMobile2T').css("border","2px solid green");
            
        }
        else {
            $('#editspnPhoneStatus2T').html('Invalid');
            $('#editspnPhoneStatus2T').css('color', 'red');
            $('#edit_donorMobile2T').css("border","2px solid red");
        }
    });

    $('#donorNic').keyup(function(e) {
        if (validateNic()) {
            $('#nic').html('Valid');
            $('#nic').css('color', 'green');
            $('#donorNic').css("border","2px solid green");
            
        }
        else {
            $('#nic').html('Invalid');
            $('#nic').css('color', 'red');
            $('#donorNic').css("border","2px solid red");
        }
    });



$('#edit_donorNic').keyup(function(e) {
    if (validateNice()) {
        $('#editnic').html('Valid');
        $('#editnic').css('color', 'green');
        $('#edit_donorNic').css("border","2px solid green");
        
    }
    else {
        $('#editnic').html('Invalid');
        $('#editnic').css('color', 'red');
        $('#edit_donorNic').css("border","2px solid red");
    }
});
$('#edit_donorNicT').keyup(function(e) {
    if (validateNicT()) {
        $('#editnicT').html('Valid');
        $('#editnicT').css('color', 'green');
        $('#edit_donorNicT').css("border","2px solid green");
        
    }
    else {
        $('#editnicT').html('Invalid');
        $('#editnicT').css('color', 'red');
        $('#edit_donorNicT').css("border","2px solid red");
    }
});

});


function validateEmail(){

		// get value of input email
		var email=$("#donorEmail").val();
       
		// use reular e)xpressio
		 var reg = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/
		 if(reg.test(email)){
		 	return true;
		 }else{
		 	return false;
		 }

}

function validateEmaile(){

    // get value of input email
    var email=$("#edit_donorEmail").val();
   
    // use reular e)xpressio
     var reg = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/
     if(reg.test(email)){
         return true;
     }else{
         return false;
     }

}
function validateEmailT(){

    // get value of input email
    var emailT=$("#edit_donorEmailT").val();
   
    // use reular e)xpressio
     var regT = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/
     if(regT.test(emailT)){
         return true;
     }else{
         return false;
     }

}

// donor team emails
    $(document).on('input', '.email', function(){
		var mailid = $(this).attr("id"); 
		var x = $('#c'+mailid+'');
        x = {};
    var y = $(this);
    var regt = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
    var isMail = regt.test(y.val());
    if(isMail){y.removeClass("invalid").addClass("valid"); return true;}
    else {y.removeClass("valid").addClass("invalid"); }
});
// person contact
function validateContact(){
    var a = $('#donorMobile').val();
    var filter = /^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/;
    if (filter.test(a) || a == "") {
        return true;
    }
    else {
        return false;
    }
    
}

function validateContacte(){
    var a = $('#edit_donorMobile').val();
    var filter = /^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/;
    if (filter.test(a) || a == "") {
        return true;
    }
    else {
        return false;
    }
    
}

function validateContactT(){
    var aT = $('#edit_donorMobileT').val();
    var filter = /^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/;
    if (filter.test(aT) || aT == "") {
        return true;
    }
    else {
        return false;
    }
    
}


function validateContactA(){
    var a = $('#donorMobile2').val();
    var filter = /^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/;
    if (filter.test(a) || a == "") {
        return true;
    }
    else {
        return false;
    }
    
}
function validateContactAe(){
    var a = $('#edit_donorMobile2').val();
    var filter = /^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/;
    if (filter.test(a) || a == "") {
        return true;
    }
    else {
        return false;
    }
    
}

function validateContactAT(){
    var aTT = $('#edit_donorMobile2T').val();
    var filter = /^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/;
    if (filter.test(aTT) || aTT == "") {
        return true;
    }
    else {
        return false;
    }
    
}
// team contact validation
$(document).on('input', '.contact', function(){
    var contactid = $(this).attr("id"); 
    var cnt = $('#mc'+contactid+'');
    cnt = {};
var cnty = $(this);
var regct =  /^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/;
var isCont = regct.test(cnty.val());
if(isCont){cnty.removeClass("invalid").addClass("valid"); return true;}
else {cnty.removeClass("valid").addClass("invalid"); return false;}
});



// // person nic validation
function validateNic(){
    var a = $('#donorNic').val();
    var filter = /^([0-9]{9}[x|X|v|V]|[0-9]{12})$/mg;
    if (filter.test(a)) {
        return true;
    }
    else {
        return false;
    }
    
}
function validateNice(){
    var a = $('#edit_donorNic').val();
    var filter = /^([0-9]{9}[x|X|v|V]|[0-9]{12})$/mg;
    if (filter.test(a)) {
        return true;
    }
    else {
        return false;
    }
    
}

function validateNicT(){
    var aN = $('#edit_donorNicT').val();
    var filter = /^([0-9]{9}[x|X|v|V]|[0-9]{12})$/mg;
    if (filter.test(aN)) {
        return true;
    }
    else {
        return false;
    }
    
}
// team nic validation
$(document).on('input', '.nic', function(){
    var nicid = $(this).attr("id"); 
    var nc = $('#mn'+nicid+'');
    
    nc = {};
    ncsp={};
var nicy = $(this);
var regct =  /^([0-9]{9}[x|X|v|V]|[0-9]{12})$/mg;
var isNic = regct.test(nicy.val());
if(isNic){nicy.removeClass("invalid").addClass("valid");return true; }
else {nicy.removeClass("valid").addClass("invalid"); return false;}
});


// SEARCH BY donor NAME etc...
$(document).ready(function(){
    $('#search_id').on('keyup', function(){
        var value = $(this).val().toLowerCase();
        $('#searchbody tr').filter(function(){
            $(this).toggle($(this).text().toLowerCase().indexOf(value)>-1)
        });
    });
});

$(document).ready(function(){

    // Datapicker for donor search
    $('.datepicker').datepicker({
        "dateFormat": "yy-mm-dd",
        changeYear: true
    });


    $('#btn_search').click(function () {
        var from_date = $('#search_fromdate').val();
        var to_date = $('#search_todate').val();
        var buttonVal = $('#btn_search').val();
        // alert(from_date);
        if (from_date != '' && to_date != '') {
        
          $.ajax({
            url: "/HospitalDonation/controller/search.php",
            method: "POST",
            data: { from_date: from_date, to_date: to_date, buttonVal:buttonVal },
            success: function (data) {
              $('#searchbody').html(data);
            }
          });
        }
        else {
          alert("Please Select the Date");
        }
      });
});






$(document).on("click","#mylink",function(e){       //LIST ADD DONOR MODAL WILL POPUP
	var my = $(this).attr("value");
	console.log(my);
    $.ajax({
        url:'/HospitalDonation/controller/sendback.php',
        type:'POST',
        data:{
            my:my
        },
        success:function(data)
        {
            // fetch_donP_data();
            // if(data=="ok")
            $('#appendP').html(data);
            $('#itemlistds')[0].reset();
            // $('#mainFormResultD').text("");
        }

    });
});

$(document).on("click","#newedit",function(e){
	var my2 = $(this).attr("value");
	// alert(my);
    $.ajax({
        url:'/HospitalDonation/controller/edit.php',
        type:'POST',
        data:{
            my2:my2
        },
        success:function(data)
        {
           
            $('#edit_list').html(data);
            
            $('#itemlistds')[0].reset();
            
        }

    });
});

$(document).on("click","#update3", function(e){
	e.preventDefault();   //this will prevent two click events 

	var eddonorName = $('#edit_donorName').val();
	var eddonorNic = $('#edit_donorNic').val();
	var edaddressLine1 = $('#edit_addressLine1').val();
	var edaddressLine2 = $('#edit_addressLine2').val();
	var eddonorEmail = $('#edit_donorEmail').val();
	var eddonorMobile = $('#edit_donorMobile').val();
	var eddonorMobile2 = $('#edit_donorMobile2').val();
    var type = $('#edit_type').val();
    var edit_id =$('#edit_id').val();
	var update3P = $("#update3").val();
    var nm = $('#editnic').text();
    var phn = $('#editspnPhoneStatus').text();
    var phn2 = $('#editspnPhoneStatus2').text();
    var msg = $('#editemailMasg').text();
    var edteamNameT = $('#edit_teamNameT').val();
	var eddonorNameT = $('#edit_donorNameT').val();
	var eddonorNicT = $('#edit_donorNicT').val();
	var edaddressLine1T = $('#edit_addressLine1T').val();
	var edaddressLine2T = $('#edit_addressLine2T').val();
	var eddonorEmailT = $('#edit_donorEmailT').val();
	var eddonorMobileT = $('#edit_donorMobileT').val();
	var eddonorMobile2T = $('#edit_donorMobile2T').val();
    var edit_idT =$('#edit_idT').val();
   // var typeT = $('#edit_typeT').val()
	
    var nmT = $('#editnicT').text();
    var phnT = $('#editspnPhoneStatusT').text();
    var phn2T = $('#editspnPhoneStatus2T').text();
    var msgT = $('#editemailMasgT').text();
    var update3 = $("#update3").val();
    if(nmT == 'Invalid' || phnT== 'Invalid' || phn2T=='Invalid' || msgT=='Invalid' || nm == 'Invalid' || phn== 'Invalid' || phn2=='Invalid' || msg=='Invalid')
    {
       return false;
    }


    if(type == "person"){
        $.ajax({
			url:'/HospitalDonation/controller/donorPersonDetail.php',
			type:'POST',
			data:{
                edit_id:edit_id,
                eddonorName:eddonorName,
                eddonorNic:eddonorNic,
                edaddressLine1:edaddressLine1,
                edaddressLine2:edaddressLine2,
                eddonorMobile:eddonorMobile,
                eddonorMobile2:eddonorMobile2,							
                eddonorEmail:eddonorEmail,
            
                update3P:update3P
               
			},
			success:function(data)
			{
                        $('#recordsd').DataTable().destroy();
                        fetchd();
                        $('#showresult').html(data);
                        
			}

		});

    } else {
	$.ajax({
			url:'/HospitalDonation/controller/donorTeamDetails.php',
			type:'POST',
			data:{
                
                   
                   
                edit_idT:edit_idT,
                edteamNameT:edteamNameT,
                // eddonorNameT:eddonorNameT,
                edaddressLine1T:edaddressLine1T,
                eddonorMobileT:eddonorMobileT, 							
                eddonorEmailT:eddonorEmailT,
                update3:update3
               
			},
			success:function(data)
			{

                $('#recordsd').DataTable().destroy();
                fetchd(); 
                $('#showresultT').html(data);
                
          
			}

		});
    }
});



// GET ITEMS FOR EDIT MODE
$(document).on("click","#itemedit",function(e){
	e.preventDefault();

	var editI = $(this).attr("value");
   // alert(edit);
	$.ajax({
			url:'/HospitalDonation/controller/donateItem.php',
			type:'POST',
			data:{
				editI:editI
			},
			success:function(data)
			{
                $('#records').DataTable().destroy();
                fetch();
				$('#edit_itemlist').html(data);
                
			}

		});
});

function selectitem(){
    var d = document.getElementById("selectcode");
    var display = d.options[d.selectedIndex].text;
    document.getElementById("edit_itemCode").value=display;
}
function selectitemsc(){
    var d = document.getElementById("code_select");
    var display = d.options[d.selectedIndex].text;
    document.getElementById("codenamesc").value=display;
}
function selectitemsi(){
    var d = document.getElementById("code_select1");
    var display = d.options[d.selectedIndex].text;
    document.getElementById("codenameSI").value=display;
}
function selectitemci(){
    var d = document.getElementById("code_select2");
    var display = d.options[d.selectedIndex].text;
    document.getElementById("codenameCI").value=display;
}
function selectitemdr(){
    var d = document.getElementById("code_select3");
    var display = d.options[d.selectedIndex].text;
    document.getElementById("codenamedr").value=display;
}
function selectitemgi(){
    var d = document.getElementById("code_select4");
    var display = d.options[d.selectedIndex].text;
    document.getElementById("codenamegi").value=display;
}
function selectitemfd(){
    var d = document.getElementById("code_select5");
    var display = d.options[d.selectedIndex].text;
    document.getElementById("codenamefd").value=display;
}

$(document).on("click","#update4", function(e){
	e.preventDefault();   //this will prevent two click events 
    var itemcode = $('#edit_itemCode').val();
	var itemname = $('#edit_itemName').val();
	var itemqty = $('#edit_itemQty').val();
	var description = $('#edit_description').val();
    var editem = $('#editem_id').val();
    var update4 = $('#update4').val();

    $.ajax({
        url:'/HospitalDonation/controller/donateItem.php',
        type:'POST',
        data:{
           itemcode:itemcode,
           itemname:itemname,
           itemqty:itemqty,
           description:description,
           editem:editem,
            update4:update4
           
        },
        success:function(data)
        {
           
            $('#records').DataTable().destroy();
            fetch();
            $('#showitem').html(data);
            
                
        }

    });

});


$(document).on("click","#item_del",function(e){
	e.preventDefault();
if(window.confirm("Do you want delete record?")){
	var del_item = $(this).attr("value");
    $.ajax({
            url:'/HospitalDonation/controller/deletedonor.php',
			type:'POST',
			data:{
				del_item:del_item
			},
			success:function(data)
			{
                $('#records').DataTable().destroy();
                fetch();
				$('#itemdisplay').html(data);
                
			}
        });
} else {
    return false;
}
	
});



$(document).on("click", "#deletedon", function(e){
    e.preventDefault();
    if(window.confirm("Do you want delete record?")){
    var del_don2 = $(this).attr("value");
    
    $.ajax({
        url:'/HospitalDonation/controller/deletedonor.php',
        type:"post",
        // dataType: "json",
        data:{
            del_don2:del_don2
        },
        success:function(data){
            $('#recordsd').DataTable().destroy();
            fetchd();
            $('#msg').html(data);
        }

    });
} else {
    return false;
    } 

});

$(document).ready(function(){

    $("#typeinfo").change(function(){
        var deptid = $(this).val();
        
        $.ajax({
            url: '/HospitalDonation/controller/getType.php',
            type: 'post',
            data: {depart:deptid},
            dataType: 'json',
            success:function(response){

                var len = response.length;

                $("#itemnames").empty();
                for( var i = 0; i<len; i++){
                    var itemname = response[i]['itemname'];
                    var code = response[i]['codename'];

                    // $("#availableqty").val(qty);
                    $("#itemnames").append("<option value='"+code+"'>"+itemname+"</option>");
                    // $("#itemnames").text("");
                   

                }
            }

        });
    });

    $("#itemnames").click(function(){
        var qtyid = $(this).val();
        
        $.ajax({
            url: '/HospitalDonation/controller/getType.php',
            type: 'post',
            data: {qtyid:qtyid},
            dataType: 'json',
            success:function(response){

                var len = response.length;

                $("#availableqty").empty();
                for( var i = 0; i<len; i++){
                    var qty = response[i]['qty'];
                    // var name = response[i]['item_name'];

                    $("#availableqty").val(qty);
                    $(" #availableqtyh").val(qty);
                   

                }
            }

        });
    });

    

    $(document).on('click', '#releaseqty', function(e){
        e.preventDefault();
        var value = $('#releaseqty').val();
        var valueavailable = $('#availableqtyh').val();
        var req = parseInt(value);
        var stk = parseInt(valueavailable);
        

        if(req != 0  && req <= stk)
        {
            var total = '';
            var total = stk-req; 
            $('#availableqty').val(total);
        //    if(stk == 0)
        //    {
        //     $('#releaseqty').attr('maxlength',stk )
        //    }
           
        }
        // alert($value);
    });
});

function selecttype(){
    var type = $("#typeinfo").val();
    
    $("#detail1").val(type);
}
function selectname(){      //onchange selected name
    var typen = document.getElementById("itemnames");
    var display = typen.options[typen.selectedIndex].text;
    var notdisplay = typen.options[typen.selectedIndex].value;
    document.getElementById("detail2").value=display;
    document.getElementById("detailhidden").value=notdisplay;
}
function selectqty(){
    var typeq = $("#releaseqty").val();
    // var display = typeq.[typeq.selectedIndex].number;
    $("#detail3").val(typeq);
}
function selectitemname(){ 
    var d = document.getElementById("categoryid");
    var display = d.options[d.selectedIndex].value;
    document.getElementById("codeid").value=display;
}
$(document).on('click', '#subIssue', function(e){
e.preventDefault();

var type = $('#detail1').val();
var itmname = $('#detailhidden').val();
var qty = $('#detail3').val();
var towhom = $('#whom').val();
var dep = $('#dep_name').val();
// var availableqty = $('#availableqty').val();
// var hidname = $('#hiddennameid').val();
var buttonissue = $('#subIssue').val();

$.ajax({
    url:'/HospitalDonation/controller/issueItem.php',
    type:'POST',
    data:{
       type:type,
       itmname:itmname,
       qty:qty,
       towhom:towhom,
       dep:dep,
    //    availableqty:availableqty,
    //    hidname:hidname,
        buttonissue:buttonissue
       
    },
    success:function(data)
    {
       
        $('#issued').html(data);
        $('#itemform')[0].reset();
        
            
    }


});
});

$(document).on('click', '#subItem', function(e){
e.preventDefault();
    var category = $('#codeid').val();
    var name = $('#nameid').val();
    var buttonid = $('#subItem').val();

    $.ajax({

    url:'/HospitalDonation/controller/itemadding.php',
    type:'POST',
    data:{
       category:category,
       name:name,
       buttonid:buttonid
       
    },
    success:function(data)
    {
       
        $('#itemsuccess').html(data);
        $('#itemadd')[0].reset();
            
    }


    });

});


