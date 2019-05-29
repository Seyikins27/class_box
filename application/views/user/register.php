<div class="signup-page">
    <div class="signup-box">
        <div class="logo">
            <a href="javascript:void(0);">Class<b>Box</b></a>
            <small>A Classroom management system</small>
        </div>
        <div class="card">
            <div class="body">
                    <?php
            if($this->session->flashdata('validation_errors')!=null)
            {
                $errs=$this->session->flashdata('validation_errors');
                echo "<div class='alert alert-danger'>".$errs."</div>";
            }
            ?>
             <?php echo ($this->session->flashdata('success') != null)?  $this->session->flashdata('success'): $this->session->flashdata('error'); ?>

                  <?php echo form_open('register'); ?>
                    <div class="msg">Register as a Classroom Teacher</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">Title</i>
                        </span>
                        <div class="form-line">
                            <select name="title" class="form-control">
                              <option value="Mr">Mr</option>
                              <option value="Miss">Miss</option>
                              <option value="Mrs">Mrs</option>
                              <option value="Dr">Dr</option>
                              <option value="Eng">Eng</option>
                              <option value="Prof">Prof</option>
                            </select>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">Firstname</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="firstname" placeholder="Firstname" value="<?php echo set_value('firstname'); ?>" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">Middlename</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="middlename" placeholder="Middlename" value="<?php echo set_value('middlename'); ?>" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">Lastname</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="lastname" placeholder="Lastname" value="<?php echo set_value('lastname'); ?>" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">Gender</i>
                        </span>
                        <div class="form-line">
                            <select name="gender" class="form-control">
                              <option value="Female">Female</option>
                              <option value="Male">Male</option>
                            </select>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">Email</i>
                        </span>
                        <div class="form-line">
                            <input type="email" class="form-control" name="email" placeholder="Email Address" value="<?php echo set_value('email'); ?>" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">Phone</i>
                        </span>
                        <div class="form-line">
                            <input type="phone" class="form-control" name="phone" placeholder="Phone number" value="<?php echo set_value('phone'); ?>" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" minlength="6" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="passconf" minlength="6" placeholder="Confirm Password" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="terms" id="terms" class="filled-in chk-col-pink">
                        <label for="terms">I read and agree to the <a href="javascript:void(0);">terms of usage</a>.</label>
                    </div>

                    <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit">SIGN UP</button>

                    <div class="m-t-25 m-b--5 align-center">
                        <a href="<?php echo base_url('login'); ?>">You already have a membership?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>