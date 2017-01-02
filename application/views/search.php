<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Search Consultant</title>

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
					 <?php if(!empty($error)): ?>
                        <div class='alert alert-danger'>
                            <?php echo $error; ?>
                        </div>
                    <?php endif; ?>
                        <h1 class="page-header">
                            Search <small>Search Consultant</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo $this->url->dashboard(); ?>">Dashboard</a>
                            </li>

							<li class="active">
                                <i class="fa fa-search"></i> <a href="<?php echo $this->url->search(); ?>"> Search</a>
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
				
				<?php
				if($msg == 'No'){
				?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-danger">
                         <strong>Results!</strong> No Search Result Founnd.
                        </div>
                    </div>
                </div>
				<?php
				}
				?>
                <!-- /.row -->
				
                <div class="row">

						<!--Start Content-->

						<form role="form" name="frmSearch" id="frmSearch" action="<?php echo $this->url->search(); ?>" method="post">
                            <div class="col-lg-7">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="txtsearch" id="txtsearch" placeholder="Search by firstname/ lastname/ email" value="<?php echo $this->input->post('txtsearch'); ?>" />
                                </div>
                            </div>

							    <button type="submit" class="btn btn-primary" name="btnSub" id="btnSub" >Search</button>

						</form>
						<div style="clear:both;"></div>


                <div class="row">
                    <div class="col-lg-12">
                        <h3 id="search-link" style="margin-left: 15px;cursor: pointer;" onClick="switchAdvSearch();"  >Advance Search</h3>
                    </div>
                    <div id="form_search" style="display:none;">

                        <form role="form" action="<?php echo $this->url->search(); ?>" name="searchConsultant" method="post">
                        <div class="col-lg-12">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <?php
                                        echo form_error('name', '<span class="error-msg">', '</span><br />');
                                    ?>
                                    <label>Name</label>
                                    <input class="form-control" name="name" value="<?php echo $this->input->post('name'); ?>">
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="form-group">
                                    <?php
                                        echo form_error('email', '<span class="error-msg">', '</span><br />');
                                    ?>
                                    <label>Email Address</label>
                                    <input class="form-control" name="email" value="<?php echo $this->input->post('email'); ?>">
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="form-group">
                                    <?php
                                    echo form_error('email', '<span class="error-msg">', '</span><br />');
                                    ?>
                                    <label>Nationality</label>
                                    <input class="form-control" name="nationality" value="<?php echo $this->input->post('nationality'); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <?php
                                    echo form_error('experienceInYears', '<span class="error-msg">', '</span><br />');
                                    ?>
                                    <label>Years of experience</label>
                                    <select class="form-control" name="experienceInYears" id="experienceInYears">
                                        <option value="">Select</option>
                                        <option value="5 to 7" <?php
                                        if($this->input->post('experienceInYears') == '5 to 7'){
                                            echo ' selected="selected" ';
                                        }
                                        ?>>5 to 7</option>
                                        <option value="8 to 10" <?php
                                        if($this->input->post('experienceInYears') == '8 to 10'){
                                            echo ' selected="selected" ';
                                        }
                                        ?>>8 to 10</option>
                                        <option value="11 to 13" <?php
                                        if($this->input->post('experienceInYears') == '11 to 13'){
                                            echo ' selected="selected" ';
                                        }
                                        ?>>11 to 13</option>
                                        <option value="14 to 16" <?php
                                        if($this->input->post('experienceInYears') == '14 to 16'){
                                            echo ' selected="selected" ';
                                        }
                                        ?>>14 to 16</option>
										
										<option value="17 to 19" <?php
                                        if($this->input->post('experienceInYears') == '17 to 19'){
                                            echo ' selected="selected" ';
                                        }
                                        ?>>17 to 19</option>
										
										<option value="20+" <?php
                                        if($this->input->post('experienceInYears') == '20+'){
                                            echo ' selected="selected" ';
                                        }
                                        ?>>20+</option>
										
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="form-group">
                                    <?php
                                    echo form_error('sector', '<span class="error-msg">', '</span><br />');
                                    ?>
                                    <label>Theme </label>
                                    <select class="form-control" name="sector" id="sector">
                                        <option value="">Select</option>
                                        <?php foreach($sectors as $row){ ?>
                                            <option value="<?php echo $row['sectorId']; ?>" <?php
                                            if($this->input->post('sector') == $row['sectorId']){
                                                echo ' selected="selected" ';
                                            }
                                            ?>><?php echo $row['sector']; ?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <?php
                                    echo form_error('subsector', '<span class="error-msg">', '</span><br />');
                                    ?>
                                    <label>Sub theme  </label>
                                    <select class="form-control" name="subsector">
                                        <option value="">Select</option>
                                        <?php foreach($subsectors as $row2){ ?>
                                            <option value="<?php echo $row2['id']; ?>" <?php
                                            if($this->input->post('subsector') == $row2['id']){
                                                echo ' selected="selected" ';
                                            }
                                            ?>><?php echo $row2['title']; ?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Language</label>
                                   <input class="form-control" name="language" value="<?php echo $this->input->post('language'); ?>">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Degree</label>
                                    <select class="form-control" name="degree">
                                        <option value="">Select</option>
                                        <?php foreach($degrees as $row3){ ?>
                                            <option value="<?php echo $row3['id']; ?>" <?php
                                            if($this->input->post('degree') == $row3['id']){
                                                echo ' selected="selected" ';
                                            }
                                            ?>><?php echo $row3['title']; ?></option>
                                        <?php }?>
                                    </select>
                                </div>
							</div>
							
							 <div class="col-lg-3">
                                <div class="form-group">
                                    <label>City</label>
                                   <input class="form-control" name="city" value="<?php echo $this->input->post('city'); ?>">
                                </div>
							</div>
							 <div class="col-lg-12">
							 <div class="col-lg-3">
                                
							</div>
						</div>
                        </div>
						
						<div class="col-lg-12">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Functional Expertise</label>
                                   	<select  class="form-control" name="expertise" id="expertise" style="width:350px;"  >
										<option value="">Select</option>
										<?php
										for($i=0;$i<count($functionalExpertise);$i++){
										?>
											<option value="<?php echo $functionalExpertise[$i]['expertiseId']; ?>"><?php echo $functionalExpertise[$i]['expertise']; ?></option>
										<?php
										}
										?>
									</select>
                                </div>
                            </div>
                            
							
							 
							 <div class="col-lg-12">
							 <div class="col-lg-3">
                                
							</div>
						</div>
                        </div>
						
						
                            <div class="col-lg-12" style="margin-left: 15px;">
                                <button type="submit" class="btn btn-primary" name="btn_search" id="btnSub">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
                    <div class="col-lg-12">
					
					<form role="form" action="<?php echo $this->url->search(); ?>" name="export" method="post">
						<?php
						if(count($allConsultants)){
						?>
                            <h4>Search Results</h4>
						<div class="table-responsive">
							
							<table class="table table-bordered table-hover table-striped">
							<thead>
								<tr>
									<th>Select</th>
									<th>Name</th>
									<th>Email</th>
									<th>Nationality</th>
									<th>Years of experience</th>
									<th>Language</th>
									<th>City</th>
									<th>Theme</th>
									<th>Sub Theme</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
								<?php
								for($i=0;$i<count($allConsultants);$i++){
								?>
									<tr>
									<td><input type="checkbox" name="consultant_id[]" 
									value="<?php echo $allConsultants[$i]['consultantId']; ?>"></td>
									
										<td><a href="<?php echo $this->url->consultantDetail($allConsultants[$i]['consultantId']); ?>"> <?php echo $allConsultants[$i]['firstname'] . ' ' . $allConsultants[$i]['lastname']; ?></a></td>
										<td><?php echo $allConsultants[$i]['email']; ?></td>
										<td><?php echo $allConsultants[$i]['nationality']; ?></td>
										<td><?php echo $allConsultants[$i]['experienceInYears']; ?></td>
										<td><?php echo $allConsultants[$i]['language']; ?></td>
										<td><?php echo $allConsultants[$i]['city']; ?></td>
										<td>
													<?php
													for($k=0;$k<count($allConsultants[$i]['sectors']);$k++){
														echo $allConsultants[$i]['sectors'][$k]['sector'].'<br />';
													}
													?>
												</td>
												
												<td>
													<?php
													for($k=0;$k<count($allConsultants[$i]['subsectors']);$k++){
														echo $allConsultants[$i]['subsectors'][$k]['title'].'<br />';
													}
													?>
												</td>
										<td>
										<?php if($userInfo['type']== 'Admin'){?>
											<a href="<?php echo $this->url->editConsultant($allConsultants[$i]['consultantId']); ?>">Edit</a> 
											| 
											<a href="<?php echo $this->url->deleteConsultant($allConsultants[$i]['consultantId']); ?>" onClick="return confirmDelete();">Delete</a>
											<?php } ?>
										</td>
									</tr>
								<?php
								}
								?>
							</tbody>
							</table>
						</div>
						<input type="submit" name="export_all" class="btn btn-primary" value="Export All"/>
                        <input type="submit" name="export_selected" class="btn btn-primary" value="Export Selected" />
						<?php
						}
						
						?>
						
                        <br>
                        <div class="col-lg-12">
                            <?php
                            if(!empty($searchConsultants)){
                            ?>
                                <h4>Search Results</h4>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                        <tr>
                                            <th>Select</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Nationality</th>
                                            <th>Years of experience</th>
                                            
                                            <th>Degree</th>
											<th>Theme</th>
											<th>Sub Theme</th>
                                            <th>Language</th>
											<th>City</th>
											<th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <?php
                                            foreach($searchConsultants as $row){
                                        ?>
                                            <tr>
												<td>
												<input type="checkbox" name="consultant_id[]" 
												value="<?php echo $row['consultantId']; ?>">
												</td>
                                                <td><a href="<?php echo $this->url->consultantDetail($row['consultantId']); ?>"><?php echo $row['firstname'] . ' ' . $row['lastname']; ?></a></td>
                                                <td><?php echo $row['email']; ?></td>
                                                <td><?php echo $row['nationality']; ?></td>
                                                <td><?php echo $row['experienceInYears']; ?></td>
                                                
                                                <td><?php echo $row['title']; ?></td>
                                                <td>
													<?php
													for($k=0;$k<count($row['sectors']);$k++){
														echo $row['sectors'][$k]['sector'].'<br />';
													}
													?>
												</td>
												
												<td>
													<?php
													for($k=0;$k<count($row['subsectors']);$k++){
														echo $row['subsectors'][$k]['title'].'<br />';
													}
													?>
												</td>
												<td><?php echo $row['language']; ?></td>
												<td><?php echo $row['city']; ?></td>
												<td>
													<?php if($userInfo['type']== 'Admin'){?>
                                                    <a href="<?php echo $this->url->editConsultant($row['consultantId']); ?>">Edit</a>
                                                    |
                                                    <a href="<?php echo $this->url->deleteConsultant($row['consultantId']); ?>" onClick="return confirmDelete();">Delete</a>
													<?php } ?>
                                                </td>
                                            </tr>
											

                                        <?php
                                            }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            	<input type="submit" name="export_all" class="btn btn-primary" value="Export All"/>
                        		<input type="submit" name="export_selected" class="btn btn-primary" value="Export Selected" />
							<?php
                            }
                            ?>
						
						
						</form>
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
    <script language="javascript" >

        function switchAdvSearch(){
            $('#form_search').slideToggle( "slow");
        }
    </script>
</body>
</html>