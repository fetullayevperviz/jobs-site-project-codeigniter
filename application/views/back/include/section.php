<div class="content-wrapper">
<div class="page-content fade-in-up">
<div class="row">
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card bg-danger">
                <div class="card-body">
                	<?php $cv_list_count = cv_list_count();?>
                    <h2 class="text-white"><?=$cv_list_count;?> <i class="ti-menu float-right"></i></h2>
                    <div><span class="font-weight-bold text-white">Ümumi CV Sayı</span></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card bg-danger">
                <div class="card-body">
                	<?php $cv_rules_count = cv_rules_count();?>
                    <h2 class="text-white"><?=$cv_rules_count;?> <i class="ti-menu float-right"></i></h2>
                    <div><span class="font-weight-bold text-white">Ümumi CV Qaydası Sayı</span></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card bg-danger">
                <div class="card-body">
                	<?php $job_list_count = job_list_count();?>
                    <h2 class="text-white"><?=$job_list_count;?> <i class="ti-menu float-right"></i></h2>
                    <div><span class="font-weight-bold text-white">Ümumi Elan Sayı</span></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card bg-danger">
                <div class="card-body">
                	<?php $job_rules_count = job_rules_count();?>
                    <h2 class="text-white"><?=$job_rules_count;?> <i class="ti-menu float-right"></i></h2>
                    <div><span class="font-weight-bold text-white">Ümumi Elan Qaydası Sayı</span></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card bg-danger">
                <div class="card-body">
                	<?php $category_count = category_count();?>
                    <h2 class="text-white"><?=$category_count;?> <i class="ti-menu float-right"></i></h2>
                    <div><span class="font-weight-bold text-white">Ümumi Kateqoriya Sayı</span></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card bg-danger">
                <div class="card-body">
                	<?php $sub_category_count = sub_category_count();?>
                    <h2 class="text-white"><?=$sub_category_count;?> <i class="ti-menu float-right"></i></h2>
                    <div><span class="font-weight-bold text-white">Ümumi Alt Kateqoriya Sayı</span></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card bg-danger">
                <div class="card-body">
                	<?php $city_count = city_count();?>
                    <h2 class="text-white"><?=$city_count;?> <i class="ti-menu float-right"></i></h2>
                    <div><span class="font-weight-bold text-white">Ümumi Şəhər Sayı</span></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card bg-danger">
                <div class="card-body">
                	<?php $education_count = education_count();?>
                    <h2 class="text-white"><?=$education_count;?> <i class="ti-menu float-right"></i></h2>
                    <div><span class="font-weight-bold text-white">Ümumi Təhsil Dərəcəsi Sayı</span></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card bg-danger">
                <div class="card-body">
                	<?php $experience_count = experience_count();?>
                    <h2 class="text-white"><?=$experience_count;?> <i class="ti-menu float-right"></i></h2>
                    <div><span class="font-weight-bold text-white">Ümumi İş Təcrübəsi Sayı</span></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card bg-danger">
                <div class="card-body">
                	<?php $gender_count = gender_count();?>
                    <h2 class="text-white"><?=$gender_count;?> <i class="ti-menu float-right"></i></h2>
                    <div><span class="font-weight-bold text-white">Ümumi Cins Sayı</span></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card bg-danger">
                <div class="card-body">
                	<?php $work_time_count = work_time_count();?>
                    <h2 class="text-white"><?=$work_time_count;?> <i class="ti-menu float-right"></i></h2>
                    <div><span class="font-weight-bold text-white">Ümumi İş Günü Formatı Sayı</span></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card bg-danger">
                <div class="card-body">
                	<?php $social_media_count = social_media_count();?>
                    <h2 class="text-white"><?=$social_media_count;?> <i class="ti-menu float-right"></i></h2>
                    <div><span class="font-weight-bold text-white">Ümumi Sosial Şəbəkə Sayı</span></div>
                </div>
            </div>
        </div>
        <?php $info = session('read','admininfo');?>
        <?php if($info->permission != 0){ ?>
        <div class="col-lg-3 col-md-6 mb-4" style="display:none;">
            <div class="card bg-danger">
                <div class="card-body">
                	<?php $user_count = user_count();?>
                    <h2 class="text-white"><?=$user_count;?> <i class="ti-menu float-right"></i></h2>
                    <div><span class="font-weight-bold text-white">Ümumi İstifadəçi Sayı</span></div>
                </div>
            </div>
        </div>
        <?php } else { ?>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card bg-danger">
                <div class="card-body">
                	<?php $user_count = user_count();?>
                    <h2 class="text-white"><?=$user_count;?> <i class="ti-menu float-right"></i></h2>
                    <div><span class="font-weight-bold text-white">Ümumi İstifadəçi Sayı</span></div>
                </div>
            </div>
        </div>	
        <?php } ?>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card bg-danger">
                <div class="card-body">
                	<?php $message_count = message_count();?>
                    <h2 class="text-white"><?=$message_count;?> <i class="ti-email float-right"></i></h2>
                    <div><span class="font-weight-bold text-white">Oxunmamış Mesaj Sayı</span></div>
                </div>
            </div>
        </div>
    </div>  
</div>
</div>