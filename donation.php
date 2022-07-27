<?php

include 'header3.php';
?>
<!doctype html>
<html lang="en">
<title>Donation List</title>
<head>

<link rel="stylesheet" type="text/css" href="assets/DataTables/DataTables-1.10.25/css/dataTables.bootstrap4.min.css" />
<link rel="stylesheet" type="text/css" href="assets/DataTables/DataTables-1.10.25/css/jquery.dataTables.min.css" />

   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="assets/css/bootstrap.css">
    
    <link rel="stylesheet" href="assets/css/menu.css">
    
    
    <!-- Datepicker -->
    <link rel="stylesheet" href="assets/css/jquery-ui.css">

    <!-- Datatables -->
    
        <link rel="stylesheet" type="text/css" href="assets/DataTables/Buttons-1.7.1/css/buttons.bootstrap4.min.css" />
        <link rel="stylesheet" type="text/css" href="assets/DataTables/Responsive-2.2.9/css/responsive.bootstrap4.min.css" />
        <link rel="stylesheet" href="fontawesome/css/all.min.css">
    
    
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5">
                 <!-- <h1 class="text-center">PHP OOP AJAX DATATABLES DATE RANGE</h1> -->
                <!-- <hr> --> 
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-info text-white" id="basic-addon1"><i
                                        class="fas fa-calendar-alt"></i></span>
                            </div>
                            <input type="text" class="form-control" id="start_date" placeholder="Start Date" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-info text-white" id="basic-addon1"><i
                                        class="fas fa-calendar-alt"></i></span>
                            </div>
                            <input type="text" class="form-control" id="end_date" placeholder="End Date" readonly>
                        </div>
                    </div>
                </div>
                <div id="itemdisplay"></div>
                <div>
                    <button id="filter" class="btn btn-outline-info btn-sm">Filter</button>
                    <button id="reset" class="btn btn-outline-warning btn-sm">Reset</button>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        
                        <!-- Table -->
                        <div class="table-responsive">
                            <table class="table table-borderless display nowrap" id="records" style="width:100%">
                                <thead>
                                    <tr>
                                         <th>ID</th>
                                        <th>Name</th>
                                        <th>NIC</th> 
                                        <th>Address1</th> 
                                        <th>Address2</th> 
                                        <th>Contact</th> 
                                        <th>Type Code</th>
                                        <th>Item Name</th>
                                        <th>Item Qty</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- edit donor -->

<div class="modal fade" id="exampleModalitem" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog new">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-success" id="exampleModalLabel">Edit Donation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="edit_itemlist">

		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="update4">Update</button>
      </div>
    </div>
  </div>
</div>
               
 <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="assets/js/jquery-3.6.0.js"></script>
    <script src="assets/js/popper.min.js"></script>
    
   
    
    <!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script> -->
    <script src="assets/js/bootstrap.js">
    </script>
    <!-- Font Awesome -->
    <script src="fontawesome/js/all.min.js"></script>
    <!-- Datepicker -->
    <script src="assets/js/jquery-ui.js"></script>
    <!-- Datatables -->
    
   
    <script type="text/javascript"src="assets/DataTables/JSZIP-2.5.0/jszip.min.js"> </script>
    <script type="text/javascript" src="assets/DataTables/pdfmake-0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="assets/DataTables/pdfmake-0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript"src="assets/DataTables/DataTables-1.10.25/js/jquery.dataTables.min.js"></script>
     <!-- <script type="text/javascript"src="assets/DataTables/DataTables-1.10.25/js/dataTables.bootstrap4.min.js"></script> -->
     <script type="text/javascript"src="assets/DataTables/Buttons-1.7.1/js/dataTables.buttons.min.js"> </script>
     <script type="text/javascript"src="assets/DataTables/Buttons-1.7.1/js/buttons.bootstrap4.min.js"> </script>
     <script type="text/javascript"src="assets/DataTables/Buttons-1.7.1/js/buttons.html5.min.js"> </script>
    <script type="text/javascript"src="assets/DataTables/Buttons-1.7.1/js/buttons.print.min.js"> </script>
    <script type="text/javascript"src="assets/DataTables/Responsive-2.2.9/js/dataTables.responsive.min.js"> </script>
    <script type="text/javascript"src="assets/DataTables/Responsive-2.2.9/js/responsive.bootstrap4.min.js"> </script>
    
    <!-- Momentjs -->
    <script src="assets/js/moment.min.js"></script>

    <script>
    $(function() {
        $("#start_date").datepicker({
            "dateFormat": "yy-mm-dd"
        });
        $("#end_date").datepicker({
            "dateFormat": "yy-mm-dd"
        });
    });
    </script>

    <script>
    // Fetch records

    function fetch(start_date, end_date) {
        $.ajax({
            url: "records.php",
            type: "POST",
            data: {
                start_date: start_date,
                end_date: end_date
            },
            dataType: "json",
            success: function(data) {
                // Datatables
                var i = "1";
                // var a="";

                $('#records').DataTable({
                    "data": data,
                //    "dom":'Bfrtip',
                
                    // buttons
                    "dom": "<'row'<'col-sm-12 col-md-4'l><'col-sm-12 col-md-4'B><'col-sm-12 col-md-4'f>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                    "buttons": [
                        {
                extend: 'copyHtml5',
                exportOptions: {
                    columns: [ 1, ':visible' ]
                }
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: [  1, 2,3,4,5,6,7,8,9 ]
                }
            },

			{
                extend: 'print',
				title:'Doation List',
                exportOptions: {
                columns: [  1, 2,3,4,5,6,7,8,9 ]
                },
				customize: function( win )
				{
					$(win.document.body)
					.css('font-size', '10pt')
					.prepend('<img src="assets/img/nciNew.png" style="position:absolute; top:0; left:0;/>');

					$(win.document.body).find('table')
					.addClass('compact')
					.css('font-size','inherit');
				}
            },
            
                        //  'excel', 'pdf', 'print',
                        
                    ],
                    "lengthMenu":[ [10,25,50,-1], [10, 25, 50, "All"] ],
                    // responsive
                    "responsive": true,
                    "columnDefs":[{"defaultContent":"-",
                        "targets":"_all"
                        }],
                    "columns": [
                            {
                            render: function(data, type, row, meta) {
                                return a = i++;
                            } 
                            
                        },
                        {
                            "data": "donor_name"
                           
                        },
                        {
                            "data": "national_id"
                           
                        },
                        {
                            "data": "address_line1"
                           
                        },
                        {
                            "data": "address_line2"
                           
                        },
                        {
                            "data": "contact_no"
                           
                        },
                        {
                            "data": "type_code"
                            
                        },
                        {
                            "data": "itemname"
                            
                        },
                        {
                            "data": "item_qty"
                        },
                        {
                            "data": "receive_date"
                           
                        },
                       
                        {
                            render:function(data, type, row, meta){
                                var a =`
                                <a  href="" id="itemedit" value = "${row.item_id}" 
                                class = "btn btn-sm btn-outline-warning"  data-bs-toggle="modal" data-bs-target="#exampleModalitem" ><i class="fas fa-edit" id="edit"></i></a>
                                <a  href="" id="item_del" value = "${row.item_id}"  
                                class = "btn btn-sm btn-outline-danger"><i class="fas fa-trash" id="delete"></i></a>

                               
                                `;
                                return a;
                            }
                        }
                    ],
                });
            }
         
        });
    }
    fetch();

    // Filter

    $(document).on("click", "#filter", function(e) {
        e.preventDefault();

        var start_date = $("#start_date").val();
        var end_date = $("#end_date").val();

        if (start_date == "" || end_date == "") {
            alert("both date required");
        } else {
            $('#records').DataTable().destroy();
            fetch(start_date, end_date);
        }
    });

    // Reset

    $(document).on("click", "#reset", function(e) {
        e.preventDefault();

        $("#start_date").val(''); // empty value
        $("#end_date").val('');

        $('#records').DataTable().destroy();
        fetch();
    });



    </script>
</body>

</html>



<script src="/HospitalDonation/assets/js/script2.js"></script> 
<script src="/HospitalDonation/assets/js/scriptD.js"></script>



     <!-- <script>
//     $(function() {
//         $("#start_date").datepicker({
//             "dateFormat": "yy-mm-dd"
//         });
//         $("#end_date").datepicker({
//             "dateFormat": "yy-mm-dd"
//         });
//     });
//     </script>

//     <script>
//     // Fetch records

//     function fetch(start_date, end_date) {
//         $.ajax({
//             url: "records.php",
//             type: "POST",
//             data: {
//                 start_date: start_date,
//                 end_date: end_date
//             },
//             dataType: "json",
//             success: function(data) {
//                 // Datatables
//                 var i = "1";
//                 // var a='';
//                 if(!$.fn.DataTable.isDataTable('#records')){
//                 $('#records').DataTable({
//                     "data": data,
//                 //    "dom":'Bfrtip',
                
//                     // buttons
//                     "dom": "<'row'<'col-sm-12 col-md-4'l><'col-sm-12 col-md-4'B><'col-sm-12 col-md-4'f>>" +
//                         "<'row'<'col-sm-12'tr>>" +
//                         "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
//                     "buttons": [
//                         {
//                 extend: 'copyHtml5',
//                 exportOptions: {
//                     columns: [ 1, ':visible' ]
//                 }
//             },
//             {
//                 extend: 'excelHtml5',
//                 exportOptions: {
//                     columns: ':visible'
//                 }
//             },
//             {
//                 extend: 'pdfHtml5',
//                 exportOptions: {
//                     columns: [  1, 2,3,4,5,6 ]
//                 }
//             },

// 			{
//                 extend: 'print',
// 				title:'Donation List for ',
//                 exportOptions: {
//                 columns: [  1, 2,3,4,5,6 ]
//                 },
// 				customize: function( win )
// 				{
// 					$(win.document.body)
// 					.css('font-size', '10pt')
// 					.prepend('<img src="assets/img/nciNew.png" style="position:absolute; top:0; left:0;/>');

// 					$(win.document.body).find('table')
// 					.addClass('compact')
// 					.css('font-size','inherit');
// 				}
//             },
                        
//                     ],
//                     "lengthMenu":[ [10,25,50,-1], [10, 25, 50, "All"] ],
//                     // responsive
//                     "responsive": true,
//                     "columnDefs":[{"defaultContent":"-",
//                         "targets":"_all"
//                         }],
//                     "columns": [
//                         {
//                             render: function(data, type, row, meta) {
//                                 return a = i++;
//                             } 
                            
//                         },
//                         {
//                             "data": "donor_name"
//                         },
//                         {
//                             "data": "national_id"
//                             // 
//                         },
//                         {
//                             "data": "type_code"
//                             // "render": function(data, type, row, meta) {
//                             //     return `${row.standard}th Standard`;
//                             // }
//                         },
//                         {
//                             "data": "item_name"
//                             // "render": function(data, type, row, meta) {
//                             //     return `${row.percentage}%`;
//                             // }
//                         },
//                         {
//                             "data": "item_qty"
//                         },
//                         {
//                             "data": "receive_date"
//                             // "render": function(data, type, row, meta) {
//                             //     return moment(row.created_at).format('YYYY-MM-DD');
//                             // }
//                         },
//                         {
//                             render:function(data, type, row, meta){
//                                 var a =`
//                                 <a  href="" id="itemedit" value = "${row.item_id}" class = "btn btn-sm btn-outline-warning"  data-bs-toggle="modal" data-bs-target="#exampleModalitem" ><i class="fas fa-edit" id="edit"></i></a>
//                                 <a  href="" id="item_del" value = "${row.item_id}"  class = "btn btn-sm btn-outline-danger"><i class="fas fa-trash" id="delete"></i></a>

                               
//                                 `;
//                                 return a;
//                             }
//                         }
//                     ]
//                 });
//             }
//             }
//         });
//     }
//     fetch();

//     // Filter

//     $(document).on("click", "#filter", function(e) {
//         e.preventDefault();

//         var start_date = $("#start_date").val();
//         var end_date = $("#end_date").val();

//         if (start_date == "" || end_date == "") {
//             alert("both date required");
//         } else {
//             $('#records').DataTable().destroy();
//             fetch(start_date, end_date);
//         }
//     });

//     // Reset

//     $(document).on("click", "#reset", function(e) {
//         e.preventDefault();

//         $("#start_date").val(''); // empty value
//         $("#end_date").val('');

//         $('#records').DataTable().destroy();
//         fetch();
//     });
//     </script>
// </body>

// </html>
// <script src="/HospitalDonation/assets/js/script2.js"></script> 
// <script src="/HospitalDonation/assets/js/scriptD.js"></script> -->