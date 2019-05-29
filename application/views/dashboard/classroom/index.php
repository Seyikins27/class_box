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
                                    <h2>Add Classroom</h2>
                                </div>
                            </div>
                            
                        </div>
                        <div class="body">
                            <?php echo form_open('classroom'); ?>
                                <div class="row clearfix">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="classname" class="form-control" placeholder="Classroom Name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="number" name="maxnum" class="form-control" placeholder="Maximum number of students">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <button type="submit" class="btn btn-primary btn-lg m-l-15 waves-effect">Add Classroom</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="body">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>Classroom Name</th>
                                        <th>Maximum Number of Students</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                    <th>Classroom Name</th>
                                    <th>Maximum Number of Students</th>
                                    <th></th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                  <?php if(!empty($classrooms)): for($i=0; $i<count($classrooms); $i++): ?>
                                    <tr>
                                        <td><?php echo $classrooms[$i]->name; ?></td>
                                        <td><?php echo $classrooms[$i]->maximum_students; ?></td>
                                        <td><a href="<?php echo base_url('classroom/'.$classrooms[$i]->class_id."/delete") ?>" class="btn btn-danger" onclick="return confirmDialog()"><i class="fa fa-trash"></i></a> <a href="<?php echo base_url('classroom/'.$classrooms[$i]->class_id."/edit"); ?>" class="btn btn-info"><i class="fa fa-edit"></i></a></td>
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