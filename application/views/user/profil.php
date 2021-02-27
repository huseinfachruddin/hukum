

<body>

    <div class="container emp-profile">
        <form method="post">
            <div class="row">
                <div class="col-md-4">
                <button type="button" class="btn btn-success"data-toggle="modal" data-target="#fotoModal">Edit Foto</button>
                    <div class="profile-img">
                        <img src="<?=base_url('assets/')?>img/profil/<?=$user['image']?>"/>
                    </div>
                </div>
                
                
                <div class="col-md-6">
                    <div class="profile-head">
                        <h5><?=$user['name']?></h5>
                        <h6><?= $role['role']?> sejak <?= date('d M Y',$user['date_created'])?></h6>
                        <?= $this->session->flashdata('message');?>
                        <?php echo validation_errors('<div class="alert alert-danger">', '</div>')?>
                        <ul class="nav nav-tabs mt-5" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                    aria-controls="home" aria-selected="true">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                    aria-controls="profile" aria-selected="false">Timeline</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-2">
                
                <button type="button" class="btn btn-info"data-toggle="modal" data-target="#logoutModal">Edit Profil</button>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-work">
                        <p>WORKING EXPERIENCES</p>
                        <a href="">Marketing Supervisor</a><br />
                        <a href="">UI Designer Intern</a><br />
                        <a href="">Communication Officer</a>
                        <p>SKILLS</p>
                        <a href="">Web Designer</a><br />
                        <a href="">Web Developer</a><br />
                        <a href="">Mobile Developer</a><br />
                        <a href="">Html, CSS, PHP, Java</a><br />
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="tab-content profile-tab" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>User Id</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?=$user['id']?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Name</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?=$user['name']?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Email</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?=$user['email']?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Phone</label>
                                </div>
                                <div class="col-md-6">
                                    <p>123 456 7890</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Profession</label>
                                </div>
                                <div class="col-md-6">
                                    <p>Web Developer and Designer</p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Experience</label>
                                </div>
                                <div class="col-md-6">
                                    <p>Intermediate</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Total Projects</label>
                                </div>
                                <div class="col-md-6">
                                    <p>100</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>English Level</label>
                                </div>
                                <div class="col-md-6">
                                    <p>Intermediate</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Your Bio</label><br />
                                    <p>Your detail description</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>


      <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
            
        <form class="user" method="post" action="<?= base_url('user/profil');?>">
                    <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="exampleInputName" placeholder="Name" name="name" value="<?= $user['name']?>">
                    <?php echo form_error('name','<small class="text-danger">','</small>');?>
                    </div>
                    <div class="form-group">
                    <input type="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email Address" name="email" value="<?= $user['email']?>">
                    <?php echo form_error('email','<small class="text-danger">','</small>');?>
                    </div>
                    <div class="form-group">
                    <input type="password" class="form-control form-control-user" id="exampleInputpassword" placeholder="password" name="password" value="<?= $user['password']?>">
                    <?php echo form_error('password','<small class="text-danger">','</small>');?>
                    </div>
                    
                    
                    
                    
                    <hr>
               
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button class="btn btn-primary" href="" type="submit">Save</a>
         </form>
        </div>
      </div>
    </div>
  </div>


  
      <!-- Logout Modal-->
      <div class="modal fade" id="fotoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
            
        <?php echo form_open_multipart('user/gambar');?>
                    
                    <div class="form-group">
                    <input type="file" class="form-control form-control-user" id="exampleInputName" placeholder="Name" name="gambar">
                    <?php echo form_error('name','<small class="text-danger">','</small>');?>
                    </div>
                    
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button class="btn btn-primary" href="" type="submit">Save</a>
         </form>
        </div>
      </div>
    </div>
  </div>
