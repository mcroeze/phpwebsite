<?php
session_start ();

if (! (isset ( $_SESSION ['login'] ))) {
	
	header ( 'location:../index.php' );
} 

    include('../config/DbFunction.php');
    $obj=new DbFunction();
    $rs=$obj->showOrders();

	if(isset($_GET['del']))
    {
           
          $obj->del_order(intval($_GET['del']));
          
       
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

    <title>Zie Bestellingen</title>
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <link href="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">
    <link href="../bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
   
</head>

<body>

    <div id="wrapper">


      
     <?php include('leftbar.php')?>;

           
         <nav>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                   <h4 class="page-header"> <?php echo strtoupper("Welkom"." ".htmlentities($_SESSION['login']));?></h4>
                </div>

            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Gebruikers Paneel
                        </div>

                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>OrderID</th>
                                            <th>Klant Naam</th>
                                            <th>Ticket Soort</th>
                                            <th>Opties</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php 
                                         $sn=1;
                                     while($res=$rs->fetch_object()){?>	
                                        <tr class="odd gradeX">
                                            <td><?php echo htmlentities(strtoupper($res->orderID));?></td>
                                            <td><?php echo htmlentities(strtoupper($res->userName));?></td>
                                            <td><?php echo htmlentities(strtoupper($res->tickets));?></td>
                                            <td>
                                             <a href="view-orders.php?del=<?php echo htmlentities($res->orderID); ?>"> <p class="fa fa-times-circle"></p></td>         
                                        </tr>
                                        
                                    <?php $sn++;}?>   	           
                                    </tbody>
                                </table>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
     
           
            
           
        </div>
      

    </div>
    
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>
    <script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
    <script src="../dist/js/sb-admin-2.js"></script>

    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>

</body>

</html>
