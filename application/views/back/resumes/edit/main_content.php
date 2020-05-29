<div class="content-wrapper">
<div class="page-content fade-in-up">
	<div class="card card-info bg-dark text-white">
      <div class="card-header">
        <h3 class="card-title">CV Aktiv və ya Passiv Etmə Formu</h3>
      </div>
      <form class="form-horizontal" enctype="multipart/form-data" method="POST" action="<?=base_url('admin/resume_edit');?>">
        <div class="card-body">

          <div class="form-group row">
             <div class="col-sm-2"></div>
             <div class="col-sm-10">
              <img src="<?php echo base_url(); echo $info['image']; ?>" style="height:100px;width:100px;object-fit:cover;">
             </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Ad Soyad Ata Adı</label>
            <div class="col-sm-10">
              <input type="text" name="fullname" class="form-control" value="<?=$info['fullname'];?>">
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
            <label class="col-sm-2 col-form-label">Təhsil haqqında</label>
            <div class="col-sm-10">
               <textarea name="edu_info" cols="30" rows="5" class="form-control">
                 <?php echo $info['edu_info'];?>
               </textarea>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">İş təcrübəsi</label>
            <div class="col-sm-10">
              <input type="text" name="experience" class="form-control" value="<?=$info['exp'];?>">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">İş təcrübəsi haqqında</label>
            <div class="col-sm-10">
               <textarea name="exp_info" cols="30" rows="5" class="form-control">
                 <?php echo $info['exp_info'];?>
               </textarea>
            </div>
          </div>

            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Bilik və bacarıqlar</label>
              <div class="col-sm-10">
                 <textarea name="skills" cols="30" rows="5" class="form-control">
                   <?php echo $info['skills'];?>
                 </textarea>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Dil bilikləri</label>
              <div class="col-sm-10">
                <input type="text" name="language" class="form-control" value="<?=$info['language'];?>">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Əlavə məlumat</label>
              <div class="col-sm-10">
                 <textarea name="info" cols="30" rows="3" class="form-control">
                   <?php echo $info['info'];?>
                 </textarea>
              </div>
            </div>

          <div class="form-group row">
              <label class="col-sm-2 col-form-label">Minimum əməkhaqqı</label>
              <div class="col-sm-10">
                <input type="text" name="min_salary" class="form-control" value="<?=$info['min_salary'];?> azn">
              </div>
            </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Şəhər</label>
            <div class="col-sm-10">
              <input type="text" name="city" class="form-control" value="<?=$info['city_name'];?> ">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Ünvan</label>
            <div class="col-sm-10">
              <input type="text" name="adress" class="form-control" value="<?=$info['adress'];?>">
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
            <label class="col-sm-2 col-form-label">Yaş</label>
            <div class="col-sm-10">
              <input type="number" name="age" class="form-control" value="<?=$info['age'];?>">
            </div>
          </div>

          <?php if ($info['website']==null){ ?>           
           <?php } else { ?>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Website</label>
                <div class="col-sm-10">
                  <input type="text" name="website" class="form-control" value="<?=$info['website'];?>">
                </div>
              </div>
            <?php } ?>

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
          	  <a href="<?=base_url('admin/resumes');?>" style="color:white;">Geri Qayıt</a>
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