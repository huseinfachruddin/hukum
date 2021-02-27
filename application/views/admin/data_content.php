<div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?=$title?></h1>
          <a href="<?=base_url('admin/upload_content')?>" type="button" class="btn btn-success">Tambah Content</a>
           <!-- DataTales Example -->
           <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTables Content</h6>
              <?=$this->session->flashdata('message');?>
            </div>
            
            <div class="card-body">
            
              <div class="table-responsive">
              <table class="table table-hover">
              <div class="form-group">
				<!-- Search form -->
        <div class="input-group mb-3 ">
        <form class="form-inline d-flex justify-content-center" method="post" action="">
                <input type="text" class="form-control w-75" placeholder="Cari Berdasarkan Nama atau category" aria-label="Recipient's username" aria-describedby="button-addon2" name="key">
          <div class="input-group-append d-flex justify-content-center">
            <button class="btn btn-info" type="submit" id="button-addon2">Cari</button>
          </div>
        </form>
        </div>
        <br>.
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">name</th>
      <th scope="col">kategory</th>
      <th scope="col">date_created</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
      <?php
      $i=1;
      foreach ($data_content as $row)
      {
      ?>
    <tr>
      <th scope="row"><?=$i?></th>
      <td> <a href="<?=base_url('admin/detail_content/').$row->id?>"><?=$row->judul?></a></td>
      <td><?= $row->kategory?></td>
      <td><?=date('d M Y',$row->date_created)?></td>
      <td> <a href="<?=base_url('admin/hapus_content/').$row->id?>" type="button" class="btn btn-danger">Drop</a></td>
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
