<?php $this->load->view('front/include/header');?>
<!--inner heading start-->
<div class="inner-heading">
  <div class="container">
    <h3>İŞ HAQQINDA ƏTRAFLI MƏLUMAT</h3>
  </div>
</div>
<!--inner heading end--> 

<!--Detail page start-->
    <div class="inner-wrap">
      <div class="row">
        <div class="col-md-12">
          <div class="listWrpService jobdetail">
            <div class="row">
              <div class="col-md-4 col-sm-4 col-xs-4 col-lg-4" style="float:left;">
                <h3 style="font-family:Roboto !important;"><b>Şirkət</b> : <?=$job['firma'];?></h3>
                <h5 style="font-family:Roboto !important;"><b>Vəzifə</b> : <?=$job['position'];?></h5>
                <h5 style="font-family:Roboto !important;"><b>Kateqoriya</b> : <?=$job['cat_name'];?> / <?=$job['sub_cat_name'];?></h5>
                <ul>
                  <li><h5 style="font-family:Roboto !important;"><b>Şəhər</b> : <?=$job['city_name'];?></h5></li>
                </ul>
                <ul>
                  <li><h5 style="font-family:Roboto !important;"><b>İş günü</b> : <?=$job['work'];?></h5></li>
                </ul>
                <ul>
                  <li><h5 style="font-family:Roboto !important;"><b>Əməkhaqqı</b> : <?=$job['salary'];?> azn</h5></li>
                </ul>
                <ul>
                  <li><h5 style="font-family:Roboto !important;"><b>Elanın bitmə vaxtı</b> : <?=$job['end_date'];?> </h5></li>
                </ul>
                <ul>
                  <li><h5 style="font-family:Roboto !important;"><b>Əlaqədar şəxs</b> : <?=$job['related_user'];?></h5></li>
                </ul>
              </div>
            <div class="col-md-8 col-sm-8 col-xs-8 col-lg-8" style="float:left;">
            <h2><b>İş haqqında məlumat</b></h2>
            <p><?=$job['job_info'];?></p>
            <h2><b>Tələblər</b></h2>
            <p><?=$job['job_skills'];?></p>
            <div class="col-m-3 col-sm-3 col-xs-3 col-lg-3" style="float:left;">
                <p><b>Təhsil</b></p>
                <p><b>Yaş</b></p>
                <p><b>Cins</b></p>
                <p><b>İş təcrübəsi</b></p>
                <p><b>Email</b></p>
                <p><b>Telefon</b></p>
            </div>
            <div class="col-m-9 col-sm-9 col-xs-9 col-lg-9" style="float:left;">
                <p><?=$job['edu_name'];?></p>
                <p><?=$job['min_age'];?> - <?=$job['max_age'];?> yaş</p>
                <p><?=$job['gender_name'];?></p>
                <p><?=$job['exp'];?></p>
                <p><?=$job['email'];?></p>
                <p><?=$job['home_phone'];?> <br> <?=$job['phone'];?></p>
            </div>           
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
    <!--Detail page end--> 
    
  </div>
</div>
<!--Inner Content end--> 
<?php $this->load->view('front/include/footer');?>

