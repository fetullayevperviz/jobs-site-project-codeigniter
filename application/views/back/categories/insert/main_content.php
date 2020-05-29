<div class="content-wrapper">
<div class="page-content fade-in-up">
	<div class="card card-info bg-dark text-white">
      <div class="card-header">
        <h3 class="card-title">Kateqoriya Əlavə Etmə Formu</h3>
      </div>
      <form class="form-horizontal" enctype="multipart/form-data" method="POST" action="<?=base_url('admin/category_insert');?>">
        <div class="card-body">

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Kateqoriya adı</label>
            <div class="col-sm-10">
              <input type="text" name="cat_name" class="form-control" placeholder="kateqoriya adı yazın">
            </div>
          </div>

        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">
          	 <a href="<?=base_url('admin/categories');?>" style="color:white;">Geri Qayıt</a>
          </button>
          <button type="submit" class="btn btn-success float-right">
          	 Əlavə Et
          </button>
        </div>
      </form>
    </div>
</div>