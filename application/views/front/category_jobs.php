<?php $this->load->view('front/include/header');?>
<!--inner heading start-->
<div class="inner-heading">
  <div class="container" style="margin-bottom:20px;">
    <h3>KATEQORİYA ÜZRƏ ÜMUMİ İŞ ELANLARI</h3>
  </div>
</div>
<!--inner heading end-->
<div class="featured-wrap">
  <div class="container">
    <?php if(count($category_job_list) > 0){ ?>
    <div class="heading-title"><span><h2 style="color:red;">AXTARILAN KATEQORİYAYA UYĞUN NƏTİCƏLƏR</h2></span></div>
    <div class="headTxt"></div>
      <ul class="row">
       <?php foreach ($category_job_list as $jobs): ?>
          <li class="col-md-6 col-sm-6">
        <div class="listWrpService">
          <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-3">
              <div class="listImg"><img src="<?=base_url('assets/front/');?>images/feature01.png" alt=""></div>
            </div>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <h3><a style="font-family:Roboto !important;" href="<?php echo base_url('vacancies/vacancy_details/'); echo $jobs['id'];?>"><?=substr($jobs['position'],0,40);?> ...</a></h3>
              <p style="font-family:Roboto !important;"><?=substr($jobs['firma'],0,50);?> ...</p>
              <ul class="featureInfo" style="font-family:Roboto !important;">
                <li><i class="fa fa-map-marker" aria-hidden="true"></i><?=$jobs['city_name'];?></li>
                <li><i class="fa fa-calendar" aria-hidden="true"></i> <?=$jobs['start_date'];?> - <?=$jobs['end_date'];?> </li>
              </ul>
              <div class="time-btn"><span style="font-family:Roboto !important;"><?=$jobs['work'];?></span></div>
              <div class="click-btn"><a style="font-family:Roboto !important;" href="<?php echo base_url('vacancies/vacancy_details/'); echo $jobs['id'];?>">Ətraflı Oxu</a></div>
            </div>
          </div>
        </div>
      </li>
       <?php endforeach ?>
    </ul>
</div>
    <?php } else{ ?>
      <div class="row" style="text-align:center;margin-bottom:80px;">
         <h1 style="color:red;">AXTARILAN KATEQORİYAYA UYĞUN NƏTİCƏ TAPILMADI</h1>
      </div>
    <?php } ?>
</div>
<!--feature end--> 

<?php $this->load->view('front/include/footer');?>