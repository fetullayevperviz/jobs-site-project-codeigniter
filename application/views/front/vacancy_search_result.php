<?php $this->load->view('front/include/header');?>
<!--inner heading start-->
<div class="inner-heading">
  <div class="container" style="margin-bottom:20px;">
    <h3>KATEQORİYA ÜZRƏ İŞ ELANLARI</h3>
  </div>
</div>
<!--inner heading end-->
<div class="featured-wrap">
  <div class="container">
    <div class="heading-title"><span>AXTARILAN KATEQORİYAYA UYĞUN NƏTİCƏLƏR</span></div>
    <div class="headTxt"></div>
    <?php if(isset($search_jobs)) { 
      if(count($search_jobs) > 0) { ?>
      <ul>
      <?php foreach ($search_jobs as $key) : ?>
      <li class="col-md-6 col-sm-6">
        <div class="listWrpService">
          <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-3">
              <div class="listImg"><img src="<?=base_url('assets/front/');?>images/feature01.png"></div>
            </div>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <h3><a style="font-family:Roboto !important;" href="<?php echo base_url('vacancies/vacancy_details/'); echo $key['id'];?>"><?=$key['position'];?></a></h3>
              <p style="font-family:Roboto !important;"><?=$key['firma'];?></p>
              <ul class="featureInfo">
                <li><i class="fa fa-map-marker" aria-hidden="true"></i><?=$key['city_name'];?></li>
                <li><i class="fa fa-calendar" aria-hidden="true"></i> <?=$key['start_date'];?> - <?=$key['end_date'];?> </li>
              </ul>
              <div class="time-btn"><?=$key['work'];?></div>
              <div class="click-btn"><a href="<?php echo base_url('vacancies/vacancy_details/'); echo $key['id'];?>">Ətraflı Oxu</a></div>
            </div>
          </div>
        </div>
      </li>  
    <?php endforeach ?>      
    </ul>
    <?php } else{ ?>
      <?php echo '<div class="row" style="text-align:center"><h2 style="color:red;">AXTARILAN KATEQORİYAYA UYĞUN NƏTİCƏ TAPILMADI</h2></div>'; }  ?>
    <?php } ?>
  </div>
</div>
<!--feature end--> 

<?php $this->load->view('front/include/footer');?>
