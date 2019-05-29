<section class="content">
    <div class="container-fluid">
    <div class="block-header">
    </div>
    <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="fa fa-user"></i>
                        </div>
                        <div class="content">
                            <div class="text"><h4>Teacher</h4></div>
                                <strong><?php echo $teacher_name; ?></strong></label>
                                <input type="hidden" id="class_id" value="<?php echo $class_id; ?>"/>  
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
                            <strong><?php echo $class[0]->name; ?></strong>
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
                            <strong><?php echo count($students_in_class); ?></strong>
                        </div>
                    </div>
                </div>
              </div>

    <?php echo ($this->session->flashdata('success') != null)? "<label class='alert alert-success'>".$this->session->flashdata('success')."</label>":null; ?>
    <?php echo ($this->session->flashdata('error') != null)? "<label class='alert alert-danger'>".$this->session->flashdata('error')."</label>": null; ?>
            <!-- CPU Usage -->
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <div class="row clearfix">
                                <div class="col-xs-12 col-sm-6">
                                    <h2>Assign Students to classroom</h2>
                                </div>
                                <div class="col-xs-12 col-sm-6 m-r--5">
                                    <button id="assign_st" class="btn btn-primary">Assign Students</button>
                                </div>
                            </div>   
                        </div>

                        <div class="body">
                        <div class="col-xs-12 col-sm-6">
                                    <h2>All Students</h2>
                                </div>
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>picture</th>
                                        <th>Student Name</th>
                                        <th>Email</th>
                                        <th>Gender</th>
                                        <th>Phone</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>picture</th>
                                        <th>Student Name</th>
                                        <th>Email</th>
                                        <th>Gender</th>
                                        <th>Phone</th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                  <?php if(!empty($students)): for($j=0; $j<count($students); $j++): ?>
                                    <tr>
                                        <td><img src="<?php echo base_url($students[$j]->picture_thumbnail); ?>" width="50" heigth="50" alt="Classbox Student"></td>
                                        <td><?php echo $students[$j]->firstname." ".$students[$j]->lastname; ?></td>
                                        <td><?php echo $students[$j]->email; ?></td>
                                        <td><?php echo $students[$j]->gender; ?></td>
                                        <td><?php echo $students[$j]->phone; ?></td>
                                        <td><div class="switch">
                                            <label><input type="checkbox" name="student"  value="<?php echo $students[$j]->student_id; ?>" ><span class="lever switch-col-blue"></span></label>
                                        </div></td>
                                    </tr>
<?php endfor; endif; ?>
                                </tbody>   
                                </table>    
                        </div>    
                    

                        <div class="body">
                        <div class="col-xs-12 col-sm-6">
                                    <h2>Student in the Class</h2>
                                </div>
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>picture</th>
                                        <th>Student Name</th>
                                        <th>Email</th>
                                        <th>Gender</th>
                                        <th>Phone</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>picture</th>
                                        <th>Student Name</th>
                                        <th>Email</th>
                                        <th>Gender</th>
                                        <th>Phone</th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                  <?php if(!empty($students_in_class)): for($i=0; $i<count($students_in_class); $i++): ?>
                                    <tr>
                                        <td><img src="<?php echo base_url($students_in_class[$i]->picture_thumbnail); ?>" width="50" heigth="50" alt="Classbox Student"></td>
                                        <td><?php echo $students_in_class[$i]->firstname." ".$students_in_class[$i]->lastname; ?></td>
                                        <td><?php echo $students_in_class[$i]->email; ?></td>
                                        <td><?php echo $students_in_class[$i]->gender; ?></td>
                                        <td><?php echo $students_in_class[$i]->phone; ?></td>
                                        <td><input type="checkbox" name="check[]" value="<?php echo $students_in_class[$i]->student_id; ?>"><a href="<?php echo base_url('student/'.$students_in_class[$i]->student_id."/delete") ?>" class="btn btn-primary" onclick="return confirmDialog()"><i class="fa fa-check"></i></a> </td>
                                    </tr>
<?php endfor; endif; ?>
                                </tbody>   
                                </table>    
                        </div>    


                        

                      
                        </div>
                </div>
            </div>
            <!-- #END# CPU Usage -->
    </div>
</section>        