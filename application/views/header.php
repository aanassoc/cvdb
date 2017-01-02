<!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
				<div style="padding:5px;margin-left:10px;">
                <a  href="<?php echo $this->url->dashboard(); ?>">
					<img src="<?php echo images; ?>AAN-Logo-100x51.png"  height="40"/>
				
				</a>
				</div>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <?php
                $userInfo = $this->session->userdata('UserData');
				?>
                <li class="dropdown" >
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:#B20838;"><i class="fa fa-user"></i> <?php echo $userInfo['firstname'] . ' ' . $userInfo['lastname']; ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="<?php echo $this->url->settings(); ?>"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="<?php echo $this->url->logout(); ?>"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
			