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
                                    <h2>Add Student</h2>
                                </div>
                            </div>
                            
                        </div>
                        <div class="body">
                            <?php echo form_open_multipart('student') ?>
                                <div class="row clearfix">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                                        <div class="form-group">
                                        <label for="student_id">Student ID</label>
                                            <div class="form-line">
                                                <input type="text" name="student_id" class="form-control" placeholder="Student ID">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                                        <div class="form-group">
                                        <label for="firstname">Firstname</label>
                                            <div class="form-line">
                                                <input type="text" name="firstname" class="form-control" placeholder="First Name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                                        <div class="form-group">
                                        <label for="middlename">Middlename</label>
                                            <div class="form-line">
                                                <input type="text" name="middlename" class="form-control" placeholder="Middle Name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                                        <div class="form-group">
                                        <label for="lastname">Lastname</label>
                                            <div class="form-line">
                                                <input type="text" name="lastname" class="form-control" placeholder="Last Name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                                        <div class="form-group">
                                        <label for="gender">Gender</label>
                                            <div class="form-line">
                                                <select name="gender" class="form-control">
                                                  <option value="Female">Female</option>
                                                  <option value="Male">Male</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                                        <div class="form-group">
                                        <label for="dob">Date of Birth</label>
                                            <div class="form-line">
                                                <input type="date" name="dob" class="form-control" placeholder="Date of Birth">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                                        <div class="form-group">
                                        <label for="phone">Phone</label>
                                            <div class="form-line">
                                                <input type="phone" name="phone" class="form-control" placeholder="Phone">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                                        <div class="form-group">
                                        <label for="phone">Email</label>
                                            <div class="form-line">
                                                <input type="email" name="email" class="form-control" placeholder="email">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                                        <div class="form-group">
                                        <label for="address">Address</label>
                                            <div class="form-line">
                                                <textarea name="address" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group">
                                        <label for="picture">Profile Picture</label>
                                            <div class="form-line">
                                                <input type="file" name="picture" class="form-control" placeholder="Profile Picture">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <button type="submit" class="btn btn-primary btn-lg m-l-15 waves-effect">Add Student</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="body">
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
                                        <td><a href="<?php echo base_url('student/'.$students[$i]->student_id."/delete") ?>" class="btn btn-danger" onclick="return confirmDialog()"><i class="fa fa-trash"></i></a> <a href="<?php echo base_url('student/'.$students[$i]->student_id."/edit"); ?>" class="btn btn-info"><i class="fa fa-edit"></i></a></td>
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