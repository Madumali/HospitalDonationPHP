




$('#SC').on('click', function(){
	$('#item_save1').text('save');
	$('#modalDialog').modal('show');
	$("#sc").show();
	$("#scdv").hide();
	
});

$('#c1').on('click', function(){
	$('#modalDialog').modal('hide');
	// $("#sc").hide();
	// $("#si").hide();
	// $("#ci").hide();
					
});

$('body').on('click', function(e){
	if($(e.target).hasClass("modal"))
	{
		$('#modalDialog').modal('hide');
	}
});
// if($('#item_save6').text('Edit'))
// {
// 	$('#c1').on('click', function(){
// 		$('#item_save1').text('save');
// 		$('#modalDialog').modal('hide');
						
// 	});
// }



$('#SI').on('click', function(){
	$('#item_save2').text('save');
	$("#si").show();
	$("#sidv").hide();
	
});
$('#c2').on('click', function(){
	$('#modalDialog1').modal('hide');				
});

$('body').on('click', function(e){
	if($(e.target).hasClass("modal"))
	{
		$('#modalDialog1').modal('hide');
	}
});

var modal2 = $('#modalDialog2');
//GET THE CHECKBOX THAT OPENS MODAL
var chk2 = $('#CI');
//GET THE SPAN THT CLOSE MODAL
var span2 = $('#c3');
$('#CI').on('click', function(){
	$('#item_save3').text('save');
	// $('#cichk').html('active');
	$('#modalDialog2').modal('show');
	// $("#sc").hide();
	// $("#si").hide();
	// $("#ci").show();
	$("#cidv").hide();
});
$('#c3').on('click', function(){
	$('#modalDialog2').modal('hide');				
});


$('body').on('click', function(e){
	if($(e.target).hasClass("modal"))
	{
		$('#modalDialog2').modal('hide');
	}
});


$('#DR').on('click', function(){
	$('#item_save4').text('save');
	$('#modalDialog3').modal('show');
	// $("#dr").show();
	$("#drdv").hide();
});
$('#c4').on('click', function(){
	$('#modalDialog3').modal('hide');				
});


$('body').on('click', function(e){
	if($(e.target).hasClass("modal"))
	{
		$('#modalDialog3').modal('hide');
	}
});


$('#GI').on('click', function(){
	$('#item_save5').text('save');
	$('#modalDialog4').modal('show');
	// $("#gi").show();
	$("#gidv").hide();
});
//WHEN USER CLICKS ON SPAN CLOSE MODAL
$('#c5').on('click', function(){
	$('#modalDialog4').modal('hide');				
});


$('body').on('click', function(e){
	if($(e.target).hasClass("modal"))
	{
		$('#modalDialog4').modal('hide');
	}
});



$('#FD').on('click', function(){
	$("#fd").show();
	$('#item_save6').text('save');
	$('#modalDialog5').modal('show');
	
	$("#fddv").hide();
});
$('#c6').on('click', function(){
	$('#modalDialog5').modal('hide');				
});


$('body').on('click', function(e){
	if($(e.target).hasClass("modal"))
	{
		$('#modalDialog5').modal('hide');
	}
});



// $(document).ready(function(){
// 	var c = 0;
// 	$(document).on('click', '#additem', function(){
		
// 			$("#inputadddv").show();
		
// 		c = c+1;

// 		var html = '';
// 		html += '<input id="rw'+c+'" class="selectinput" type = "text" > <br/>';

// 		$("#inputadd").append(html);


// 	});

// 	$(document).on('click', '#itmsv', function(e){
// 		e.preventDefault();
// var inval = [];

// $('.selectinput').each(function(){
// 	inval.push($(this).val());
// });


// if(inval=='')
// {
// 	alert("enter item");
// return false;

// }
// var selectbtn = $('#itmsv').val();
// // alert(inval);
// 	$.ajax({

// 		url:"/HospitalDonation/controller/selectitem.php",	
// 		method:"POST",
// 		data: {
// 			inval:inval,
			
// 			selectbtn:selectbtn
// 		},
// 		success: function(data){
			
// 			$('#seccess').html(data);
			
// 			// $('#inputadddv')[0].reset();
			
// 		}
		


// 		});


// 	});

// });











	
