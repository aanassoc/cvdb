<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Add User</title>
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
                        Add User <small>Use the following to add new user</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i>  <a href="<?php echo $this->url->dashboard(); ?>">Dashboard</a>
                        </li>
                        <li>
                            <i class="fa fa-table"></i> <a href="<?php echo $this->url->users(); ?>">Users</a>
                        </li>
                        <li>
                            <i class="fa fa-plus"></i> <a href="<?php echo $this->url->add_user(); ?>">Add User</a>
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
                    <?php
                        echo form_open($this->url->add_user());
                    ?>
                    <div class="form-group">
                    <?php
                        echo form_error('fname', '<span class="error-msg">', '</span><br />');
                        echo form_label('First Name: *');
                        echo form_input(array('name' =>'fname','class' => 'form-control'),$this->input->post('fname')).'<br>';
                    ?>
                    </div>
                    <div class="form-group">
                        <?php
                        echo form_error('lname', '<span class="error-msg">', '</span><br />');
                        echo form_label('Last Name:');
                        echo form_input(array('name' =>'lname','class' => 'form-control'),$this->input->post('lname')).'<br>';
                        ?>
                    </div>
                    <div class="form-group">
                        <?php
                        echo form_error('type', '<span class="error-msg">', '</span><br />');
                        echo form_label('Type: *');
                        ?>
                        <br />
                        <input type="radio" name="type" value="Admin"> Admin
                        <input type="radio" name="type" value="Staff"> Staff
                    </div>
                    <div class="form-group">
                        <?php
                        echo form_error('username', '<span class="error-msg">', '</span><br />');
                        echo form_label('Username: *');
                        echo form_input(array('name' =>'username','class' => 'form-control'),$this->input->post('username')).'<br>';
                        ?>
                    </div>
                    <div class="form-group">
                        <?php
                        echo form_error('password', '<span class="error-msg">', '</span><br />');
                        echo form_label('Password: *');
                        echo form_password(array('name' =>'password','class' => 'form-control'),$this->input->post('password')).'<br>';
                        ?>
                    </div>
                    <?php
                        echo form_submit(array('name' =>'add_btn','class'=>'btn btn-primary'),'Add').'<br>';
                        echo form_close();
                    ?>

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