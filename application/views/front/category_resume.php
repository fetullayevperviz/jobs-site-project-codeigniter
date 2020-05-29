<?php $this->load->view('front/include/header');?>
<!--inner heading start-->
<div class="inner-heading">
  <div class="container" style="margin-bottom:20px;">
    <h3>KATEQORİYA ÜZRƏ CV-LƏR</h3>
  </div>
</div>
<!--inner heading end-->
<div class="featured-wrap">
  <div class="container">
    <?php if(count($category_resume_list) > 0){ ?>
    <div class="headTxt"><h2 style="color:red;">AXTARILAN KATEQORİYAYA UYĞUN NƏTİCƏLƏR</h2></div>
      <ul class="row">
       <?php foreach ($category_resume_list as $resumes): ?>
          <li class="col-md-6 col-sm-6">
            <div class="listWrpService featured-wrap candidate">
              <div class="row">
                <div class="col-md-3 col-sm-4 col-xs-12 col-lg-3">
                  <div class="listImg"><img style="object-fit:cover;height:103px;" src="<?php echo base_url(); echo $resumes['tmb'];?>"></div>
                </div>
                <div class="col-md-9 col-sm-8 col-xs-12 col-lg-9">
                  <div class="row">
                    <div class="col-md-8">
                      <h3>
                        <a href="<?php echo base_url('resumes/resume_details/'); echo $resumes['id'];?>">
                          <?=$resumes['fullname'];?>
                        </a>
                      </h3>
                      <div class="designation"><?=$resumes['position'];?></div>
                      <p>Şəhər : <?=$resumes['city_name'];?></p>
                      <p>Minimum əməkhaqqı : <?=$resumes['min_salary'];?> azn</p>
                    </div>
                    <div class="col-md-4">
                      <ul>
                        <li class="click-btn apply">
                          <a href="<?php echo base_url('resumes/resume_details/'); echo $resumes['id'];?>">
                            <?=$resumes['work'];?>
                          </a>
                        </li>
                        <li class="click-btn apply">
                          <a href="<?php echo base_url('resumes/resume_details/'); echo $resumes['id'];?>">
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
</div>
    <?php } else{ ?>
      <div class="row" style="text-align:center;margin-bottom:80px;">
         <h1 style="color:red;">AXTARILAN KATEQORİYAYA UYĞUN NƏTİCƏ TAPILMADI</h1>
      </div>
    <?php } ?>
</div>
<!--feature end--> 

<?php $this->load->view('front/include/footer');?>