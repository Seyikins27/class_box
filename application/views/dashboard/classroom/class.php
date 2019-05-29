<section class="content">
    <div class="container-fluid">
    <div class="block-header">
    </div>
    
     <!-- Widgets -->
     <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="fa fa-user"></i>
                        </div>
                        <div class="content">
                            <div class="text"><h4>Teacher</h4></div>
                                <strong><?php echo $teacher_name; ?></strong></label>
                                
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="fa fa-info"></i>
                        </div>
                        <div class="content">
                            <div class="text"><h4>Class</h4></div>
                            <strong><?php echo $classroom[0]->name; ?></strong>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="fa fa-group"></i>
                        </div>
                        <div class="content">
                            <div class="text"><h4>Number of Students in Class</h4></div>
                            <strong><?php echo count($students); ?></strong>
                        </div>
                    </div>
                </div>
              </div>
    <?php echo ($this->session->flashdata('success') != null)? "<label class='alert alert-success'>".$this->session->flashdata('success')."</label>":null; ?>
    <?php echo ($this->session->flashdata('error') != null)? "<label class='alert alert-danger'>".$this->session->flashdata('error')."</label>": null; ?>
            <!-- Student roll -->
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <div class="row clearfix">
                                <div class="col-xs-12 col-sm-6">
                                    <h2>Students in Classroom</h2>
                                    <span class="float float-right"><a href="<?php echo base_url('classroom/'.$class_id.'/assign'); ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Add Students to Class</a></span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="body">
                              
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>Picture</th>
                                        <th>Student Name</th>
                                        <th>Gender</th>
                                        <th>email</th>
                                        <th>Phone</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Picture</th>
                                        <th>Student Name</th>
                                        <th>Gender</th>
                                        <th>email</th>
                                        <th>Phone</th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                  <?php if(!empty($students)): for($i=0; $i<count($students); $i++): ?>
                                    <tr>
                                        <td><img src="<?php echo base_url($students[$i]->picture); ?>" width="50" height="50" alt="<?php echo $students[$i]->firstname." ".$students[$i]->middlename." ".$students[$i]->lastname; ?>"></td>
                                        <td><?php echo $students[$i]->firstname." ".$students[$i]->middlename." ".$students[$i]->lastname; ?></td>
                                        <td><?php echo $students[$i]->gender; ?></td>
                                        <td><?php echo $students[$i]->email; ?></td>
                                        <td><?php echo $students[$i]->phone; ?></td>
                                        <td><a href="<?php echo base_url('student/'.$students[$i]->student_id."/view"); ?>" class="btn btn-info"><i class="fa fa-eye"> View Student</i></a></td>
                                    </tr>
<?php endfor; endif; ?>
                                </tbody>   
                                </table>    
                        </div>    

                    </div>
                </div>
            </div>
            <!-- End Student roll -->
    </div>
</section>        