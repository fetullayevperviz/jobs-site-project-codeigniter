<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vacancies extends CI_Controller {
    
    public function vacancy_details($id)
    {   
        $data['info'] = $this->Db->info();
        $result = $this->dtbs->vacancy_details($id);
        $data['job'] = $result;
        $this->load->view('front/vacancy_details',$data);
    }

    public function category_jobs($id)
    {   
        $result = $this->dtbs->category_job_list($id);
        $data['info'] = $this->Db->info();
        $data['category_job_list'] = $result;
        $this->load->view('front/category_jobs',$data);
    }

    public function vacancy_search()
    {   
        $data['info'] = $this->Db->info();
        $key    = $this->input->get('search',true);
        if($key != "") {
            $jobs   = $this->dtbs->jobs_search($key);
            $data['search_jobs'] = $jobs;
        }
        $this->load->view('front/vacancy_search_result', $data);
    }

}
