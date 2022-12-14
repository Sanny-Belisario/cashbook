<?= $this->extend('default') ?>

<?= $this->section('content') ?>
<link href="<?php echo  base_url ()?>\public\assets\bootstrap/css/bootstrap.min.css" rel="stylesheet">
<section class="vh-100">
<div id='msg' style="width:100vw;height:3vh;">
  <?php
    if(isset($_SESSION['msgs'])){
        foreach($_SESSION['msgs'] AS $msg){
            echo "<div class='alert alert-{$msg['class']}' role='alert'>";
            echo $msg['msg'];
             echo "</div>";
        }
        unset($_SESSION['msgs']);
    }
  ?>  
</div>
<script>
    setTimeout(()=>{document.querySelector('#msg').innerHTML=''},3000)
</script>

  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        <form action="<?php echo base_url()?>/auth" method="POST">
          
          <!-- Email input -->
          <div class="form-outline mb-4">
            <input type="email" name="email" class="form-control form-control-lg"
              placeholder="Enter a valid email address" />
            <label class="form-label">Email address</label>
          </div>

          <!-- Password input -->
          <div class="form-outline mb-3">
            <input type="password" name="password" class="form-control form-control-lg"
              placeholder="Enter password" />
            <label class="form-label">Password</label>
          </div>

          <div class="text-center text-lg-start mt-4 pt-2">
            <input type="submit" name="user[send_login]"class="btn btn-primary btn-lg" value="Login"
              style="padding-left: 2.5rem; padding-right: 2.5rem;"/>
          </div>

        </form>
      </div>
    </div>
  </div>
  
</section>

<?= $this->endSection() ?>