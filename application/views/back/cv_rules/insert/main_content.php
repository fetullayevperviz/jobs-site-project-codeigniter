<div class="content-wrapper">
<div class="page-content fade-in-up">
	<div class="card card-info bg-dark text-white">
      <div class="card-header">
        <h3 class="card-title">CV Qaydaları Əlavə Etmə Formu</h3>
      </div>
      <form class="form-horizontal" autocomplete="off" enctype="multipart/form-data" method="POST" action="<?=base_url('admin/cv_rules_insert');?>">
        <div class="card-body">

          <div class="form-group row">
            <label class="col-sm-1 col-form-label">Mətn</label>
            <div class="col-sm-11">
              <textarea name="text" cols="30" rows="20" class="form-control"></textarea>
            </div>
          </div>

        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">
          	 <a href="<?=base_url('admin/cv_rules');?>" style="color:white;">Geri Qayıt</a>
          </button>
          <button type="submit" class="btn btn-success float-right">
          	 Əlavə Et
          </button>
        </div>
      </form>
    </div>
</div>