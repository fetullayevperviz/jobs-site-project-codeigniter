<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resumes extends CI_Controller {

    public function resume_details($id)
    {   
        $data['info'] = $this->Db->info();
        $result = $this->dtbs->resume_details($id);
        $data['resume'] = $result;
        $this->load->view('front/resume_details',$data);
    }

    public function category_resumes($id)
    {   
        $result = $this->dtbs->category_resume_list($id);
        $data['info'] = $this->Db->info();
        $data['category_resume_list'] = $result;
        $this->load->view('front/category_resume',$data);
    }

    public function resume_search()
    {   
        $data['info'] = $this->Db->info();
        $key    = $this->input->get('search',true);
        if($key != "") {
            $resumes   = $this->dtbs->resumes_search($key);
            $data['search_resume'] = $resumes;
        }
        $this->load->view('front/resume_search_result', $data);
    }

}
