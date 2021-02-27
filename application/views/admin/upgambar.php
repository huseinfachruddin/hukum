
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Blank Page</h1>
          <?=$this->session->flashdata('message');?>
            <div class="row">
                    <div class="card text-white bg-info mb-3 col-4" style="max-width: 18rem;">
                        <div class="">
                        <img  class="w-100 "src="<?=base_url('assets/img/profil/').$user['image']?>" alt="">
                        </div>
                            <div class="card-body">
                                <h5 class="card-title"><?=$user['name']?></h5>
                                <p class="card-text"><?=$user['email']?></p>
                                <p class="card-text"><?=$role['role'];?> sejak : <?=date('d M Y',$user['date_created'])?></p>
                            <div class="row d-flex justify-content-around">
                                <a href="<?=base_url('admin/profil')?>" class="badge badge-success col-5" >Edit Account</a>
                                <a href="<?=base_url('auth/logout')?>" class="badge badge-danger col-5" data-toggle="modal" data-target="#logoutModal">Logout</a>
                            </div>
                            </div>
                            
                        </div>
                    <div class="col-8">
                    
                    <?php echo form_open_multipart('admin/upgambar');?>
                   
                    <div class="form-group row">
                    
                        <div class="file-field">
                          <div class="btn btn-primary btn-sm float-left">
                            
                            <input type="file" multiple name="gambar">
                          </div>
                          
                        </div>

                    </div>
                    <?php echo form_error('gambar','<small class="text-danger">','</small>');?>
                    <button type="submit" class="btn btn-success btn-user btn-block">
                    Save
                    </button>
                    <hr>
                </form>
                    </div>
                </div>
            </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; SOL <?= date('Y')?></span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

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
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?=base_url('auth/logout')?>">Logout</a>
        </div>
      </div>
    </div>

    
    
  </div>

  

 
    

