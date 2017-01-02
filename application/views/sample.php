<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Add Consultant</title>
	<?php include("styles.php"); ?>
</head>
<body>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            
			<?php include("header.php"); ?>
            
            <!-- /.navbar-collapse -->
			<?php include("left-panel.php"); ?>
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Consultants <small>Add Consultant</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo $this->url->dashboard(); ?>">Dashboard</a>
                            </li>
                            <li>
                                <i class="fa fa-table"></i> <a href="<?php echo $this->url->consultants(); ?>">Consultants</a>
                            </li>
							<li class="active">
                                <i class="fa fa-edit"></i> <a href="<?php echo $this->url->addConsultant(); ?>"> Add Consultant</a>
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
				<?php
				if($msg == 'Yes'){
				?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-success">
                         <strong>Success!</strong> Consultant has been added.
                        </div>
                    </div>
                </div>
				<?php
				}
				?>
				<?php
				if($msg == 'No'){
				?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-danger">
                         <strong>Error!</strong> While adding consultant.
                        </div>
                    </div>
                </div>
				<?php
				}
				?>
                <!-- /.row -->

                <div class="row">
                    
                    <div class="col-lg-6">
						<!--Start Content-->
						
						
						<!--End Content-->
					</div>
                    
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
		
    </div>
	<?php include("footer.php"); ?>
    <!-- /#wrapper -->
	<?php include("scriptIncludes.php"); ?>
</body>
</html>