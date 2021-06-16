<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sign up</title>
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
<div class="login-box">
  <div class="icon">
  <i class="fas fa-book"></i>
  </div>
  <div class="login-logo">
    <a href="#"><b>Notes_Plus</b></a>
  </div>
  <div class="box">
    <p class="login-box-msg">Please sign up to start noting</p>

    <?php 
    echo validation_errors(); 
    
    ?>  

    <?php if(!empty($errors)) {
      echo $errors;
    } ?>

    <form action="" method="post">
    <div class="input-group form-group has-feedback">
        <span class="input-group-text"><i class="fa fa-address-card"></i></span>
        <input type="text" class="form-control" name="names" id="names" placeholder="Names" autocomplete="off" value="<?= $s_data["names"] ?>" required>
      </div>
      <div class="input-group form-group has-feedback">
        <span class="input-group-text"><i class="fa fa-user"></i></span>
        <input type="username" class="form-control" name="username" id="username" placeholder="Username" autocomplete="off" value="<?= $s_data["username"] ?>" required>
      </div>
      <div class="input-group form-group has-feedback">
        <span class="input-group-text"><i class="fa fa-envelope"></i></span>
        <input type="email" class="form-control" name="email" id="email" placeholder="Email" autocomplete="off" value="<?= $s_data["email"] ?>" required>
      </div>
      <div class="input-group form-group has-feedback" hidden>
        <span class="input-group-text"><i class="fas fa-user-tag"></i></span>
        <select name="role" id="" class="form-select has feedback" hidden>
            <?php
            if($roles){
            foreach($roles as $role){ ?>
            <option value="<?php  echo $role['roleId'] ?>" name="role"><?php echo $role['role_name'] ?></option>
            <?php  }  }?>
        </select>
      </div>
      <div class="form-group has-feedback" id="province">
      </div>
      <div class="form-group has-feedback" id="district">
      </div>
      <div class="input-group form-group has-feedback">
        <span class="input-group-text"><i class="fa fa-lock"></i></span>  
        <input type="password" class="form-control" name="password" id="password" value="<?= $s_data["names"] ?>" placeholder="Password" autocomplete="off" required>
      </div>
      <div class="row">
        <div class="col-xs-4">
          <button type="submit" class="btn btn-success btn-block btn-flat">Signup</button>
        </div>
        <br>
        <br>
        <a href="<?= base_url("auth/login")?>" style="color: black; font-size: 14px">Already a user? <span class="text-primary">Login</span></a>
      </div>
    </form>
  </div>
</div>
<script>
  function display(elem, url, params){
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById(elem).innerHTML = this.responseText;
    }
    }
    xmlhttp.open("POST",url,true);
    xmlhttp.send(params);
  }
  display("province","<?= base_url("users/getProvinces") ?>",{})

  function displayDistricts(provId){
    var data = new FormData();
    data.append("provinceId",provId)
    display("district","<?= base_url('users/getDistricts') ?>",data)
  }
</script>
</body>
</html>
