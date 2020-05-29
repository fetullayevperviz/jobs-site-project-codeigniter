<div class="content-wrapper">
<div class="page-content fade-in-up">
	<div class="card card-info bg-dark text-white">
      <div class="card-header">
        <h3 class="card-title">Elan Aktiv və ya Passiv Etmə Formu</h3>
      </div>
      <form class="form-horizontal" enctype="multipart/form-data" method="POST" action="<?=base_url('admin/vacancy_edit');?>">
        <div class="card-body">

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Şirkət</label>
            <div class="col-sm-10">
              <input type="text" name="firma" class="form-control" value="<?=$info['firma'];?>">
              <input type="hidden" name="id" value="<?=$info['id'];?>">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Kateqoriya</label>
            <div class="col-sm-10">
              <input type="text" name="category" class="form-control" value="<?=$info['cat_name'];?> / <?=$info['sub_cat_name'];?>">
            </div>
          </div>

           <div class="form-group row">
            <label class="col-sm-2 col-form-label">Vəzifə</label>
            <div class="col-sm-10">
              <input type="text" name="position" class="form-control" value="<?=$info['position'];?> ">
            </div>
           </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Təhsil dərəcəsi</label>
            <div class="col-sm-10">
              <input type="text" name="education" class="form-control" value="<?=$info['edu_name'];?>">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">İş təcrübəsi</label>
            <div class="col-sm-10">
              <input type="text" name="experience" class="form-control" value="<?=$info['exp'];?>">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">İş haqqında məlumat</label>
            <div class="col-sm-10">
               <textarea name="job_info" cols="30" rows="10" class="form-control">
                 <?php echo $info['job_info'];?>
               </textarea>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Tələblər</label>
            <div class="col-sm-10">
               <textarea name="job_skills" cols="30" rows="10" class="form-control">
                 <?php echo $info['job_skills'];?>
               </textarea>
            </div>
          </div>

          <div class="form-group row">
              <label class="col-sm-2 col-form-label">Əməkhaqqı</label>
              <div class="col-sm-10">
                <input type="text" name="salary" class="form-control" value="<?=$info['salary'];?> azn">
              </div>
            </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Şəhər</label>
            <div class="col-sm-10">
              <input type="text" name="city" class="form-control" value="<?=$info['city_name'];?> ">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Max və Min yaş</label>
            <div class="col-sm-10">
              <input type="text" name="age" class="form-control" value="<?=$info['min_age'];?> / <?=$info['max_age'];?>">
            </div>
          </div>

           <div class="form-group row">
              <label class="col-sm-2 col-form-label">İş günü</label>
              <div class="col-sm-10">
                <input type="text" name="work_time" class="form-control" value="<?=$info['work'];?>">
              </div>
            </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Cins</label>
            <div class="col-sm-10">
              <input type="text" name="gender" class="form-control" value="<?=$info['gender_name'];?>">
            </div>
          </div>
          
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Əlaqədar şəxs</label>
            <div class="col-sm-10">
              <input type="text" name="related_user" class="form-control" value="<?=$info['related_user'];?>">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
              <input type="email" name="email" class="form-control" value="<?=$info['email'];?>">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Mobil</label>
            <div class="col-sm-10">
              <input type="number" name="phone" class="form-control" value="<?=$info['phone'];?>">
            </div>
          </div>

          <?php if($info['home_phone']==null){ ?>
          <?php } else { ?>
            <div class="form-group row">
            <label class="col-sm-2 col-form-label">Telefon</label>
            <div class="col-sm-10">
              <input type="number" name="home_phone" class="form-control" value="<?=$info['home_phone'];?>">
            </div>
          </div>
          <?php } ?>

          <div class="form-group row">
              <label class="col-sm-2 col-form-label">Başlanğıc tarixi</label>
              <div class="col-sm-10">
                <input type="text" name="start_date" class="form-control" value="<?=$info['start_date'];?>">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Bitmə tarixi</label>
              <div class="col-sm-10">
                <input type="text" name="end_date" class="form-control" value="<?=$info['end_date'];?>">
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
            </div>
          </div>

        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">
          	  <a href="<?=base_url('admin/vacancies');?>" style="color:white;">Geri Qayıt</a>
          </button>
          <button type="submit" class="btn btn-success float-right">
          	 <?php if($info['status']==1){ ?>
                 Passiv et
             <?php } else { ?>
                 Aktiv et
             <?php } ?>
          </button>
        </div>
      </form>
    </div>
</div>