<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">  
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/css/adminlte.min.css" integrity="sha512-mxrUXSjrxl8vm5GwafxcqTrEwO1/oBNU25l20GODsysHReZo4uhVISzAKzaABH6/tTfAxZrY2FprmeAP5UZY8A==" crossorigin="anonymous" referrerpolicy="no-referrer" />  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/iCheck/square/blue.css') ?>">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <style>
    .icon {
      font-size: 70px;
      text-align: center;
    }
    .sign-up-box {
      margin-top: 20px !important;
      line-height: unset;
      height: 50px;
      padding: unset !important;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .sign-up-box h3 {
      margin: unset;
    }
    a {
      text-decoration: none;
    }
    a:hover {
      color: initial;
    }
    .box {
      background-color: white;
      border: 1px solid #E9EFFF;
      padding: 20px 30px;
    }
  </style>
</head>
<body class="hold-transition login-page">
<div class="">
  <div class="icon">
    <i class="fas fa-book"></i>
  </div>
  <div class="login-logo">
    <a href="#"><b>Notes_Plus</b></a>
  </div>
  <div class="box box-default">
    <p class="login-box-msg">Please login to start your session</p>
    <?php 
    echo validation_errors(); 
    ?>  
    <?php if(!empty($errors)) {
      echo $errors;
    } ?>
    <form action="<?php echo base_url('auth/login') ?>" method="post">
      <div class="input-group mb-3 has-feedback">
        <input type="email" class="form-control" name="email" id="email" placeholder="Email" autocomplete="off">
        <span class="input-group-text"><i class="fa fa-user"></i></span>
      </div>
      <div class="input-group mb-3 has-feedback">
        <input type="password" class="form-control" name="password" id="password" placeholder="Password" autocomplete="off">
        <span class="input-group-text"><i class="fa fa-lock"></i></span>
      </div>
      <div class="row">
        <div class="col-8">
          <a class="text-success" href="<?php echo base_url()?>users/reset_password">Reset Password</a>
        </div>
        <div class="col-4">
          <button type="submit" class="btn btn-success btn-block">Log In</button>
        </div>
      </div>
    </form>
  </div>
  <div class="box sign-up-box">
    <span>Don't have an account? </span>&nbsp;&nbsp;
    <a href="<?= base_url("users/register")  ?>" class="text-success">Signup</a>
  </div>
</div>
</body>
</html>