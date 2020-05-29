<div class="content-wrapper">
<div class="page-content fade-in-up">
	<div class="card card-info bg-dark text-white">
      <div class="card-header">
        <h3 class="card-title" style="text-align:center;">Parametrləri Yeniləmə Formu</h3>
      </div>
      <form class="form-horizontal" enctype="multipart/form-data" method="POST" action="<?=base_url('admin/settings_edit');?>">
        <div class="card-body">
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Mövcud Logo</label>
            <div class="col-sm-10">
               <img src="<?php echo base_url(); echo $info['image'];?>" style="height:44x;width:190px;object-fit:cover;">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Logo</label>
            <div class="col-sm-10">
              <input type="file" name="image" class="form-control">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Saytın Adı</label>
            <div class="col-sm-10">
              <input type="text" name="title" class="form-control" value="<?=$info['title'];?>">
              <input type="hidden" name="id" value="<?=$info['id'];?>">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Url</label>
            <div class="col-sm-10">
              <input type="text" name="site_url" class="form-control" value="<?=$info['site_url'];?>">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
              <input type="email" name="email" class="form-control" value="<?=$info['email'];?>">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Telefon</label>
            <div class="col-sm-10">
              <input type="text" name="home_phone" class="form-control" value="<?=$info['home_phone'];?>">
            </div>
          </div>

           <div class="form-group row">
            <label class="col-sm-2 col-form-label">Mobil nömrə</label>
            <div class="col-sm-10">
              <input type="text" name="phone" class="form-control" value="<?=$info['phone'];?>">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Açar sözlər</label>
            <div class="col-sm-10">
              <input type="text" name="site_keyword" class="form-control" value="<?= $info['site_keyword'];?>">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">CopyRight Mətni</label>
            <div class="col-sm-10">
              <input type="text" name="copyright_text" class="form-control" value="<?= $info['copyright_text'];?>">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">1.Slider Mətni</label>
            <div class="col-sm-10">
              <input type="text" name="slider_text1" class="form-control" value="<?=$info['slider_text1'];?>">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">2.Slider Mətni</label>
            <div class="col-sm-10">
              <input type="text" name="slider_text2" class="form-control" value="<?=$info['slider_text2'];?>">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Ünvan</label>
            <div class="col-sm-10">
              <input type="text" name="adress" class="form-control" value="<?=$info['adress'];?>">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Location</label>
            <div class="col-sm-10">
              <textarea name="location" cols="30" rows="5" class="form-control"><?=$info['location'];?></textarea>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Layihə Haqqında</label>
            <div class="col-sm-10">
              <textarea name="project_about" cols="30" rows="10" class="form-control"><?=$info['project_about'];?></textarea>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Elanların Verilməsi</label>
            <div class="col-sm-10">
              <textarea name="job_procedure" cols="30" rows="10" class="form-control"><?=$info['job_procedure'];?></textarea>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Bizimlə Əlaqə</label>
            <div class="col-sm-10">
              <textarea name="contact" cols="30" rows="10" class="form-control"><?=$info['contact'];?></textarea>
            </div>
          </div>

        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">
          	  <a href="<?=base_url('admin/settings');?>" style="color:white;">Geri Qayıt</a>
          </button>
          <button type="submit" class="btn btn-success float-right">
          	 Yenilə
          </button>
        </div>
      </form>
    </div>
</div>