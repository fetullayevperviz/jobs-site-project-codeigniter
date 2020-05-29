<div class="content-wrapper">
<div class="page-content fade-in-up">
    <div class="card card-info bg-dark text-white">
      <div class="card-header">
        <h3 class="card-title">İş Təcrübəsi Yeniləmə Formu</h3>
      </div>
      <form class="form-horizontal" enctype="multipart/form-data" method="POST" action="<?=base_url('admin/experience_edit');?>">
        <div class="card-body">

          <div class="form-group row">
             <label class="col-sm-2 col-form-label">İş Təcrübəsi</label>
             <div class="col-sm-10">
              <input class="form-control" type="text" name="exp" value="<?=$info['exp'];?>">
             </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Aktiv / Passiv</label>
            <div class="col-sm-10">
              <select name="status" class="form-control">
                 <?php if($info['status']==1){ ?>
                   <option value="1" selected>Aktiv</option>
                   <option value="0">Passiv</option>
                  <?php } elseif($info['status']==0) { ?>
                    <option value="1">Aktiv</option>
                    <option value="0" selected>Passiv</option>
                  <?php } ?>
              </select>
              <input type="hidden" name="id" value="<?=$info['id'];?>">
            </div>
          </div>
          
        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">
              <a href="<?=base_url('admin/experience');?>" style="color:white;">Geri Qayıt</a>
          </button>
          <button type="submit" class="btn btn-success float-right">
             Yenilə
          </button>
        </div>
      </form>
    </div>
</div>