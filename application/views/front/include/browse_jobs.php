<!--Browse Job Start-->
<div class="browse-wrap">
  <div class="container">
    <div class="heading-title"><span>Kateqoriyalar</span></div>
    <ul class="row">
       <?php $category = category(); foreach ($category as $category): ?>
          <li class="col-md-3 col-sm-6 col-xs-6">
            <div class="jobsWrp">
              <div class="jobTitle">
                <a href="<?php echo base_url('vacancies/category_jobs/'); echo $category['id'];?>"><?=$category['cat_name'];?></a>
              </div>
            </div>
          </li>
       <?php endforeach ?>
    </ul>
  </div>
</div>
<!--Browse Job End--> 

