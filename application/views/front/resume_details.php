<?php $this->load->view('front/include/header');?>
<!--inner heading start-->
<div class="inner-heading">
  <div class="container">
    <h3>İŞ AXTARAN HAQQINDA ƏTRAFLI MƏLUMAT</h3>
  </div>
</div>
<!--inner heading end--> 

<!--Inner Content start-->
<div class="inner-content loginWrp resumeWrp">
  <div class="container"> 
    <!--Latest Resumes Start-->
    <div class="row">
      <div class="col-md-12 col-sm-12">
        <div class="heading-title"></span></div>
        <div class="listWrpService featured-wrap candidate candetail">
          <div class="row">
            <div class="col-md-2 col-sm-3 col-xs-3">
              <div class="listImg"><img style="object-fit:cover;height:130px;" src="<?php echo base_url(); echo $resume['tmb'];?>" alt=""></div>
            </div>
            <div class="col-md-10 col-sm-9 col-xs-9">
              <div class="row">
                <div class="col-md-12">
                  <h3><?=$resume['fullname'];?></h3>
                  <p><b>Vəzifə</b> : <?=$resume['position'];?></p>
                  <p><b>Təhsil</b> : <?=$resume['edu_name'];?></p>
                  <p><b>Kateqoriya</b> : <?=$resume['cat_name'];?> / <?=$resume['sub_cat_name'];?></p>
                  <p>
                    <?php if($resume['website']==1){ ?>
                      <li><i class="fa fa-edge" aria-hidden="true"></i><b>Websayt</b> : <?=$resume['website'];?></li>
                    <?php } else{ ?>
                    <?php } ?>
                  </p>
                  <p><b>Minimum əməkhaqqı</b> : <?=$resume['min_salary'];?> azn</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="listWrpService featured-wrap candidate candetail">
          <h2 style="text-align:center;color:red;font-weight:bold;">Digər məlumatlar</h2>
          <p><b>Təhsil</b> : <?=$resume['edu_name'];?></p>
          <p><b>Təhsil haqqında</b> : <?=$resume['edu_info'];?></p>
          <p><b>İş təcrübəsi</b> : <?=$resume['exp'];?></p>
          <p><b>İş təcrübəsi haqqında</b> : <?=$resume['exp_info'];?></p>
          <p><b>Şəhər</b> : <?=$resume['city_name'];?></p>
          <p><b>Bilik və bacarıqlar</b> : <?=$resume['skills'];?></p>
          <p><b>Email</b> : <?=$resume['email'];?></p>
          <p><b>Mobil nömrə</b> : <?=$resume['phone'];?></p>
          <?php if($resume['home_phone']==null){ ?>
          <?php } else{ ?>
            <p><b>Ev telefonu</b> : <?=$resume['home_phone'];?></p>
          <?php } ?>
          <p><b>Cins</b> : <?=$resume['gender_name'];?></p>
          <p><b>Yaş</b> : <?=$resume['age'];?></p>
          <p><b>Ünvan</b> : <?=$resume['adress'];?></p>
          <p><b>Dil bilikləri</b> : <?=$resume['language'];?></p>
          <?php if($resume['website']==null){ ?>
          <?php }else{ ?>
            <p><b>Websayt</b> : <?=$resume['website'];?></p>
          <?php } ?>
          <?php if($resume['info']==null){ ?>
          <?php } else{ ?>
            <p><b>Əlavə məlumat</b> : <?=$resume['info'];?></p>
          <?php } ?>
          <p><b>İş günü</b> : <?=$resume['work'];?></p>
        </div>
      </div>
    </div>
    <!--Latest Resumes End--> 
  </div>
</div>
<!--Inner Content End--> 
<?php $this->load->view('front/include/footer');?>

