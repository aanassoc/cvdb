<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Edit Functional Expertise</title>
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
                        Edit Functional Expertise <small>Use the following to add functional expertise</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i>  <a href="<?php echo $this->url->dashboard(); ?>">Dashboard</a>
                        </li>
                        <li>
                            <i class="fa fa-cog"></i> <a href="">Settings</a>
                        </li>
                        <li>
                            <i class="fa fa-table"></i> <a href="<?php echo $this->url->expertise(); ?>">Functional Expertise</a>
                        </li>

                    </ol>
                </div>
            </div>

            <div class="row">
                <!--Start Content-->
                <?php
				if($msg != ''){
				?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-success">
                         <?php echo $msg; ?>
                        </div>
                    </div>
                </div>
				<?php
				}
				?>

                <div class="col-lg-6">

                    <!--Start Content-->
                    <div class="form-group">
					
				<form name="add_brand" id="" action="<?php echo $this->url->edit_expertise($expertise['expertiseId']); ?>" method="post" enctype="multipart/form-data" >
						<label>Functional Expertise<span style="color:#617190;">*</span> </label>
						<input type="text" name="expertise_title" id="expertise_title" class="form-control" value="<?php echo $expertise['expertise']; ?>" />
						<br />
						<input type="submit" name="btnSub" class="btn btn-primary" value="Update Functional Expertise"  />
					</form>
                  </div>

                    <!--End Content-->
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