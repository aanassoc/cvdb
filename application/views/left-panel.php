<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
<div class="collapse navbar-collapse navbar-ex1-collapse">
    <?php
        $userInfo = $this->session->userdata('UserData');
    ?>
                <ul class="nav navbar-nav side-nav">
                    <li 
					<?php if($this->uri->segment(1) == 'dashboard'){ echo ' class="active" '; }?>
					>
                        <a href="<?php echo $this->url->dashboard(); ?>"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>

                    <li <?php if($this->uri->segment(1) == 'search'){ echo ' class="active" '; }?>>
                        <a href="<?php echo $this->url->search(); ?>"><i class="fa fa-fw fa-search"></i> Search</a>
                    </li>

                    <li <?php if($this->uri->segment(1) == 'consultant' && $this->uri->segment(2) != 'add'){ echo ' class="active" '; }?>>
                        <a href="<?php echo $this->url->consultants(); ?>"><i class="fa fa-fw fa-users"></i> Consultants</a>
                    </li>
                    <?php if($userInfo['type']== 'Admin'): ?>
                        <li <?php if($this->uri->segment(1) == 'consultant' && $this->uri->segment(2) == 'add') { echo ' class="active" '; }?>>
                            <a href="<?php echo $this->url->addConsultant(); ?>"><i class="fa fa-fw fa-plus"></i> Add Consultant</a>
                        </li>
                    <?php endif; ?>

                    <?php if($userInfo['type']== 'Admin'): ?>
					<li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#sector">
							<i class="fa fa-fw fa-cog"></i> Settings <i class="fa fa-fw fa-caret-down"></i>
						</a>
                        <ul id="sector" class="collapse" <?php
                            if($this->uri->segment(1)=='settings' || $this->uri->segment(1) =='sectors' || $this->uri->segment(1) =='subsector' || $this->uri->segment(1) =='degree')
                            { echo ' style="display:block;visibility:visible;" '; }?>
                        >
							<li <?php if($this->uri->segment(1) == 'sectors'){ echo 'style="background:#B20838;"'; }?>>
                                <a href="<?php echo $this->url->grade(); ?>">Grade</a>
                            </li>
                            <li <?php if($this->uri->segment(1) == 'sectors'){ echo 'style="background:#B20838;"'; }?>>
                                <a href="<?php echo $this->url->sectors(); ?>">Theme</a>
                            </li>
                            <li <?php if($this->uri->segment(1) == 'subsector'){ echo ' style="background:#B20838;" '; }?>>
                                <a href="<?php echo $this->url->subsectors(); ?>">Sub Theme</a>
                            </li>
                            <li <?php if($this->uri->segment(1) == 'degree'){ echo 'style="background:#B20838;"'; }?>>
                                <a href="<?php echo $this->url->degrees(); ?>">Degrees</a>
                            </li>
							
							<li <?php if($this->uri->segment(1) == 'expertise'){ echo 'style="background:#B20838;"'; }?>>
                                <a href="<?php echo $this->url->expertise(); ?>">Functional Expertise</a>
                            </li>
							
                            <li <?php if($this->uri->segment(1) == 'settings'){ echo 'style="background:#B20838;"'; }?>>
                                <a href="<?php echo $this->url->settings(); ?>">Change Password</a>
                            </li>
                        </ul>
                    </li>
					<?php endif; ?>

                    <?php if($userInfo['type']== 'Admin'): ?>
                        <li <?php if($this->uri->segment(1) == 'user'){ echo ' class="active" '; }?>>
                            <a href="<?php echo $this->url->users(); ?>"><i class="fa fa-fw fa-users"></i> Users</a>
                        </li>
                    <?php endif; ?>
                    <?php if($userInfo['type']== 'Admin'): ?>
                        <li <?php if($this->uri->segment(1) == 'export'){ echo ' class="active" '; }?>>
                            <a href="<?php echo $this->url->export(); ?>"><i class="fa fa-fw fa-download"></i> Export</a>
                        </li>
                    <?php endif; ?>

					<li>
                        <a href="<?php echo $this->url->logout(); ?>"><i class="fa fa-fw fa-arrow-right"></i> Logout</a>
                    </li>
                    
                </ul>
            </div>