<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Add Sector</title>
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
                        Add Grade <small>Use the following to add new Grade</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i>  <a href="<?php echo $this->url->dashboard(); ?>">Dashboard</a>
                        </li>
                        <li>
                            <i class="fa fa-table"></i> <a href="<?php echo $this->url->grade(); ?>">Grades</a>
                        </li>
                        <li>
                            <i class="fa fa-plus"></i> <a href="<?php echo $this->url->add_grade(); ?>">Add Grade</a>
                        </li>

                    </ol>
                </div>
            </div>

            <div class="row">
                <!--Start Content-->
                <?php if(!empty($error)): ?>
                    <div class='alert alert-danger'>
                        <?php echo $error; ?>
                    </div>
                <?php endif; ?>

                <div class="col-lg-6">

                    <!--Start Content-->
                    <div class="form-group">
					
				<form name="add_brand" id="" action="<?php echo $this->url->add_grade();?>" method="post"
				enctype="multipart/form-data" >
				
						<label>Grade<span style="color:#617190;">*</span> </label>
						<input type="text" name="grade_title" id="grade_title" class="form-control" value="<?php echo $this->input->post('grade_title'); ?>" />
						
						<label>Amount<span style="color:#617190;">*</span> </label>
						<input type="text" name="amount" id="amount" class="form-control"  />
						
						<br />
						<input type="submit" name="btnSub" class="btn btn-primary" value="Add Grade"  />
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