<?php $this->load->view('front/include/header');?>
<!--inner heading start-->
<div class="inner-heading">
  <div class="container" style="margin-bottom:20px;">
    <h3>KATEQORİYA ÜZRƏ İŞ AXTARANLAR</h3>
  </div>
</div>
<!--inner heading end-->
<div class="featured-wrap">
  <div class="container">
    <div class="heading-title"><span>AXTARILAN KATEQORİYAYA UYĞUN NƏTİCƏLƏR</span></div>
    <div class="headTxt"></div>
    <?php if(isset($search_resume)) { 
      if(count($search_resume) > 0) { ?>
      <ul>
      <?php foreach ($search_resume as $key) : ?>
       <li class="col-md-6 col-sm-6">
          <div class="listWrpService featured-wrap candidate">
            <div class="row">
              <div class="col-md-3 col-sm-4 col-xs-12 col-lg-3">
                <div class="listImg"><img style="object-fit:cover;height:103px;" src="<?php echo base_url(); echo $key['tmb'];?>"></div>
              </div>
              <div class="col-md-9 col-sm-8 col-xs-12 col-lg-9">
                <div class="row">
                  <div class="col-md-8">
                    <h3>
                      <a style="font-family:Roboto !important;" href="<?php echo base_url('resumes/resume_details/'); echo $key['id'];?>">
                        <?=$key['fullname'];?>
                      </a>
                    </h3>
                    <div class="designation"><p style="font-family:Roboto !important;"><?=$key['position'];?></p></div>
                    <p style="font-family:Roboto !important;">Şəhər : <?=$key['city_name'];?></p>
                    <p style="font-family:Roboto !important;">Minimum əməkhaqqı : <?=$key['min_salary'];?> azn</p>
                  </div>
                  <div class="col-md-4">
                    <ul>
                      <li class="click-btn apply">
                        <a style="font-family:Roboto !important;" href="<?php echo base_url('resumes/resume_details/'); echo $key['id'];?>">
                          <?=$key['work'];?>
                        </a>
                      </li>
                      <li class="click-btn apply">
                        <a style="font-family:Roboto !important;" href="<?php echo base_url('resumes/resume_details/'); echo $key['id'];?>">
                          Ətraflı oxu
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
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
