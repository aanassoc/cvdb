<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Add Consultant</title>
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
                            Consultants <small>Add Consultant</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo $this->url->dashboard(); ?>">Dashboard</a>
                            </li>
                            <li>
                                <i class="fa fa-users"></i> <a href="<?php echo $this->url->consultants(); ?>">Consultants</a>
                            </li>
							<li class="active">
                                <i class="fa fa-plus"></i> <a href="<?php echo $this->url->addConsultant(); ?>"> Add Consultant</a>
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
				<?php
				if($msg == 'Yes'){
				?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-success">
                         <strong>Success!</strong> Consultant has been added.
                        </div>
                    </div>
                </div>
				<?php
				}
				?>
				<?php
				if($msg == 'No'){
				?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-danger">
                         <strong>Error!</strong> While adding consultant.
                        </div>
                    </div>
                </div>
				<?php
				}
				?>
                <!-- /.row -->

                <div class="row">
                    
                   
						<form role="form" action="<?php echo $this->url->addConsultant(); ?>" name="frmAddConsultant" id="frmAddConsultant" method="post" enctype="multipart/form-data">
					<div class="form-group" style="width:80%;float:left;">
						<table style="width:100%;padding:5px;">
							<tr>
								<td>
									<?php
                                    echo form_error('firstname', '<span class="error-msg">', '</span><br />');
									?>
									<label>First Name *</label>
								</td>
								
								<td>
									  <label>Last Name</label>
								</td>
								
							</tr>
							<tr>
								<td>
									 <input class="form-control form-group" name="firstname" id="firstname" value="<?php echo $this->input->post('firstname'); ?>"  style="width:350px;">
								</td>
								
								<td>
									<input class="form-control form-group" name="lastname" id="lastname" value="<?php echo $this->input->post('lastname'); ?>"  style="width:350px;" >
								</td>
							</tr>
							<tr>
								<td>
									 <?php
                                    echo form_error('gender', '<span class="error-msg">', '</span><br />');
                                ?>
                                <label>Gender *</label><br>
								</td>
								<td>
									<?php
                                    echo form_error('nationality', '<span class="error-msg">', '</span><br />');
                                ?>
									<label>Nationality *</label>
								</td>
							</tr>
							<tr>
								<td>
									 <input type="radio" name="gender" value="Male"
								<?php
								if($this->input->post('gender') == 'Male')
								{
								  echo ' checked="checked" ';
								}
								?>
								> Male
                                <input type="radio" name="gender" value="Female"
								<?php
								if($this->input->post('gender') == 'Female')
								{
								  echo ' checked="checked" ';
								}
								?>
								> Female
								</td>
								<td>
									<input class="form-control form-group" name="nationality" id="nationality" value="<?php echo $this->input->post('nationality'); ?>"  
									 style="width:350px;" >
								</td>
							</tr>
							<tr>
								<td>
									<label>Years of experience</label>
								</td>
								<td>
									<label>Experience Type *</label>
								</td>
							</tr>
							<tr>
								<td>
									<select class="form-control" name="experienceInYears" id="experienceInYears" style="width:350px;" >
									<option value="">Select</option>
									
									<option value="5 to 7"
									<?php
								if($this->input->post('experienceInYears') == '5 to 7')
								{
									echo ' selected="selected" ';
								}
								?>
									>5 to 7</option>
									
                                    <option value="8 to 10"
									<?php
								if($this->input->post('experienceInYears') == '8 to 10')
								{
									echo ' selected="selected" ';
								}
								?>
									>8 to 10</option>
                                    <option value="11 to 13"
									<?php
								if($this->input->post('experienceInYears') == '11 to 13')
								{
									echo ' selected="selected" ';
								}
								?>
									>11 to 13</option>
									<option value="14 to 16"
									<?php
								if($this->input->post('experienceInYears') == '14 to 16')
								{
									echo ' selected="selected" ';
								}
								?>
								>14 to 16</option>
									<option value="17 to 19"
									<?php
								if($this->input->post('experienceInYears') == '17 to 19')
								{
									echo ' selected="selected" ';
								}
								?>
									>17 to 19</option>
									<option value="20+"
									<?php
								if($this->input->post('experienceInYears') == '20+')
								{
									echo ' selected="selected" ';
								}
								?>
									>20+</option>
									
                                </select>
								</td>
								<td>
									<select class="form-control" name="experience_type" id="" style="width:350px;" >
									<option value="">Select</option>
									
									<option value="National"
									<?php
								if($this->input->post('experience_type') == 'National')
								{
									echo ' selected="selected" ';
								}
								?>
									>National</option>
									
									<option value="international"
									<?php
								if($this->input->post('experience_type') == 'international ')
								{
									echo ' selected="selected" ';
								}
								?>
									>International </option>
                                   
								   <option value="Both(National & International)"
									<?php
								if($this->input->post('experience_type') == 'Both(National & International)')
								{
									echo ' selected="selected" ';
								}
								?>
									>Both</option>
								   
                                </select>
								</td>
							</tr>
							<tr>
								<td>
									 <?php
                                    echo form_error('sector', '<span class="error-msg">', '</span><br />');
                                ?>
									<label>Theme *</label>
								</td>
								<td>
									<?php
                                    echo form_error('subsector', '<span class="error-msg">', '</span><br />');
                                ?>
                                <label>Sub Theme *</label>
								</td>
							</tr>
							<tr>
								<td>
									<select multiple class="form-control" name="sector[]" id=""  style="width:350px;" >
									
                                    <?php foreach($sectors as $row){ ?>
                                        <option value="<?php echo $row['sectorId']; ?>"
										<?php
											if($this->input->post('sector') == $row['sectorId'] )
											{
									echo ' selected="selected" ';
											}
										?>
										><?php echo $row['sector']; ?></option>
                                    <?php }?>
                                </select>
								</td>
								<td>
									<select multiple class="form-control" name="subsector[]" id="subsector"  style="width:350px;" >

                                    <?php foreach($subsectors as $row2){ ?>
                                        <option value="<?php echo $row2['id']; ?>"><?php echo $row2['title']; ?></option>
                                    <?php }?>
                                </select>
								</td>
							</tr>
							<tr>
								<td>
									<label>Sector </label>
								</td>
								<td>
								 <?php
                                    echo form_error('degreeType', '<span class="error-msg">', '</span><br />');
                                ?>
                                <label>Degree Type *</label>
								</td>
							</tr>
							<tr>
								<td>
									<select multiple class="form-control" name="name[]" id="" style="width:350px;" >
									<option value="Non Profit">Non Profit</option>
									<option value="Govt">Govt</option>
									<option value="Private">Private</option>
									<option value="Academic ">Academic </option>
									<option value="others">others </option>
                                 </select>
								</td>
							<td>
								 <select multiple class="form-control" name="degreeType[]" id="degreeType" style="width:350px;"  >
                                    <option value="National"
									<?php
											if($this->input->post('degreeType[]') =='National' )
											{
									echo ' selected="selected" ';
											}
										?>
										>National</option>
									<option value="International"
									<?php
											if($this->input->post('degreeType[]') =='International' )
											{
									echo ' selected="selected" ';
											}
										?>
									>International</option>
									
									<option value="Both(National & International)"
									<?php
											if($this->input->post('degreeType[]') =='Both(National & International)' )
											{
									echo ' selected="selected" ';
											}
										?>
									>Both</option>
									
									
                                </select>
								</td>
							</tr>
							<tr>
								<td>
									 <label>Certification</label>
								</td>
								<td>
									  <label>Functional Expertise</label>
								</td>
							</tr>
							<tr>
								<td>
									<textarea  class="form-control" name="certification" id="certification" style="width:350px;"><?php echo $this->input->post('certification'); ?></textarea>
								</td>
								<td>
									<select multiple class="form-control" name="expertise[]" id="expertise" style="width:350px;"  >
										<?php
										for($i=0;$i<count($functionalExpertise);$i++){
										?>
											<option value="<?php echo $functionalExpertise[$i]['expertiseId']; ?>"><?php echo $functionalExpertise[$i]['expertise']; ?></option>
										<?php
										}
										?>
									</select>
								</td>
							</tr>
							<tr>	
								<td>
									  <label>Degree</label>
								</td>
								<td>
									 <label>Decipline</label>
								</td>
							</tr>
							<tr>
								<td>
								    <select class="form-control" name="degree" id="degree" style="width:350px;" >
                                    <option>Select</option>
                                    <?php foreach($degrees as $row3){ ?>
                                        <option value="<?php echo $row3['id']; ?>"
										<?php
											if($this->input->post('degree') == $row3['id'])
											{
											echo ' selected="selected" ';
											}
										?>
										><?php echo $row3['title']; ?></option>
                                    <?php }?>
								</select>
								</td>
								<td>
									<input class="form-control" name="decipline" id="decipline" value="<?php echo $this->input->post('decipline'); ?>" style="width:350px;" >
								</td>
							</tr>
							<tr>
								<td>
									  <label>Grade</label>
								</td>
								<td>
									 <?php
                                    echo form_error('email', '<span class="error-msg">', '</span><br />');
									?>
									<label>Email *</label>
								</td>
							</tr>
							<tr>
								<td>
									<select class="form-control" name="grade" id="grade" style="width:350px;">
                                    <option>Select</option>
                                    <?php foreach($grades as $row4){ ?>
                                        <option value="<?php echo $row4['grade_id']; ?>"
										<?php
											if($this->input->post('grade') == $row4['grade_id'])
											{
											echo ' selected="selected" ';
											}
										?>
										><?php echo $row4['grade_title'].' ('.$row4['amount'].')'; ?></option>
                                    <?php }?>
								</select>
								</td>
								<td>
									  <input class="form-control" name="email" id="email" value="<?php echo $this->input->post('email'); ?>"
									  style="width:350px;" />
								</td>
							</tr>
							<tr>
								<td>
									<?php
                                    echo form_error('mobile', '<span class="error-msg">', '</span><br />');
                                ?>
									<label>Mobile # *</label>
								</td>
								<td>
									 <label>Land Line #</label>
								</td>
							</tr>
							<tr>
								<td>
									<input class="form-control" name="mobile" id="mobile" value="<?php echo $this->input->post('mobile'); ?>" style="width:350px;" />
								</td>
								<td>
									 <input class="form-control" name="landline" id="landline" value="<?php echo $this->input->post('landline'); ?>" style="width:350px;">
								</td>
							</tr>
							<tr>
								<td>
                                <?php
                                    echo form_error('address', '<span class="error-msg">', '</span><br />');
                                ?>
                                <label>Address *</label>
								</td>
								<td>
									  <label>City </label>
								</td>
							</tr>
							<tr>
								<td>
									 <input class="form-control" name="address" id="address" value="<?php echo $this->input->post('address'); ?>" style="width:350px;"/>
								</td>
								<td>
									<input class="form-control" name="city" id="city" value="<?php echo $this->input->post('city'); ?>"
									style="width:350px;" />
								</td>
							</tr>
							<tr>
								<td>
									<label>Language </label>
								</td>
								<td>
									<label>Upload Document</label>
								</td>
							</tr>
							<tr>
								<td>
									<input class="form-control" name="language" id="language" value="<?php echo $this->input->post('language'); ?>" style="width:350px;">
								<td>
									<input type="file" name="consultantFile" id="consultantFile" style="width:350px;">
								</td>
							</tr>
							
						</table>
						
							<br />
							<button type="submit" class="btn btn-primary" name="btnSub" id="btnSub">Save Consultant</button>
					</div>
						</form>
					
                    
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