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
                                    <h2>Add Subjects</h2>
                                </div>
                            </div>
                            
                        </div>
                        <div class="body">
                            <?php echo form_open('subject'); ?>
                                <div class="row clearfix">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                                        <label for="">Classroom</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select name="classroom" id="" class="form-control">
                                                <?php if(!empty($classrooms)): for($i=0; $i<count($classrooms); $i++): ?>
                                                     
                                                         <option value="<?php echo $classrooms[$i]->class_id; ?>"><?php echo $classrooms[$i]->name; ?></option>
                                                     
                                                 <?php endfor; endif; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                                       <label for="">Subject Name</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="subject_name" class="form-control" placeholder="Subject Name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                                       <label for="">Subject Description</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <textarea name="subject_description" class="form-control" placeholder="Subject Description"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <button type="submit" class="btn btn-primary btn-lg m-l-15 waves-effect">Add Subject</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="body">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>Classroom Name</th>
                                        <th>Subject</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                    <th>Classroom Name</th>
                                    <th>Subject</th>
                                    <th></th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                  <?php if(!empty($subjects)): for($j=0; $j<count($subjects); $j++): ?>
                                    <tr>
                                        <td><?php echo $subjects[$j]->name; ?></td>
                                        <td><?php echo $subjects[$j]->name; ?></td>
                                        <td><a href="<?php echo base_url('classroom/'.$subjects[$j]->subject_id."/delete") ?>" class="btn btn-danger" onclick="return confirmDialog()"><i class="fa fa-trash"></i></a> <a href="<?php echo base_url('classroom/'.$classrooms[$i]->class_id."/edit"); ?>" class="btn btn-info"><i class="fa fa-edit"></i></a></td>
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