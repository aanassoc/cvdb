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
</head>
<body style="background: white;">

<h2>Consultant Details</h2>
<div class="row">
    <div class="col-lg-6" >
        <div class="panel panel-default" style="border:1px solid #000000;">
            <div class="panel-heading" id="panel-head">
                <h4>Personal Information</h4>
            </div>
            <div class="panel-body">
                <?php $this->load->helper('sitefunctions_helper')?>
                <ul class="list-unstyled list-info">
                    <li><span><b>Name: </b></span><?php echo $consultant['firstname'] . ' ' . $consultant['lastname']; ?></li>
                    <li><span><b>Gender: </b></span><?php echo $consultant['gender']; ?></li>
                    <?php if(!empty($consultant['experienceInYears'])): ?>
                        <li><span><b>Experience in years: </b></span><?php echo $consultant['experienceInYears']; ?></li>
                    <?php endif; ?>

                    <?php
                    if($consultant['dateAdded']):
                    ?>
                        <li>
                            <span><b>Date Added:</b></span><?php echo mysql2userformat_datetime($consultant['dateAdded']); ?>
                        </li>
                    <?php endif; ?>
                    <?php
                    if($consultant['date_updated']):
                    ?>
                        <li>
                            <span><b>Date Updated:</b></span><?php echo mysql2userformat_datetime($consultant['date_updated']); ?>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>


    <div class="col-lg-6">
        <div class="panel panel-default" style="border:1px solid #000000;">
            <div class="panel-heading" id="panel-head">
                <h4>Location</h4>
            </div>
            <div class="panel-body">
                <ul class="list-unstyled list-info">
                    <?php if(!empty($consultant['location'])): ?>
                        <li><span><b>Location: </b></span><?php echo $consultant['location']; ?></li>
                    <?php endif; ?>
                    <li><span><b>Nationality: </b></span><?php echo $consultant['nationality']; ?></li>

                </ul>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="panel panel-default" style="border:1px solid #000000;">
            <div class="panel-heading" id="panel-head">
                <h4>Contact</h4>
            </div>
            <div class="panel-body">
                <ul class="list-unstyled list-info">
                    <li><span><b>Mobile: </b></span><?php echo $consultant['mobile']; ?></li>
                    <?php if(!empty($consultant['landline'])): ?>
                        <li><span><b>Land Line: </b></span><?php echo $consultant['landline']; ?></li>
                    <?php endif; ?>
                    <li><span><b>Email: </b></span><?php echo $consultant['email']; ?></li>
                    <li><span><b>Address: </b></span><?php echo $consultant['address']; ?></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="panel panel-default" style="border:1px solid #000000;">
            <div class="panel-heading" id="panel-head">
                <h4>Education</h4>
            </div>
            <div class="panel-body">
                <ul class="list-unstyled list-info">
                    <li><span><b>Sector: </b></span><?php echo $sectors['sector']; ?></li>
                    <li><span><b>Sub Sector: </b></span>
                        <div style="margin-left: 160px;">
                            <?php
                            $strTitle = '';
                            foreach($subsectors as $row){
                                $strTitle .= $row['title'].' , ';
                            }
                            echo rtrim($strTitle,' , ');
                            ?>
                        </div>
                    </li>
                    <li><span><b>Degree: </b></span><?php echo $degree['title']; ?></li>
                    <li><span><b>Degree Type: </b></span>
                        <div style="margin-left: 160px;">
                            <?php
                            $strTitle = '';
                            foreach($degreetype as $row2){
                                $strTitle .= $row2['degree_type'].' , ';
                            }
                            echo rtrim($strTitle,' , ');
                            ?>
                        </div>
                    </li>
                    <?php if(!empty($consultant['decipline'])): ?>
                        <li><span><b>Discipline: </b></span><?php echo $consultant['decipline']; ?></li>
                    <?php endif; ?>
                    <?php if(!empty($consultant['certification'])): ?>
                        <li><span><b>Certification: </b></span><?php echo $consultant['certification']; ?></li>
                    <?php endif; ?>
                    <li><span><b>Experience: </b></span><?php echo $consultant['experience']; ?></li>
                    <?php if(!empty($consultant['expertise'])): ?>
                        <li><span><b>Expertise: </b></span><?php echo $consultant['expertise']; ?></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>


</div>

</body>
</html>