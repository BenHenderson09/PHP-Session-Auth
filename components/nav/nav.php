<?php
  require_once "util/general/header.php";
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" style="color:white;">Home Page</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto"></ul>
    <div class="form-inline my-2 my-lg-0">
      <div class="auth-btns">
            <?php if(empty($_SESSION['user'])):?>
              <a class="btn btn-info" href="auth/login.php"> Login </a>
              <a class="btn btn-danger" href="auth/register.php"> Register </a>
            <?php else:?>
              <a class="btn btn-primary" href="util/services/logout_service.php"> Logout </a>
            <?php endif;?>
        </div>
    </form>
  </div>
</nav>