<?php 
     class Dtbs extends CI_Model
     {
      function __construct()
      {
         parent::__construct();
      }
      
        function control($email,$password)
        {
            $result = $this
                           ->db
                           ->select('*')
                           ->from('admin')
                           ->where('email',$email)
                           ->where('password',sha1(md5($password)))
                           ->get()
                           ->row();
            return $result;
        }

      function list($from)
      {
          $result = $this
                         ->db
                         ->select('*')
                         ->from($from)
                         ->order_by('id','desc')
                         ->get()
                         ->result_array();
           return $result;
      }

      function sub_list($from)
      {
          $result = $this
                         ->db
                         ->select('sub_category.id,sub_category.category_id,sub_category.sub_cat_name,sub_category.status,category.cat_name')
                         ->from($from)
                         ->join('category','category.id=sub_category.category_id')
                         ->order_by('sub_category.id','desc')
                         ->get()
                         ->result_array();
           return $result;
      }

      function qeydiyyat_list($from)
      {
          $result = $this
                         ->db
                         ->select('*')
                         ->from($from)
                         ->where('end_date > ',date('Y-m-d'))
                         ->order_by('id','desc')
                         ->get()
                         ->result_array();
           return $result;
      }

      function vaxti_bitenler($from)
      {
          $result = $this
                         ->db
                         ->select('*')
                         ->from($from)
                         ->where('end_date < ',date('Y-m-d'))
                         ->order_by('id','desc')
                         ->get()
                         ->result_array();
           return $result;
      }


      function gundelik_qeydiyyat($from)
      {
          $result = $this
                         ->db
                         ->select('*')
                         ->from($from)
                         ->where('start_date',date('Y-m-d'))
                         ->get()
                         ->result_array();
           return $result;
      }


      function profile_info($from, $userId)
      {
          $result = $this
                         ->db
                         ->select('*')
                         ->from($from)
                         ->where('id', $userId)
                         ->get()
                         ->row_array();
           return $result;
      }

        function show($id,$from)
        {
            $result = $this
                         ->db
                         ->select('*')
                         ->from($from)
                         ->where('id',$id)
                         ->get()
                         ->row_array();
            return $result;
        }

        function showCV($id)
        {
            $sql = "SELECT cv_list.id,cv_list.fullname,cv_list.gender,cv_list.age,cv_list.education,cv_list.edu_info,cv_list.experience,cv_list.exp_info,cv_list.category,cv_list.sub_category,cv_list.city,cv_list.position,cv_list.min_salary,cv_list.skills,cv_list.info,cv_list.email,cv_list.start_date,cv_list.end_date,cv_list.adress,cv_list.image,cv_list.tmb,cv_list.home_phone,cv_list.phone,cv_list.language,cv_list.website,cv_list.work_time,cv_list.status,city.city_name,work_time.work,gender.gender_name,education.edu_name,experience.exp,category.cat_name,sub_category.sub_cat_name FROM cv_list JOIN city ON city.id=cv_list.city JOIN work_time ON work_time.id=cv_list.work_time JOIN gender ON gender.id=cv_list.gender JOIN education ON education.id=cv_list.education JOIN experience ON experience.id=cv_list.experience JOIN category ON category.id=cv_list.category JOIN sub_category ON sub_category.id=cv_list.sub_category WHERE cv_list.id=?";
            $result = $this->db->query($sql,$id);
            return $result->row_array();
        }

        function showJOB($id)
        {
            $sql = "SELECT job_list.id,job_list.firma,job_list.gender,job_list.min_age,job_list.max_age,job_list.education,job_list.experience,job_list.category,job_list.sub_category,job_list.city,job_list.position,job_list.salary,job_list.job_skills,job_list.job_info,job_list.email,job_list.start_date,job_list.end_date,job_list.home_phone,job_list.phone,job_list.related_user,job_list.work_time,job_list.status,city.city_name,work_time.work,gender.gender_name,education.edu_name,experience.exp,category.cat_name,sub_category.sub_cat_name FROM job_list JOIN city ON city.id=job_list.city JOIN work_time ON work_time.id=job_list.work_time JOIN gender ON gender.id=job_list.gender JOIN education ON education.id=job_list.education JOIN experience ON experience.id=job_list.experience JOIN category ON category.id=job_list.category JOIN sub_category ON sub_category.id=job_list.sub_category WHERE job_list.id=?";
            $result = $this->db->query($sql,$id);
            return $result->row_array();
        }



        function update($data = array(),$id,$where,$from)
        {
            $result = $this->db->where($where,$id)->update($from,$data);
            return $result;
        }

        function insert($from,$data = array())
        {
            $result = $this->db->insert($from,$data);
            return $result;
        }

        function delete($id,$where,$from)
        {
            $result = $this->db->delete($from,array($where=>$id));
            return $result;
        }
        
        function job_count()
        {
            $result = $this
                           ->db
                           ->select('*')
                           ->from('job_list')
                           ->where('status',1)
                           ->count_all_results();
            return $result;
        }

        function get_jobs($per,$set)
        {

            $sql = "SELECT job_list.id,job_list.job_skills,job_list.salary,job_list.firma,job_list.sub_category,job_list.position, city.city_name,work_time.work,job_list.start_date,job_list.end_date FROM job_list JOIN city ON city.id=job_list.city JOIN  work_time ON work_time.id=job_list.work_time WHERE job_list.status=1 ORDER BY id DESC LIMIT ?,?";
            $result = $this->db->query($sql, [intval($per), $set]);
            return $result->result_array();
        }

        function resume_count()
        {
            $query = $this->db->query('SELECT * FROM cv_list where status=1');
            return $query->num_rows();
        }

        function get_resume($per,$set)
        {
            $sql = "SELECT cv_list.id,cv_list.tmb,cv_list.fullname,cv_list.website,cv_list.skills,cv_list.min_salary,cv_list.sub_category,cv_list.position, city.city_name,work_time.work FROM cv_list JOIN city ON city.id=cv_list.city JOIN work_time ON work_time.id=cv_list.work_time WHERE cv_list.status=1 ORDER BY id DESC LIMIT ?,?";
            $result = $this->db->query($sql, [intval($per), $set]);
            return $result->result_array();
        }

        function resume_details($id)
        {
            $result = $this
                          ->db
                          ->select('*')
                          ->from('cv_list')
                          ->join('city', 'city.id = cv_list.city')
                          ->join('gender','gender.id=cv_list.gender')
                          ->join('experience','experience.id=cv_list.experience')
                          ->join('education','education.id=cv_list.education')
                          ->join('work_time','work_time.id=cv_list.work_time')
                          ->join('category','category.id=cv_list.category')
                          ->join('sub_category','sub_category.id=cv_list.sub_category')
                          ->where('cv_list.status','1')
                          ->where('cv_list.id',$id)
                          ->get()
                          ->row_array();
            return $result;
        }

        function vacancy_details($id)
        {
            $result = $this
                          ->db
                          ->select('*')
                          ->from('job_list')
                          ->join('city', 'city.id = job_list.city')
                          ->join('gender','gender.id=job_list.gender')
                          ->join('experience','experience.id=job_list.experience')
                          ->join('education','education.id=job_list.education')
                          ->join('work_time','work_time.id=job_list.work_time')
                          ->join('category','category.id=job_list.category')
                          ->join('sub_category','sub_category.id=job_list.sub_category')
                          ->where('job_list.status','1')
                          ->where('job_list.id',$id)
                          ->get()
                          ->row_array();
            return $result;
        }

        function category_job_list($id)
        {
            $result = $this
                           ->db
                           ->select('job_list.id,job_list.firma,job_list.position,job_list.start_date,job_list.end_date,city.city_name,work_time.work')
                           ->from('job_list')
                           ->join('city','city.id=job_list.city')
                           ->join('work_time','work_time.id=job_list.work_time')
                           ->where('job_list.status','1')
                           ->where('job_list.category',$id)
                           ->order_by('job_list.id','desc')
                           ->limit('30')
                           ->get()
                           ->result_array();
            return $result;
        }

        function category_resume_list($id)
        {
            $result = $this
                           ->db
                           ->select('cv_list.id,cv_list.fullname,cv_list.position,cv_list.tmb,cv_list.min_salary,city.city_name,work_time.work')
                           ->from('cv_list')
                           ->join('city','city.id=cv_list.city')
                           ->join('work_time','work_time.id=cv_list.work_time')
                           ->where('cv_list.status','1')
                           ->where('cv_list.category',$id)
                           ->order_by('cv_list.id','desc')
                           ->limit('30')
                           ->get()
                           ->result_array();
            return $result;
        }


        function hit($sef)
        {
           $result = $this
                          ->db
                          ->select('*')
                          ->from('news')
                          ->where('status','1')
                          ->where('sef',$sef)
                          ->get()
                          ->row_array();
            return $result;
        }

        function message_update($id,$data=array())
        {
            $result = $this
                          ->db
                          ->where('id',$id)
                          ->update('message',$data);
            return $result;
        }
        
        function jobs_search($key)
        {
        	$sql = 'SELECT job_list.id,job_list.job_skills,job_list.salary,job_list.firma,job_list.sub_category,job_list.position, city.city_name,work_time.work,job_list.start_date,job_list.end_date FROM job_list JOIN city ON city.id=job_list.city JOIN  work_time ON work_time.id=job_list.work_time WHERE job_list.status=1 and sub_category = ? ORDER BY id DESC';
           	$result = $this->db->query($sql,$key);
            return $result->result_array();
        }

        function resumes_search($key)
        {
          $sql = 'SELECT cv_list.id,cv_list.tmb,cv_list.fullname,cv_list.website,cv_list.skills,cv_list.min_salary,cv_list.sub_category,cv_list.position, city.city_name,work_time.work FROM cv_list JOIN city ON city.id=cv_list.city JOIN  work_time ON work_time.id=cv_list.work_time WHERE cv_list.status=1 and sub_category = ? ORDER BY id DESC';
            $result = $this->db->query($sql,$key);
            return $result->result_array();
        }
    

     }
 ?>