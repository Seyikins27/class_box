<div class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">Class<b>Box</b></a>
            <small>A Classroom Management System</small>
        </div>
        <?php echo ($this->session->flashdata('success') != null)?  $this->session->flashdata('success'): $this->session->flashdata('error'); ?>
        <div class="card">
            <div class="body">
            <?php echo form_open('authenticate'); ?>
                    <div class="msg">Sign in to start your session</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">Email</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="email" placeholder="Email" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">Password</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit">Login</button>
                    <div class="row m-t-15 m-b--20">
                        <div class="col-xs-6">
                            <a href="<?php echo base_url('signup'); ?>">Register Now!</a>
                        </div>
                        <div class="col-xs-6 align-right">
                            <a href="forgot-password.html">Forgot Password?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
   </div> 