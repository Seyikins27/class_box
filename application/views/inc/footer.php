<script type='text/javascript'>
   var baseURL= "<?php echo base_url();?>";
</script>
  <!-- Jquery Core Js -->
<script src="<?php echo base_url('assets/plugins/jquery/jquery.min.js'); ?>"></script>

<!-- Bootstrap Core Js -->
<script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.js'); ?>"></script>

<!-- Select Plugin Js -->
<script src="<?php echo base_url('assets/plugins/bootstrap-select/js/bootstrap-select.js'); ?>"></script>

<!-- Slimscroll Plugin Js -->
<script src="<?php echo base_url('assets/plugins/jquery-slimscroll/jquery.slimscroll.js'); ?>"></script>

<!-- Waves Effect Plugin Js -->
<script src="<?php echo base_url('assets/plugins/node-waves/waves.js'); ?>"></script>

<!-- Autosize Plugin Js -->
<script src="<?php echo base_url('assets/plugins/autosize/autosize.js'); ?>"></script>

<!-- Moment Plugin Js -->
<script src="<?php echo base_url('assets/plugins/momentjs/moment.js'); ?>"></script>

<!-- Bootstrap Material Datetime Picker Plugin Js -->
<script src="<?php echo base_url('assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js'); ?>"></script>

<!--Dynamically Loaded Js -->
<?php if(! empty($js)): for($i=0; $i<count($js); $i++): ?>
<script src="<?php echo base_url("assets/".$js[$i]); ?>"></script><br/>
<?php endfor; endif; ?>

<!-- Custom Js -->
<script src="<?php echo base_url('assets/js/admin.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/pages/forms/basic-form-elements.js'); ?>"></script>



<!-- Demo Js -->
<script src="<?php echo base_url('assets/js/demo.js'); ?>"></script>


<!-- Validation Plugin Js -->
<script src="<?php echo base_url('assets/plugins/jquery-validation/jquery.validate.js'); ?>"></script>

<!-- Custom Js -->
<script src="<?php echo base_url('assets/js/pages/examples/sign-in.js'); ?>"></script>
</body>

</html>