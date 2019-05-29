<section class="content">
    <div class="container-fluid">
    <div class="block-header">
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
                                    <h2>All Students</h2>
                                </div>
                            </div>   
                        </div>


                        <div class="body">
                        <div class="col-xs-12 col-sm-6">
                            <h2>All Classes</h2>
                            <em>Tick the classes that you want to add the students to</em>
                        </div>
                        <div class="demo-checkbox">      
                          <select class="form-control show-tick" name="class" multiple>  
                            <?php if(!empty($classes)): for($j=0; $j<count($classes); $j++): ?>
                                        <option value="<?php echo $classes[$j]->class_id ?>"><?php echo $classes[$j]->name; ?></option>
                            <?php endfor; endif; ?> 
                         </select> 
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
                                  <?php if(!empty($students)): for($i=0; $i<count($students); $i++): ?>
                                    <tr>
                                        <td><img src="<?php echo base_url($students[$i]->picture_thumbnail); ?>" width="50" heigth="50" alt="Classbox Student"></td>
                                        <td><?php echo $students[$i]->firstname." ".$students[$i]->lastname; ?></td>
                                        <td><?php echo $students[$i]->email; ?></td>
                                        <td><?php echo $students[$i]->gender; ?></td>
                                        <td><?php echo $students[$i]->phone; ?></td>
                                        <td><a href="<?php echo base_url('student/'.$students[$i]->student_id."/delete") ?>" class="btn btn-primary" onclick="return confirmDialog()"><i class="fa fa-check"></i></a> </td>
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