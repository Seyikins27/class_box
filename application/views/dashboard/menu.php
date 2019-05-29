<section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="../../images/user.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo isset($name)?$name:null;  ?></div>
                    <div class="email">john.doe@example.com</div>
                   
                </div>
            </div>
            <!-- #User Info -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li><?php echo anchor('home','Home'); ?></li>
                    <li> <a href="javascript:void(0);" class="menu-toggle">  
                            <span>Manage Classrooms</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <?php echo anchor('classroom','Add Classrooms'); ?>
                            </li>
                            <li>
                                <?php echo anchor('classroom/all','View Classrooms'); ?>
                            </li>
                        </ul>    
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            
                            <span>Manage Students</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <?php echo anchor('student','Add Students'); ?>
                            </li>
                            <li>
                                <?php echo anchor('student/all','Assign Students to Class'); ?>
                            </li>
                          </ul>  
                      </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <span>Manage Subjects</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <?php echo anchor('subject','Add Subjects'); ?>
                            </li>
                            <li>
                                <?php echo anchor('subject/all','Manage Subject'); ?>
                            </li>
                          </ul>  
                    </li>
                    <li><?php echo anchor('home','Manage Reports'); ?></li>
                </ul>    
            </div>
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2019 <a href="javascript:void(0);">ClassBox</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.0
                </div>
            </div>
            <!-- #Footer -->
        </aside>    
