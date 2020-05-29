<?php $this->load->view('front/include/header');?>
<!--inner heading start-->
<div class="inner-heading">
  <div class="container">
    <h3>İş Elanları</h3>
  </div>
</div>
<!--inner heading end-->
<!--Inner Content start-->
<div class="inner-content listing">
  <div class="container"> 
    <!--Job Listing Start-->
    <div class="row">
      <div class="col-md-3 col-sm-4">
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
                   <?php endforeach; ?>
                  </a>
                </ul>
              </div>       
          </div>
        </div>
      </div>
      <div class="col-md-9 col-sm-8">
        <div class="sortbybar">
          <div class="sortbar listingSearch">  
            <div class="form-wrap">
        <form action="<?=base_url('vacancies/vacancy_search');?>" role='search' method='get'>
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
        <ul class="listService">
           <?php foreach ($job as $vacancies): ?>
             <a href="<?php echo base_url('vacancies/vacancy_details/'); echo $vacancies['id'];?>">
               <li>
            <div class="listWrpService featured-wrap candidate">
              <div class="row">
                <div class="col-md- col-sm- col-xs-12">
                  <div class="row">
                    <div class="col-md-8">
                      <h3>
                        <a href="<?php echo base_url('vacancies/vacancy_details/'); echo $vacancies['id'];?>">
                          <?=$vacancies['firma'];?>
                        </a>
                      </h3>
                      <div class="designation"><?=$vacancies['position'];?></div>
                      <ul class="featureInfo">
                        <p>Şəhər : <?=$vacancies['city_name'];?></p>
                      </ul>
                      <p>Əməkhaqqı : <?=$vacancies['salary'];?> azn</p>
                      <p>
                        Tələblər : 
                        <a href="<?php echo base_url('vacancies/vacancy_details/'); echo $vacancies['id'];?>">
                            <?=substr($vacancies['job_skills'],0,70);?> 
                        </a> ...
                      </p>
                    </div>
                    <div class="col-md-4">
                      <ul>
                        <li class="click-btn apply">
                          <a href="<?php echo base_url('vacancies/vacancy_details/'); echo $vacancies['id'];?>"><?=$vacancies['work'];?></a>
                        </li>
                        <li class="click-btn apply">
                          <a href="<?php echo base_url('vacancies/vacancy_details/'); echo $vacancies['id'];?>">Ətraflı oxu</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </li>
             </a>
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
  </div>
</div>
<?php $this->load->view('front/include/footer');?>