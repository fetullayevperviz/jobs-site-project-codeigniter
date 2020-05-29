<?php $this->load->view('front/include/header');?>
<!--inner heading start-->
<div class="inner-heading">
  <div class="container">
    <h3>İŞ AXTARANLAR</h3>
  </div>
</div>
<!--inner heading end--> 

<!--Inner Content start-->
<div class="inner-content loginWrp resumeWrp">
  <div class="container"> 
   <div class="sortbybar">
    <div class="sortbar listingSearch">
    <div class="form-wrap">
        <form action="<?=base_url('resumes/resume_search');?>" role='search' method='get'>
          <label for="category">Kateqoriyalar üzrə iş axtar</label>
          <div class="row">
            <div class="col-md-10">
              <div class="input-group">
                <select name="search" class="form-control">
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
            <div class="col-md-2">
              <div class="input-btn">
                <input type="submit" class="sbutn" value="Axtar">
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
    <!--Latest Resumes Start-->
    <div class="row">
      <div class="col-md-9 col-sm-8">
        <div class="heading-title">Ən son <span>cv-lər</span></div>
        <ul>
           <?php foreach ($resume as $resumes): ?>
           <li>
            <div class="listWrpService featured-wrap candidate">
              <div class="row">
                <div class="col-md-2 col-sm-3 col-xs-12">
                  <div class="listImg"><img style="object-fit:cover;height:130px;" src="<?php echo base_url(); echo $resumes['tmb'];?>"></div>
                </div>
                <div class="col-md-10 col-sm-9 col-xs-12">
                  <div class="row">
                    <div class="col-md-8">
                      <h3>
                        <a href="<?php echo base_url('resumes/resume_details/'); echo $resumes['id'];?>">
                          <?=$resumes['fullname'];?>
                        </a>
                      </h3>
                      <div class="designation"><?=$resumes['position'];?></div>
                      <ul class="featureInfo">
                        <p>Şəhər : <?=$resumes['city_name'];?></p>
                        <?php if($resumes['website']==null){ ?>
                        <?php } else{ ?>
                          <p><?=$resumes['website'];?></p>
                        <?php } ?>
                      </ul>
                      <p>Minimum əməkhaqqı : <?=$resumes['min_salary'];?> azn</p>
                      <p>
                        Biliklər : 
                        <a href="<?php echo base_url('resumes/resume_details/'); echo $resumes['id'];?>">
                            <?=substr($resumes['skills'],0,50);?> 
                        </a> ...
                      </p>
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

        <div class="pagiWrap" style="margin-bottom:20px;">
          <div class="row">
            <div class="col-md-4 col-sm-6">
              <div class="showreslt"></div>
            </div>
            <div class="col-md-8 col-sm-6">
              <!--pagination section start-->
                 <?php echo $this->pagination->create_links();?>
              <!--pagination section end-->
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-4" style="margin-top:58px;">
        <div class="leftSidebar">
        <div class="filter" style="text-align:center;">KATEQORİYALAR</div>
          <div class="sidebarpad">
              <div class="input-wrap">
                <ul class="check">
                   <?php $category = category(); foreach ($category as $category): ?>
                      <a href="<?php echo base_url('vacancies/category_jobs/'); echo $category['id'];?>">
                        <li>                   
                          <label for="price">
                            <a style="color:white;" href="<?php echo base_url('vacancies/category_jobs/'); echo $category['id'];?>"><?=$category['cat_name'];?></a>
                          </label>
                        </li>
                      </a>
                   <?php endforeach ?>
                  </a>
                </ul>
              </div>       
          </div>
        </div>
      </div>
    <!--Latest Resumes End--> 
  </div>
</div>
</div>
<!--Inner Content End--> 
<?php $this->load->view('front/include/footer');?>