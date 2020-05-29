<!--featured jobs-->
<div class="featured-wrap">
  <div class="container">
    <div class="heading-title"><span>Son Paylaşılan İş Elanları</span></div>
    <div class="headTxt"></div>
    <ul class="row">
       <?php $vacancies_home = vacancies_home(); foreach ($vacancies_home as $vacancies_home): ?>
            <li class="col-md-6 col-sm-6">
            <div class="listWrpService">
              <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-3">
                  <div class="listImg"><img src="<?=base_url('assets/front/');?>images/feature01.png"></div>
                </div>
                <div class="col-md-9 col-sm-9 col-xs-9">
                  <h3><a style="font-family:Roboto !important;" href="<?php echo base_url('vacancies/vacancy_details/'); echo $vacancies_home['id'];?>"><?=substr($vacancies_home['position'],0,40);?> ... </a></h3>
                  <p style="font-family:Roboto !important;"><?=substr($vacancies_home['firma'],0,50);?> ...</p>
                  <ul class="featureInfo" style="font-family:Roboto !important;">
                    <li><i class="fa fa-map-marker" aria-hidden="true"></i><?=$vacancies_home['city_name'];?></li>
                    <li><i class="fa fa-calendar" aria-hidden="true"></i> <?=$vacancies_home['start_date'];?> - <?=$vacancies_home['end_date'];?> </li>
                  </ul>
                  <div class="time-btn">
                    <?=$vacancies_home['work'];?>
                  </div>
                  <div class="click-btn"><a href="<?php echo base_url('vacancies/vacancy_details/'); echo $vacancies_home['id'];?>">Ətraflı Oxu</a></div>
                </div>
              </div>
            </div>
          </li>
       <?php endforeach ?> 
    </ul>
    <div class="read-btn"><a href="<?=base_url('home/vacancies');?>">HAMISINI GÖSTƏR</a></div>
  </div>
</div>
<!--feature end--> 