<?php 
     function session($type,$name,$message=null)
     {
        $CI =& get_instance();
        if($type == 'read')
        {
            return $CI->session->userdata($name);
        }
        if($type == 'write')
        {
           return $CI->session->set_userdata($name,$message);
        }
     }

     function flash($type,$title,$message)
     {
     	$CI =& get_instance();
     	$flash = '<div class="alert alert-'.$type.' alert-dismissable fade show">
	                    <button class="close" data-dismiss="alert" aria-label="Close">
	                    </button><strong>'.$title.'</strong><br>'.$message.'</div>';
	    return $CI->session->set_flashdata('message',$flash);
     }

     function flash_read()
     {
     	$CI =& get_instance();
     	return $CI->session->flashdata('message');
     }

     function linkto($url)
     { 
        return base_url($url);
     }

     function post_val($name)
     {
        $CI =& get_instance();
        return trim(strip_tags(htmlspecialchars($CI->input->post($name))));
     }

   
    function permalink($string) 
    {
        $find = array('Ç', 'Ş', 'Ğ', 'Ü','U', 'İ','I', 'Ö','Ə','O', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı','ə', '+', '#');
        $replace = array('c', 's', 'g', 'u','u', 'i','i', 'o','e', 'o', 'c', 's', 'g', 'u', 'o', 'i','e', 'plus', 'sharp');
        $string = strtolower(str_replace($find, $replace, $string));
        $string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
        $string = trim(preg_replace('/\s+/', ' ', $string));
        $string = str_replace(' ', '-', $string);
        return $string;   
    }

 function category_list()
 {
    $CI =& get_instance();
    $result = $CI->db->select('*')->from('category')->order_by('id','asc')->get()->result_array();
    return $result;
 }

 function logo_image($id)
 {
    $CI =& get_instance();
    $result = $CI->db->from('settings')->where('id',$id)->get()->row();
    return $result->image;
 }

 function logo_tmb_image($id)
 {
    $CI =& get_instance();
    $result = $CI->db->select('tmb')->from('settings')->where('id',$id)->get()->row();
    return $result->tmb;
 }

  function resume_image($id)
 {
    $CI =& get_instance();
    $result = $CI->db->from('cv_list')->where('id',$id)->get()->row();
    return $result->image;
 }

 function resume_tmb_image($id)
 {
    $CI =& get_instance();
    $result = $CI->db->select('tmb')->from('cv_list')->where('id',$id)->get()->row();
    return $result->tmb;
 }

 function getIP()
 {
    if(getenv("HTTP_CLIENT_IP"))
    {
        $ip = getenv("HTTP_CLIENT_IP");
    }
    elseif(getenv("HTTP_X_FORWARDED_FOR"))
    {
       $ip = getenv("HTTP_X_FORWARDED_FOR");
       if(strstr($ip,','))
       {
          $tmp = explode($ip, ',');
          $ip = trim($tmp[0]);
       }
    }
    else
    {
        $ip = getenv("REMOTE_ADDR");
    }
    return $ip;
 }

function message_count()
{
   $CI =& get_instance();
    $result = $CI
                 ->db
                 ->select('*')
                 ->from('message')
                 ->where('status',0)
                 ->count_all_results();
    return $result;
}

function social_media_count()
{
   $CI =& get_instance();
    $result = $CI
                 ->db
                 ->select('*')
                 ->from('social_media')
                 ->count_all_results();
    return $result;
}

function user_count()
{
   $CI =& get_instance();
    $result = $CI
                 ->db
                 ->select('*')
                 ->from('admin')
                 ->count_all_results();
    return $result;
}

function work_time_count()
{
   $CI =& get_instance();
    $result = $CI
                 ->db
                 ->select('*')
                 ->from('work_time')
                 ->count_all_results();
    return $result;
}

function gender_count()
{
   $CI =& get_instance();
    $result = $CI
                 ->db
                 ->select('*')
                 ->from('gender')
                 ->count_all_results();
    return $result;
}

function experience_count()
{
   $CI =& get_instance();
    $result = $CI
                 ->db
                 ->select('*')
                 ->from('experience')
                 ->count_all_results();
    return $result;
}

function education_count()
{
   $CI =& get_instance();
    $result = $CI
                 ->db
                 ->select('*')
                 ->from('education')
                 ->count_all_results();
    return $result;
}

function city_count()
{
   $CI =& get_instance();
    $result = $CI
                 ->db
                 ->select('*')
                 ->from('city')
                 ->count_all_results();
    return $result;
}

function sub_category_count()
{
   $CI =& get_instance();
    $result = $CI
                 ->db
                 ->select('*')
                 ->from('sub_category')
                 ->count_all_results();
    return $result;
}

function category_count()
{
   $CI =& get_instance();
    $result = $CI
                 ->db
                 ->select('*')
                 ->from('category')
                 ->count_all_results();
    return $result;
}

function job_rules_count()
{
   $CI =& get_instance();
    $result = $CI
                 ->db
                 ->select('*')
                 ->from('job_rules')
                 ->count_all_results();
    return $result;
}

function job_list_count()
{
   $CI =& get_instance();
    $result = $CI
                 ->db
                 ->select('*')
                 ->from('job_list')
                 ->count_all_results();
    return $result;
}

function cv_rules_count()
{
   $CI =& get_instance();
    $result = $CI
                 ->db
                 ->select('*')
                 ->from('cv_rules')
                 ->count_all_results();
    return $result;
}

function cv_list_count()
{
   $CI =& get_instance();
    $result = $CI
                 ->db
                 ->select('*')
                 ->from('cv_list')
                 ->count_all_results();
    return $result;
}

function get_subcategory($id)
{
    $CI =& get_instance();
    $result = $CI
                 ->db
                 ->select('*')
                 ->from('sub_category')
                 ->where('id',$id)
                 ->where('status','1')
                 ->get()
                 ->row_array();
    return $result;
}

function get_city($id)
{
    $CI =& get_instance();
    $result = $CI
                 ->db
                 ->select('*')
                 ->from('city')
                 ->join('job_list','job_list.id=city.id','inner')
                 ->where('id',$id)
                 ->where('status','1')
                 ->get()
                 ->row_array();
    return $result;
}



 ?>