<div class="container-fluid">
<?=$this->session->flashdata('message');?>
          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?=$title?></h1>
          <form class="user" method="post" action="<?= base_url('admin/detail_user/').$data_user['id'];?>">
                    <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="exampleInputName" placeholder="Name" name="name" value="<?= $data_user['name']?>">
                    <?php echo form_error('name','<small class="text-danger">','</small>');?>
                    </div>
                    <div class="form-group">
                    <input type="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email Address" name="email" value="<?= $data_user['email']?>">
                    <?php echo form_error('email','<small class="text-danger">','</small>');?>
                    </div>
                    <div class="form-group">
                    <input type="password" class="form-control form-control-user" id="exampleInputpassword" placeholder="password" name="password" value="<?= $data_user['password']?>">
                    <?php echo form_error('password','<small class="text-danger">','</small>');?>
                    </div>
                    <div class="form-group">
                    <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Options</label>
                    </div>
                    <select class="custom-select" id="inputGroupSelect01" name="role">
                        <option selected value="<?= $data_user['role_id']?>"><?= $data_user['role']?></option>
                        <?php
                        foreach ($data_role as $row)
                        {
                        ?>
                        <option value="<?= $row->id?>"><?= $row->role?></option>
                        <?php
                       }
                        ?>
                    </select>
                    </div>
                    <?php echo form_error('role','<small class="text-danger">','</small>');?>
                    </div>
                    
                    
                    
                    <button type="submit" class="btn btn-success btn-user btn-block">
                    Save
                    </button>
                    <hr>
                </form>

</div>