<div class="content-wrapper">
<div class="page-content fade-in-up">
	<div class="card card-info bg-dark text-white">
      <div class="card-header">
        <h3 class="card-title">İş Günü Əlavə Etmə Formu</h3>
      </div>
      <form class="form-horizontal" enctype="multipart/form-data" method="POST" action="<?=base_url('admin/work_time_insert');?>">
        <div class="card-body">

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">İş Günü</label>
            <div class="col-sm-10">
              <input type="text" name="work" class="form-control" placeholder="iş günü yazın">
            </div>
          </div>

        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">
          	 <a href="<?=base_url('admin/work_time');?>" style="color:white;">Geri Qayıt</a>
          </button>
          <button type="submit" class="btn btn-success float-right">
          	 Əlavə Et
          </button>
        </div>
      </form>
    </div>
</div>