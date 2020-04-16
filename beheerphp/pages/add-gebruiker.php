<?php
session_start ();

if (! (isset ( $_SESSION ['login'] ))) {
	
	header ( 'location:../index.php' );
}

if(isset($_POST['submit'])){
	
	include('../config/DbFunction.php');
	$obj=new DbFunction();
	$obj->create_user($_POST['course-short'],$_POST['course-firstname'],$_POST['course-full'],$_POST['course-email'],$_POST['course-phonenumber'],$_POST['course-adress'],$_POST['course-password'],$_POST['course-role'],$_POST['cdate']);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">

<title>Gebruiker Toevoegen</title>

<!-- Bootstrap Core CSS -->
<link href="../bower_components/bootstrap/dist/css/bootstrap.min.css"
	rel="stylesheet">

<!-- MetisMenu CSS -->
<link href="../bower_components/metisMenu/dist/metisMenu.min.css"
	rel="stylesheet">

<!-- Custom CSS -->
<link href="../dist/css/sb-admin-2.css" rel="stylesheet">

<!-- Custom Fonts -->
<link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>

<body>
<form method="post" >
	<div id="wrapper">

		<!-- Navigation -->
		<?php include('leftbar.php')?>;

<!--nav-->
		<div id="page-wrapper">
			<div class="row">
				<div class="col-lg-12">
					<h4 class="page-header"> <?php echo strtoupper("Welkom"." ".htmlentities($_SESSION['login']));?></h4>
				</div>
				<!-- /.col-lg-12 -->
			</div>
			<!-- /.row -->
			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading">Gebruiker Toevoegen</div>
						<div class="panel-body">
							<div class="row">
						 	<div class="col-lg-10">

							 <div class="form-group">
							<div class="col-lg-4">
							<label>Voornaam:<span id="" style="font-size:11px;color:red">*</span></label>
							</div>
							<div class="col-lg-6">
							<input class="form-control" placeholder="Voornaam" name="course-firstname" id="cfirstname" required="required">         
						</div>
						</div>	

						<br><br>	

						<div class="form-group">
							<div class="col-lg-4">
							<label>Achternaam<span id="" style="font-size:11px;color:red">*</span></label>
							</div>
							<div class="col-lg-6">
							<input class="form-control" placeholder="Achternaam" name="course-full" id="clastname" required="required">         
							</div>
						</div>	
															
															
						<br><br>	

						<div class="form-group">
							<div class="col-lg-4">
							<label>E-Mail<span id="" style="font-size:11px;color:red">*</span></label>
							</div>
							<div class="col-lg-6">
							<input class="form-control" name="course-email" placeholder="E-Mail" id="cemail" required="required">         
					</div>
						</div>	
															
						<br><br>

						<div class="form-group">
							<div class="col-lg-4">
							<label>Telefoonnummer<span id="" style="font-size:11px;color:red">*</span></label>
							</div>
							<div class="col-lg-6">
							<input class="form-control" placeholder="Telefoonnummer" name="course-phonenumber" id="cphonenumber" required="required">         
										</div>
						</div>	
															
						<br><br>

						<div class="form-group">
											<div class="col-lg-4">
					 <label>Gebruikersnaam<span id="" style="font-size:11px;color:red">*</span>	</label>
											</div>
											<div class="col-lg-6">
			
 						 <input class="form-control" placeholder="Gebruikersnaam" name="course-short" id="cusername" required="required"  onblur="courseAvailability()">       
							<span id="course-status" style="font-size:12px;"></span>				</div>
											
										</div>	
										
								<br><br>

						<div class="form-group">
							<div class="col-lg-4">
							<label>Wachtwoord<span id="" style="font-size:11px;color:red">*</span></label>
							</div>
							<div class="col-lg-6">
							<input class="form-control" placeholder="Wachtwoord" name="course-password" id="cpassword" required="required">         
						</div>
						</div>	
															
						<br><br>

						<div class="form-group">
											<div class="col-lg-4">
					 <label>Rol<span id="" style="font-size:11px;color:red">*</span>	</label>
											</div>
											<div class="col-lg-6">
			
 						 <input class="form-control" placeholder="Rol: 0 = Gebruiker | 1 = Admin" name="course-role" id="crole" required="required">       
						
						  </div>
										</div>	
										
								<br><br>

								<div class="form-group">
											<div class="col-lg-4">
					 	<label>Adress<span id="" style="font-size:11px;color:red">*</span>	</label>
											</div>
											<div class="col-lg-6">
			
 						 <input class="form-control" placeholder="Adress" name="course-adress" id="cadress" required="required">       
						
						  </div>
										</div>	
										
								<br><br>
	
	
										
	<div class="form-group">
	<div class="col-lg-4">
	 <label>Datum</label>
	</div>
	<div class="col-lg-6">
	<input class="form-control" value="<?php echo date('d-m-Y');?>" readonly="readonly" name="cdate">
	</div>
	</div>
	</div>	
										
		<br><br>		
		
							<div class="form-group">
											<div class="col-lg-4">
												
											</div>
											<div class="col-lg-6"><br><br>
							<input type="submit" class="btn btn-primary" name="submit" value="Gebruiker Aanmaken"></button>
											</div>
											
										</div>		
													
				</div>

					</div>
								
							</div>
							
						</div>
						
					</div>
					
				</div>
				
			</div>
			
		</div>
		

	</div>
	
	<script src="../bower_components/jquery/dist/jquery.min.js"
		type="text/javascript"></script>

	
	<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"
		type="text/javascript"></script>

	<!-- Metis Menu Plugin JavaScript -->
	<script src="../bower_components/metisMenu/dist/metisMenu.min.js"
		type="text/javascript"></script>

	<!-- Custom Theme JavaScript -->
	<script src="../dist/js/sb-admin-2.js" type="text/javascript"></script>
	
	<script>

function gebruikerAvailability() {
	$("#loaderIcon").show();
jQuery.ajax({
url: "gebruiker_availability.php",
data:'cusername='+$("#cusername").val(),
type: "POST",
success:function(data){
$("#course-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}

</script>
</form>
</body>

</html>
