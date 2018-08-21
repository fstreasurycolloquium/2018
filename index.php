<?php include 'includes/conn.php'; ?>
<!DOCTYPE html>
<html>
    
		<head>
        
        <title>Colloquium AIA v3.0</title>
        
       	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE11" charset="utf-8">
       	<meta content="width=device-width, initial-scale=1" name="viewport"/>
        <meta charset="UTF-8">
        <meta name="description" content="Colloquium Evaluation System" />
        <meta name="keywords" content="Colloquium Evaluation System" />
        <meta name="author" content="Gabriel R Modise" />

        <?php include 'includes/assets.php'; ?>
         
        <body class="hold-transition skin-blue layout-top-nav innerpage_back_color" >
        	 <main class="container">
        	 	<div class="wrapper innerpage_back_color">
        	 		<?php include 'includes/navbar.php'; ?>
					<div class="content-wrapper">
			        	<div class="container">
			        		<section class="content">
			        			<div class="row">
									<div class="col-sm-4 col-md-4">
										<div class="panel panel-default">
											<?php
												$rowme=$conn->query("SELECT * FROM `presentationrooms`") or die(mysqli_error());
												$numme=mysqli_num_rows($rowme);
											?>
											<div class="panel-heading"><center><strong>Events <span class="badge"><?php echo $numme; ?></span></strong></center></div>
												<div class="panel-body">
													<table class="table table-bordered">
														<thead class="alert-default">
															<tr>
																<th>Name</th>
																<th>Join Event</th>
																<th>Speaker View</th>
															</tr>
														</thead>
														<tbody class="alert-default">
															<?php
																while($fetch = $rowme->fetch_array()){
															?>
																<tr>
																	<?php 
																		//$name = explode('/', $fetch['file']);
																	?>
																	<td><?php echo $fetch['presentation_name'];?></td>
																	<td><button id="join_presentation_authe" data-password="<?php echo $fetch['presentation_password'];?>" data-id="<?php echo $fetch['id'];?>" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-circle-arrow-right"></span> Join</button></td>
																	<td><button id="speaker_view" data-password="<?php echo $fetch['speaker_password'];?>" data-id="<?php echo $fetch['id'];?>" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-circle-arrow-right"></span> Speaker View</button></td>
																</tr>
															<?php
																}
															?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
									<div class="col-sm-7 col-md-7">
										<div class="panel panel-default">
											<div class="panel-heading"><center><strong>Know your way around AIA</strong></center></div>
											<div class="panel-body">
												<div id="myCarousel" class="carousel slide" data-ride="carousel">
												    <!-- Indicators -->
												    <ol class="carousel-indicators">
												      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
												      <li data-target="#myCarousel" data-slide-to="1"></li>
												      <li data-target="#myCarousel" data-slide-to="2"></li>
												    </ol>

												    <!-- Wrapper for slides -->
												    <div class="carousel-inner">

												      <div class="item active">
												      <a href="files/How to use AIA.pdf" data-toggle="modal"><img src="images/user_manual.png" alt="Los Angeles" style="width:100%;">
												        <div class="carousel-caption">
												          <h3 style="color: #000000;">Click to download the user manual</h3>
												          <p style="color: #046E3D;"></p>
												        </div>
												       </a>
												      </div>

												      <!---<div class="item">
												        <img src="chicago.jpg" alt="Chicago" style="width:100%;">
												        <div class="carousel-caption">
												          <h3>Chicago</h3>
												          <p>Thank you, Chicago!</p>
												        </div>
												      </div>
												    
												      <div class="item">
												        <img src="ny.jpg" alt="New York" style="width:100%;">
												        <div class="carousel-caption">
												          <h3>New York</h3>
												          <p>We love the Big Apple!</p>
												        </div>
												      </div>-->
												  
												    </div>

												    <!-- Left and right controls 
												    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
												      <span class="glyphicon glyphicon-chevron-left"></span>
												      <span class="sr-only">Previous</span>
												    </a>
												    <a class="right carousel-control" href="#myCarousel" data-slide="next">
												      <span class="glyphicon glyphicon-chevron-right"></span>
												      <span class="sr-only">Next</span>
												    </a>-->
												  </div>
											</div>
										</div>
									</div>
								</div>
							</section>
			        	</div>
					</div>
	            </div>
        	 </main>

<!-- Join Presentation Authentication Modal -->
		<div class="modal fade" id="Join_Authentication">
		    <div class="modal-dialog">
		        <div class="modal-content">
		            <div class="modal-header">
		              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		                  <span aria-hidden="true">&times;</span></button>
		                <center><h4 class="modal-title" id="myModalLabel">Input Password:</h4></center>
		            </div>
		            <div class="modal-body">
		            <div class="join_error_password col-sm-6 col-md-12"></div>
		             <form class="form-horizontal" method="POST">
		                <div class="form-group input-group">
		                  <label for="name" class="input-group-addon">Password</label>
		                  <input type="password" class="form-control" id="Join_Authentication_input" name="Join_Authentication_input" required>
		                  <input type="hidden" id="Join_AuthenticationID" name="Join_AuthenticationID">
		                  <input type="hidden" id="Join_AuthenticationPassword" name="Join_AuthenticationPassword">
		                </div>
		                <div class="modal-footer">
		                  <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
		                  <button type="submit" class="btn btn-success btn-flat confirm_Join" name="confirm_Join"><i class="fa fa-comment"></i> Confirm</button>
		                </div>
		              </form>
		            </div> 
		        </div>
		    </div>
		</div>
<!-- END Join Presentation Authentication Modal -->
<!-- Join Speaker Authentication Modal -->
		<div class="modal fade" id="Join_Speaker_View">
		    <div class="modal-dialog">
		        <div class="modal-content">
		            <div class="modal-header">
		              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		                  <span aria-hidden="true">&times;</span></button>
		                <center><h4 class="modal-title" id="myModalLabel">Input Password:</h4></center>
		            </div>
		            <div class="modal-body">
		            <div class="join_error_password col-sm-6 col-md-12"></div>
		             <form class="form-horizontal" method="POST">
		                <div class="form-group input-group">
		                  <label for="name" class="input-group-addon">Password</label>
		                  <input type="password" class="form-control" id="Join_Speaker_Authentication_input" name="Join_Speaker_Authentication_input" required>
		                  <input type="hidden" id="Join_Speaker_AuthenticationID" name="Join_AuthenticationID">
		                  <input type="hidden" id="Join_Speaker_AuthenticationPassword" name="Join_AuthenticationPassword">
		                </div>
		                <div class="modal-footer">
		                  <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
		                  <button type="submit" class="btn btn-success btn-flat confirm_Join_Speaker" name="confirm_Join_Speaker"><i class="fa fa-comment"></i> Confirm</button>
		                </div>
		              </form>
		            </div> 
		        </div>
		    </div>
		</div>
<!-- END Join Speaker Authentication Modal -->
<?php include 'includes/assets_scripts.php'; ?>
<script type="text/javascript">
$(function(){
   $(document).on('click', '.confirm_Join', function(e){
    e.preventDefault();
    var idPresen = $('.modal-body #Join_AuthenticationID').val();
    $passwordPresen = $('.modal-body #Join_AuthenticationPassword').val();

	    if ($('#Join_Authentication_input').val() == $passwordPresen) {
	        $('#Join_Authentication').modal('hide'); 
	        		$.ajax({
					type: "POST",
					url: "set_session.php",
					data: {
						idPresen: idPresen,
						password: $passwordPresen,
						session: 1,
					},
					success: function(){
						window.location = 'home.php?presRoomID='+idPresen;
					}
				});   	
	    }
	    else{

	        $('.join_error_password').append('<div align="center" class="alert alert-danger">' +
	                    '<span class="glyphicon glyphicon-remove"></span>' +
	                    ' Incorrect Password !!!' +
	                    '</div>');
	                    setTimeout(function(){
	                       $('.alert-danger').hide();
	                    }, 3000);
	    }
  	});
});

$(function(){
   $(document).on('click', '.confirm_Join_Speaker', function(e){
    e.preventDefault();
    var idPresen = $('.modal-body #Join_Speaker_AuthenticationID').val();
    $passwordPresen = $('.modal-body #Join_Speaker_AuthenticationPassword').val();

	    if ($('#Join_Speaker_Authentication_input').val() == $passwordPresen) {
	        $('#Join_Speaker_View').modal('hide'); 
	        		$.ajax({
					type: "POST",
					url: "set_session_speaker.php",
					data: {
						idPresen: idPresen,
						password: $passwordPresen,
						session: 1,
					},
					success: function(){
						window.location = 'speaker_view.php?presRoomID='+idPresen;
					}
				});   	
	    }
	    else{

	        $('.join_error_password').append('<div align="center" class="alert alert-danger">' +
	                    '<span class="glyphicon glyphicon-remove"></span>' +
	                    ' Incorrect Password !!!' +
	                    '</div>');
	                    setTimeout(function(){
	                       $('.alert-danger').hide();
	                    }, 3000);
	    }
  	});
});

$(function(){
  $(document).on('click', '#join_presentation_authe', function(e){
    e.preventDefault();
    $idPresen = $(this).data("id");
    $present_password = $(this).data("password");
    $('#Join_Authentication').modal('show');
     $('.modal-body #Join_AuthenticationID').val($idPresen);
     $('.modal-body #Join_AuthenticationPassword').val($present_password);
  });
});

$(function(){
  $(document).on('click', '#speaker_view', function(e){
    e.preventDefault();
    $idPresen = $(this).data("id");
    $speaker_password = $(this).data("password");
    $('#Join_Speaker_View').modal('show');
     $('.modal-body #Join_Speaker_AuthenticationID').val($idPresen);
     $('.modal-body #Join_Speaker_AuthenticationPassword').val($speaker_password);
  });
});

</script>
</body>
</html>