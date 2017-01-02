<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Edit User</title>
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
                        Edit User <small>Use the following to update user</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i>  <a href="<?php echo $this->url->dashboard(); ?>">Dashboard</a>
                        </li>
                        <li>
                            <i class="fa fa-table"></i> <a href="<?php echo $this->url->users(); ?>">Users</a>
                        </li>
                        <li>
                            <i class="fa fa-pencil"></i> <a href="">Edit User</a>
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
                        echo form_open($this->url->edit_user($user['userId']));
                    ?>
                    <div class="form-group">
                        <?php
                        echo form_error('fname', '<span class="error-msg">', '</span><br />');
                        echo form_label('First Name: *');
                        echo form_input(array('name' =>'fname','class' => 'form-control'),$user['firstname']).'<br>';
                        ?>
                    </div>
                    <div class="form-group">
                        <?php
                        echo form_error('lname', '<span class="error-msg">', '</span><br />');
                        echo form_label('Last Name:');
                        echo form_input(array('name' =>'lname','class' => 'form-control'),$user['lastname']).'<br>';
                        ?>
                    </div>

                    <?php
                        if($user['userId'] != 1){
                    ?>

                    <div class="form-group">
                        <?php
                        echo form_error('status', '<span class="error-msg">', '</span><br />');
                        echo form_label('Status:');
                        ?>
                        <br />
                        <input type="radio" name="status" value="Active" <?php
                        if($user['status'] == 'Active'){
                            echo ' checked="checked" ';
                        }
                        ?>> Active
                        <input type="radio" name="status" value="Inactive" <?php
                        if($user['status'] == 'Inactive'){
                            echo ' checked="checked" ';
                        }
                        ?>> Inactive
                    </div>
                    <?php } ?>

                    <?php
                        echo form_submit(array('name' =>'edit_btn','class'=>'btn btn-primary'),'Update').'<br>';
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