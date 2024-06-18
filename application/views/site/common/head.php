<!DOCTYPE html>
<html lang="en">
<head>


  
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= strip_tags($meta_title);?> </title>
  <link href="<?= base_url($basic_details->logo); ?>" rel="shortcut icon">

  <!-- Meta Tags -->
  <!-- <meta name="twitter:title" content="<?= strip_tags($meta_title);?>">
  <meta name="twitter:description" content="<?= strip_tags($meta_title);?>">
  <meta property="og:url" content="<?= base_url($share['url']) ?>">
  <meta name="twitter:image" content="<?= base_url($meta_image);?>">
  <meta name="twitter:card" content="<?= base_url($meta_image);?>"> -->
  <!-- Mobile viewport optimized -->
  <meta name="viewport" content="width=device-width,initial-scale=1.0" />
 <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
 <meta name="author" content="7i News" />
 <meta name="keywords" content="<?= $meta_key ?> "></meta>
 <meta name="description" content="<?= $meta_content ?>"></meta>
  <meta property="og:title" content="<?= strip_tags($title) ?>" />
  <meta property="og:description" content="<?= $meta_content ?>">
  <meta property="og:image" content="<?= base_url($meta_image);?>" sizes="170x170" />
  <meta property="og:url"   content="<?= base_url($url) ?>" />
  
  
 
  <!-- Page Title -->
  <link href="<?= base_url()?><?= $basic_details->icon?>" rel="shortcut icon" type="image/png">
  <link href="<?= base_url()?><?= $basic_details->icon?>" rel="apple-touch-icon">
  <link href="<?= base_url($basic_details->logo); ?>" rel="shortcut icon" type="image/x-icon">
  <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,700,900" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Baloo+Paaji" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url()?>assets/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?= base_url()?>assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url()?>assets/css/bootstrap-theme.min.css">
  <link rel="stylesheet" href="<?= base_url()?>assets/css/style.css">
  <link rel="stylesheet" href="<?= base_url()?>assets/css/owl.carousel.min.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url('asset/auth') ?>/vendors/css/extensions/sweetalert.css">
  <script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5d789578ab6f1000123c87ce&product=inline-share-buttons' async='async'></script>

  

</head>
<body>

