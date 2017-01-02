<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Export Consultants</title>
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
                        Export Consultants <small>Showing All Consultants</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i>  <a href="<?php echo $this->url->dashboard(); ?>">Dashboard</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-download"></i> <a href="<?php echo $this->url->export(); ?>">Export</a>
                        </li>
                    </ol>
                </div>
            </div>

            <!-- /.row -->

            <div class="row">

                <div class="col-lg-12">

                    <?php if(!empty($error)): ?>
                        <div class='alert alert-danger'>
                            <?php echo $error; ?>
                        </div>
                    <?php endif; ?>
					
					
                    <!--Start Content-->
                    <div class="table-responsive">
                        <form name="frmExport" id="frmExport" action="<?php echo $this->url->export(); ?>" method="post">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Name</th>
                                    <th>Email</th>
                                </tr>
                            </thead>

                            <tbody>
                            <?php
                                foreach($consultants as $row){
                            ?>
                                <tr>
                                    <td><input type="checkbox" name="consultant_id[]" value="<?php echo $row['consultantId']; ?>"></td>
                                    <td><?php echo $row['firstname'] . ' ' . $row['lastname']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                </tr>
                            <?php
                                }
                            ?>
                            </tbody>
                        </table>

                        <input type="submit" name="export_all" class="btn btn-primary" value="Export All"/>
                        <input type="submit" name="export_selected" class="btn btn-primary" value="Export Selected" />
                        </form>
                    </div>

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