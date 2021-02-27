<div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?=$title?></h1>

           <!-- DataTales Example -->
           <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTables Kategory</h6>
              <?=$this->session->flashdata('message');?>
            </div>
            <div class="card-body">
            <button class="btn btn-info" type="submit" id="button-addon2" data-toggle="modal" data-target="#TambahModal">Tambah</button>
              <div class="table-responsive">
              <table class="table table-hover">
              <div class="form-group">
				<!-- Search form -->
        <div class="input-group mb-3">
        </div>
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">ketegory</th>
      <th scope="col">email</th>
    </tr>
  </thead>
  <tbody>
      <?php
      $i=1;
      foreach ($data_kategori as $row)
      {

      ?>
    <tr>
      <th scope="row"><?=$row->id?></th>
      <td> <a href="<?=base_url('admin/detail_user/').$row->id?>"><?=$row->kategory?></a></td>
      <td> <a href="<?=base_url('admin/hapus_kategory/').$row->id?>" type="button" class="btn btn-danger">Drop</a></td>
    </tr>
    <?php
    $i++;
      }
      ?>
  </tbody>
</table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

</div>
  <!-- Logout Modal-->
  <div class="modal fade" id="TambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah kategori</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
        <form class="form-inline" method="post" action="<?=base_url('admin/tambah_kategory')?>">
                <input type="text" class="form-control w-75" placeholder="Masukan Nama Kategory" aria-label="Recipient's username" aria-describedby="button-addon2" name="kategory">
        </div>
        <div class="modal-footer">

          <button class="btn btn-success" type="submit" id="button-addon2">Save</button>
        </div>
        </form>
      </div>
    </div>
  </div>