<div class="container-fluid">
<?=$this->session->flashdata('message');?>
          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?=$title?></h1>
          <?php $id=$data_content['id'];
          echo form_open_multipart('admin/updatecontent/'.$id);?>
                    <img class="w-100" src="<?= base_url('assets/img/content/').$data_content['image']?>" alt="">
                    <div class="form-group">
                    <label for="judul">Judul</label>
                    <input type="text" class="form-control form-control-user" id="exampleInputName" placeholder="Judul" name="judul" value="<?= $data_content['judul']?>">
                    </div>
                    <div class="form-group">
                    <label for="isi">isi</label>
                    <textarea name="ckeditor" id="ckeditorriobermano" value=""><?= $data_content['isi']?></textarea><script> CKEDITOR.replace( 'ckeditorriobermano' );</script>
                    </div>
                    <div class="form-group">
                    <label for="gambar">Ganti Image</label>
                    <input type="file" class="form-control form-control-user" id="exampleInputpassword" placeholder="" name="gambar" value="">
                    </div>
                    <div class="form-group">
                    <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">kategory</label>
                    </div>
                    <select class="custom-select" id="inputGroupSelect01" name="kategory">
                        <option selected value="<?= $data_content['id']?>"><?= $data_content['kategory']?></option>
                        <?php
                        $kategory = $this->db->get('kategory_content')->result();
                        foreach ($kategory as $row)
                        {
                        ?>

                        <option value="<?= $row->id?>"><?= $row->kategory?></option>
                        <?php
                       }
                        ?>
                    </select>
                    </div>
                    </div>
                    
                    
                    
                    <button type="submit" class="btn btn-success btn-user btn-block">
                    Upload
                    </button>
                    <hr>
                </form>

</div>