<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
    <meta name="description" content="ClassBox | Classroom Management System" />
    <meta name="keywords" content="<?php echo isset($meta) ? $meta: "ClassBox"; ?>" />
    <meta name="author" content="ClassBox" />
    <title><?php echo isset($title)?$title:"ClassBox" ?></title>
    <!-- Favicon-->
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?php echo base_url('assets/plugins/bootstrap/css/bootstrap.css'); ?>" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="<?php echo base_url('assets/plugins/font-awesome/css/font-awesome.css'); ?>" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?php echo base_url('assets/plugins/node-waves/waves.css'); ?>" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?php echo base_url('assets/plugins/animate-css/animate.css'); ?> " rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet">
    <!-- Morris Chart Css-->
    <link href="<?php echo base_url('assets/plugins/morrisjs/morris.css'); ?>" rel="stylesheet" />

    <!-- Bootstrap Select Css -->
    <link href="<?php echo base_url('assets/plugins/bootstrap-select/css/bootstrap-select.css'); ?>" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?php echo base_url('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput-typeahead.css'); ?>" rel="stylesheet">
    
    <!-- Dynamically Loaded Css -->
    <?php if(! empty($css)): for($i=0; $i<count($css); $i++): ?>
    <link href="<?php echo base_url("assets/".$css[$i]); ?>" rel="stylesheet"><br/>
    <?php endfor; endif; ?>

    <link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?php echo base_url('assets/css/themes/all-themes.css') ?>" rel="stylesheet" />
</head>
<body>
