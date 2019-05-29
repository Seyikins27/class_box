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
                                    <h2>View all Classrooms</h2>
                                </div>
                            </div>
                            
                        </div>
                        
                        <div class="body">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>Classroom Name</th>
                                        <th>Maximum Number of Students</th>
                                        <th>Students currently in class</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                    <th>Classroom Name</th>
                                    <th>Maximum Number of Students</th>
                                    <th>Students currently in class</th>
                                    <th></th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                  <?php if(!empty($classrooms)): for($i=0; $i<count($classrooms); $i++): ?>
                                    <tr>
                                        <td><?php echo $classrooms[$i]->name; ?></td>
                                        <td><?php echo $classrooms[$i]->maximum_students; ?></td>
                                        <td><?php echo $class_count($classrooms[$i]->class_id); ?></td>
                                        <td><a href="<?php echo base_url('classroom/'.$classrooms[$i]->class_id."/view"); ?>" class="btn btn-info"><i class="fa fa-eye"> View Class</i></a></td>
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