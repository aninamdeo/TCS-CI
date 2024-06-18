<!DOCTYPE html>
<html lang="en">

<head>


  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title><?= strip_tags(str_replace('-', ' ', $meta_title));?> <?= $basic_details->site_name?> </title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Baloo+Paaji" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/desktop/')?>css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/desktop/')?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/desktop/')?>css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/desktop/')?>css/style.css">
    <link rel="stylesheet" href="<?= base_url('assets/desktop/')?>css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('asset/auth') ?>/vendors/css/extensions/sweetalert.css">
    <link href="<?= base_url()?><?= $basic_details->icon?>" rel="shortcut icon" type="image/png">
    <link href="<?= base_url()?><?= $basic_details->icon?>" rel="apple-touch-icon">
    <link href="<?= base_url()?><?= $basic_details->icon?>" rel="apple-touch-icon" sizes="72x72">
    <link href="<?= base_url()?><?= $basic_details->icon?>" rel="apple-touch-icon" sizes="114x114">
    <link href="<?= base_url()?><?= $basic_details->icon?>" rel="apple-touch-icon" sizes="144x144">
     <script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5d789578ab6f1000123c87ce&product=inline-share-buttons' async='async'></script>
<?php if($share != null){ ?>
    <!-- Meta Tags -->
  <meta name="twitter:title" content="<?= strip_tags($share['title']);?>">
  <meta name="twitter:description" content="<?= strip_tags($share['meta_content']);?>">
  <meta property="og:url" content="<?= base_url($share['url']) ?>">
  <meta name="title" content="<?= strip_tags($share['meta_title']);?>"></meta>
  <meta name="keywords" content=" <?= strip_tags($share['meta_key']);?>"></meta>
  <meta name="description" content="<?= strip_tags($share['meta_content']);?>"></meta>
  <link rel="canonical" href="<?= base_url($basic_details->logo); ?>" />
  <link href="<?= base_url($basic_details->logo); ?>" rel="shortcut icon">
  <link rel="icon" type="image/png" href="<?= base_url($basic_details->logo); ?>">
  <meta property="og:image" content="<?= base_url($share['image']);?>">
  <meta name="twitter:image" content="<?= base_url($share['image']);?>">
  <meta name="twitter:card" content="<?= base_url($share['image']);?>">
  <!-- Mobile viewport optimized -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta name="viewport" content="width=device-width, initial-state=1"/>    
  <meta property="og:url"   content="<?= base_url($share['url']) ?>" />
  <meta property="og:type"  content="website" />
  <meta property="og:title" content="<?= strip_tags($share['meta_title']);?>" />
  <meta property="og:description" content="<?= strip_tags($share['meta_content']);?>" />
  <meta property="og:image" content="<?= base_url($share['image']);?>" />
  <!-- <meta property="og:video" content="<?= base_url($share['video']);?>" /> -->
<?php }else{?>
 <!-- Favicon and Touch Icons -->
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
  
    <link href="<?= base_url()?><?= $basic_details->logo?>" rel="shortcut icon" type="image/png">
    <link href="<?= base_url()?><?= $basic_details->logo?>" rel="apple-touch-icon">
    <link href="<?= base_url()?><?= $basic_details->logo?>" rel="apple-touch-icon" sizes="72x72">
    <link href="<?= base_url()?><?= $basic_details->logo?>" rel="apple-touch-icon" sizes="114x114">
    <link href="<?= base_url()?><?= $basic_details->logo?>" rel="apple-touch-icon" sizes="144x144">
    <?php } ?>
</head>

<body>
