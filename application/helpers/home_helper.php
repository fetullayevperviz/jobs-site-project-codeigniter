<?php 
    function site_settings()
    {
        $CI =& get_instance();
        $result = $CI
                     ->db
                     ->select('*')
                     ->from('settings')
                     ->get()
                     ->result_array();
        return $result;
    }  

    function cv_rules()
    {
        $CI =& get_instance();
        $result = $CI
                     ->db
                     ->select('*')
                     ->from('cv_rules')
                     ->where('status','1')
                     ->get()
                     ->result_array();
        return $result;
    }  

    function job_rules()
    {
        $CI =& get_instance();
        $result = $CI
                     ->db
                     ->select('*')
                     ->from('job_rules')
                     ->where('status','1')
                     ->get()
                     ->result_array();
        return $result;
    }  

     function category()
     {
          $CI =& get_instance();
          $result = $CI
                       ->db
                       ->select('*')
                       ->from('category')
                       ->where('status','1')
                       ->get()
                       ->result_array();
          return $result;
     } 

     function gender()
     {
          $CI =& get_instance();
          $result = $CI
                       ->db
                       ->select('*')
                       ->from('gender')
                       ->where('status','1')
                       ->get()
                       ->result_array();
          return $result;
     } 

     function work_time()
     {
          $CI =& get_instance();
          $result = $CI
                       ->db
                       ->select('*')
                       ->from('work_time')
                       ->where('status','1')
                       ->get()
                       ->result_array();
          return $result;
     } 

     function education()
     {
          $CI =& get_instance();
          $result = $CI
                       ->db
                       ->select('*')
                       ->from('education')
                       ->where('status','1')
                       ->get()
                       ->result_array();
          return $result;
     } 

     function experience()
     {
          $CI =& get_instance();
          $result = $CI
                       ->db
                       ->select('*')
                       ->from('experience')
                       ->where('status','1')
                       ->get()
                       ->result_array();
          return $result;
     } 

     function sub_cat($category_id)
     {
          $CI =& get_instance();
          $result = $CI
                       ->db
                       ->select('*')
                       ->from('sub_category')
                       ->where('status','1')
                       ->where('category_id',$category_id)
                       ->get()
                       ->result_array();
          return $result;
     } 

     function city()
     {
          $CI =& get_instance();
          $result = $CI
                       ->db
                       ->select('*')
                       ->from('city')
                       ->where('status','1')
                       ->get()
                       ->result_array();
          return $result;
     } 

     function social_media()
     {
          $CI =& get_instance();
          $result = $CI
                       ->db
                       ->select('*')
                       ->from('social_media')
                       ->get()
                       ->result_array();
          return $result;
     }
    
    function son_programlar()
    {
        $CI =& get_instance();
        $result = $CI
                     ->db
                     ->select('*')
                     ->from('programs')
                     ->where('status',1)
                     ->order_by('id','desc')
                     ->limit('6')
                     ->get()
                     ->result_array();
        return $result;
    }

    function resumes()
    {
        $CI =& get_instance();
        $result = $CI
                     ->db
                     ->select('cv_list.id,cv_list.tmb,cv_list.fullname,cv_list.adress,cv_list.website,cv_list.skills,cv_list.min_salary,cv_list.position,city.city_name,work_time.work')
                     ->from('cv_list')
                     ->join('city','city.id=cv_list.city')
                     ->join('work_time','work_time.id=cv_list.work_time')
                     ->where('cv_list.status','1')
                     ->order_by('cv_list.id','desc')
                     ->limit('10')
                     ->get()
                     ->result_array();
        return $result;
    }

    function vacancies()
    {
        $CI =& get_instance();
        $result = $CI
                     ->db
                     ->select('job_list.id,job_list.job_skills,job_list.salary,job_list.firma,job_list.position,city.city_name,work_time.work')
                     ->from('job_list')
                     ->join('city','city.id=job_list.city')
                     ->join('work_time','work_time.id=job_list.work_time')
                     ->where('job_list.status','1')
                     ->order_by('job_list.id','desc')
                     ->limit('10')
                     ->get()
                     ->result_array();
        return $result;
    }

    function vacancies_home()
    {
        $CI =& get_instance();
        $result = $CI
                     ->db
                     ->select('job_list.id,job_list.firma,job_list.position,job_list.start_date,job_list.end_date,city.city_name,work_time.work')
                     ->from('job_list')
                     ->join('city','city.id=job_list.city')
                     ->join('work_time','work_time.id=job_list.work_time')
                     ->where('job_list.status','1')
                     ->order_by('job_list.id','desc')
                     ->limit('20')
                     ->get()
                     ->result_array();
        return $result;
    }

    function vacancy()
    {
        $CI =& get_instance();
        $result = $CI
                     ->db
                     ->select('job_list.id,job_list.firma,job_list.position,job_list.start_date,job_list.end_date,city.city_name,work_time.work')
                     ->from('job_list')
                     ->join('city','city.id=job_list.city')
                     ->join('work_time','work_time.id=job_list.work_time')
                     ->where('job_list.status','1')
                     ->order_by('job_list.id','desc')
                     ->limit('20')
                     ->get()
                     ->result_array();
        return $result;
    }

 ?>