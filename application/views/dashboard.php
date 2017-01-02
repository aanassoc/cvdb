<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>
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
                            Dashboard <small>Statistics Overview</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading" style="height:130px;">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-users fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $users;?></div>
                                        <div>Users</div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading" style="height:130px;">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-users fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $consultants;?></div>
                                        <div>Consultants</div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading" style="height:130px;">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-user-md fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $consultantsmale;?></div>
                                        <div>Male Consultants </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading" style="height:130px;">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-user-md fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $consultantsfemale; ?></div>
                                        <div>Female Consultants</div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
				<div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading" style="height:130px;">
                                <div class="row">
                                  <div class="col-xs-3">
                                        <i class="fa fa-users fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $consultantnationals;?></div>
                                        <div>Nationals</div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
					<div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading" style="height:130px;">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-users fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $consultanintInternational;?></div>
                                        <div>International</div>
                                    </div>
                                </div>
                            </div>

                        </div>
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