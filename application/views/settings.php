<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Settings</title>
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
                            Change Password <small>&nbsp;</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo $this->url->dashboard(); ?>">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> <a href="<?php echo $this->url->settings(); ?>">Change Password</a>
                            </li>
                        </ol>
                    </div>
                </div>

                <!-- /.row -->

                <div class="row">
                    
                    <div class="col-lg-4">
						<!--Start Content-->
                        <?php
                            if($errorPass != ''){
                        ?>
                            <div class="error-msg"><?php echo $errorPass; ?></div>
                        <?php
                            }
                            if($successPass != ''){
                        ?>
                            <div class="alert alert-success"><?php echo $successPass; ?></div>
                        <?php
                            }
                        ?>

                        <fieldset>
                        <?php
                            echo form_open($this->url->settings());
                        ?>
                        <div class="form-group">
                        <?php
                            echo form_error('oldpass', '<span class="error-msg">', '</span><br />');
                            echo form_label('Old Password');
                            echo form_password(array('name' =>'oldpass','class' => 'form-control'),$this->input->post('oldpass')).'<br>';
                        ?>
                        </div>
                        <div class="form-group">
                        <?php
                            echo form_error('newpass', '<span class="error-msg">', '</span><br />');
                            echo form_label('New Password');
                            echo form_password(array('name' =>'newpass','class' => 'form-control'),$this->input->post('newpass')).'<br>';
                        ?>
                        </div>

                        <?php
                            echo form_submit(array('name' =>'change_pass','class'=>'btn btn-primary'),'Update');
                            echo form_close();
                        ?>
                        </fieldset><br>
							
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