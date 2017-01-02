<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Users</title>
    <?php include("styles.php"); ?>
    <script language="javascript" type="text/javascript">
        function confirmDelete(){
            var r = confirm("Are You Sure To Delete?");
            if (r == true) {
                return true;
            } else {
                return false;
            }
        }
    </script>
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
                        Users <small>Showing All Users</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i>  <a href="<?php echo $this->url->dashboard(); ?>">Dashboard</a>
                        </li>
                        <li>
                            <i class="fa fa-users"></i> <a href="<?php echo $this->url->users(); ?>">Users</a>
                        </li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <!--Start Content-->
                <div class="col-lg-12">

                    <!--Start Content-->
                    <?php if($this->session->flashdata('success-msg')):?>
                        <div class="alert alert-success"> <?php echo $this->session->flashdata('success-msg')?> </div>
                    <?php endif; ?>

                    <a href="<?php echo $this->url->add_user(); ?>" class="btn btn-primary">Add New User</a>
                    <br><br>
                    <div class="table-responsive">

                        <table class="table table-bordered table-hover table-striped">
                            <?php if(!empty($users)): ?>
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Username</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach($users as $row){
                                    ?>
                                    <tr>
                                        <td><?php echo $row['firstname']." ".$row['lastname']; ?></td>
                                        <td><?php echo $row['username']; ?></td>
                                        <td><?php echo $row['status']; ?></td>
                                        <td>
                                            <a href="<?php echo $this->url->edit_user($row['userId']); ?>"><img src="<?php echo images; ?>edit.png"  /></a>
                                            <?php if($row['userId'] != 1){ ?>
                                                |
                                                <a href="<?php echo $this->url->delete_user($row['userId']); ?>" onClick="return confirmDelete();"><img src="<?php echo images; ?>cross.png"  /></a>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                                </tbody>
                            <?php
                            else:
                                ?>
                                <div class="error-msg">No Record Found!</div>
                            <?php
                            endif;
                            ?>
                        </table>
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