<?php $this->load->view('front/include/header');?>
<!--inner heading start-->
<div class="inner-heading">
  <div class="container">
    <h3>ELAN YERLƏŞDİRİN</h3>
  </div>
</div>
<!--inner heading end--> 
<!--Inner Content start-->
<div class="inner-content loginWrp">
  <div class="container-fluid"> 
  <div class="row" style="margin-bottom:30px;">
     <div class="col-md-10 col-sm-8 col-lg-8" style="float:left;text-align:center;">
        <h1 style="color:red;">VAKANSİYA</h1>
     </div>
     <div class="col-md-2 col-sm-4 col-lg-4" style="float:left;text-align:center;">
        <h2 style="color:red;">Diqqət!</h2>
     </div>
  </div>  
    <!--Post Job Start-->
    <div class="row">
      <div class="col-md-10 col-sm-8 col-lg-8">
        <div class="login">
          <div class="contctxt" style="text-align:center;">Elan haqqında məlumat</div>
          <div class="formint conForm">
            <form method="post" autocomplete="off" action="<?php echo base_url('home/job_post');?>">
              <div class="input-wrap">
                <label for="firma">Təşkilat adı *</label>
                <input required type="text" name="firma" placeholder="Təşkilat adı yazın" class="form-control">
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="input-wrap">
                    <label for="category">Kateqoriya *</label>
                    <select required class="form-control" name="sub_category">
                      <option value></option>
                      <?php $category = category(); foreach ($category as $category): ?>
                      <optgroup label="<?=$category['cat_name'];?>">
                         <?php $sub_cat = sub_cat($category['id']); foreach ($sub_cat as $info): ?>
                            <option value="<?=$info['id'];?>"> - <?=$info['sub_cat_name'];?></option>
                         <?php endforeach ?>
                      </optgroup>
                      <?php endforeach ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="input-wrap">
                    <label for="salary">Əməkhaqqı *</label>
                    <input type="text" name="salary" placeholder="Əmək haqqını yazın" class="form-control">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="input-wrap">
                     <label for="position">Vəzifə *</label>
                     <input required type="text" name="position" class="form-control" placeholder="Vəzifə yazın">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="input-wrap">
                    <label for="end_date">Elanın bitmə tarixi *</label>
                    <input type="date" class="form-control" name="end_date">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="input-wrap">
                    <label for="job_info">İş haqqında məlumat *</label>
                    <textarea required name="job_info" class="form-control" placeholder="İş haqqında məlumat yazın"></textarea>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="input-wrap">
                    <label for="job_skills">Tələblər *</label>
                    <textarea required name="job_skills" class="form-control" placeholder="Tələbləri yazın. Nümunə : Əla səviyyədə PHP bilikləri,OOP,Javascript,Html,Css və.s"></textarea>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="input-wrap">
                    <label for="city">Şəhər seçin *</label>
                    <select required class="form-control" name="city">
                      <option value></option>
                      <?php $city = city(); foreach ($city as $city): ?>
                         <option value="<?=$city['id'];?>"><?=$city['city_name'];?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="input-wrap">
                    <label for="education">Təhsil *</label>
                    <select required class="form-control" name="education">
                      <option value></option>
                      <?php $education = education(); foreach ($education as $education): ?>
                         <option value="<?=$education['id'];?>"><?=$education['edu_name'];?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="input-wrap">
                    <label for="min_age">Minimum yaş *</label>
                    <select  required class="form-control" name="min_age">
                       <option value></option>
                       <?php for($i=18;$i<=65;$i++){ ?>
                        <option value="<?=$i;?>"><?php echo $i;?></option>
                       <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="input-wrap">
                    <label for="max_age">Maksimum yaş *</label>
                    <select required class="form-control" name="max_age">
                       <option value></option>
                       <?php for($i=18;$i<=65;$i++){ ?>
                        <option value="<?=$i;?>"><?php echo $i;?></option>
                       <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="input-wrap">
                    <label for="gender">Cins *</label>
                    <select required class="form-control" name="gender">
                      <option value></option>
                      <?php $gender = gender(); foreach ($gender as $gender): ?>
                         <option value="<?=$gender['id'];?>"><?=$gender['gender_name'];?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="input-wrap">
                    <label for="experience">İş təcrübəsi *</label>
                    <select required class="form-control" name="experience">
                      <option value></option>
                      <?php $experience = experience(); foreach ($experience as $experience): ?>
                         <option value="<?=$experience['id'];?>"><?=$experience['exp'];?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="input-wrap">
                    <label for="related_user">Əlaqədar şəxs *</label>
                    <input type="text" required name="related_user" placeholder="Əlaqədar şəxs" class="form-control">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="input-wrap">
                    <label for="email">Email *</label>
                    <input type="email" required name="email" placeholder="Email yazın" class="form-control">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="input-wrap">
                    <label for="home_phone">Telefon nömrəsi</label>
                    <input type="number" name="home_phone" placeholder="Telefon nömrəsi yazın" class="form-control">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="input-wrap">
                    <label for="phone">Mobil nömrə *</label>
                    <input type="number" required name="phone" placeholder="Mobil nömrə yazın" class="form-control">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="input-wrap">
                    <?php $work_time = work_time(); foreach ($work_time as $work_time): ?>
                       <?=$work_time['work'];?> * &nbsp;<input required type="radio" name="work_time" value="<?=$work_time['id'];?>">&nbsp;&nbsp;&nbsp;
                    <?php endforeach ?>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="sub-btn">
                    <input type="submit" class="sbutn" value="Əlavə Et">
                  </div>
                </div>
                <div class="col-md-12">
                  <?php echo $this->session->flashdata('info');?>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="col-md-2 col-sm-4 col-lg-4">
        <ul class="list-group">
           <?php $job_rules = job_rules(); foreach ($job_rules as $job_rules): ?>
             <li class="list-group-item" style="font-style:italic;color:black;text-align:justify;"><?=$job_rules['text'];?></li>
          <?php endforeach ?>
        </ul>
      </div>
    </div>  
    <!--Post Job End--> 
  </div>
</div>
<!--Inner Content End--> 
<?php $this->load->view('front/include/footer');?>