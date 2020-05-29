<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

  	public function index()
  	{
  		$data['info'] = $this->Db->info();
  		$this->load->view('front/home',$data);
  	}

    public function about()
    {
        $data['info'] = $this->Db->info();
        $this->load->view('front/about',$data);
    }

    public function job_list()
    {
        $data['info'] = $this->Db->info();
        $result = $this->dtbs->job_count();
        $this->load->library('pagination');  
        $config['base_url'] = base_url().'home/job_list';
        $config['total_rows'] = $result;
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_tag_open'] = '<li>';
        $config['last_tag_open'] = '<li>';
        $config['next_tag_open'] = '<li>';
        $config['prev_tag_open'] = '<li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_close'] = '</li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class=\"active\"><span><b>";
        $config['cur_tag_close'] = "</b></span></li>";
        $this->pagination->initialize($config); 
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0 ;
        $data['job'] = $this->dtbs->get_jobs($page, $config['per_page']);
        $this->load->view('front/job_list',$data);   
    }

    public function resume_list()
    {
        $data['info'] = $this->Db->info();
        $result = $this->dtbs->resume_count();
        $this->load->library('pagination');  
        $config['base_url'] = base_url().'home/resume_list';
        $config['total_rows'] = $result;
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_tag_open'] = '<li>';
        $config['last_tag_open'] = '<li>';
        $config['next_tag_open'] = '<li>';
        $config['prev_tag_open'] = '<li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_close'] = '</li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class=\"active\"><span><b>";
        $config['cur_tag_close'] = "</b></span></li>";
        $this->pagination->initialize($config); 
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0 ;
        $data['resume'] = $this->dtbs->get_resume($page, $config['per_page']);
        $this->load->view('front/resume_list',$data);
    }

    public function post_job()
    {
        $data['info'] = $this->Db->info();
        $this->load->view('front/post_job',$data);
    }

    public function resume()
    {
        $data['info'] = $this->Db->info();
        $this->load->view('front/resume',$data);
    }

    public function vacancies()
    { 
        $data['info'] = $this->Db->info();
        $result = $this->dtbs->job_count();
        $this->load->library('pagination');  
        $config['base_url'] = base_url().'home/vacancies';
        $config['total_rows'] = $result;
        $config['per_page'] = 20;
        $config['uri_segment'] = 3;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_tag_open'] = '<li>';
        $config['last_tag_open'] = '<li>';
        $config['next_tag_open'] = '<li>';
        $config['prev_tag_open'] = '<li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_close'] = '</li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class=\"active\"><span><b>";
        $config['cur_tag_close'] = "</b></span></li>";
        $this->pagination->initialize($config); 
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0 ;
        $data['job'] = $this->dtbs->get_jobs($page, $config['per_page']);
        $this->load->view('front/vacancies',$data);
    }

  	public function contact()
  	{ 
  		$data['info'] = $this->Db->info();
  		$this->load->view('front/contact',$data);
  	}

    public function job_details()
    {
        $data['info'] = $this->Db->info();
        $this->load->view('front/job_details',$data);
    }

    public function resume_details($id)
    {   
        $data['info'] = $this->Db->info();
        $result = $this->dtbs->resume_details($id);
        $data['resume'] = $result;
        $this->load->view('front/resume_details',$data);
    }


	  public function program_details($sef)
    {
    	  $data['info'] = $this->Db->info();
        $result = $this->dtbs->program_details($sef);
        $data['program'] = $result;
        $this->load->view('front/programs/details/program_details',$data);
    }

    public function send_message()
    {
        $this->load->library('form_validation');
        $this->load->helper('security');
        $this->form_validation->set_rules('fullname','Ad Soyad','trim|required|min_length[5]|xss_clean');
        $this->form_validation->set_rules('email','Email','trim|required|valid_email|xss_clean');
        $this->form_validation->set_rules('phone','Telefon','trim|required|xss_clean');
        $this->form_validation->set_rules('message', 'Mesaj','trim|required|xss_clean');
        $xetalar = array(
                         'required'    => "{field} xanasını doldurmaq məcburidir",
                         'min_length'  => "ad soyad ən az 5 hərf olmalıdır telefon",
                         'valid_email' => "{field} - email adresini yoxlayın..!"
                        );
        $this->form_validation->set_message($xetalar);
        if ($this->form_validation->run() == FALSE) 
        {
            $this->session->set_flashdata('info','<blockquote class="blockquote">
												     <p>'.$xetalar['info']=validation_errors().'</p>
												  </blockquote>');
            redirect($_SERVER['HTTP_REFERER']);
        } 
        else 
        {
        
            $fullname    = $this->input->post('fullname',true);
            $email       = $this->input->post('email',true);
            $message     = $this->input->post('message',true);
            $phone       = $this->input->post('phone');
            $ip          = $this->input->post('ip');
            $status      = 0;
            $m_date      = date('d-m-Y');
            $data = [
                      'fullname'    => $fullname,
                      'email'       => $email,
                      'message'     => $message,
                      'phone'       => $phone,
                      'ip'          => $ip,
                      'status'      => $status,
                      'm_date'      => $m_date
                    ];

            $result = $this->dtbs->insert('message',$data);
            if($result)
            {
                $this->session->set_flashdata('info', '<blockquote class="blockquote">
                                                          <strong>Təşəkkürlər</strong>
                                                          <p>Qısa bir zamanda mesajınıza cavab göndəriləcəkdir</p>
                                                        </blockquote>');
                redirect($_SERVER['HTTP_REFERER']);
            }
            else
            {
                $this->session->set_flashdata('info','<blockquote class="blockquote">
                                                        <strong>Təəsüf ki,</strong>
                                                        <p>Mesaj göndərmək mümkün olmadı.Daha sonra təkrar cəhd edin..</p>
                                                      </blockquote>');
                redirect($_SERVER['HTTP_REFERER']);
            }
        }
    }


   public function cv_post()
   {
     $config['upload_path']   = FCPATH.'assets/front/images/cv';
     $config['allowed_types'] = '*';
     $config['encrypt_name']  = TRUE;
     $this->load->library('upload', $config);
       
       if($this->upload->do_upload('image'))
       {
         //tmb operation start
         $image                    = $this->upload->data();
         $image_path               = $image['file_name'];
         $image_save               = 'assets/front/images/cv/'.$image_path.'';
         $image_tmb                = 'assets/front/images/cv/tmb/'.$image_path.'';
         $config['image_library']  = 'gd2';
         $config['source_image']   = 'assets/front/images/cv/'.$image_path.'';
         $config['new_image']      = 'assets/front/images/cv/tmb/'.$image_path.'';
         $config['create_thumb']   = false;
         $config['maintain_ratio'] = false;
         $config['quality']        = '60%';
         $config['width']          = 400;
         $config['height']         = 300;
         $this->load->library('image_lib',$config);
         $this->image_lib->initialize($config);
         $this->image_lib->resize();
         $this->image_lib->clear();
         //tmb operation end
          $data =  [
                    'image'        => $image_save,
                    'tmb'          => $image_tmb,
                    'fullname'     => trim(strip_tags(htmlspecialchars($this->input->post('fullname')))),
                    'gender'       => trim(strip_tags(htmlspecialchars($this->input->post('gender')))),
                    'age'          => trim(strip_tags(htmlspecialchars($this->input->post('age')))),
                    'education'    => trim(strip_tags(htmlspecialchars($this->input->post('education')))),
                    'edu_info'     => trim(strip_tags(htmlspecialchars($this->input->post('edu_info')))),
                    'experience'   => trim(strip_tags(htmlspecialchars($this->input->post('experience')))),
                    'exp_info'     => trim(strip_tags(htmlspecialchars($this->input->post('exp_info')))),
                    'sub_category' => trim(strip_tags(htmlspecialchars($this->input->post('sub_category')))),
                    'category'     => trim(strip_tags(htmlspecialchars(get_subcategory($this->input->post('sub_category'))['category_id']))),
                    'city'         => trim(strip_tags(htmlspecialchars($this->input->post('city')))),
                    'position'     => trim(strip_tags(htmlspecialchars($this->input->post('position')))),
                    'min_salary'   => trim(strip_tags(htmlspecialchars($this->input->post('min_salary')))),
                    'skills'       => trim(strip_tags(htmlspecialchars($this->input->post('skills')))),
                    'info'         => trim(strip_tags(htmlspecialchars($this->input->post('info')))),
                    'email'        => trim(strip_tags(htmlspecialchars($this->input->post('email')))),
                    'phone'        => trim(strip_tags(htmlspecialchars($this->input->post('phone')))),
                    'start_date'   => date('Y-m-d'),
                    'home_phone'   => trim(strip_tags(htmlspecialchars($this->input->post('home_phone')))),
                    'adress'       => trim(strip_tags(htmlspecialchars($this->input->post('adress')))),
                    'language'     => trim(strip_tags(htmlspecialchars($this->input->post('language')))),
                    'website'      => trim(strip_tags(htmlspecialchars($this->input->post('website')))),
                    'work_time'    => trim(strip_tags(htmlspecialchars($this->input->post('work_time')))),
                    'status'       => $status = 0
                  ];
          $result = $this->dtbs->insert('cv_list',$data);
          if($result)
          {
              $this->session->set_flashdata('info', '<blockquote class="blockquote">
                                                          <strong>Təşəkkürlər</strong>
                                                          <p>Cv-niz yoxlanılacaq əgər qaydalara zidd hər hansı bir hal rast gəlinməzsə, paylaşılacaqdır</p>
                                                        </blockquote>');
              redirect('home/cv');
          }
          else
          {
              $this->session->set_flashdata('info', '<blockquote class="blockquote">
                                                          <strong>Sistem xətası!</strong>
                                                          <p>Cv-niz yüklenmedi, daha sonra təkrar cəhd edin və ya əlaqə bölməsindən bizə yazın.Təşəkkürlər</p>
                                                        </blockquote>');
              redirect('home/cv');
          }

     }
   }


   public function job_post()
   {   
      $data =  [
                'firma'        => trim(strip_tags(htmlspecialchars($this->input->post('firma')))),
                'sub_category' => trim(strip_tags(htmlspecialchars($this->input->post('sub_category')))),
                'category'     => trim(strip_tags(htmlspecialchars(get_subcategory($this->input->post('sub_category'))['category_id']))),
                'salary'       => trim(strip_tags(htmlspecialchars($this->input->post('salary')))),
                'position'     => trim(strip_tags(htmlspecialchars($this->input->post('position')))),
                'job_info'     => trim(strip_tags(htmlspecialchars($this->input->post('job_info')))),
                'job_skills'   => trim(strip_tags(htmlspecialchars($this->input->post('job_skills')))),
                'city'         => trim(strip_tags(htmlspecialchars($this->input->post('city')))),
                'education'    => trim(strip_tags(htmlspecialchars($this->input->post('education')))),
                'min_age'      => trim(strip_tags(htmlspecialchars($this->input->post('min_age')))),
                'max_age'      => trim(strip_tags(htmlspecialchars($this->input->post('max_age')))),
                'gender'       => trim(strip_tags(htmlspecialchars($this->input->post('gender')))),
                'experience'   => trim(strip_tags(htmlspecialchars($this->input->post('experience')))),
                'start_date'   => date('Y-m-d'),
                'end_date'     => trim(strip_tags(htmlspecialchars($this->input->post('end_date')))),
                'related_user' => trim(strip_tags(htmlspecialchars($this->input->post('related_user')))),    
                'email'        => trim(strip_tags(htmlspecialchars($this->input->post('email')))),
                'phone'        => trim(strip_tags(htmlspecialchars($this->input->post('phone')))),
                'home_phone'   => trim(strip_tags(htmlspecialchars($this->input->post('home_phone')))),
                'work_time'    => trim(strip_tags(htmlspecialchars($this->input->post('work_time')))),
                'status'       => $status = 0
              ];
          $result = $this->dtbs->insert('job_list',$data);
          if($result)
          {
              $this->session->set_flashdata('info', '<blockquote class="blockquote">
                                                          <strong>Təşəkkürlər</strong>
                                                          <p>Elanınız yoxlanılacaq əgər qaydalara zidd hər hansı bir hal rast gəlinməzsə, paylaşılacaqdır</p>
                                                        </blockquote>');
              redirect('home/post_job');
          }
          else
          {
              $this->session->set_flashdata('info', '<blockquote class="blockquote">
                                                          <strong>Sistem xətası!</strong>
                                                          <p>Elanınız yüklənmədi, daha sonra təkrar cəhd edin və ya əlaqə bölməsindən bizə yazın.Təşəkkürlər</p>
                                                        </blockquote>');
              redirect('home/post_job');
          }
    }

}
