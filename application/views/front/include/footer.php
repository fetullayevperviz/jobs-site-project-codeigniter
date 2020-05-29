<!--footer start-->
<div class="footer-wrap">
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-sm-12">
        <div class="footer-logo"><img src="<?php echo base_url(); echo $info['tmb'];?>"></div>
        <p><?=word_limiter($info['project_about'],60);?></p>
        <div class="read-btn"><a href="<?=base_url('home/about');?>">Ətraflı oxu</a></div>
      </div>
      <div class="col-md-8 col-sm-12">
        <div class="row">
          <div class="col-md-4 col-sm-4">
            <h3>MENYULAR</h3>
            <ul class="footer-links">
              <li><a href="<?=base_url();?>">Ana səhifə</a></li>
              <li> <a href="<?=base_url('home/about');?>">Haqqımızda</a></li>
              <li> <a href="<?=base_url('home/job_list');?>">İş elanları</a></li>
              <li> <a href="<?=base_url('home/resume_list');?>">İş axtaranlar</a></li>
              <li> <a href="<?=base_url('home/post_job');?>">Elan yerləşdir</a></li>
              <li> <a href="<?=base_url('home/resume');?>">Cv yerləşdir</a></li>
              <li> <a href="<?=base_url('home/contact');?>">Əlaqə</a></li>
            </ul>
          </div>
          <div class="col-md-4 col-sm-4">
            <h3>İŞ ELANLARI</h3>
            <ul class="footer-links">
              <?php $category = category(); foreach ($category as $category): ?>
                   <li><a href="<?php echo base_url('vacancies/category_jobs/'); echo $category['id'];?>"><?php echo $category['cat_name'];?></a></li>
               <?php endforeach ?>
            </ul>
          </div>
          <div class="col-md-4 col-sm-4">
            <h3>İŞ AXTARANLAR</h3>
            <ul class="footer-links">
               <?php $category = category(); foreach ($category as $category): ?>
                   <li><a href="<?php echo base_url('resumes/category_resumes/'); echo $category['id'];?>"><?php echo $category['cat_name'];?></a></li>
               <?php endforeach ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--footer end--> 

<!--copyright start-->
<div class="footer">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <div class="copyright">Copyright © <?php echo date("Y");?> <?=$info['copyright_text'];?></div>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="social">
          <div class="followWrp"> <span>Bizi izləyin</span>
            <ul class="social-wrap">
              <?php $social = social_media(); foreach ($social as $s_info): ?>
                 <li><a href="<?=$s_info['link'];?>"><i class="fa fa-<?=$s_info['icon'];?>" aria-hidden="true"></i></a></li>
              <?php endforeach; ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="<?=base_url('assets/front/');?>js/jquery-2.1.4.min.js"></script> 
<script src="<?=base_url('assets/front/');?>js/bootstrap.min.js"></script> 
<!-- general script file --> 
<script src="<?=base_url('assets/front/');?>js/owl.carousel.js"></script> 
<script type="text/javascript" src="<?=base_url('assets/front/');?>js/script.js"></script>
</body>
</html>