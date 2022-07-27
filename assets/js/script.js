var expanded = false;

function showCheckboxes() {
  var checkboxes = document.getElementById("checkboxes");
  if (!expanded) {
    checkboxes.style.display = "block";
    expanded = true;
  } else {
    checkboxes.style.display = "none";
    expanded = false;
  }
}


//FIELDS ADDING 2


$(function(){
$('#addR').click(function(){
		
		var count=$("#dynamicfield input").size();
		var requested=parseInt($("#qtyR").val(),10);

		if(requested>=count){
			$('#teamTbody2').empty();
			
			for(y=count;y<requested;y++){

			
			var $ct=$('<tr id="rowB'+y+'"><td> <input class = "memberNameR sizeinput"/> </td> <td><input class = "nicR sizeinput" id = "nc'+y+'"/> </td> <td> <input class = "address1R sizeinput"/> </td> <td> <input class = "address2R sizeinput" /> </td> <td> <input class = "contactR sizeinput" id = "cc'+y+'"  maxlength = 10/> </td> <td> <input type="email " class = "emailR sizeinput" id = "d'+y+'" /> </td> <td><button type="button" name="remove" id="'+y+'" class="btn btn-danger btn_remove2">X</button></td></tr>').attr({
					type:'text'
				});
				
                $('#teamTbody2').append($ct);
              
				}


		} else if(requested<count){

			var x =requested-1;
			$('#teamTbody2 td:gt("+x+")').remove();            
		}
		});
	
	$(document).on('click', '.btn_remove2', function(){
		var button_id = $(this).attr("id"); 
		$('#rowB'+button_id+'').remove();
	});
});
//edit team
$(function(){
$('#addR2').click(function(){
		
		var count=$("#dynamicfield input").size();
		var requested=parseInt($("#qtyR2").val(),10);

		if(requested>=count){
			$('#teamTbody2e').empty();
			
			for(F=count;F<requested;F++){

			
			var $ctE=$('<tr id="rowBE'+F+'"><td class = "memberNameR" contenteditable = "true">  </td> <td class = "nicR" contenteditable = "true"> </td> <td class = "address1R" contenteditable = "true"></td> <td class = "address2R" contenteditable = "true"></td> <td class = "contactR" contenteditable = "true"></td> <td class = "emailR" contenteditable = "true"></td> <td><button type="button" name="remove" id="'+F+'" class="btn btn-danger btn_remove2">X</button></td></tr>').attr({
					type:'text'
				});
				
                $('#teamTbody2e').append($ctE);
              
				}


		} else if(requested<count){

			var x =requested-1;
			$('#teamTbody2e td:gt("+x+")').remove();            
		}
		});
	
	$(document).on('click', '.btn_remove2', function(){
		var button_id = $(this).attr("id"); 
		$('#rowBE'+button_id+'').remove();
	});
});
//end of team members field dynamically adding2



$("#active2").click(function(){		////RESERVATION PAGE CHECKBOX FOR DONOR TEAM
	
	if($(this).is(":checked")){
		$("#donorTeamInfo2").show();
		$("#tempdonorinfo").hide();
		$("#teamDetails2").show();
		$("#donorDetailfirst2").hide();
		$("#listsecnd").show();
		$("#listfirst").hide();

	}else
		{
	
		$("#donorTeamInfo2").hide();
		$("#tempdonorinfo").show();
		$("#donorDetailfirst2").show();
		$("#teamDetails2").hide();
		$("#listfirst").show();
		$("#listsecnd").hide();
	}
});   //end of #active2 function

 

// DONOR TEAM //////ADD DONATION & ADD RESERVATION //////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//DONOR TEAM-ADD RESERVATION-SUBMIT TO TEMPDONOR TABLE VIA AJAX

$("#donorTeamInfo2 form").on("click","#subR2", function(e){	  //RESERVE TEAM ADD
	e.preventDefault();
	
	var memberName = [];
	var nic = [];
	var address1 = [];
	var address2 = [];
	var contact = [];
	var email = [];
	
	$('.memberNameR').each(function(){
	memberName.push($(this).val());

		});
	$('.nicR').each(function(){
	nic.push($(this).val());

		});
	$('.address1R').each(function(){
	address1.push($(this).val());

		});
	$('.address2R').each(function(){
	address2.push($(this).val());

		});
	$('.contactR').each(function(){
	contact.push($(this).val());

		});
	$('.emailR').each(function(){
	email.push($(this).val());

		});
	
	var teamName = $('#tempteamName').val();
	var idr =$('#qtyR').val();
	var submitR = $("#subR2").val();
	//ajax call for team reservation
	 $.ajax({

	url:"../../controller/reserveTeam.php",	
	method:"POST",
	data: {
		
		teamName:teamName,
		idr:idr,
		memberName:memberName,
		nic:nic,
		address1:address1,
		address2:address2,
		contact:contact,
		email:email,
		submitR:submitR
		
		},
	success: function(data){
		//$('#resultT2').html(data);
		fetch_data();
		 $('#resultT2').html(data);
		$("td[contentEditable='true']").text("");
		$('#addTempTeam')[0].reset();
		
		
	}
	
});
	
}); 

 //end of donor team reservation


//ADD DONOR PERSON WHEN CLICK ON ADD RESERVATION BUTTON

$("#tempdonorinfo form").on("click","#subR1", function(e){
	e.preventDefault();
	
	var donorRName = $('#tempdonorName').val();
	var donorRNic = $('#tempdonorNic').val();
	var addressLine1R = $('#tempaddressLine1').val();
	var addressLine2R = $('#tempaddressLine2').val();
	var donorREmail = $('#tempdonorEmail').val();
	var donorRMobile = $('#tempdonorMobile').val();
	var donorRMobile2 = $('#tempdonorMobile2').val();
	var submitR1 = $("#subR1").val();


	//ajax call for person DONATION
	 $.ajax({

	url:"../../controller/reservePerson.php",	
	method:"POST",
	data: {
		donorRName:donorRName,
		donorRNic:donorRNic,
		addressLine1R:addressLine1R,
		addressLine2R:addressLine2R,
		donorRMobile:donorRMobile,
		donorRMobile2:donorRMobile2,
		donorREmail:donorREmail,
		submitR1:submitR1
		},
	success: function(data){
		fetch_person_data();	
		$('#resultP2').html(data);
		$('#addTempPerson')[0].reset();
				
	}	
});
});



fetch_person_data();
function fetch_person_data()				//FUNTION TO FETCH RESERVE PERSON DATA
{

$.ajax({

	url:"../../controller/fetch_reserve_person.php",	
	method:"POST",
	success:function(response){
		$('#appendR').html(response);
		// $('#donselect').html(response);
		
	}
});
}

// $(document).ready(function(){
fetch_person_datas();
function fetch_person_datas()				//FUNTION TO FETCH RESERVE PERSON DATA
{

$.ajax({

	url:"../../controller/fetch_reserve_person.php",	
	method:"post",
	//dataType: 'json',
	success:function(response){
		// var len = response.length;
		//$('#donselect').append(response);
		// for( var i = 0; i<len; i++){
		//var idn = response[i]['donor_id'];
		// $.each(data, function(key, item){
		// var name = response[i]['don_team_name'];
		// alert(item);
		// $('#donselect').append(("<option ></option>").text(item.Name).val(item.Id));
	}
	});
	
		
		

};


 

//  function checkfields(fieldname){
// 	if(fieldname.val()==''){
// 		fieldname.css('border','1px solid red');
// 		alert('Please enter details');
// 		return false;
// 	} else{
// 		fieldname.css('border','');
// 		return true;
// 	}
// }


fetch_data();
function fetch_data()		//FUNCTION TO FETCH RESERVE TEAM DATA
{

$.ajax({

	url:"../../controller/fetch_reserve_team.php",	
	method:"POST",	
	success:function(respons){
		//$('#teamName').html(respons(teamName));
		$('#appendTempTeam').html(respons);	
	}
});
}





//FETCH DONOR DETAILS////////////////////////////////////////////////////////////////////////////////////////

// function fetch_item_type()
// {

// $.ajax({

// 	url:"../../controller/reservationDetails.php",	
// 	method:"POST",
// 	success:function(response){
// 		$('#ItemType').html(response);
// 		//$('#appendTeam').html(data);
		
// 	}
// });
// }
// fetch_item_type();

//end of  main function

$(document).on("click","#editp",function(e){
	e.preventDefault();

	var edit = $(this).attr("value");
	$.ajax({
			url:'../../controller/dp_edit.php',
			type:'POST',
			data:{
				edit:edit
			},
			success:function(data)
			{
				$('#edit_view').html(data);
			}

		});
});

$(document).on("click","#deletep",function(e){
	e.preventDefault();

	var del = $(this).attr("value");
	alert(del);
});

$(document).on("click","#editT1",function(e){
	e.preventDefault();

	var editT = $(this).attr("value");
	
	$.ajax({
			url:'../../controller/dpt_edit.php',
			type:'POST',
			data:{
				editT:editT
			},
			success:function(data)
			{
				$('#edit_viewT').html(data);
			}

		});
});

$(document).on("click","#deleteT",function(e){
	e.preventDefault();

	var delT = $(this).attr("value");
	alert(delT);
});


//saving the donation items

// $(document).on("click","#item_save1", function(e){		//DONOR TEAM ADD
// 	e.preventDefault();
// $('.modal-body').css('opacity', '0.5');
// $('.sub').prop('disabled', true);

// 	var itemName = [];
// 	var qty = [];
// 	var description = [];
	
	
	
// 	$('.ItemTinput').each(function(){
// 	itemName.push([this.value]);

// 		});
// 	$('.ItemTinputQ').each(function(){
// 	qty.push([this.value]);

// 		});
// 	$('.ItemTdes').each(function(){
// 	description.push([this.value]);

// 		});
	
// 	var btnAdd = $('#item_save1').val();
	
// alert(description);
// 	//ajax call for team DONATION
// 	 $.ajax({

// 	url:"../../controller/reservationDetails.php",	
// 	method:"POST",
// 	data: {
// 		itemName:itemName,
// 		qty:qty,
// 		description:description,
// 		btnAdd:btnAdd
		
// 		},
// 	success: function(data){
		
// 		$('#response1').html(data);
// 		$('#SCFRM')[0].reset();
// 							}
// 			});





// });
		//SC ITEM ADDING TO FORM
	$('#item_save1').click(function(){
		var ct = "SC";
		var count=$("#dynamicfield input").size();
		var request=parseInt($("#qtyI").val(),10);
	var itemName = [];
	var qty = [];
	var description = [];
	
	
	$('.ItemTinput').each(function(){
	itemName.push([this.value]);

		});
	$('.ItemTinputQ').each(function(){
	qty.push([this.value]);

		});
	$('.ItemTdes').each(function(){
	description.push([this.value]);

		});



	if($('.ItemTinput').val()=='')
	{
		alert('Enter Item');
		$('.ItemTinput').css('border-color', '#cc0000');
		itemName = {};
	}
	else{
		$('.ItemTinput').css('border-color', '');
		
		
	}
	if($('.ItemTinput').val()!='')
	{
	
	if($('#item_save1').text() == 'save')
	{

		if(request>=count){
			
			for(r=count;r<request;r++){


		
		out = '<tr id = "rw_'+r+'">';
		out += '<td class ="Item_code"> <input type="hidden" name = "hidden_code[]" id = "code'+r+'" value="'+ct+'" class = "Item_c" >'+ct+' </td>';
		out += '<td class ="Item_name">'+itemName[r]+'<input type="hidden" name = "hidden_itemname[]" id = "hidden_item'+r+'" value = "'+itemName[r]+'" class = "Item_n" > </td>';
		out += '<td class ="Item_qty">'+qty[r]+'<input type="hidden" name = "hidden_qty[]" id = "hidden_qty'+r+'" value = "'+qty[r]+'" class = "Item_q" > </td>';
		out += '<td class = "Item_des">'+description[r]+'<input type="hidden" name = "hidden_des[]" id = "hidden_des'+r+'" value = "'+description[r]+'" class = "Item_d" > </td>';
		out += '<td> <button type = "button" class = "btn btn-warning view_detailsc" id = "'+r+'" name = "edit_item">Edit</button>';  
		out += '<button type = "button" class = "btn btn-danger remove_detailsc" id = "'+r+'" name = "del_item">Delete</button></td>';
		// out += '<td> <button type = "button" class = "btn btn-danger" id = "'+cnt+'" name = "del_item">Delete</button> </td>';
		out +='</tr>';

		$('#itemTable').append(out);
		
	} 

}	
	
}  else {

	var edid = $('#hidden_row_id').val();
	var inm = [];
	var cd = [];
	var qt = [];
	var des = [];


	//  $('.testing').each(function(){
	// edid.push([this.value]);

	// 	});



	 $('.itemCode').each(function(){
	cd.push([this.value]);

		});
	$('.itemnm').each(function(){
	inm.push([this.value]);

		});
	$('.itemq').each(function(){
	qt.push([this.value]);

		});
	$('.itemdes').each(function(){
	des.push([this.value]);

		});
	alert (inm);
		// out = '<tr id = "rw_'+r+'">';
		out = '<td class ="Item_code"><input type="hidden" name = "hidden_code[]" id = "code'+edid+'" value="'+cd+'" class = "Item_c" >'+cd+' </td>';
		out += '<td class ="Item_name">'+inm+'<input type="hidden" name = "hidden_itemname[]" id = "hidden_item'+edid+'" value = "'+inm+'" class = "Item_n" > </td>';
		out += '<td class ="Item_qty">'+qt+'<input type="hidden" name = "hidden_qty[]" id = "hidden_qty'+edid+'" value = "'+qt+'" class = "Item_q" > </td>';
		out += '<td class ="Item_des">'+des+'<input type="hidden" name = "hidden_des[]" id = "hidden_des'+edid+'" value = "'+des+'" class = "Item_d" > </td>';
		out += '<td> <button type = "button" class = "btn btn-warning view_detailsc" id = "'+edid+'" name = "edit_item">Edit</button>';  
		out += '<button type = "button" class = "btn btn-danger remove_detailsc" id = "'+edid+'" name = "del_item">Delete</button></td>';
		// out +='</tr>';
		$('#rw_'+edid+'').html(out);
}


$('#modalDialog').modal('hide');


}
});
	$('.modal').on('hidden.bs.modal',function(){
		$(this).find('input').val('').end();			
		// $(this).find('form').trigger('reset');							
		$('input').empty();
	});

//VIEW TABLE ITEMS
// $(document).on('click', '.view_detailsc', function(){
	

// var sc_row_id = $(this).attr("id");

// var item_namesc = $('#hidden_item'+sc_row_id+'').val();
// var qty_sc = $('#hidden_qty'+sc_row_id+'').val();
// var des_sc = $('#hidden_des'+sc_row_id+'').val();
// alert(item_namesc);

// $('#code').val(code);
////VIEW TABLE ITEMS

$(document).on('click', '.view_detailsc', function(){
	

var sc_row_id = $(this).attr("id");
var code = $('#code'+sc_row_id+'').val();
var item_namesc = $('#hidden_item'+sc_row_id+'').val();
var qty_sc = $('#hidden_qty'+sc_row_id+'').val();
var des_sc = $('#hidden_des'+sc_row_id+'').val();
alert(item_namesc);


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
					bn +='<input id="codename" value = "'+code+'" class = "itemCode"></input>';
				bn +='<select name="code_select" id="code_select">' ;
					bn +='<option value="">SI</option>';
					bn +='<option value="">SC</option>';
					bn +='<option value="">CI</option>';
					bn +='<option value="">DR</option>';
					bn +='<option value="">GI</option>';
					bn +='<option value="">FD</option>';
				bn +='</select></p>';
				bn +='<p>';
					
				bn +='<input type="text" name="edit_Itemname" id="edit_Itemname" value = "'+item_namesc+'"  class = "itemnm"></p>';
				bn +='<p>';
					
				bn +='<input type="text" name="edit_qty" id="edit_qty" value = "'+qty_sc+'" class = "itemq"></p>';
				bn +='<p>';
					
				bn +='<input type="text" name="edit_description" id="edit_description" value = "'+des_sc+'" class = "itemdes"></p>';
				bn +='</div>';
				$('#scdv').append(bn);
				// $('#all').html('');

// $('#Im'+sc_row_id+'').val(item_namesc);
// $('#codename').val(code);
// $('#Iq'+sc_row_id+'').val(qty_sc);
// $('#Id'+sc_row_id+'').val(des_sc);
$('#hidden_row_id').val(sc_row_id);
$('#item_save1').text('Edit');
$('#modalDialog').modal('show');
});

$(document).on('click', '.remove_detailsc', function(){
	var id = $(this).attr("id");
	$('#rw_'+id+'').remove();
});







//SI ITEM ADDING TO FORM

$('#item_save2').click(function(){
		var ct1 = "SI";
		var count2=$("#dynamicfield input").size();
		var request2=parseInt($("#qtyI1").val(),10);
	var itemName2 = [];
	var qty2 = [];
	var description2 = [];
	
	$('.ItemTinput2').each(function(){
	itemName2.push([this.value]);

		});
	$('.ItemTinputQ2').each(function(){
	qty2.push([this.value]);

		});
	$('.ItemTdes2').each(function(){
	description2.push([this.value]);

		});

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

if(request2>=count2){
			
			for(t=count2;t<request2;t++){


		
		out2 = '<tr id = "rwi_'+t+'">';
		out2 += '<td class ="Item_code"><input type="hidden" name = "hidden_code[]" id = "codesi'+t+'" value = "'+ct1+'"  class="Item_ci"> '+ct1+'</td>';
		out2 += '<td class ="Item_name">'+itemName2[t]+'<input type="hidden" name = "hidden_itemname[]" id = "hidden_itemsi'+t+'" value = "'+itemName2[t]+'" class="Item_ni"> </td>';
		out2 += '<td class ="Item_qty">'+qty2[t]+'<input type="hidden" name = "hidden_qty[]" id = "hidden_qtysi'+t+'" value = "'+qty2[t]+'" class="Item_qi"> </td>';
		out2 += '<td class ="Item_des">'+description2[t]+'<input type="hidden" name = "hidden_des[]" id = "hidden_dessi'+t+'" value = "'+description2[t]+'" class="Item_di"> </td>';
		out2 += '<td> <button type = "button" class = "btn btn-warning view_detailsi" id = "'+t+'" name = "edit_item">Edit</button>  <button type = "button" class = "btn btn-danger remove_detailsi" id = "'+t+'" name = "del_item">Delete</button> </td>';
		// out += '<td> <button type = "button" class = "btn btn-danger" id = "'+cnt+'" name = "del_item">Delete</button> </td>';
		out2+='</tr>';

		$('#itemTable').append(out2);
		
	}
	
}
}else {

	var edid_si = $('#hidden_row_id2').val();
	var inm_si = [];
	var cd_si = [];
	var qt_si = [];
	var des_si = [];


	//  $('.testing').each(function(){
	// edid.push([this.value]);

	// 	});



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
		// out = '<tr id = "rw_'+r+'">';
		out = '<td class ="Item_code"><input type="hidden" name = "hidden_code[]" id = "code'+edid_si+'" value="'+cd_si+'" class = "Item_ci" >'+cd_si+' </td>';
		out += '<td class ="Item_name">'+inm_si+'<input type="hidden" name = "hidden_itemname[]" id = "hidden_item'+edid_si+'" value = "'+inm_si+'" class = "Item_ni" > </td>';
		out += '<td class ="Item_qty">'+qt_si+'<input type="hidden" name = "hidden_qty[]" id = "hidden_qty'+edid_si+'" value = "'+qt_si+'" class = "Item_qi" > </td>';
		out += '<td class ="Item_des">'+des_si+'<input type="hidden" name = "hidden_des[]" id = "hidden_des'+edid_si+'" value = "'+des_si+'" class = "Item_di" > </td>';
		out += '<td> <button type = "button" class = "btn btn-warning view_detailsi" id = "'+edid_si+'" name = "edit_item">Edit</button>';  
		out += '<button type = "button" class = "btn btn-danger remove_detailsi" id = "'+edid_si+'" name = "del_item">Delete</button></td>';
		// out +='</tr>';
		$('#rwi_'+edid_si+'').html(out);
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
alert(item_namesi);


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
					bn +='<input id="codename" value = "'+codesi+'" class = "itemCode"></input>';
				bn +='<select name="code_select" id="code_select">' ;
					bn +='<option value="">SI</option>';
					bn +='<option value="">SC</option>';
					bn +='<option value="">CI</option>';
					bn +='<option value="">DR</option>';
					bn +='<option value="">GI</option>';
					bn +='<option value="">FD</option>';
				bn +='</select></p>';
				bn +='<p>';
					
				bn +='<input type="text" name="edit_Itemname" id="edit_Itemname" value = "'+item_namesi+'"  class = "itemnm"></p>';
				bn +='<p>';
					
				bn +='<input type="text" name="edit_qty" id="edit_qty" value = "'+qty_si+'" class = "itemq"></p>';
				bn +='<p>';
					
				bn +='<input type="text" name="edit_description" id="edit_description" value = "'+des_si+'" class = "itemdes"></p>';
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
});

$(document).on('click', '.remove_detailsi', function(){
	var id = $(this).attr("id");
	$('#rwi_'+id+'').remove();
});



	

	//CI ITEM ADDING TO FOERM
$('#item_save3').click(function(){
		var ct2 = "CI";
		var count3=$("#dynamicfield input").size();
		var request3=parseInt($("#qtyI2").val(),10);
	var itemName3 = [];
	var qty3 = [];
	var description3 = [];
	
	$('.ItemTinput3').each(function(){
	itemName3.push([this.value]);

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
		out3 += '<td class ="Item_code"><input type="hidden" name = "hidden_code[]" id = "codeci'+t+'" value = "'+ct2+'" class = "Item_cc" > '+ct2+'</td>';
		out3 += '<td class ="Item_name">'+itemName3[t]+'<input type="hidden" name = "hidden_itemname[]" id = "hidden_itemci'+t+'" value = "'+itemName3[t]+'" class = "Item_nc" > </td>';
		out3 += '<td class ="Item_qty">'+qty3[t]+'<input type="hidden" name = "hidden_qty[]" id = "hidden_qtyci'+t+'" value = "'+qty3[t]+'" class = "Item_qc" > </td>';
		out3 += '<td class ="Item_des">'+description3[t]+'<input type="hidden" name = "hidden_des[]" id = "hidden_desci'+t+'" value = "'+description3[t]+'" class = "Item_dc" > </td>';
		out3 += '<td> <button type = "button" class = "btn btn-warning view_detailci" id = "'+t+'" name = "edit_item">Edit</button>  <button type = "button" class = "btn btn-danger remove_detailci" id = "'+t+'" name = "del_item">Delete</button> </td>';
		// out += '<td> <button type = "button" class = "btn btn-danger" id = "'+cnt+'" name = "del_item">Delete</button> </td>';
		out3+='</tr>';

		$('#itemTable').append(out3);
		
	}
	
}
}else {

	var edid_ci = $('#hidden_row_id3').val();
	var inm_ci = [];
	var cd_ci = [];
	var qt_ci = [];
	var des_ci = [];


	 $('.itemCode').each(function(){
	cd_ci.push([this.value]);

		});
	$('.itemnm').each(function(){
	inm_ci.push([this.value]);

		});
	$('.itemq').each(function(){
	qt_ci.push([this.value]);

		});
	$('.itemdes').each(function(){
	des_ci.push([this.value]);

		});
	alert (inm_ci);
		// out = '<tr id = "rw_'+r+'">';
		out = '<td class ="Item_code"><input type="hidden" name = "hidden_code[]" id = "code'+edid_ci+'" value="'+cd_ci+'" class = "Item_cc" >'+cd_ci+' </td>';
		out += '<td class ="Item_name">'+inm_ci+'<input type="hidden" name = "hidden_itemname[]" id = "hidden_item'+edid_ci+'" value = "'+inm_ci+'" class = "Item_nc" > </td>';
		out += '<td class ="Item_qty">'+qt_ci+'<input type="hidden" name = "hidden_qty[]" id = "hidden_qty'+edid_ci+'" value = "'+qt_ci+'" class = "Item_qc" > </td>';
		out += '<td class ="Item_des">'+des_ci+'<input type="hidden" name = "hidden_des[]" id = "hidden_des'+edid_ci+'" value = "'+des_ci+'" class = "Item_dc" > </td>';
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
					bn +='<input id="codename" value = "'+codeci+'" class = "itemCode"></input>';
				bn +='<select name="code_select" id="code_select">' ;
					bn +='<option value="">SI</option>';
					bn +='<option value="">SC</option>';
					bn +='<option value="">CI</option>';
					bn +='<option value="">DR</option>';
					bn +='<option value="">GI</option>';
					bn +='<option value="">FD</option>';
				bn +='</select></p>';
				bn +='<p>';
					
				bn +='<input type="text" name="edit_Itemname" id="edit_Itemname" value = "'+item_nameci+'"  class = "itemnm"></p>';
				bn +='<p>';
					
				bn +='<input type="text" name="edit_qty" id="edit_qty" value = "'+qty_ci+'" class = "itemq"></p>';
				bn +='<p>';
					
				bn +='<input type="text" name="edit_description" id="edit_description" value = "'+des_ci+'" class = "itemdes"></p>';
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
});

$(document).on('click', '.remove_detailci', function(){
	var id = $(this).attr("id");
	$('#rwc_'+id+'').remove();
});






$('#item_save4').click(function(){
		var ct3 = "DR";
		var count4=$("#dynamicfield input").size();
		var request4=parseInt($("#qtyI3").val(),10);
	var itemName4 = [];
	var qty4 = [];
	var description4 = [];
	
	$('.ItemTinput4').each(function(){
	itemName4.push([this.value]);

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
		out4 += '<td class ="Item_code"><input type="hidden" name = "hidden_code[]" id = "codedr'+t+'" value = "'+ct3+'" class = "Item_cd" > '+ct3+'</td>';
		out4 += '<td class ="Item_name">'+itemName4[t]+'<input type="hidden" name = "hidden_itemname[]" id = "hidden_itemdr'+t+'" value = "'+itemName4[t]+'" class = "Item_nd" > </td>';
		out4 += '<td class ="Item_qty">'+qty4[t]+'<input type="hidden" name = "hidden_qty[]" id = "hidden_qtydr'+t+'" value = "'+qty4[t]+'" class = "Item_qd" > </td>';
		out4 += '<td class ="Item_des">'+description4[t]+'<input type="hidden" name = "hidden_des[]" id = "hidden_desdr'+t+'" value = "'+description4[t]+'" class = "Item_dd" > </td>';
		out4 += '<td> <button type = "button" class = "btn btn-warning view_detaildr" id = "'+t+'" name = "edit_item">Edit</button>  <button type = "button" class = "btn btn-danger remove_detaildr" id = "'+t+'" name = "del_item">Delete</button> </td>';
		// out += '<td> <button type = "button" class = "btn btn-danger" id = "'+cnt+'" name = "del_item">Delete</button> </td>';
		out4+='</tr>';

		$('#itemTable').append(out4);
		
	}
	
}
}else {

	var edid_dr = $('#hidden_row_id4').val();
	var inm_dr = [];
	var cd_dr = [];
	var qt_dr = [];
	var des_dr = [];


	 $('.itemCode').each(function(){
	cd_dr.push([this.value]);

		});
	$('.itemnm').each(function(){
	inm_dr.push([this.value]);

		});
	$('.itemq').each(function(){
	qt_dr.push([this.value]);

		});
	$('.itemdes').each(function(){
	des_dr.push([this.value]);

		});
	alert (inm_dr);
		// out = '<tr id = "rw_'+r+'">';
		out = '<td class ="Item_code"><input type="hidden" name = "hidden_code[]" id = "code'+edid_dr+'" value="'+cd_dr+'" class = "Item_cd" >'+cd_dr+' </td>';
		out += '<td class ="Item_name">'+inm_dr+'<input type="hidden" name = "hidden_itemname[]" id = "hidden_item'+edid_dr+'" value = "'+inm_dr+'" class = "Item_nd" > </td>';
		out += '<td class ="Item_qty">'+qt_dr+'<input type="hidden" name = "hidden_qty[]" id = "hidden_qty'+edid_dr+'" value = "'+qt_dr+'" class = "Item_qd" > </td>';
		out += '<td class ="Item_des">'+des_dr+'<input type="hidden" name = "hidden_des[]" id = "hidden_des'+edid_dr+'" value = "'+des_dr+'" class = "Item_dd" > </td>';
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
					bn +='<input id="codename" value = "'+codedr+'" class = "itemCode"></input>';
				bn +='<select name="code_select" id="code_select">' ;
					bn +='<option value="">SI</option>';
					bn +='<option value="">SC</option>';
					bn +='<option value="">CI</option>';
					bn +='<option value="">DR</option>';
					bn +='<option value="">GI</option>';
					bn +='<option value="">FD</option>';
				bn +='</select></p>';
				bn +='<p>';
					
				bn +='<input type="text" name="edit_Itemname" id="edit_Itemname" value = "'+item_namedr+'"  class = "itemnm"></p>';
				bn +='<p>';
					
				bn +='<input type="text" name="edit_qty" id="edit_qty" value = "'+qty_dr+'" class = "itemq"></p>';
				bn +='<p>';
					
				bn +='<input type="text" name="edit_description" id="edit_description" value = "'+des_dr+'" class = "itemdes"></p>';
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
});

$(document).on('click', '.remove_detaildr', function(){
	var id = $(this).attr("id");
	$('#rwd_'+id+'').remove();
});






$('#item_save5').click(function(){
		var ct5 = "GI";
		var count5=$("#dynamicfield input").size();
		var request5=parseInt($("#qtyI4").val(),10);
	var itemName5 = [];
	var qty5 = [];
	var description5 = [];
	
	$('.ItemTinput5').each(function(){
	itemName5.push([this.value]);

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
		out5 += '<td class ="Item_code"><input type="hidden" name = "hidden_code[]" id = "codegi'+t+'" value = "'+ct5+'" class = "Item_cg" > '+ct5+'</td>';
		out5 += '<td class ="Item_name">'+itemName5[t]+'<input type="hidden" name = "hidden_itemname[]" id = "hidden_itemgi'+t+'" value = "'+itemName5[t]+'" class = "Item_ng" > </td>';
		out5 += '<td class ="Item_qty">'+qty5[t]+'<input type="hidden" name = "hidden_qty[]" id = "hidden_qtygi'+t+'" value = "'+qty5[t]+'" class = "Item_qg" > </td>';
		out5+= '<td class ="Item_des">'+description5[t]+'<input type="hidden" name = "hidden_des[]" id = "hidden_desgi'+t+'" value = "'+description5[t]+'" class = "Item_dg" > </td>';
		out5 += '<td> <button type = "button" class = "btn btn-warning view_detailgi" id = "'+t+'" name = "edit_item">Edit</button>  <button type = "button" class = "btn btn-danger remove_detailgi" id = "'+t+'" name = "del_item">Delete</button> </td>';
		// out += '<td> <button type = "button" class = "btn btn-danger" id = "'+cnt+'" name = "del_item">Delete</button> </td>';
		out5 +='</tr>';

		$('#itemTable').append(out5);
		
	}
	
}
}

else {

	var edid_gi = $('#hidden_row_id5').val();
	var inm_gi = [];
	var cd_gi = [];
	var qt_gi = [];
	var des_gi = [];


	 $('.itemCode').each(function(){
	cd_gi.push([this.value]);

		});
	$('.itemnm').each(function(){
	inm_gi.push([this.value]);

		});
	$('.itemq').each(function(){
	qt_gi.push([this.value]);

		});
	$('.itemdes').each(function(){
	des_gi.push([this.value]);

		});
	alert (inm_gi);
		// out = '<tr id = "rw_'+r+'">';
		out = '<td class ="Item_code"><input type="hidden" name = "hidden_code[]" id = "code'+edid_gi+'" value="'+cd_gi+'" class = "Item_cg" >'+cd_gi+' </td>';
		out += '<td class ="Item_name">'+inm_gi+'<input type="hidden" name = "hidden_itemname[]" id = "hidden_item'+edid_gi+'" value = "'+inm_gi+'" class = "Item_ng" > </td>';
		out += '<td class ="Item_qty">'+qt_gi+'<input type="hidden" name = "hidden_qty[]" id = "hidden_qty'+edid_gi+'" value = "'+qt_gi+'" class = "Item_qg" > </td>';
		out += '<td class ="Item_des">'+des_gi+'<input type="hidden" name = "hidden_des[]" id = "hidden_des'+edid_gi+'" value = "'+des_gi+'" class = "Item_dg" > </td>';
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
					bn +='<input id="codename" value = "'+codegi+'" class = "itemCode"></input>';
				bn +='<select name="code_select" id="code_select">' ;
					bn +='<option value="">SI</option>';
					bn +='<option value="">SC</option>';
					bn +='<option value="">CI</option>';
					bn +='<option value="">DR</option>';
					bn +='<option value="">GI</option>';
					bn +='<option value="">FD</option>';
				bn +='</select></p>';
				bn +='<p>';
					
				bn +='<input type="text" name="edit_Itemname" id="edit_Itemname" value = "'+item_namegi+'"  class = "itemnm"></p>';
				bn +='<p>';
					
				bn +='<input type="text" name="edit_qty" id="edit_qty" value = "'+qty_gi+'" class = "itemq"></p>';
				bn +='<p>';
					
				bn +='<input type="text" name="edit_description" id="edit_description" value = "'+des_gi+'" class = "itemdes"></p>';
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
});

$(document).on('click', '.remove_detailgi', function(){
	var id = $(this).attr("id");
	$('#rwg_'+id+'').remove();
});







$('#item_save6').click(function(){
		var ct6 = "FD";
		var count6=$("#dynamicfield input").size();
		var request6=parseInt($("#qtyI5").val(),10);
	var itemName6 = [];
	var qty6 = [];
	var description6 = [];
	
	$('.ItemTinput6').each(function(){
	itemName6.push([this.value]);

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
		out6 += '<td class ="Item_code"><input type="hidden" name = "hidden_code[]" id = "codefd'+t+'" value = "'+ct6+'" class = "Item_cf" > '+ct6+'</td>';
		out6 += '<td class ="Item_name">'+itemName6[t]+'<input type="hidden" name = "hidden_itemname[]" id = "hidden_itemfd'+t+'" value = "'+itemName6[t]+'" class = "Item_nf" > </td>';
		out6 += '<td class ="Item_qty">'+qty6[t]+'<input type="hidden" name = "hidden_qty[]" id = "hidden_qtyfd'+t+'" value = "'+qty6[t]+'" class = "Item_qf" > </td>';
		out6+= '<td class ="Item_des">'+description6[t]+'<input type="hidden" name = "hidden_des[]" id = "hidden_desfd'+t+'" value = "'+description6[t]+'" class = "Item_df" > </td>';
		out6 += '<td> <button type = "button" class = "btn btn-warning view_detailfd" id = "'+t+'" name = "edit_item">Edit</button>  <button type = "button" class = "btn btn-danger remove_detailfd" id = "'+t+'" name = "del_item">Delete</button> </td>';
		// out += '<td> <button type = "button" class = "btn btn-danger" id = "'+cnt+'" name = "del_item">Delete</button> </td>';
		out6 +='</tr>';

		$('#itemTable').append(out6);
		
	}
	
}
}

else {

	var edid_fd = $('#hidden_row_id6').val();
	var inm_fd = [];
	var cd_fd = [];
	var qt_fd = [];
	var des_fd = [];


	 $('.itemCode').each(function(){
	cd_fd.push([this.value]);

		});
	$('.itemnm').each(function(){
	inm_fd.push([this.value]);

		});
	$('.itemq').each(function(){
	qt_fd.push([this.value]);

		});
	$('.itemdes').each(function(){
	des_fd.push([this.value]);

		});
	alert (inm_fd);
		// out = '<tr id = "rw_'+r+'">';
		out = '<td class ="Item_code"><input type="hidden" name = "hidden_code[]" id = "code'+edid_fd+'" value="'+cd_fd+'" class = "Item_cf" >'+cd_fd+' </td>';
		out += '<td class ="Item_name">'+inm_fd+'<input type="hidden" name = "hidden_itemname[]" id = "hidden_item'+edid_fd+'" value = "'+inm_fd+'" class = "Item_nf" > </td>';
		out += '<td class ="Item_qty">'+qt_fd+'<input type="hidden" name = "hidden_qty[]" id = "hidden_qty'+edid_fd+'" value = "'+qt_fd+'" class = "Item_qf" > </td>';
		out += '<td class ="Item_des">'+des_fd+'<input type="hidden" name = "hidden_des[]" id = "hidden_des'+edid_fd+'" value = "'+des_fd+'" class = "Item_df" > </td>';
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


$('#fddv').empty();
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
					bn +='<input id="codename" value = "'+codefd+'" class = "itemCode"></input>';
				bn +='<select name="code_select" id="code_select">' ;
					bn +='<option value="">SI</option>';
					bn +='<option value="">SC</option>';
					bn +='<option value="">CI</option>';
					bn +='<option value="">DR</option>';
					bn +='<option value="">GI</option>';
					bn +='<option value="">FD</option>';
				bn +='</select></p>';
				bn +='<p>';
					
				bn +='<input type="text" name="edit_Itemname" id="edit_Itemname" value = "'+item_namefd+'"  class = "itemnm"></p>';
				bn +='<p>';
					
				bn +='<input type="text" name="edit_qty" id="edit_qty" value = "'+qty_fd+'" class = "itemq"></p>';
				bn +='<p>';
					
				bn +='<input type="text" name="edit_description" id="edit_description" value = "'+des_fd+'" class = "itemdes"></p>';
				bn +='</div>';
				$('#fddv').append(bn);
				// $('#all').html('');

// $('#Im'+sc_row_id+'').val(item_namesc);
// $('#codename').val(code);
// $('#Iq'+sc_row_id+'').val(qty_sc);
// $('#Id'+sc_row_id+'').val(des_sc);
$('#hidden_row_id6').val(fd_row_id);
$('#item_save6').text('Edit');
$('#modalDialog5').modal('show');
});

$(document).on('click', '.remove_detailfd', function(){
	var id = $(this).attr("id");
	$('#rws_'+id+'').remove();
});

// SAVE RESERVATIONS WITH ITEMS
$("#reserve form").on("click","#Lsave", function(e){		
	e.preventDefault();
	

	var allCode = [];
	var allItemName = [];
	var allQty = [];
	var allDes = [];

	
	$('.Item_code').each(function(){
		allCode.push($(this).text());
			});

	$('.Item_name').each(function(){
	allItemName.push($(this).text());
		});

		$('.Item_qty').each(function(){
			allQty.push($(this).text());
				});
				$('.Item_des').each(function(){
					allDes.push($(this).text());
						});

	var saveBtn = $('#Lsave').val();
	var tablename = $('#don_name').text();
	var tableteamname = $('#team_name').text();
	var date = new Date($('#rese').val()); //this is notworking
	var resDate = date.getDate() ; //same here
	var check = $('#active2').is(':checked');
	
	if(check == true)
	{
		var check = "done";
	} else {
		var check = "fail";
	}					
		
alert(resDate);
//ajax call 
$.ajax({

	url:"../../controller/reserveItem.php",	
	method:"POST",
	data: {
		allCode:allCode,
		allItemName:allItemName,
		allQty:allQty,
		allDes:allDes,
		tablename:tablename,
		tableteamname:tableteamname,
		resDate:resDate,
		check:check,
		saveBtn:saveBtn
		},
	success: function(data){
		$('#mainFormResult').html(data);
	
		$("#itemTable").text("");
		$('#itemlist')[0].reset();
		
	}
	

}); 

}); 



// VALIDATIONS
$(document).ready(function(){ 

	$('#tempdonorEmail').keyup(function(){
		if(!validateEmail()){
			//if the email is not validated set border red
			$('#tempdonorEmail').css("border","2px solid red");
			$('#emailMsgT').css('color', 'red');
			$("#emailMsgT").html('Invalid');
		} else {
			//if email is validated set border green
			$('#tempdonorEmail').css("border","2px solid green");
			//set label
			$('#emailMsgT').css('color', 'green');
			$("#emailMsgT").html('Valid');
			
		}

	});


	$('#tempdonorMobile').keyup(function(e) {
        if (validateContact()) {
            $('#mobile').html('Valid');
            $('#mobile').css('color', 'green');
            $('#tempdonorMobile').css("border","2px solid green");
            
        }
        else {
            $('#mobile').html('Invalid');
            $('#mobile').css('color', 'red');
            $('#tempdonorMobile').css("border","2px solid red");
        }
    });

    $('#tempdonorMobile2').keyup(function(e) {
        if (validateContactA()) {
            $('#mobile2').html('Valid');
            $('#mobile2').css('color', 'green');
            $('#tempdonorMobile2').css("border","2px solid green");
            
        }
        else {
            $('#mobile2').html('Invalid');
            $('#mobile2').css('color', 'red');
            $('#tempdonorMobile2').css("border","2px solid red");
        }
    });

	$('#tempdonorNic').keyup(function(e) {
        if (validateNic()) {
            $('#tempnic').html('Valid');
            $('#tempnic').css('color', 'green');
            $('#tempdonorNic').css("border","2px solid green");
            
        }
        else {
            $('#tempnic').html('Invalid');
            $('#tempnic').css('color', 'red');
            $('#tempdonorNic').css("border","2px solid red");
        }
    });

});


function validateEmail(){

		// get value of input email
		var email=$("#tempdonorEmail").val();
		// use reular expression
		 var reg = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/
		 if(reg.test(email)){
		 	return true;
		 }else{
		 	return false;
		 }

}

// temp team validation
$(document).on('input', '.emailR', function(){
	var mailid = $(this).attr("id"); 
	var x = $('#d'+mailid+'');
	x = {};
var y = $(this);
var regt = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
var isMail = regt.test(y.val());
if(isMail){y.removeClass("invalid").addClass("valid");}
else {y.removeClass("valid").addClass("invalid");}
});


//temp person contact
function validateContact(){
var a = $('#tempdonorMobile').val();
var filter = /^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/;
if (filter.test(a)) {
	return true;
}
else {
	return false;
}

}


function validateContactA(){
var a = $('#tempdonorMobile2').val();
var filter = /^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/;
if (filter.test(a)) {
	return true;
}
else {
	return false;
}

}
// team contact validation
$(document).on('input', '.contactR', function(){
var contactid = $(this).attr("id"); 
var cnt = $('#cc'+contactid+'');
cnt = {};
var cnty = $(this);
var regct =  /^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/;
var isCont = regct.test(cnty.val());
if(isCont){cnty.removeClass("invalid").addClass("valid");}
else {cnty.removeClass("valid").addClass("invalid");}
});



// person nic validation
function validateNic(){
var a = $('#tempdonorNic').val();
var filter = /^([0-9]{9}[x|X|v|V]|[0-9]{12})$/mg;
if (filter.test(a)) {
	return true;
}
else {
	return false;
}

}
// team nic validation
$(document).on('input', '.nicR', function(){
var nicid = $(this).attr("id"); 
var nc = $('#nc'+nicid+'');
nc = {};
var nicy = $(this);
var regct =  /^([0-9]{9}[x|X|v|V]|[0-9]{12})$/mg;
var isNic = regct.test(nicy.val());
if(isNic){nicy.removeClass("invalid").addClass("valid");}
else {nicy.removeClass("valid").addClass("invalid");}
});






















// <!-- check for donor team -->
		

// 	$(document).ready(function(){
// 		$("#active").click("touchstart",function(){
// 			$("#donorinfo,#donorTeamInfo").toggle();
			
// 		});

//  $(".third").click(function(e){

// 	e.preventDefault();
	
// });

//  // $("#sub").click(function(e){
 
// // 	e.stopPropagation();
	
// // });
// 	});
// 	$(document).ready(function(){

// $('body').on("click touchstart", "#active", (function(e){

// 	$("#donorinfo,#donorTeamInfo ").toggle();

// });
// });

// $(function(){
// $("#active").click(function(){
	

// 	if($(this).is(":checked")){
// 		$("#donorTeamInfo").show();
// 		$("#donorinfo").hide();
// 		$("#teamDetails").show();
// 		$("#donorDetailfirst").hide();
// 		$("button").click(function(event){
	
// });

// 	}else
// 		{
	
// 		$("#donorTeamInfo").hide();
// 		$("#donorinfo").show();
// 		$("#donorDetailfirst").show();
// 		$("#teamDetails").hide();
// 	}


// });


//  
// <!-- prevent hiding divs when click on buttons -->

// $("#sub").click(function(e){
// 	e.preventDefault();
// });

// $("#subD2").click(function(e){
// 	e.preventDefault();
// })

// 	to keep checkbox clicked even refresh					
// 	$(function(){
// 	var test = localStorage.input ==='true'? true:false;
// 	$('input').prop('checked',test || false);

// });

// $('input').on('change', function(){
// 	localStorage.input = $(this).is(':checked');
// 	console.log($(this).is(':checked'));

// });
