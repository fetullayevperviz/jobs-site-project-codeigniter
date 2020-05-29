<?php $this->load->view('front/include/header');?>
<!--inner heading start-->
<div class="inner-heading">
  <div class="container">
    <h3>CV YERLƏŞDİRİN</h3>
  </div>
</div>
<!--inner heading end--> 
<!--Inner Content start-->
<div class="inner-content loginWrp">
  <div class="container-fluid"> 
  <div class="row" style="margin-bottom:30px;">
     <div class="col-md-10 col-sm-8 col-lg-8" style="float:left;text-align:center;">
        <h1 style="color:red;">CV</h1>
     </div>
     <div class="col-md-2 col-sm-4 col-lg-4" style="float:left;text-align:center;">
        <h2 style="color:red;">Diqqət!</h2>
     </div>
  </div> 
    <!--Post Job Start-->
    <div class="row">
      <div class="col-md-10 col-sm-8 col-lg-8">
        <div class="login">
          <div class="contctxt" style="text-align:center;">İŞ AXTARAN HAQQINDA ÜMUMİ MƏLUMAT</div>
          <div class="formint conForm">
            <form autocomplete="off" method="post" enctype="multipart/form-data" action="<?php echo base_url('home/cv_post');?>">
              <div class="input-wrap">
                <label for="fullname">Soyad ad ata adı *</label>
                <input required type="text" name="fullname" placeholder="soyadınız adınız və ata adını yazın" class="form-control">
              </div>
              <div class="row">
                <div class="col-md-4">
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
                <div class="col-md-4">
                  <div class="input-wrap">
                    <label for="age">Yaş *</label>
                    <select required class="form-control" name="age">
                       <option value></option>
                       <?php for($i=18;$i<=65;$i++){ ?>
                        <option value="<?php echo $i;?>"><?php echo $i; ?></option>
                       <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
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
                <div class="col-md-12">
                  <div class="input-wrap">
                    <label for="edu_info">Təhsil haqqında məlumat *</label>
                    <textarea required name="edu_info" class="form-control" placeholder="Təhsiliniz haqqında ətraflı məlumat yazın.( Orta və ya ali (birini yazın) ) Nümunə : Bakı 156 nömrəli orta məktəb (2001-2012) və ya BDU İnformatika müəllimliyi (2012-2016)"></textarea>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="input-wrap">
                    <label for="phone">Ünvan *</label>
                    <input type="text" required name="adress" placeholder="Ünvan yazın" class="form-control">
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
                <div class="col-md-12">
                  <div class="input-wrap">
                    <label for="exp_info">İş təcrübəsi haqqında məlumat *</label>
                    <textarea required name="exp_info" class="form-control" placeholder="İş təcrübəsi haqqında ətraflı məlumat yazın. Nümunə : BPİ Muhasib (10.01.2012-01.01.2015),Azersun Holding Frontend developer (10.10.2016-01.01.2019)"></textarea>
                  </div>
                </div>
               
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
                     <label for="position">Vəzifə *</label>
                     <input required type="text" name="position" class="form-control" placeholder="Vəzifə yazın">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="input-wrap">
                    <label for="salary">Minimum əməkhaqqı *</label>
                    <input type="number" name="min_salary" class="form-control" placeholder="Əməkhaqqı qeyd edin">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="input-wrap">
                    <label for="skills">Bilik və bacarıqlarınız *</label>
                    <textarea required name="skills" class="form-control" placeholder="Bilik və bacarıqlarınız haqqında ətraflı məlumat yazın. Nümunə : Html,Css,Php"></textarea>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="input-wrap">
                    <label for="info">Əlavə məlumat</label>
                    <textarea required name="info" class="form-control" placeholder="Haqqınızda əlavə məlumat yazın"></textarea>
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
                    <label for="email">Şəkil *</label>
                    <input type="file" required name="image" class="form-control">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="input-wrap">
                    <label for="home_phone">Telefon</label>
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
                    <label for="language">Dil bilikləri *</label>
                    <textarea required name="language" class="form-control" placeholder="Dil biliyi seviyyesi vergül diger dil biliyi və səviyyəsi olaraq qeyd edin. Nümunə : İngilis beginner, Rus beginner"></textarea>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="input-wrap">
                    <label for="website">Websayt</label>
                    <input type="text" name="website" placeholder="Website yazın" class="form-control">
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
           <?php $cv_rules = cv_rules(); foreach ($cv_rules as $cv_rules): ?>
              <li class="list-group-item" style="font-style:italic;color:black;text-align:justify;"><?=$cv_rules['text'];?></li>
           <?php endforeach ?>
        </ul> 
      </div>
    </div>  
    <!--Post Job End--> 
  </div>
</div>
<!--Inner Content End--> 
<?php $this->load->view('front/include/footer');?>


