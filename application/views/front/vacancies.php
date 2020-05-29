<?php $this->load->view('front/include/header');?>
<!--inner heading start-->
<div class="inner-heading">
  <div class="container" style="margin-bottom:20px;">
    <h3>HƏR KATEQORİYA ÜZRƏ ÜMUMİ İŞ ELANLARI</h3>
  </div>
</div>
<!--inner heading end-->
<div class="featured-wrap">
  <div class="container">
    <div class="heading-title"><span>Saytda Olan Bütün İş Elanları</span></div>
    <div class="headTxt"></div>
    <ul class="row">
    <?php foreach ($job as $vacancy): ?>
      <li class="col-md-6 col-sm-6">
        <div class="listWrpService">
          <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-3">
              <div class="listImg"><img src="<?=base_url('assets/front/');?>images/feature01.png"></div>
            </div>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <h3><a style="font-family:Roboto !important;" href="<?php echo base_url('vacancies/vacancy_details/'); echo $vacancy['id'];?>"><?=substr($vacancy['position'],0,40);?> ...</a></h3>
              <p style="font-family:Roboto !important;"><?=substr($vacancy['firma'],0,50);?> ...</p>
              <ul class="featureInfo" style="font-family:Roboto !important;">
                <li><i class="fa fa-map-marker" aria-hidden="true"></i><?=$vacancy['city_name'];?></li>
                <li><i class="fa fa-calendar" aria-hidden="true"></i> <?=$vacancy['start_date'];?> - <?=$vacancy['end_date'];?> </li>
              </ul>
              <div class="time-btn"><?=$vacancy['work'];?></div>
              <div class="click-btn"><a href="<?php echo base_url('vacancies/vacancy_details/'); echo $vacancy['id'];?>">Ətraflı Oxu</a></div>
            </div>
          </div>
        </div>
      </li>  
    <?php endforeach ?>      
    </ul>
    <div class="pagiWrap">
          <div class="row">
            <div class="col-md-4 col-sm-4">
              <div class="showreslt"></div>
            </div>
            <div class="col-md-8 col-sm-8">
              <!--pagination section start-->
                 <?php echo $this->pagination->create_links();?>
              <!--pagination section end-->
            </div>
          </div>
        </div>
  </div>
</div>
<!--feature end--> 

<?php $this->load->view('front/include/footer');?>