<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <title>Admin Pages</title>
  <link rel="apple-touch-icon" href="<?php echo base_url(); ?>assets/template/images/ico/apple-icon-120.html">

  <!-- BEGIN: Vendor CSS-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/template/vendors/css/vendors.min.css">
  <!-- END: Vendor CSS-->

  <!-- BEGIN: Theme CSS-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/template/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/template/css/bootstrap-extended.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/template/css/colors.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/template/css/components.min.css">

  <!-- BEGIN: Page CSS-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/template/css/core/menu/menu-types/horizontal-menu.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/template/css/core/colors/palette-gradient.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/template/css/pages/dashboard-analytics.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/template/css/pages/card-analytics.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/template/css/plugins/tour/tour.min.css">
  <!-- END: Page CSS-->

  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/template/vendors/css/vendors.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/template/vendors/css/tables/datatable/datatables.min.css">

  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/template/vendors/css/pickers/pickadate/pickadate.css">

  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/template/vendors/css/extensions/toastr.css">

  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/template/vendors/css/extensions/sweetalert2.min.css">

  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/template/css/plugins/forms/validation/form-validation.css">
</head>

<?php
$this->load->view('_partial/navbar');
$this->load->view('_partial/layout');
?>