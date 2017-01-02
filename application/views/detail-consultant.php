<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Consultant Details</title>
	<?php include("styles.php"); ?>
	<style>
	.panel-body ul li span{
		font-weight:bold;
		width:160px;
		float:left;
	}
	</style>
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
                            Consultant <small>Details</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo $this->url->dashboard(); ?>">Dashboard</a>
                            </li>
                            <li>
                                <i class="fa fa-users"></i> <a href="<?php echo $this->url->consultants(); ?>">Consultants</a>
                            </li>
                            <?php if($userInfo['type']== 'Admin'): ?>
                                <li class="active">
                                    <a href="">Detail Consultant</a>
                                </li>
                            <?php endif; ?>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
				
                <!-- /.row -->

                <div class="row">
                    <!--Start Content-->
                    <div class="col-lg-12">
                        <a href="<?php echo $this->url->download_details($consultant['consultantId']); ?>" class="btn btn-primary">Download PDF</a>
                        <br><br>
                    </div>
                    <div class="col-lg-6">
						<?php $this->load->helper('sitefunctions_helper')?>
						<div class="panel panel-default">
							<div class="panel-heading" id="panel-head">
								Personal Information
							</div>
							<div class="panel-body">
							<ul class="list-unstyled list-info">
								<li><span>Name: </span><?php echo $consultant['firstname'] . ' ' . $consultant['lastname']; ?></li>
								<li><span>Gender: </span><?php echo $consultant['gender']; ?></li>
								<?php if(!empty($consultant['experienceInYears'])): ?>
                                    <li><span>Experience in years: </span><?php echo $consultant['experienceInYears']; ?></li>
                                <?php endif; ?>
                                <?php
                                    if($consultant['consultantFile']){
                                ?>
                                <li><span>Document: </span>
									<a href="<?php echo CV . $consultant['consultantFile']; ?>">
										Download
									</a>
								<?php
								    }
								?></li>
                                <?php
                                    if($consultant['dateAdded']):
                                ?>
                                <li>
                                    <span>Date Added:</span><?php echo mysql2userformat_datetime($consultant['dateAdded']); ?>
                                </li>
								<?php endif; ?>
                                <?php
                                if(mysql2userformat_datetime($consultant['date_updated']) != '00/00/0000 00:00:00'):
                                    ?>
                                    <li>
                                        <span>Date Updated:</span><?php echo mysql2userformat_datetime($consultant['date_updated']); ?>
                                    </li>
                                <?php endif; ?>
							</ul>
						</div>
						</div>
					</div>
					
					<div class="col-lg-6">
						<div class="panel panel-default">
							<div class="panel-heading" id="panel-head">
								Education
							</div>
							<div class="panel-body">
							<ul class="list-unstyled list-info">
								<li><span>Theme: </span>
								<ul>
                                <div style="margin-left: 160px;">
                                    <?php foreach($sector as $row){
                                        echo '<li>'.$row['sector'].'</li>';
                                    }
									?>
								</div>
								</ul>
								</li>
								<li>
								<span>Sub Theme: </span>
								<ul>
                                <div style="margin-left: 160px;">
                                    <?php foreach($subsectors as $row){
                                        echo '<li>'.$row['title'].'</li>';
                                    }
									?>
								</div>
								</ul>
                                </li>
								<span><b>Sector:</b> </span>
								<ul>
                                <div style="margin-left: 160px;">
                                    <?php foreach($selectedthemes as $row){
                                        echo '<li>'.$row['name'].'</li>';
                                    }
									?>
								</div>
								</ul>
                                </li>
                                <?php if(!empty($degree['title'])): ?>
								    <li><span>Degree: </span><?php echo $degree['title']; ?></li>
								<?php endif; ?>
                                <li><span >Degree Type: </span>
                                <div style="margin-left: 160px;">
                                    <?php foreach($degreetype as $row2){
                                        echo $row2['degree_type'].'<br>';
                                    } ?>
                                </div>
                                </li>
                                <?php if(!empty($consultant['decipline'])): ?>
								    <li><span>Discipline: </span><?php echo $consultant['decipline']; ?></li>
                                <?php endif; ?>
								<?php if(!empty($consultant['Gradetitle'])): ?>
								    <li><span>Grade: </span><?php echo $consultant['Gradetitle'].' ('.$consultant['Gradeamount'].')'; ?></li>
                                <?php endif; ?>
                                <?php if(!empty($consultant['certification'])): ?>
								    <li><span>Certification: </span><?php echo $consultant['certification']; ?></li>
                                <?php endif; ?>
								<br />
								<?php if(!empty($consultant['experience_type'])): ?>
								    <li><span>Expertise Type: </span><?php echo $consultant['experience_type']; ?></li>
                                <?php endif; ?>
								
                                <?php if(count($functionalExpertise) > 0){ ?>
								    <li><span>Functional Expertise: </span>
									<div style="margin-left: 160px;">
										<?php 
											foreach($functionalExpertise as $exp){
												echo $exp['expertise'].'<br />';
											}
										?>
										</div>
									</li>
                                <?php } ?>
							</ul>
						</div>
						</div>
					</div>
					
					<div class="col-lg-6">
						<div class="panel panel-default">
							<div class="panel-heading" id="panel-head">
								Location
							</div>
							<div class="panel-body">
							<ul class="list-unstyled list-info">
                              
								<li><span>Nationality: </span><?php echo $consultant['nationality']; ?></li>
								<li><span>City: </span><?php echo $consultant['city']; ?></li>
								<li><span>Language: </span><?php echo $consultant['language']; ?></li>
								
							</ul>
						</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="panel panel-default">
							<div class="panel-heading" id="panel-head">
								Contact
							</div>
							<div class="panel-body">
							<ul class="list-unstyled list-info">
								<li><span>Mobile: </span><?php echo $consultant['mobile']; ?></li>
                                <?php if(!empty($consultant['landline'])): ?>
								    <li><span>Land Line: </span><?php echo $consultant['landline']; ?></li>
                                <?php endif; ?>
								<li><span>Email: </span><?php echo $consultant['email']; ?></li>
								<li><span>Address: </span><?php echo $consultant['address']; ?></li>
							</ul>
						</div>
						</div>
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