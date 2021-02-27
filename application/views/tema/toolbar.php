   <!-- Topbar -->
   <nav class="navbar navbar-expand topbar mb-4 shadow navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar bg-dark">

<!-- Sidebar Toggle (Topbar) -->
<div class="container-fluid">
<?=$this->session->flashdata('message');?>
                <a class="navbar-brand" href="<?=base_url('user');?>">
					<img class="" width="100" height="50" src="<?=base_url('assets/img/logo.png');?>" alt="">
				</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
                    aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="basicExampleNav">
                    <ul class="navbar-nav mr-auto smooth-scroll">
                        <li class="nav-item">
                            <a class="nav-link" href="<?=base_url('user');?>">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?=base_url('user/perkara')?>">Perkara</a>
                        </li>
                    </ul>
                    </div>

<!-- Topbar Search -->
<form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" method="post" action="<?=base_url('user/perkara')?>">
  <div class="input-group">
    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for perkara" aria-label="Search" aria-describedby="basic-addon2" name="key">
    <div class="input-group-append">
      <button class="btn btn-primary" type="submit">
        <i class="fas fa-search fa-sm"></i>
      </button>
    </div>
  </div>
</form>

<!-- Topbar Navbar -->
<ul class="navbar-nav ml-auto">

  <!-- Nav Item - Search Dropdown (Visible Only XS) -->
  <li class="nav-item dropdown no-arrow d-sm-none">
    <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-search fa-fw"></i>
    </a>
    <!-- Dropdown - Messages -->
    <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
      <form class="form-inline mr-auto w-100 navbar-search">
        <div class="input-group">
          <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn btn-primary" type="button">
              <i class="fas fa-search fa-sm"></i>
            </button>
          </div>
        </div>
      </form>
    </div>
  </li>

  <!-- Nav Item - Alerts -->
  

  

  <div class="topbar-divider d-none d-sm-block"></div>
<?php if ($this->session->userdata('email')) { ?>
  <!-- Nav Item - User Information -->
  <li class="nav-item dropdown no-arrow">
    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $user['name']?></span>
      <img class="img-profile rounded-circle" src="<?= base_url('assets/img/profil/').$user['image']?>">
    </a>
    <!-- Dropdown - User Information -->
    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
      <a class="dropdown-item" href="<?=base_url('user/profil')?>">
        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
        Profile
      </a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="<?=base_url('auth/logout')?>" >
        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
        Logout
      </a>
    </div>
  </li>
<?php }else{?>
<a href="<?=base_url('auth')?>" class="btn btn-success" type="button">
        Login
      </a>
<?php }?>

</ul>

</nav>
<!-- End of Topbar -->