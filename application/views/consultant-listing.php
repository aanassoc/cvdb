<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Consultants</title>
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
                            Consultants <small>Showing All Consultants</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo $this->url->dashboard(); ?>">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-users"></i> <a href="<?php echo $this->url->consultants(); ?>">Consultants</a>
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
				<?php
				if($this->session->flashdata('delete')){
				?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-success">
                         <strong>Success!</strong> <?php echo $this->session->flashdata('delete'); ?>
                        </div>
                    </div>
                </div>
				<?php
				}
				?>
				<?php
				/*
				echo '<pre>';
				print_r($allConsultants);
				echo '</pre>';
				*/
				
				?>
                <!-- /.row -->

                <div class="row">
                    
                    <div class="col-lg-12">
					
						<!--Start Content-->
						<div class="table-responsive">
							
							<table class="table table-bordered table-hover table-striped">
							<thead>
								<tr>
									<th>Name</th>
									<th>Email</th>
									
									<th>Nationality</th>
									<th>Mobile #</th>
									<th>Education</th>
									<th>Grade</th>
									<th>Theme</th>
									<th>Sub-Theme</th>
									<th>Experience</th>
									<th>Document</th>
                                    <?php if($userInfo['type']== 'Admin'): ?>
									    <th>Actions</th>
                                    <?php endif; ?>
								</tr>
							</thead>
							<tbody>
								
								<?php
								for($i=0;$i<count($allConsultants);$i++){
								?>
									<tr>
										<td style="font-size:13px;"><a href="<?php echo $this->url->consultantDetail($allConsultants[$i]['consultantId']); ?>"> <?php echo $allConsultants[$i]['firstname'] . ' ' . $allConsultants[$i]['lastname']; ?></a></td>
										<td style="font-size:13px;"><?php echo $allConsultants[$i]['email']; ?></td>
										
										<td style="font-size:13px;"><?php echo $allConsultants[$i]['nationality']; ?></td>
										<td style="font-size:13px;" ><?php echo $allConsultants[$i]['mobile']; ?></td>
										<td style="font-size:13px;"><?php echo $allConsultants[$i]['degreename']; ?></td>
										<td style="font-size:13px;"><?php echo $allConsultants[$i]['Gradetitle']; ?></td>
										<td style="font-size:13px;">
											<ul>
											
											<?php 
												for($k=0;$k<count($allConsultants[$i]['SectorTitle']);$k++){
													echo '<li>'.$allConsultants[$i]['SectorTitle'][$k]['sector'] . '</li>'; 
												}
											?>
											</ul>
										</td>
										<td style="font-size:13px;">
											<ul>
											
											<?php 
												for($j=0;$j<count($allConsultants[$i]['subSector']);$j++){
													echo '<li>'.$allConsultants[$i]['subSector'][$j]['title'] . '</li>'; 
												}
											?>
											</ul>
										</td>
										
										<td style="font-size:13px;"><?php echo $allConsultants[$i]['experienceInYears']; ?></td>
										
										<td style="font-size:13px;">
											<?php
											if($allConsultants[$i]['consultantFile']){
											?>
												<a href="<?php echo CV . $allConsultants[$i]['consultantFile']; ?>">
													Download
												</a>
											<?php
											}
											?>
										</td>
                                    <?php if($userInfo['type']== 'Admin'): ?>
                                        <td style="font-size:13px;">
											<a href="<?php echo $this->url->editConsultant($allConsultants[$i]['consultantId']); ?>"><img src="<?php echo images; ?>edit.png"  /></a> 
											| 
											<a href="<?php echo $this->url->deleteConsultant($allConsultants[$i]['consultantId']); ?>" onClick="return confirmDelete();"><img src="<?php echo images; ?>cross.png"  /></a>
										</td>
                                    <?php endif; ?>
									</tr>
								<?php
								}
								?>
							</tbody>
                                <p><?php echo $links; ?></p>
							</table>
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