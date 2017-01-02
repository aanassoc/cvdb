<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Add Theme</title>
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
                        Add Themes <small>Use the following to add new Themes</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i>  <a href="<?php echo $this->url->dashboard(); ?>">Dashboard</a>
                        </li>
                        <li>
                            <i class="fa fa-table"></i> <a href="<?php echo $this->url->sectors(); ?>">Themes</a>
                        </li>
                        <li>
                            <i class="fa fa-plus"></i> <a href="<?php echo $this->url->add_sector(); ?>">Add Themes</a>
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
                        echo form_open($this->url->add_sector());
                    ?>
                    <div class="form-group">
                    <?php
                        echo form_error('sname', '<span class="error-msg">', '</span><br />');
                        echo form_label('Theme Name:');
                        echo form_input(array('name' =>'sname','class' => 'form-control'),$this->input->post('sname')).'<br>';
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