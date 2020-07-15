<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <?php if (isset($_SESSION['username'])) { ?>
    <a class="navbar-brand" href="<?php echo base_url().'home.php' ?>">JANGID</a>
  <?php }else{ ?>
    <a class="navbar-brand" href="<?php echo base_url() ?>">JANGID</a>
  <?php } ?>

  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <?php 
      if (isset($_SESSION['username'])) { ?>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url().'add_customer.php' ?>">Add New Customer</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url().'view_customer.php' ?>">Show All Customer</a>
        </li>
        <?php if ($_SESSION['role'] == 0) { ?>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url().'add_category.php' ?>">Add Category</a>
        </li>  
        <?php } ?>
        
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url().'logout.php' ?>">Logout</a>
        </li>  
      <?php }else{ ?>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url().'registration.php' ?>">Registration</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url() ?>">Login</a>
        </li>
      <?php } ?>
    </ul>
  </div>  
</nav>



