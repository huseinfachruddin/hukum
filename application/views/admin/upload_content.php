<div class="container-fluid">
<?=$this->session->flashdata('message');?>
          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?=$title?></h1>
          <?php echo form_open_multipart('admin/upcontent');?>
                    <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="exampleInputName" placeholder="Judul" name="judul" value="">
                    </div>
                    <div class="form-group">
                    <textarea name="ckeditor" id="ckeditorriobermano"></textarea><script> CKEDITOR.replace( 'ckeditorriobermano' );</script>
                    </div>
                    <div class="form-group">
                    <input type="file" class="form-control form-control-user" id="exampleInputpassword" placeholder="" name="gambar" value="">
                    </div>
                    <div class="form-group">
                    <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Options</label>
                    </div>
                    <select class="custom-select" id="inputGroupSelect01" name="kategory">
                        <option selected value="">pilih kategory...</option>
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