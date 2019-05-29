<section class="content">
    <div class="container-fluid">
    <div class="block-header">
        <h2>DASHBOARD</h2>
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
                                    <h2>Update Classroom</h2>
                                </div>
                            </div>
                            
                        </div>
                        <?php if(!empty($classroom)): ?>
                        <div class="body">
                            <?php echo form_open('classroom/update'); ?>
                                <div class="row clearfix">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="hidden" name="class_id" value="<?php echo $classroom[0]->class_id; ?>">
                                                <input type="text" name="classname" class="form-control" placeholder="Classroom Name" value="<?php echo $classroom[0]->name; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="number" name="maxnum" class="form-control" placeholder="Maximum number of students" value="<?php echo $classroom[0]->maximum_students; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <button type="submit" class="btn btn-primary btn-lg m-l-15 waves-effect">Update Classroom</button>
                                        <?php echo anchor('classroom', 'Back', array('class'=>'btn btn-primary btn-lg m-l-15 waves-effect')) ?>
                                    </div>
                                </div>
                            </form>
                        </div>
<?php else: echo"Oops this is an invalid Classroom !!"; endif;  ?>
                        </div>
                </div>
            </div>
            <!-- #END# CPU Usage -->
    </div>
</section>        