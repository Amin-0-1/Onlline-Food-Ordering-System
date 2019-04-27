<?php
$userName = $_SESSION['username'];
$url = $_SESSION['url'];
$logout = $_SESSION['logout'];

?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="<?php echo $url?>/../Global/redirect.php">Cloud Ordering Food </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent" style=" flex-flow: row-reverse;">
    <ul class="form-inline">
        <li style="color:rgba(225, 215, 215, 0.9);"><a class="username" href="<?php echo $url?>/Controller/Admin/Admin Dashboard Controller.php?action=UpdateProfile"><?php echo $userName ;?></a></li>
        <li>
            <a href="<?php echo $logout?>Logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
        </li>
      </ul>
   
  </div>
     
</nav>
