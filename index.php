<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Place favicon.ico in the root directory -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body style="background: rgb(140,189,62);
background: linear-gradient(90deg, rgba(140,189,62,1) 0%, rgba(9,105,121,1) 19%, rgba(5,176,82,1) 43%, rgba(0,228,255,1) 77%);">

        <!-- Navbar Design -->

      <nav class="navbar navbar-expand-lg text-light bg-dark">
        <div class="container">
  <a class="navbar-brand" href="#">
      
      <img class="img-fluid" style="width: 50px" src="image/logo.png">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">

    <ul class="navbar-nav ml-auto font-weight-bold text-white">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About</a>
      </li>
 
      <li class="nav-item">
        <a class="nav-link " href="#">Contact</a>
      </li>
    </ul>

  </div>

  </div>
</nav>


        <!-- Navbar Design -->

    	<div class="container mt-2">
    		<div class="text-center p-3 bg-danger rounded">
    			<h4 class="text-light">CRUD USING AJAX,PDO,MVC,BOOTSTRAP4 </h4>
    		</div>
    		<div class="row mt-2 mb-2 p-1">
				<div class="col-lg-6">
					<strong class="text-dark">User List</strong>
				</div>    			
				<div class="col-lg-6">


					<div class="manual-btn float-right">

            <a href="action.php?export=excel">

              <button class="btn btn-secondary">Export To Excel </button>
              
            </a>

						

						<button class="btn btn-primary" data-toggle="modal" data-target="#insertModal">Add User</button>

					</div>
					
				</div>   
    		</div>

    		<div class="row mt-2 mb-2 p-1">

    			<div class="col-lg-6"></div>
    			<div class="col-lg-6">
    				<form>
    					<div class="form-group float-right">

    						<input type="text" name="search" class="form-control" placeholder="Search">
    						<input type="submit" value="Search" name="submit" class="btn btn-danger mt-2">
    						
    					</div>
    				</form>

    			</div>
    			
    		</div>


    		<div class="row">
    			<div class="col-lg-12">
    				<div id="tbl_user">
    					
    					
    					
    				</div>
    			</div>
    		</div>
    	</div>

    	<!-- Add Modal & Edite Modal  -->
    <div class="modal" id="insertModal">
      <div class="modal-dialog">
        <div class="modal-content">

          <div class="modal-header bg-dark text-center text-light ">
            <h4 class="modal-title">Add User</h4>
          </div>
          <div class="modal-body">
            <form action="" method="POST" id="form-add-data">


    	<div class="form-group">
    		<input type="text" name="fname" placeholder="Frist Name" class="form-control" required="1">
    	</div>
    	<div class="form-group">
    		<input type="text" name="lname" placeholder="Last Name" class="form-control" required="1">
    	</div>
    	<div class="form-group">
    		<input type="emile" name="emile" placeholder="Emile Address" class="form-control" required="1">
    	</div>
		<div class="form-group">
			<input type="number" name="phone" placeholder="Phone Number" class="form-control" required="1">
		</div>

              <button type="submit" id="insertBtn" class="btn btn-warning btn-block">Insert</button>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>

        </div>
      </div>
    </div>
<!-- Edite user Modal -->

 <div class="modal" id="updateModal">
      <div class="modal-dialog">
        <div class="modal-content">

          <div class="modal-header bg-warning text-center text-dark ">
            <h4 class="modal-title">Update User Modal</h4>
          </div>
          <div class="modal-body">
            <form action="" method="POST" id="form-edit-data">

                  <input type="hidden" name="id" id="id">


    	<div class="form-group">

          

    		<input type="text" name="fname" id="fname" class="form-control" required="1">
    	</div>
    	<div class="form-group">
    		<input type="text" name="lname" id="lname" class="form-control" required="1">
    	</div>
    	<div class="form-group">
    		<input type="emile" name="emile" id="emile" class="form-control" required="1">
    	</div>
		<div class="form-group">
			<input type="number" name="phone" id="phone" class="form-control" required="1">
		</div>

         <button type="submit" id="updateBtn" class="btn btn-info btn-block">Update</button>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>

        </div>
      </div>
    </div>
<!-- Edite user Modal -->





    	<!-- Add Modal & Edite Modal  -->


        <script src="js/jquery-3.5.0.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
       <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

        <script>
        	
        	      $(document).ready(function(){
        	      	// Show All User Form Database
			            showUser();
			           function showUser(){
			                      $.ajax({
			                          url: 'action.php',
			                          type: 'POST',
			                          data: { action : 'view'},
			                          success:function (argument) {
			                              $('#tbl_user').html(argument);

			                          }
			                      });
			           		}
        	      	// Show All User Form Database

        	      	// insert Data ajax request

                       $('#insertBtn').click(function(event) {

                        // if ($().chackValidity()) {}
                                event.preventDefault();
                                    $.ajax({
                                          url: 'action.php',
                                          type: 'POST',
                                          data: $('#form-add-data').serialize()+"&action=Insert",
                                          success:function (argument) {
                                            console.log(argument);

                                            $("#insertModal").modal('hide');

                                            Swal.fire({
                                                      title: "Good job!",
                                                      text: "Data Insertted Successfully!",
                                                      icon: "success",
                                                    });




                                            showUser();
                                          }
                                     });

                                });
        	      	// insert Data ajax request

                    // Edite User 
                    // Show user 
         $('body').on('click', '.editeModal', function(event) {
                  event.preventDefault();
                  var edite_id = $(this).attr('id');

                         $.ajax({
                            url: 'action.php',
                            type: 'POST',
                            data: { edite_id:edite_id },
                            success:function (argument) {
                            var data = JSON.parse(argument);
                            $("#id").val(data.id);
                            $("#fname").val(data.fname);
                            $("#lname").val(data.lname);
                            $("#emile").val(data.emile);
                            $("#phone").val(data.phone);


                            }
                        });


                });

                    // Show user 

                    // Update User from Ajax Request 

                       $('#updateBtn').click(function(event) {
                                event.preventDefault();
                                    $.ajax({
                                          url: 'action.php',
                                          type: 'POST',
                                          data: $('#form-edit-data').serialize()+"&action=update",
                                          success:function (argument) {
                                           
                                            $("#updateModal").modal('hide');

                                                swal({
                                                  title: "Good job!",
                                                  text: "Data Updated Successfully!",
                                                  icon: "success",
                                                });
                                            showUser();
                                          }
                                     });
                                });

                    // Update User from Ajax Request 


                    // Edite User 
            // Delete Data form ajax request 

             $('body').on('click', '.DelUser', function(e) {

                 e.preventDefault();
                 var tr = $(this).closest('tr');
                 var del_id = $(this).attr('id');

                Swal.fire({
                      title: 'Are you sure?',
                      text: "You won't be able to revert this!",
                      icon: 'warning',
                      showCancelButton: true,
                      confirmButtonColor: '#3085d6',
                      cancelButtonColor: '#d33',
                      confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                      if (result.isConfirmed) {
                        Swal.fire(
                          'Deleted!',
                          'Your file has been deleted.',
                          'success'
                        )


                           $.ajax({
                            url: 'action.php',
                            type: 'POST',
                            data: { del_id : del_id  },
                            success:function (argument) {
                                tr.css('background-color','#063769');
                                    showUser();
                            }
                        });





                      }
                    })
                  
                    
                      
                


             });

       

            // Delete Data form ajax request 


            // Show Data form users 
            $('body').on('click', '.inFo', function(e) {
                var info_id = $(this).attr('id');

                 $.ajax({
                    url: 'action.php',
                    type: 'POST',
                    data: { info_id : info_id  },
                    success:function (argument) {
                        var data=JSON.parse(argument);


                         Swal.fire({
                    title: '<strong>User ID (#'+data.id+')</strong>',
                    // type:'info',
                  html:'User Frist Name : '+data.fname+'<br> User Last Name : '+data.lname+' <br> User Emile Address : '+data.emile+' <br> User Phone Number : '+data.phone+' ',
                    icon: 'info',
                    showCancelButton: true,
                  
                   
                    });





                  


                      





                    }
                        });





                  });



            // Show Data form users 


     		 });
        </script>





    </body>
</html>