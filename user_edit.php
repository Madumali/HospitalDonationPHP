<?php

include 'header3.php';
?>
<!doctype html>
<html lang="en">
<title>User List</title>
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
            <div class="col-md-12">
                <br> <br><br><br>
                    
                <div id="message"></div>
               
                <div class="row mt-3">
                    <div class="col-md-12">
                        
                        <!-- Table -->
                        <div class="table-responsive">
                            <table class="table table-borderless display nowrap" id="records_user" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>NIC</th> 
                                        <th>Designation</th>
										<th>Department</th>
                                        <th>Email</th>
                                        <th>Username</th>
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

<div class="modal fade" id="exampleModaldnw2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog new">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-success" id="exampleModalLabel">Edit User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="edit_list">

		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="update_user">Update</button>
      </div>
    </div>
  </div>
</div>

    <!-- Add donation from donor list -->
  
		
	
	
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
    // Fetch records

    function fetchd() {
        $.ajax({
            url: "records_user.php",
            type: "POST",
            
            dataType: "json",
            success: function(data) {
                // Datatables
                var i = "1";
                // var a="";
if(!$.fn.DataTable.isDataTable('#records_user')){
                $('#records_user').DataTable({
                    "data": data,
                //    "dom":'Bfrtip',
                
                    // buttons
                   
                   
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
                            "data": "user_full_name"
                            // "data": "member_name"
                            // "render": function(data, type, row, meta) {
                            //     return `_${data.member_name}_`;
                            // }
                        },
                        {
                            "data": "user_nic"
                           
                        },
                        {
                            "data": "designation"
                            
                        },
                        {
                            "data": "user_department"
                            
                        },
                        {
                            "data": "user_email"
                        },
                        {
                            "data": "username"
                           
                        },
                        
                        {
                            render:function(data, type, row, meta){
                                var a =`
                                 
                               

                                 <a  href="" id="useredit" value = "${row.uid}" class = "btn btn-sm btn-outline-warning" data-bs-toggle="modal" 
                                 data-bs-target="#exampleModaldnw2"><i class="fas fa-edit" id="edit"></i></a>
                                
                                 <a  href="" id="userdelete" value = "${row.uid}" class = "btn btn-sm btn-outline-danger"><i class="fas fa-trash" id="delete"></i></a>

                                
                                `;
                                return a;
                            }
                        }
                    ]
                });
            }
            }
        });
    }
    fetchd();

   

    </script>
</body>

</html>



<script src="/HospitalDonation/assets/js/script2.js"></script> 
<script src="/HospitalDonation/assets/js/scriptD.js"></script>