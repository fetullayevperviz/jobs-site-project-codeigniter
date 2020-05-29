<?php

class Admin extends CI_Controller {

    public function __construct()
    {
    	parent::__construct();
    	$control = session('read','adminlogin');
    	if(!$control)
    	{
    		redirect('login');
    	}
    }

	public function index()
	{
		$this->load->view('back/panel');
	}

	public function settings()
	{
		$data['settings'] = $this->Db->single('settings',array('id'=>1));
		$this->load->view('back/settings/anasehife',$data);
	}

  public function settings_update($id)
  {
      $result = $this->dtbs->show($id,'settings');
      $data['info'] = $result;
      $this->load->view('back/settings/edit/anasehife',$data);
  }

    public function settings_edit()
    {
       $id     = $this->input->post('id');
       $config['upload_path']   = FCPATH.'assets/front/images/logo';
       $config['allowed_types'] = '*';
       $config['encrypt_name']  = TRUE;
       $this->load->library('upload', $config);
       
       if($this->upload->do_upload('image'))
       {
         //tmb operation start
         $image                    = $this->upload->data();
         $image_path               = $image['file_name'];
         $image_save               = 'assets/front/images/logo/'.$image_path.'';
         $image_tmb                = 'assets/front/images/logo/tmb/'.$image_path.'';
         $config['image_library']  = 'gd2';
         $config['source_image']   = 'assets/front/images/logo/'.$image_path.'';
         $config['new_image']      = 'assets/front/images/logo/tmb/'.$image_path.'';
         $config['create_thumb']   = false;
         $config['maintain_ratio'] = false;
         $config['quality']        = '60%';
         $config['width']          = 190;
         $config['height']         = 44;
         $this->load->library('image_lib',$config);
         $this->image_lib->initialize($config);
         $this->image_lib->resize();
         $this->image_lib->clear();
         //tmb operation end
         
         $image_delete      = logo_image($id);
         $tmb_image_delete  = logo_tmb_image($id);
         unlink($image_delete);
         unlink($tmb_image_delete);

          $data = [
                    'image'          => $image_save,
                    'tmb'            => $image_tmb,
                    'title'          => trim(strip_tags(htmlspecialchars($this->input->post('title')))),
                    'project_about'  => trim(strip_tags(htmlspecialchars($this->input->post('project_about')))),
                    'job_procedure'  => trim(strip_tags(htmlspecialchars($this->input->post('job_procedure')))),
                    'contact'        => trim(strip_tags(htmlspecialchars($this->input->post('pcontact')))),
                    'site_url'       => trim(strip_tags(htmlspecialchars($this->input->post('site_url')))), 
                    'email'          => trim(strip_tags(htmlspecialchars($this->input->post('email')))),
                    'phone'          => trim(strip_tags(htmlspecialchars($this->input->post('phone')))),
                    'home_phone'     => trim(strip_tags(htmlspecialchars($this->input->post('home_phone')))),
                    'copyright_text' => trim(strip_tags(htmlspecialchars($this->input->post('copyright_text')))),
                    'adress'         => trim(strip_tags(htmlspecialchars($this->input->post('adress')))),
                    'site_keyword'   => trim(strip_tags(htmlspecialchars($this->input->post('site_keyword')))),
                    'location'       => trim(strip_tags(htmlspecialchars($this->input->post('location')))),
                    'slider_text1'   => trim(strip_tags(htmlspecialchars($this->input->post('slider_text1')))),
                    'slider_text2'   => trim(strip_tags(htmlspecialchars($this->input->post('slider_text2'))))
                  ];
          $result = $this->dtbs->update($data,$id,'id','settings');
          if($result)
          {
            $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                   fade show">
                                                      <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                      <strong>Başarılı!</strong><br>
                                                      Parametrlər Yeniləndi.. 
                                                     </div>');
            redirect('admin/settings');
          }
          else
          {
            $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                   fade show">
                                                      <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                      <strong>Xətalı!</strong><br>
                                                      Parametrlər Yenilənmədi.. 
                                                     </div>');
            redirect('admin/settings');
          }

      }
      else
      {
          $data = [
                    'image'          => $image_save,
                    'tmb'            => $image_tmb,
                    'title'          => trim(strip_tags(htmlspecialchars($this->input->post('title')))),
                    'project_about'  => trim(strip_tags(htmlspecialchars($this->input->post('project_about')))),
                    'job_procedure'  => trim(strip_tags(htmlspecialchars($this->input->post('job_procedure')))),
                    'contact'        => trim(strip_tags(htmlspecialchars($this->input->post('pcontact')))),
                    'site_url'       => trim(strip_tags(htmlspecialchars($this->input->post('site_url')))), 
                    'email'          => trim(strip_tags(htmlspecialchars($this->input->post('email')))),
                    'phone'          => trim(strip_tags(htmlspecialchars($this->input->post('phone')))),
                    'home_phone'     => trim(strip_tags(htmlspecialchars($this->input->post('home_phone')))),
                    'copyright_text' => trim(strip_tags(htmlspecialchars($this->input->post('copyright_text')))),
                    'adress'         => trim(strip_tags(htmlspecialchars($this->input->post('adress')))),
                    'site_keyword'   => trim(strip_tags(htmlspecialchars($this->input->post('site_keyword')))),
                    'location'       => trim(strip_tags(htmlspecialchars($this->input->post('location')))),
                    'slider_text1'   => trim(strip_tags(htmlspecialchars($this->input->post('slider_text1')))),
                    'slider_text2'   => trim(strip_tags(htmlspecialchars($this->input->post('slider_text2'))))
                  ];
          $result = $this->dtbs->update($data,$id,'id','settings');
          if($result)
          {
            $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                   fade show">
                                                      <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                      <strong>Başarılı!</strong><br>
                                                      Parametrlər Yeniləndi.. 
                                                     </div>');
            redirect('admin/settings');
          }
          else
          {
            $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                   fade show">
                                                      <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                      <strong>Xətalı!</strong><br>
                                                      Parametrlər Yenilənmədi.. 
                                                     </div>');
            redirect('admin/settings');
          }

      }
     }

   public function profile()
   {
      $info = session('read','admininfo');
      $userId = $info->id;
      $result = $this->dtbs->profile_info('admin', $userId);
      $data['info'] = $result;
      $this->load->view('back/profile/anasehife',$data);
   }


  	public function close()
  	{
  		$this->session->sess_destroy();
  		redirect('login');
  	}

   public function users()
   {
      $result = $this->dtbs->list('admin');
      $data['info'] = $result;
      $this->load->view('back/users/anasehife',$data);
   }

   public function user_add()
   {
     $result = $this->dtbs->list('admin');
     $data['info'] = $result;
     $this->load->view('back/users/insert/anasehife', $data);
   }

   public function user_insert()
   {
     $config['upload_path']   = FCPATH.'assets/front/images/users';
     $config['allowed_types'] = '*';
     $config['encrypt_name']  = TRUE;
     $this->load->library('upload', $config);
       
       if($this->upload->do_upload('image'))
       {
         //tmb operation start
         $image                    = $this->upload->data();
         $image_path               = $image['file_name'];
         $image_save               = 'assets/front/images/users/'.$image_path.'';
         $image_tmb                = 'assets/front/images/users/tmb/'.$image_path.'';
         $config['image_library']  = 'gd2';
         $config['source_image']   = 'assets/front/images/users/'.$image_path.'';
         $config['new_image']      = 'assets/front/images/users/tmb/'.$image_path.'';
         $config['create_thumb']   = false;
         $config['maintain_ratio'] = false;
         $config['quality']        = '60%';
         $config['width']          = 300;
         $config['height']         = 200;
         $this->load->library('image_lib',$config);
         $this->image_lib->initialize($config);
         $this->image_lib->resize();
         $this->image_lib->clear();
         //tmb operation end
          $data =  [
                    'image'       => $image_save,
                    'tmb'         => $image_tmb,
                    'fullname'    => trim(strip_tags(htmlspecialchars($this->input->post('fullname')))),
                    'username'    => trim(strip_tags(htmlspecialchars($this->input->post('username')))),
                    'email'       => trim(strip_tags(htmlspecialchars($this->input->post('email')))),
                    'phone'       => trim(strip_tags(htmlspecialchars($this->input->post('phone')))),
                    'adress'      => trim(strip_tags(htmlspecialchars($this->input->post('adress')))),
                    'position'    => trim(strip_tags(htmlspecialchars($this->input->post('position')))),
                    'age'         => trim(strip_tags(htmlspecialchars($this->input->post('age')))),
                    'city'        => trim(strip_tags(htmlspecialchars($this->input->post('city')))),
                    'info'        => trim(strip_tags(htmlspecialchars($this->input->post('info')))),
                    'pass'        => trim(strip_tags(htmlspecialchars(sha1(md5($this->input->post('pass')))))),
                    'permission'  => $this->input->post('permission')
                  ];
          $result = $this->dtbs->insert('admin',$data);
          if($result)
          {
              $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                   fade show">
                                                      <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                      <strong>Başarılı!</strong><br>
                                                      İstifadəçi Əlavə Edildi.. 
                                                     </div>');
              redirect('admin/users');
          }
          else
          {
              $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                   fade show">
                                                      <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                      <strong>Xətalı!</strong><br>
                                                      İstifadəçi Əlavə Edilmədi
                                                     </div>');
              redirect('admin/users');
          }

     }
   }

   public function user_update($id)
   {
       $result       = $this->dtbs->show($id,'admin');
       $data['info'] = $result;
       $this->load->view('back/users/edit/anasehife',$data);
   }

 public function user_edit()
 {
     $id     = $this->input->post('id');
  
     $config['upload_path']   = FCPATH.'assets/front/images/users';
     $config['allowed_types'] = '*';
     $config['encrypt_name']  = TRUE;
     $this->load->library('upload', $config);
     
     if($this->upload->do_upload('image'))
     {
       //tmb operation start
       $image                    = $this->upload->data();
       $image_path               = $image['file_name'];
       $image_save               = 'assets/front/images/users/'.$image_path.'';
       $image_tmb                = 'assets/front/images/users/tmb/'.$image_path.'';
       $config['image_library']  = 'gd2';
       $config['source_image']   = 'assets/front/images/users/'.$image_path.'';
       $config['new_image']      = 'assets/front/images/users/tmb/'.$image_path.'';
       $config['create_thumb']   = false;
       $config['maintain_ratio'] = false;
       $config['quality']        = '60%';
       $config['width']          = 300;
       $config['height']         = 200;
       $this->load->library('image_lib',$config);
       $this->image_lib->initialize($config);
       $this->image_lib->resize();
       $this->image_lib->clear();
       //tmb operation end
       
       $image_delete      = user_image($id);
       $tmb_image_delete  = user_tmb_image($id);
       unlink($image_delete);
       unlink($tmb_image_delete);

        $data = [
                  'image'         => $image_save,
                  'tmb'           => $image_tmb,
                  'fullname'      => trim(strip_tags(htmlspecialchars($this->input->post('fullname')))),
                  'username'      => trim(strip_tags(htmlspecialchars($this->input->post('username')))),
                  'email'         => trim(strip_tags(htmlspecialchars($this->input->post('email')))),
                  'phone'         => trim(strip_tags(htmlspecialchars($this->input->post('phone')))),
                  'adress'        => trim(strip_tags(htmlspecialchars($this->input->post('adress')))),
                  'position'      => trim(strip_tags(htmlspecialchars($this->input->post('position')))),
                  'age'           => trim(strip_tags(htmlspecialchars($this->input->post('age')))),
                  'city'          => trim(strip_tags(htmlspecialchars($this->input->post('city')))),
                  'info'          => trim(strip_tags(htmlspecialchars($this->input->post('info')))),
                  'pass'          => trim(strip_tags(htmlspecialchars(sha1(md5($this->input->post('pass')))))),
                  'permission'    => $this->input->post('permission')
                ];
        $result = $this->dtbs->update($data,$id,'id','admin');
        if($result)
        {
          $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                 fade show">
                                                    <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                    <strong>Başarılı!</strong><br>
                                                    İstifadəçi Məlumatları Yeniləndi.. 
                                                   </div>');
          redirect('admin/users');
        }
        else
        {
          $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                 fade show">
                                                    <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                    <strong>Xətalı!</strong><br>
                                                    İstifadəçi Məlumatları Yenilənmədi.. 
                                                   </div>');
          redirect('admin/users');
        }

    }
    else
    {
        $data = [
                  'id'            => $this->input->post('id'),
                  'fullname'      => trim(strip_tags(htmlspecialchars($this->input->post('fullname')))),
                  'username'      => trim(strip_tags(htmlspecialchars($this->input->post('username')))),
                  'email'         => trim(strip_tags(htmlspecialchars($this->input->post('email')))),
                  'phone'         => trim(strip_tags(htmlspecialchars($this->input->post('phone')))),
                  'adress'        => trim(strip_tags(htmlspecialchars($this->input->post('adress')))),
                  'position'      => trim(strip_tags(htmlspecialchars($this->input->post('position')))),
                  'age'           => trim(strip_tags(htmlspecialchars($this->input->post('age')))),
                  'city'          => trim(strip_tags(htmlspecialchars($this->input->post('city')))),
                  'info'          => trim(strip_tags(htmlspecialchars($this->input->post('info')))),
                  'permission'    => $this->input->post('permission')
                ];
        $result = $this->dtbs->update($data,$id,'id','admin');
        if($result)
        {
          $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                 fade show">
                                                    <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                    <strong>Başarılı!</strong><br>
                                                    İstifadəçi Məlumatları Yeniləndi.. 
                                                   </div>');
          redirect('admin/users');
        }
        else
        {
          $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                 fade show">
                                                    <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                    <strong>Xətalı!</strong><br>
                                                    İstifadəçi Məlumatları Yenilənmədi.. 
                                                   </div>');
          redirect('admin/users');
        }

    }

 }

   public function user_delete($id,$where,$from)
   {

      $image_delete      = user_image($id);
      $tmb_image_delete  = user_tmb_image($id);
      unlink($image_delete);
      unlink($tmb_image_delete);

      $result = $this->dtbs->delete($id,$where,$from);
      if($result)
      {
          $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                 fade show">
                                                    <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                    <strong>Başarılı!</strong><br>
                                                    İstifadəçi Silindi.. 
                                                   </div>');
          redirect('admin/users');
      }
      else
      {
          $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                 fade show">
                                                    <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                    <strong>Xətalı!</strong><br>
                                                    İstifadəçi Silinmədi.. 
                                                   </div>');
          redirect('admin/users');
      }
   }

     public function sliders()
     {
        $result = $this->dtbs->list('slider');
        $data['info'] = $result;
        $this->load->view('back/slider/anasehife',$data);
     }

     public function slider_add()
     {
       $result = $this->dtbs->list('slider');
       $data['info'] = $result;
       $this->load->view('back/slider/insert/anasehife', $data);
     }

     public function slider_insert()
     {
       $config['upload_path']   = FCPATH.'assets/front/images/slider';
       $config['allowed_types'] = '*';
       $config['encrypt_name']  = TRUE;
       $this->load->library('upload', $config);
         
         if($this->upload->do_upload('image'))
         {
           //tmb operation start
           $image                    = $this->upload->data();
           $image_path               = $image['file_name'];
           $image_save               = 'assets/front/images/slider/'.$image_path.'';
           $image_tmb                = 'assets/front/images/slider/tmb/'.$image_path.'';
           $config['image_library']  = 'gd2';
           $config['source_image']   = 'assets/front/images/slider/'.$image_path.'';
           $config['new_image']      = 'assets/front/images/slider/tmb/'.$image_path.'';
           $config['create_thumb']   = false;
           $config['maintain_ratio'] = false;
           $config['quality']        = '60%';
           $config['width']          = 1900;
           $config['height']         = 1267;
           $this->load->library('image_lib',$config);
           $this->image_lib->initialize($config);
           $this->image_lib->resize();
           $this->image_lib->clear();
           //tmb operation end
            $data =  [
                      'image'       => $image_save,
                      'tmb'         => $image_tmb,
                      'image_text1' => $this->input->post('image_text1',true),
                      'image_text2' => $this->input->post('image_text2',true),
                      'status'     =>  $status = 0
                    ];
            $result = $this->dtbs->insert('slider',$data);
            if($result)
            {
                $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Başarılı!</strong><br>
                                                        Slider Əlavə Edildi.. 
                                                       </div>');
                redirect('admin/sliders');
            }
            else
            {
                $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Xətalı!</strong><br>
                                                        Slider Əlavə Edilmədi
                                                       </div>');
                redirect('admin/sliders');
            }

       }
     }

     public function slider_update($id)
     {
         $result       = $this->dtbs->show($id,'slider');
         $data['info'] = $result;
         $this->load->view('back/slider/edit/anasehife',$data);
     }


     public function slider_edit()
     {
         $id     = $this->input->post('id');
         $status = $this->input->post('status');

         $config['upload_path']   = FCPATH.'assets/front/images/slider';
         $config['allowed_types'] = '*';
         $config['encrypt_name']  = TRUE;
         $this->load->library('upload', $config);
         
         if($this->upload->do_upload('image'))
         {
           //tmb operation start
           $image                    = $this->upload->data();
           $image_path               = $image['file_name'];
           $image_save               = 'assets/front/images/slider/'.$image_path.'';
           $image_tmb                = 'assets/front/images/slider/tmb/'.$image_path.'';
           $config['image_library']  = 'gd2';
           $config['source_image']   = 'assets/front/images/slider/'.$image_path.'';
           $config['new_image']      = 'assets/front/images/slider/tmb/'.$image_path.'';
           $config['create_thumb']   = false;
           $config['maintain_ratio'] = false;
           $config['quality']        = '60%';
           $config['width']          = 1900;
           $config['height']         = 1267;
           $this->load->library('image_lib',$config);
           $this->image_lib->initialize($config);
           $this->image_lib->resize();
           $this->image_lib->clear();
           //tmb operation end
           
           $image_delete      = slider_image($id);
           $tmb_image_delete  = slider_tmb_image($id);
           unlink($image_delete);
           unlink($tmb_image_delete);

            $data = [
                      'image'         => $image_save,
                      'tmb'           => $image_tmb,
                      'image_text1'   => trim(strip_tags(htmlspecialchars($this->input->post('image_text1')))),
                      'image_text2'   => trim(strip_tags(htmlspecialchars($this->input->post('image_text2')))),
                      'status'        => $status
                    ];
            $result = $this->dtbs->update($data,$id,'id','slider');
            if($result)
            {
              $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Başarılı!</strong><br>
                                                        Slider Yeniləndi.. 
                                                       </div>');
              redirect('admin/sliders');
            }
            else
            {
              $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Xətalı!</strong><br>
                                                        Slider Yenilənmədi.. 
                                                       </div>');
              redirect('admin/sliders');
            }

        }
        else
        {
            $data = [
                      'id'            => $this->input->post('id'),
                      'image_text1'   => trim(strip_tags(htmlspecialchars($this->input->post('image_text1')))),
                      'image_text2'   => trim(strip_tags(htmlspecialchars($this->input->post('image_text2')))),
                      'status'        => $status
                    ];
            $result = $this->dtbs->update($data,$id,'id','slider');
            if($result)
            {
              $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Başarılı!</strong><br>
                                                        Slider Yeniləndi.. 
                                                       </div>');
              redirect('admin/sliders');
            }
            else
            {
              $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Xətalı!</strong><br>
                                                        Slider Yenilənmədi.. 
                                                       </div>');
              redirect('admin/sliders');
            }

        }

     }

       public function slider_delete($id,$where,$from)
       {

          $image_delete      = slider_image($id);
          $tmb_image_delete  = slider_tmb_image($id);
          unlink($image_delete);
          unlink($tmb_image_delete);

          $result = $this->dtbs->delete($id,$where,$from);
          if($result)
          {
              $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Başarılı!</strong><br>
                                                        Slider Silindi.. 
                                                       </div>');
              redirect('admin/sliders');
          }
          else
          {
              $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Xətalı!</strong><br>
                                                        Slider Silinmədi.. 
                                                       </div>');
              redirect('admin/sliders');
          }
       }

     public function message()
     {
        $result = $this->dtbs->list('message');
        $data['info'] = $result;
        $this->load->view('back/message/anasehife',$data);
     }

     public function message_read($id)
     {
         $result       = $this->dtbs->show($id,'message');
         if($result)
         {
            $data['result'] = $result;
            $this->load->view('back/message/edit/anasehife',$data);
            $data = array('status'=>1);
            $this->dtbs->message_update($result['id'],$data);

         }
         
     }


     public function message_delete($id,$where,$from)
     {

        $result = $this->dtbs->delete($id,$where,$from);
        if($result)
        {
            $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Başarılı!</strong><br>
                                                        Mesaj Silindi.. 
                                                       </div>');
            redirect('admin/message');
        }
        else
        {
            $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Xətalı!</strong><br>
                                                        Mesaj Silindi.. 
                                                       </div>');
            redirect('admin/message');
        }
     }


     public function exercises()
     {
        $result = $this->dtbs->list('exercises');
        $data['info'] = $result;
        $this->load->view('back/exercises/anasehife',$data);
     }

     public function exercises_add()
     {
       $result = $this->dtbs->list('exercises');
       $data['info'] = $result;
       $this->load->view('back/exercises/insert/anasehife', $data);
     }

     public function exercises_insert()
     {
       $config['upload_path']   = FCPATH.'assets/front/images/exercises';
       $config['allowed_types'] = '*';
       $config['encrypt_name']  = TRUE;
       $this->load->library('upload', $config);
         
         if($this->upload->do_upload('image'))
         {
           //tmb operation start
           $image                    = $this->upload->data();
           $image_path               = $image['file_name'];
           $image_save               = 'assets/front/images/exercises/'.$image_path.'';
           $image_tmb                = 'assets/front/images/exercises/tmb/'.$image_path.'';
           $config['image_library']  = 'gd2';
           $config['source_image']   = 'assets/front/images/exercises/'.$image_path.'';
           $config['new_image']      = 'assets/front/images/exercises/tmb/'.$image_path.'';
           $config['create_thumb']   = false;
           $config['maintain_ratio'] = false;
           $config['quality']        = '60%';
           $config['width']          = 500;
           $config['height']         = 400;
           $this->load->library('image_lib',$config);
           $this->image_lib->initialize($config);
           $this->image_lib->resize();
           $this->image_lib->clear();
           //tmb operation end
            $data =  [
                      'image'       => $image_save,
                      'tmb'         => $image_tmb,
                      'status'      => $status = 0
                    ];
            $result = $this->dtbs->insert('exercises',$data);
            if($result)
            {
                $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Başarılı!</strong><br>
                                                        Məşq Şəkili Əlavə Edildi.. 
                                                       </div>');
                redirect('admin/exercises');
            }
            else
            {
                $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Xətalı!</strong><br>
                                                        Məşq Şəkili Əlavə Edilmədi
                                                       </div>');
                redirect('admin/exercises');
            }

       }
     }

     public function exercises_update($id)
     {
         $result       = $this->dtbs->show($id,'exercises');
         $data['info'] = $result;
         $this->load->view('back/exercises/edit/anasehife',$data);
     }


     public function exercises_edit()
     {
         $id     = $this->input->post('id');
         $status = $this->input->post('status');


         $config['upload_path']   = FCPATH.'assets/front/images/exercises';
         $config['allowed_types'] = '*';
         $config['encrypt_name']  = TRUE;
         $this->load->library('upload', $config);
         
         if($this->upload->do_upload('image'))
         {
           //tmb operation start
           $image                    = $this->upload->data();
           $image_path               = $image['file_name'];
           $image_save               = 'assets/front/images/exercises/'.$image_path.'';
           $image_tmb                = 'assets/front/images/exercises/tmb/'.$image_path.'';
           $config['image_library']  = 'gd2';
           $config['source_image']   = 'assets/front/images/exercises/'.$image_path.'';
           $config['new_image']      = 'assets/front/images/exercises/tmb/'.$image_path.'';
           $config['create_thumb']   = false;
           $config['maintain_ratio'] = false;
           $config['quality']        = '60%';
           $config['width']          = 500;
           $config['height']         = 400;
           $this->load->library('image_lib',$config);
           $this->image_lib->initialize($config);
           $this->image_lib->resize();
           $this->image_lib->clear();
           //tmb operation end
           
           $image_delete      = exercises_image($id);
           $tmb_image_delete  = exercises_tmb_image($id);
           unlink($image_delete);
           unlink($tmb_image_delete);

            $data = [
                      'image'         => $image_save,
                      'tmb'           => $image_tmb,
                      'status'        => $status
                    ];
            $result = $this->dtbs->update($data,$id,'id','exercises');
            if($result)
            {
              $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Başarılı!</strong><br>
                                                        Məşq Şəkili Yeniləndi.. 
                                                       </div>');
              redirect('admin/exercises');
            }
            else
            {
              $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Xətalı!</strong><br>
                                                        Məşq Şəkili Yenilənmədi.. 
                                                       </div>');
              redirect('admin/exercises');
            }

        }
        else
        {
            $data = [
                      'id'            => $this->input->post('id'),
                      'status'        => $status
                    ];
            $result = $this->dtbs->update($data,$id,'id','exercises');
            if($result)
            {
              $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Başarılı!</strong><br>
                                                        Məşq Şəkili Yeniləndi.. 
                                                       </div>');
              redirect('admin/exercises');
            }
            else
            {
              $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Xətalı!</strong><br>
                                                        Məşq Şəkili Yenilənmədi.. 
                                                       </div>');
              redirect('admin/exercises');
            }

        }

     }

       public function exercises_delete($id,$where,$from)
       {

          $image_delete      = exercises_image($id);
          $tmb_image_delete  = exercises_tmb_image($id);
          unlink($image_delete);
          unlink($tmb_image_delete);

          $result = $this->dtbs->delete($id,$where,$from);
          if($result)
          {
              $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Başarılı!</strong><br>
                                                        Məşq Şəkili Silindi.. 
                                                       </div>');
              redirect('admin/exercises');
          }
          else
          {
              $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Xətalı!</strong><br>
                                                        Məşq Şəkili Silinmədi.. 
                                                       </div>');
              redirect('admin/exercises');
          }
       }


     public function testimiones()
     {
        $result = $this->dtbs->list('testimiones');
        $data['info'] = $result;
        $this->load->view('back/testimiones/anasehife',$data);
     }

     public function testimiones_add()
     {
       $result = $this->dtbs->list('testimiones');
       $data['info'] = $result;
       $this->load->view('back/testimiones/insert/anasehife', $data);
     }

     public function testimiones_insert()
     {
       $config['upload_path']   = FCPATH.'assets/front/images/testimiones';
       $config['allowed_types'] = '*';
       $config['encrypt_name']  = TRUE;
       $this->load->library('upload', $config);
         
         if($this->upload->do_upload('image'))
         {
           //tmb operation start
           $image                    = $this->upload->data();
           $image_path               = $image['file_name'];
           $image_save               = 'assets/front/images/testimiones/'.$image_path.'';
           $image_tmb                = 'assets/front/images/testimiones/tmb/'.$image_path.'';
           $config['image_library']  = 'gd2';
           $config['source_image']   = 'assets/front/images/testimiones/'.$image_path.'';
           $config['new_image']      = 'assets/front/images/testimiones/tmb/'.$image_path.'';
           $config['create_thumb']   = false;
           $config['maintain_ratio'] = false;
           $config['quality']        = '60%';
           $config['width']          = 300;
           $config['height']         = 300;
           $this->load->library('image_lib',$config);
           $this->image_lib->initialize($config);
           $this->image_lib->resize();
           $this->image_lib->clear();
           //tmb operation end
            $data =  [
                      'image'       => $image_save,
                      'tmb'         => $image_tmb,
                      'fullname'    => $this->input->post('fullname',true),
                      'info'        => $this->input->post('info',true),
                      'status'      => $status = 0
                    ];
            $result = $this->dtbs->insert('testimiones',$data);
            if($result)
            {
                $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Başarılı!</strong><br>
                                                        Şəhadətnamə Əlavə Edildi.. 
                                                       </div>');
                redirect('admin/testimiones');
            }
            else
            {
                $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Xətalı!</strong><br>
                                                        Şəhadətnamə Əlavə Edilmədi
                                                       </div>');
                redirect('admin/testimiones');
            }

       }
     }

     public function testimiones_update($id)
     {
         $result       = $this->dtbs->show($id,'testimiones');
         $data['info'] = $result;
         $this->load->view('back/testimiones/edit/anasehife',$data);
     }


     public function testimiones_edit()
     {
         $id     = $this->input->post('id');
         $status = $this->input->post('status');
         $config['upload_path']   = FCPATH.'assets/front/images/testimiones';
         $config['allowed_types'] = '*';
         $config['encrypt_name']  = TRUE;
         $this->load->library('upload', $config);
         
         if($this->upload->do_upload('image'))
         {
           //tmb operation start
           $image                    = $this->upload->data();
           $image_path               = $image['file_name'];
           $image_save               = 'assets/front/images/testimiones/'.$image_path.'';
           $image_tmb                = 'assets/front/images/testimiones/tmb/'.$image_path.'';
           $config['image_library']  = 'gd2';
           $config['source_image']   = 'assets/front/images/testimiones/'.$image_path.'';
           $config['new_image']      = 'assets/front/images/testimiones/tmb/'.$image_path.'';
           $config['create_thumb']   = false;
           $config['maintain_ratio'] = false;
           $config['quality']        = '60%';
           $config['width']          = 300;
           $config['height']         = 300;
           $this->load->library('image_lib',$config);
           $this->image_lib->initialize($config);
           $this->image_lib->resize();
           $this->image_lib->clear();
           //tmb operation end
           
           $image_delete      = testimiones_image($id);
           $tmb_image_delete  = testimiones_tmb_image($id);
           unlink($image_delete);
           unlink($tmb_image_delete);

            $data = [
                      'image'         => $image_save,
                      'tmb'           => $image_tmb,
                      'fullname'      => trim(strip_tags(htmlspecialchars($this->input->post('fullname')))),
                      'info'          => trim(strip_tags(htmlspecialchars($this->input->post('info')))),
                      'status'        => $status
                    ];
            $result = $this->dtbs->update($data,$id,'id','testimiones');
            if($result)
            {
              $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Başarılı!</strong><br>
                                                        Şəhadətnamə Yeniləndi.. 
                                                       </div>');
              redirect('admin/testimiones');
            }
            else
            {
              $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Xətalı!</strong><br>
                                                        Şəhadətnamə Yenilənmədi.. 
                                                       </div>');
              redirect('admin/testimiones');
            }

        }
        else
        {
            $data = [
                      'id'            => $this->input->post('id'),
                      'fullname'      => trim(strip_tags(htmlspecialchars($this->input->post('fullname')))),
                      'info'          => trim(strip_tags(htmlspecialchars($this->input->post('info')))),
                      'status'        => $status
                    ];
            $result = $this->dtbs->update($data,$id,'id','testimiones');
            if($result)
            {
              $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Başarılı!</strong><br>
                                                        Şəhadətnamə Yeniləndi.. 
                                                       </div>');
              redirect('admin/testimiones');
            }
            else
            {
              $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Xətalı!</strong><br>
                                                        Şəhadətnamə Yenilənmədi.. 
                                                       </div>');
              redirect('admin/testimiones');
            }

        }

     }

       public function testimiones_delete($id,$where,$from)
       {

          $image_delete      = testimiones_image($id);
          $tmb_image_delete  = testimiones_tmb_image($id);
          unlink($image_delete);
          unlink($tmb_image_delete);

          $result = $this->dtbs->delete($id,$where,$from);
          if($result)
          {
              $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Başarılı!</strong><br>
                                                        Şəhadətnamə Silindi.. 
                                                       </div>');
              redirect('admin/testimiones');
          }
          else
          {
              $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Xətalı!</strong><br>
                                                        Şəhadətnamə Silinmədi.. 
                                                       </div>');
              redirect('admin/testimiones');
          }
       }

     public function cv_rules()
     {
        $result = $this->dtbs->list('cv_rules');
        $data['info'] = $result;
        $this->load->view('back/cv_rules/anasehife',$data);
     }

     public function cv_rules_add()
     {
       $result = $this->dtbs->list('cv_rules');
       $data['info'] = $result;
       $this->load->view('back/cv_rules/insert/anasehife', $data);
     }

     public function cv_rules_insert()
     {
            $data =  [
                      'text'    => trim(strip_tags(htmlspecialchars($this->input->post('text')))),
                      'status'  => $status = 0
                    ];
            $result = $this->dtbs->insert('cv_rules',$data);
            if($result)
            {
                $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Başarılı!</strong><br>
                                                        CV Qaydası Əlavə Edildi.. 
                                                       </div>');
                redirect('admin/cv_rules');
            }
            else
            {
                $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Xətalı!</strong><br>
                                                        CV Qaydası Əlavə Edilmədi
                                                       </div>');
                redirect('admin/cv_rules');
            }
     }

     public function cv_rules_update($id)
     {
         $result       = $this->dtbs->show($id,'cv_rules');
         $data['info'] = $result;
         $this->load->view('back/cv_rules/edit/anasehife',$data);
     }


     public function cv_rules_edit()
     {
         $id     = $this->input->post('id');
         $status = $this->input->post('status');
          
          $data = [
                    'text'     => trim(strip_tags(htmlspecialchars($this->input->post('text')))),
                    'status'   => $status
                  ];
            $result = $this->dtbs->update($data,$id,'id','cv_rules');
            if($result)
            {
              $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Başarılı!</strong><br>
                                                        CV Qaydası Yeniləndi.. 
                                                       </div>');
              redirect('admin/cv_rules');
            }
            else
            {
              $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Xətalı!</strong><br>
                                                        CV Qaydası Yenilənmədi.. 
                                                       </div>');
              redirect('admin/cv_rules');
            }

     }

       public function cv_rules_delete($id,$where,$from)
       {
          $result = $this->dtbs->delete($id,$where,$from);
          if($result)
          {
              $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Başarılı!</strong><br>
                                                        CV Qaydası Silindi.. 
                                                       </div>');
              redirect('admin/cv_rules');
          }
          else
          {
              $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Xətalı!</strong><br>
                                                        CV Qaydası Silinmədi.. 
                                                       </div>');
              redirect('admin/cv_rules');
          }
       }

    public function job_rules()
     {
        $result = $this->dtbs->list('job_rules');
        $data['info'] = $result;
        $this->load->view('back/job_rules/anasehife',$data);
     }

     public function job_rules_add()
     {
       $result = $this->dtbs->list('job_rules');
       $data['info'] = $result;
       $this->load->view('back/job_rules/insert/anasehife', $data);
     }

     public function job_rules_insert()
     {
            $data =  [
                      'text'    => trim(strip_tags(htmlspecialchars($this->input->post('text')))),
                      'status'  => $status = 0
                    ];
            $result = $this->dtbs->insert('job_rules',$data);
            if($result)
            {
                $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Başarılı!</strong><br>
                                                        Elan Qaydası Əlavə Edildi.. 
                                                       </div>');
                redirect('admin/job_rules');
            }
            else
            {
                $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Xətalı!</strong><br>
                                                        Elan Qaydası Əlavə Edilmədi
                                                       </div>');
                redirect('admin/job_rules');
            }
     }

     public function job_rules_update($id)
     {
         $result       = $this->dtbs->show($id,'job_rules');
         $data['info'] = $result;
         $this->load->view('back/job_rules/edit/anasehife',$data);
     }


     public function job_rules_edit()
     {
         $id     = $this->input->post('id');
         $status = $this->input->post('status');
          
          $data = [
                    'text'     => trim(strip_tags(htmlspecialchars($this->input->post('text')))),
                    'status'   => $status
                  ];
            $result = $this->dtbs->update($data,$id,'id','job_rules');
            if($result)
            {
              $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Başarılı!</strong><br>
                                                        Elan Qaydası Yeniləndi.. 
                                                       </div>');
              redirect('admin/job_rules');
            }
            else
            {
              $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Xətalı!</strong><br>
                                                        Elan Qaydası Yenilənmədi.. 
                                                       </div>');
              redirect('admin/job_rules');
            }

     }

       public function job_rules_delete($id,$where,$from)
       {
          $result = $this->dtbs->delete($id,$where,$from);
          if($result)
          {
              $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Başarılı!</strong><br>
                                                        Elan Qaydası Silindi.. 
                                                       </div>');
              redirect('admin/job_rules');
          }
          else
          {
              $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Xətalı!</strong><br>
                                                        Elan Qaydası Silinmədi.. 
                                                       </div>');
              redirect('admin/job_rules');
          }
       }

     public function social_media()
     {
        $result = $this->dtbs->list('social_media');
        $data['info'] = $result;
        $this->load->view('back/social_media/anasehife',$data);
     }

     public function social_add()
     {
       $result = $this->dtbs->list('social_media');
       $data['info'] = $result;
       $this->load->view('back/social_media/insert/anasehife', $data);
     }

     public function social_insert()
     {
            $data =  [
                      'title'       => trim(strip_tags(htmlspecialchars($this->input->post('title')))),
                      'link'        => trim(strip_tags(htmlspecialchars($this->input->post('link')))),
                      'icon'        => trim(strip_tags(htmlspecialchars($this->input->post('icon')))),
                      'status'      => $status = 0
                    ];
            $result = $this->dtbs->insert('social_media',$data);
            if($result)
            {
                $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Başarılı!</strong><br>
                                                        Sosial Şəbəkə Əlavə Edildi.. 
                                                       </div>');
                redirect('admin/social_media');
            }
            else
            {
                $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Xətalı!</strong><br>
                                                        Sosial Şəbəkə Əlavə Edilmədi
                                                       </div>');
                redirect('admin/social_media');
            }
     }

     public function social_update($id)
     {
         $result       = $this->dtbs->show($id,'social_media');
         $data['info'] = $result;
         $this->load->view('back/social_media/edit/anasehife',$data);
     }


     public function social_edit()
     {
         $id     = $this->input->post('id');
         $status = $this->input->post('status');
          
          $data = [
                    'title'         => trim(strip_tags(htmlspecialchars($this->input->post('title')))),
                    'link'          => trim(strip_tags(htmlspecialchars($this->input->post('link')))),
                    'icon'          => trim(strip_tags(htmlspecialchars($this->input->post('icon')))),
                    'status'        => $status
                  ];
            $result = $this->dtbs->update($data,$id,'id','social_media');
            if($result)
            {
              $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Başarılı!</strong><br>
                                                        Sosial Şəbəkə Hesabı Yeniləndi.. 
                                                       </div>');
              redirect('admin/social_media');
            }
            else
            {
              $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Xətalı!</strong><br>
                                                        Sosial Şəbəkə Hesabı Yenilənmədi.. 
                                                       </div>');
              redirect('admin/social_media');
            }

     }

       public function social_delete($id,$where,$from)
       {
          $result = $this->dtbs->delete($id,$where,$from);
          if($result)
          {
              $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Başarılı!</strong><br>
                                                        Sosial Şəbəkə Hesabı Silindi.. 
                                                       </div>');
              redirect('admin/social_media');
          }
          else
          {
              $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Xətalı!</strong><br>
                                                        Sosial Şəbəkə Hesabı Silinmədi.. 
                                                       </div>');
              redirect('admin/social_media');
          }
       }

     public function sub_categories()
     {
        $result = $this->dtbs->sub_list('sub_category');
        $data['info'] = $result;
        $this->load->view('back/sub_categories/anasehife',$data);
     }

     public function sub_category_add()
     {
       $result = $this->dtbs->list('sub_category');
       $data['info'] = $result;
       $this->load->view('back/sub_categories/insert/anasehife', $data);
     }

     public function sub_category_insert()
     {
        $data =  [
                  'category_id'    => $this->input->post('category_id'),
                  'sub_cat_name'   => trim(strip_tags(htmlspecialchars($this->input->post('sub_cat_name')))),
                  'status'         => $status = 0
                ];
        $result = $this->dtbs->insert('sub_category',$data);
        if($result)
        {
            $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                 fade show">
                                                    <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                    <strong>Başarılı!</strong><br>
                                                    Alt Kateqoriya Əlavə Edildi.. 
                                                   </div>');
            redirect('admin/sub_categories');
        }
        else
        {
            $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                 fade show">
                                                    <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                    <strong>Xətalı!</strong><br>
                                                    Alt Kateqoriya Əlavə Edilmədi
                                                   </div>');
            redirect('admin/sub_categories');
        }

     }


     public function sub_category_update($id)
     {
         $result       = $this->dtbs->show($id,'sub_category');
         $data['info'] = $result;
         $this->load->view('back/sub_categories/edit/anasehife',$data);
     }

      public function sub_category_edit()
     {
        $id     = $this->input->post('id');
        $status = $this->input->post('status');
        $data = [
                  'id'            => $this->input->post('id'),
                  'category_id'   => $this->input->post('category_id'),
                  'sub_cat_name'  => trim(strip_tags(htmlspecialchars($this->input->post('sub_cat_name')))),
                  'status'        => $status
                ];
        $result = $this->dtbs->update($data,$id,'id','sub_category');
        if($result)
        {
          $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                 fade show">
                                                    <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                    <strong>Başarılı!</strong><br>
                                                    Alt Kateqoriya Yeniləndi.. 
                                                   </div>');
          redirect('admin/sub_categories');
        }
        else
        {
          $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                 fade show">
                                                    <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                    <strong>Xətalı!</strong><br>
                                                    Alt Kateqoriya Yenilənmədi.. 
                                                   </div>');
          redirect('admin/sub_categories');
        }

     }

     public function sub_category_delete($id,$where,$from)
     {
        $result = $this->dtbs->delete($id,$where,$from);
        if($result)
        {
            $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                   fade show">
                                                      <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                      <strong>Başarılı!</strong><br>
                                                      Alt Kateqoriya Silindi.. 
                                                     </div>');
            redirect('admin/sub_categories');
        }
        else
        {
            $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                   fade show">
                                                      <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                      <strong>Xətalı!</strong><br>
                                                      Alt Kateqoriya Silinmədi.. 
                                                     </div>');
            redirect('admin/sub_categories');
        }
     }

     public function city()
     {
        $result = $this->dtbs->list('city');
        $data['info'] = $result;
        $this->load->view('back/city/anasehife',$data);
     }

     public function city_add()
     {
       $result = $this->dtbs->list('city');
       $data['info'] = $result;
       $this->load->view('back/city/insert/anasehife', $data);
     }

     public function city_insert()
     {
        $data =  [
                  'city_name'    => trim(strip_tags(htmlspecialchars($this->input->post('city_name')))),
                  'status'      => $status = 0
                ];
        $result = $this->dtbs->insert('city',$data);
        if($result)
        {
            $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                 fade show">
                                                    <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                    <strong>Başarılı!</strong><br>
                                                    Şəhər Əlavə Edildi.. 
                                                   </div>');
            redirect('admin/city');
        }
        else
        {
            $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                 fade show">
                                                    <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                    <strong>Xətalı!</strong><br>
                                                    Şəhər Əlavə Edilmədi
                                                   </div>');
            redirect('admin/city');
        }

     }

     public function city_update($id)
     {
         $result       = $this->dtbs->show($id,'city');
         $data['info'] = $result;
         $this->load->view('back/city/edit/anasehife',$data);
     }


     public function city_edit()
     {
        $id     = $this->input->post('id');
        $status = $this->input->post('status');
        $data = [
                  'id'            => $this->input->post('id'),
                  'city_name'     => trim(strip_tags(htmlspecialchars($this->input->post('city_name')))),
                  'status'        => $status
                ];
        $result = $this->dtbs->update($data,$id,'id','city');
        if($result)
        {
          $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                 fade show">
                                                    <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                    <strong>Başarılı!</strong><br>
                                                    Şəhər Adı Yeniləndi.. 
                                                   </div>');
          redirect('admin/city');
        }
        else
        {
          $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                 fade show">
                                                    <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                    <strong>Xətalı!</strong><br>
                                                    Şəhər Adı Yenilənmədi.. 
                                                   </div>');
          redirect('admin/city');
        }

     }

     public function city_delete($id,$where,$from)
     {
        $result = $this->dtbs->delete($id,$where,$from);
        if($result)
        {
            $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                   fade show">
                                                      <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                      <strong>Başarılı!</strong><br>
                                                      Şəhər Adı Silindi.. 
                                                     </div>');
            redirect('admin/city');
        }
        else
        {
            $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                   fade show">
                                                      <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                      <strong>Xətalı!</strong><br>
                                                      Şəhər Adı Silinmədi.. 
                                                     </div>');
            redirect('admin/city');
        }
     }

     public function work_time()
     {
        $result = $this->dtbs->list('work_time');
        $data['info'] = $result;
        $this->load->view('back/work_time/anasehife',$data);
     }

     public function work_time_add()
     {
       $result = $this->dtbs->list('work_time');
       $data['info'] = $result;
       $this->load->view('back/work_time/insert/anasehife', $data);
     }

     public function work_time_insert()
     {
        $data =  [
                  'work'    => trim(strip_tags(htmlspecialchars($this->input->post('work')))),
                  'status'      => $status = 0
                ];
        $result = $this->dtbs->insert('work_time',$data);
        if($result)
        {
            $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                 fade show">
                                                    <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                    <strong>Başarılı!</strong><br>
                                                    İş Günü Əlavə Edildi.. 
                                                   </div>');
            redirect('admin/work_time');
        }
        else
        {
            $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                 fade show">
                                                    <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                    <strong>Xətalı!</strong><br>
                                                    İş Günü Əlavə Edilmədi
                                                   </div>');
            redirect('admin/work_time');
        }

     }

     public function work_time_update($id)
     {
         $result       = $this->dtbs->show($id,'work_time');
         $data['info'] = $result;
         $this->load->view('back/work_time/edit/anasehife',$data);
     }


     public function work_time_edit()
     {
        $id     = $this->input->post('id');
        $status = $this->input->post('status');
        $data = [
                  'id'            => $this->input->post('id'),
                  'work'          => trim(strip_tags(htmlspecialchars($this->input->post('work')))),
                  'status'        => $status
                ];
        $result = $this->dtbs->update($data,$id,'id','work_time');
        if($result)
        {
          $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                 fade show">
                                                    <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                    <strong>Başarılı!</strong><br>
                                                    İş Günü Yeniləndi.. 
                                                   </div>');
          redirect('admin/work_time');
        }
        else
        {
          $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                 fade show">
                                                    <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                    <strong>Xətalı!</strong><br>
                                                    İş Günü Yenilənmədi.. 
                                                   </div>');
          redirect('admin/work_time');
        }

     }

     public function work_time_delete($id,$where,$from)
     {
        $result = $this->dtbs->delete($id,$where,$from);
        if($result)
        {
            $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                   fade show">
                                                      <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                      <strong>Başarılı!</strong><br>
                                                      İş Günü Silindi.. 
                                                     </div>');
            redirect('admin/work_time');
        }
        else
        {
            $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                   fade show">
                                                      <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                      <strong>Xətalı!</strong><br>
                                                      İş Günü Silinmədi.. 
                                                     </div>');
            redirect('admin/work_time');
        }
     }

      public function gender()
     {
        $result = $this->dtbs->list('gender');
        $data['info'] = $result;
        $this->load->view('back/gender/anasehife',$data);
     }

     public function gender_add()
     {
       $result = $this->dtbs->list('gender');
       $data['info'] = $result;
       $this->load->view('back/gender/insert/anasehife', $data);
     }

     public function gender_insert()
     {
        $data =  [
                  'gender_name'    => trim(strip_tags(htmlspecialchars($this->input->post('gender_name')))),
                  'status'         => $status = 0
                ];
        $result = $this->dtbs->insert('gender',$data);
        if($result)
        {
            $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                 fade show">
                                                    <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                    <strong>Başarılı!</strong><br>
                                                    Cins Əlavə Edildi.. 
                                                   </div>');
            redirect('admin/gender');
        }
        else
        {
            $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                 fade show">
                                                    <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                    <strong>Xətalı!</strong><br>
                                                    Cins Əlavə Edilmədi
                                                   </div>');
            redirect('admin/gender');
        }

     }

     public function gender_update($id)
     {
         $result       = $this->dtbs->show($id,'gender');
         $data['info'] = $result;
         $this->load->view('back/gender/edit/anasehife',$data);
     }


     public function gender_edit()
     {
        $id     = $this->input->post('id');
        $status = $this->input->post('status');
        $data = [
                  'id'            => $this->input->post('id'),
                  'gender_name'   => trim(strip_tags(htmlspecialchars($this->input->post('gender_name')))),
                  'status'        => $status
                ];
        $result = $this->dtbs->update($data,$id,'id','gender');
        if($result)
        {
          $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                 fade show">
                                                    <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                    <strong>Başarılı!</strong><br>
                                                    Cins Yeniləndi.. 
                                                   </div>');
          redirect('admin/gender');
        }
        else
        {
          $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                 fade show">
                                                    <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                    <strong>Xətalı!</strong><br>
                                                    Cins Yenilənmədi.. 
                                                   </div>');
          redirect('admin/gender');
        }

     }

     public function gender_delete($id,$where,$from)
     {
        $result = $this->dtbs->delete($id,$where,$from);
        if($result)
        {
            $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                   fade show">
                                                      <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                      <strong>Başarılı!</strong><br>
                                                      Cins Silindi.. 
                                                     </div>');
            redirect('admin/gender');
        }
        else
        {
            $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                   fade show">
                                                      <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                      <strong>Xətalı!</strong><br>
                                                      Cins Silinmədi.. 
                                                     </div>');
            redirect('admin/gender');
        }
     }


     public function experience()
     {
        $result = $this->dtbs->list('experience');
        $data['info'] = $result;
        $this->load->view('back/experience/anasehife',$data);
     }

     public function experience_add()
     {
       $result = $this->dtbs->list('experience');
       $data['info'] = $result;
       $this->load->view('back/experience/insert/anasehife', $data);
     }

     public function experience_insert()
     {
        $data =  [
                  'exp'      => trim(strip_tags(htmlspecialchars($this->input->post('exp')))),
                  'status'   => $status = 0
                ];
        $result = $this->dtbs->insert('experience',$data);
        if($result)
        {
            $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                 fade show">
                                                    <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                    <strong>Başarılı!</strong><br>
                                                    İş Təcrübəsi Əlavə Edildi.. 
                                                   </div>');
            redirect('admin/experience');
        }
        else
        {
            $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                 fade show">
                                                    <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                    <strong>Xətalı!</strong><br>
                                                    İş Təcrübəsi Əlavə Edilmədi
                                                   </div>');
            redirect('admin/experience');
        }

     }

     public function experience_update($id)
     {
         $result       = $this->dtbs->show($id,'experience');
         $data['info'] = $result;
         $this->load->view('back/experience/edit/anasehife',$data);
     }


     public function experience_edit()
     {
        $id     = $this->input->post('id');
        $status = $this->input->post('status');
        $data = [
                  'id'       => $this->input->post('id'),
                  'exp'      => trim(strip_tags(htmlspecialchars($this->input->post('exp')))),
                  'status'   => $status
                ];
        $result = $this->dtbs->update($data,$id,'id','experience');
        if($result)
        {
          $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                 fade show">
                                                    <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                    <strong>Başarılı!</strong><br>
                                                    İş Təcrübəsi Yeniləndi.. 
                                                   </div>');
          redirect('admin/experience');
        }
        else
        {
          $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                 fade show">
                                                    <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                    <strong>Xətalı!</strong><br>
                                                    İş Təcrübəsi Yenilənmədi.. 
                                                   </div>');
          redirect('admin/experience');
        }

     }

     public function experience_delete($id,$where,$from)
     {
        $result = $this->dtbs->delete($id,$where,$from);
        if($result)
        {
            $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                   fade show">
                                                      <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                      <strong>Başarılı!</strong><br>
                                                      İş Təcrübəsi Silindi.. 
                                                     </div>');
            redirect('admin/experience');
        }
        else
        {
            $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                   fade show">
                                                      <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                      <strong>Xətalı!</strong><br>
                                                      İş Təcrübəsi Silinmədi.. 
                                                     </div>');
            redirect('admin/experience');
        }
     }
     

     public function education()
     {
        $result = $this->dtbs->list('education');
        $data['info'] = $result;
        $this->load->view('back/education/anasehife',$data);
     }

     public function edu_name_add()
     {
       $result = $this->dtbs->list('education');
       $data['info'] = $result;
       $this->load->view('back/education/insert/anasehife', $data);
     }

     public function edu_name_insert()
     {
        $data =  [
                  'edu_name'    => trim(strip_tags(htmlspecialchars($this->input->post('edu_name')))),
                  'status'      => $status = 0
                ];
        $result = $this->dtbs->insert('education',$data);
        if($result)
        {
            $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                 fade show">
                                                    <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                    <strong>Başarılı!</strong><br>
                                                    Təhsil Dərəcəsi Əlavə Edildi.. 
                                                   </div>');
            redirect('admin/education');
        }
        else
        {
            $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                 fade show">
                                                    <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                    <strong>Xətalı!</strong><br>
                                                    Təhsil Dərəcəsi Əlavə Edilmədi
                                                   </div>');
            redirect('admin/education');
        }

     }

     public function edu_name_update($id)
     {
         $result       = $this->dtbs->show($id,'education');
         $data['info'] = $result;
         $this->load->view('back/education/edit/anasehife',$data);
     }


     public function edu_name_edit()
     {
        $id     = $this->input->post('id');
        $status = $this->input->post('status');
        $data = [
                  'id'            => $this->input->post('id'),
                  'edu_name'     => trim(strip_tags(htmlspecialchars($this->input->post('edu_name')))),
                  'status'        => $status
                ];
        $result = $this->dtbs->update($data,$id,'id','education');
        if($result)
        {
          $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                 fade show">
                                                    <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                    <strong>Başarılı!</strong><br>
                                                    Təhsil Dərəcəsi Yeniləndi.. 
                                                   </div>');
          redirect('admin/education');
        }
        else
        {
          $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                 fade show">
                                                    <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                    <strong>Xətalı!</strong><br>
                                                    Təhsil Dərəcəsi Yenilənmədi.. 
                                                   </div>');
          redirect('admin/education');
        }

     }

     public function edu_name_delete($id,$where,$from)
     {
        $result = $this->dtbs->delete($id,$where,$from);
        if($result)
        {
            $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                   fade show">
                                                      <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                      <strong>Başarılı!</strong><br>
                                                      Təhsil Dərəcəsi Silindi.. 
                                                     </div>');
            redirect('admin/education');
        }
        else
        {
            $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                   fade show">
                                                      <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                      <strong>Xətalı!</strong><br>
                                                      Təhsil Dərəcəsi Silinmədi.. 
                                                     </div>');
            redirect('admin/education');
        }
     }

     public function categories()
     {
        $result = $this->dtbs->list('category');
        $data['info'] = $result;
        $this->load->view('back/categories/anasehife',$data);
     }

     public function category_add()
     {
       $result = $this->dtbs->list('category');
       $data['info'] = $result;
       $this->load->view('back/categories/insert/anasehife', $data);
     }

     public function category_insert()
     {
        $data =  [
                  'cat_name'    => trim(strip_tags(htmlspecialchars($this->input->post('cat_name')))),
                  'status'      => $status = 0
                ];
        $result = $this->dtbs->insert('category',$data);
        if($result)
        {
            $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                 fade show">
                                                    <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                    <strong>Başarılı!</strong><br>
                                                    Kateqoriya Əlavə Edildi.. 
                                                   </div>');
            redirect('admin/categories');
        }
        else
        {
            $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                 fade show">
                                                    <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                    <strong>Xətalı!</strong><br>
                                                    Kateqoriya Əlavə Edilmədi
                                                   </div>');
            redirect('admin/categories');
        }

     }

     public function category_update($id)
     {
         $result       = $this->dtbs->show($id,'category');
         $data['info'] = $result;
         $this->load->view('back/categories/edit/anasehife',$data);
     }


     public function category_edit()
     {
        $id     = $this->input->post('id');
        $status = $this->input->post('status');
        $data = [
                  'id'            => $this->input->post('id'),
                  'cat_name'      => trim(strip_tags(htmlspecialchars($this->input->post('cat_name')))),
                  'status'        => $status
                ];
        $result = $this->dtbs->update($data,$id,'id','category');
        if($result)
        {
          $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                 fade show">
                                                    <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                    <strong>Başarılı!</strong><br>
                                                    Kateqoriya Yeniləndi.. 
                                                   </div>');
          redirect('admin/categories');
        }
        else
        {
          $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                 fade show">
                                                    <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                    <strong>Xətalı!</strong><br>
                                                    Kateqoriya Yenilənmədi.. 
                                                   </div>');
          redirect('admin/categories');
        }

     }

     public function category_delete($id,$where,$from)
     {
        $result = $this->dtbs->delete($id,$where,$from);
        if($result)
        {
            $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                   fade show">
                                                      <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                      <strong>Başarılı!</strong><br>
                                                      Kateqoriya Silindi.. 
                                                     </div>');
            redirect('admin/categories');
        }
        else
        {
            $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                   fade show">
                                                      <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                      <strong>Xətalı!</strong><br>
                                                      Kateqoriya Silinmədi.. 
                                                     </div>');
            redirect('admin/categories');
        }
     }

       
   public function vacancies()
   {
      $result = $this->dtbs->list('job_list');
      $data['info'] = $result;
      $this->load->view('back/vacancies/anasehife',$data);
   }

   public function vacancy_update($id)
   {
       $result       = $this->dtbs->showJOB($id);
       $data['info'] = $result;
       $this->load->view('back/vacancies/edit/anasehife',$data);
   }

   public function vacancy_edit()
   {
       $id     = $this->input->post('id');     
       $data = [
                 'id'     => $id,
                 'status' => $this->input->post('status')
               ];
          $result = $this->dtbs->update($data,$id,'id','job_list');
          if($result)
          {
            $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                   fade show">
                                                      <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                      <strong>Başarılı!</strong><br>
                                                      Əməliyyat Tamamlandı... 
                                                     </div>');
            redirect('admin/vacancies');
          }
          else
          {
            $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                   fade show">
                                                      <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                      <strong>Xətalı!</strong><br>
                                                      Əməliyyat Tamamlanmadı... 
                                                     </div>');
            redirect('admin/vacancies');
          }
   }

     public function vacancy_delete($id,$where,$from)
     {
        $result = $this->dtbs->delete($id,$where,$from);
        if($result)
        {
            $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                   fade show">
                                                      <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                      <strong>Başarılı!</strong><br>
                                                      Elan Silindi.. 
                                                     </div>');
            redirect('admin/vacancies');
        }
        else
        {
            $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                   fade show">
                                                      <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                      <strong>Xətalı!</strong><br>
                                                      Elan Silinmədi.. 
                                                     </div>');
            redirect('admin/vacancies');
        }
     }


   public function resumes()
   {
      $result = $this->dtbs->list('cv_list');
      $data['info'] = $result;
      $this->load->view('back/resumes/anasehife',$data);
   }

   public function resume_update($id)
   {
       $result       = $this->dtbs->showCV($id);
       $data['info'] = $result;
       $this->load->view('back/resumes/edit/anasehife',$data);
   }

   public function resume_edit()
   {
       $id     = $this->input->post('id');     
       $data = [
                 'status' => $this->input->post('status')
               ];
          $result = $this->dtbs->update($data,$id,'id','cv_list');
          if($result)
          {
            $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                   fade show">
                                                      <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                      <strong>Başarılı!</strong><br>
                                                      CV aktiv edildi... 
                                                     </div>');
            redirect('admin/resumes');
          }
          else
          {
            $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                   fade show">
                                                      <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                      <strong>Xətalı!</strong><br>
                                                      CV aktiv edilmədi... 
                                                     </div>');
            redirect('admin/resumes');
          }
   }

     public function resume_delete($id,$where,$from)
     {

        $image_delete      = resume_image($id);
        $tmb_image_delete  = resume_tmb_image($id);
        unlink($image_delete);
        unlink($tmb_image_delete);

        $result = $this->dtbs->delete($id,$where,$from);
        if($result)
        {
            $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                   fade show">
                                                      <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                      <strong>Başarılı!</strong><br>
                                                      CV Silindi.. 
                                                     </div>');
            redirect('admin/resumes');
        }
        else
        {
            $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                   fade show">
                                                      <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                      <strong>Xətalı!</strong><br>
                                                      CV Silinmədi.. 
                                                     </div>');
            redirect('admin/resumes');
        }
     }


   public function programs()
   {
      $result = $this->dtbs->list('programs');
      $data['info'] = $result;
      $this->load->view('back/programs/anasehife',$data);
   }

   public function programs_add()
   {
     $result = $this->dtbs->list('programs');
     $data['info'] = $result;
     $this->load->view('back/programs/insert/anasehife', $data);
   }

   public function programs_insert()
   {
     $config['upload_path']   = FCPATH.'assets/front/images/programs';
     $config['allowed_types'] = '*';
     $config['encrypt_name']  = TRUE;
     $this->load->library('upload', $config);
       
       if($this->upload->do_upload('image'))
       {
         //tmb operation start
         $image                    = $this->upload->data();
         $image_path               = $image['file_name'];
         $image_save               = 'assets/front/images/programs/'.$image_path.'';
         $image_tmb                = 'assets/front/images/programs/tmb/'.$image_path.'';
         $config['image_library']  = 'gd2';
         $config['source_image']   = 'assets/front/images/programs/'.$image_path.'';
         $config['new_image']      = 'assets/front/images/programs/tmb/'.$image_path.'';
         $config['create_thumb']   = false;
         $config['maintain_ratio'] = false;
         $config['quality']        = '60%';
         $config['width']          = 500;
         $config['height']         = 400;
         $this->load->library('image_lib',$config);
         $this->image_lib->initialize($config);
         $this->image_lib->resize();
         $this->image_lib->clear();
         //tmb operation end
          $data =  [
                    'image'         => $image_save,
                    'tmb'           => $image_tmb,
                    'program_name'  => trim(strip_tags(htmlspecialchars($this->input->post('program_name')))),
                    'sef'           => permalink($this->input->post('program_name')),
                    'info'        => trim(strip_tags(htmlspecialchars($this->input->post('info')))),
                    'status'      => $status = 0
                  ];
          $result = $this->dtbs->insert('programs',$data);
          if($result)
          {
              $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                   fade show">
                                                      <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                      <strong>Başarılı!</strong><br>
                                                      Proqram Əlavə Edildi.. 
                                                     </div>');
              redirect('admin/programs');
          }
          else
          {
              $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                   fade show">
                                                      <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                      <strong>Xətalı!</strong><br>
                                                      Proqram Əlavə Edilmədi
                                                     </div>');
              redirect('admin/programs');
          }

     }
   }

   public function programs_update($id)
   {
       $result       = $this->dtbs->show($id,'programs');
       $data['info'] = $result;
       $this->load->view('back/programs/edit/anasehife',$data);
   }

 public function programs_edit()
 {
     $id     = $this->input->post('id');
  
     $config['upload_path']   = FCPATH.'assets/front/images/programs';
     $config['allowed_types'] = '*';
     $config['encrypt_name']  = TRUE;
     $this->load->library('upload', $config);
     
     if($this->upload->do_upload('image'))
     {
       //tmb operation start
       $image                    = $this->upload->data();
       $image_path               = $image['file_name'];
       $image_save               = 'assets/front/images/programs/'.$image_path.'';
       $image_tmb                = 'assets/front/images/programs/tmb/'.$image_path.'';
       $config['image_library']  = 'gd2';
       $config['source_image']   = 'assets/front/images/programs/'.$image_path.'';
       $config['new_image']      = 'assets/front/images/programs/tmb/'.$image_path.'';
       $config['create_thumb']   = false;
       $config['maintain_ratio'] = false;
       $config['quality']        = '60%';
       $config['width']          = 500;
       $config['height']         = 400;
       $this->load->library('image_lib',$config);
       $this->image_lib->initialize($config);
       $this->image_lib->resize();
       $this->image_lib->clear();
       //tmb operation end
       
       $image_delete      = programs_image($id);
       $tmb_image_delete  = programs_tmb_image($id);
       unlink($image_delete);
       unlink($tmb_image_delete);

        $data = [
                  'image'         => $image_save,
                  'tmb'           => $image_tmb,
                  'program_name'  => trim(strip_tags(htmlspecialchars($this->input->post('program_name')))),
                  'sef'           => permalink($this->input->post('program_name')),
                  'info'          => trim(strip_tags(htmlspecialchars($this->input->post('info')))),
                  'status'        => $this->input->post('status')
                ];
        $result = $this->dtbs->update($data,$id,'id','programs');
        if($result)
        {
          $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                 fade show">
                                                    <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                    <strong>Başarılı!</strong><br>
                                                    Proqram Məlumatları Yeniləndi.. 
                                                   </div>');
          redirect('admin/programs');
        }
        else
        {
          $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                 fade show">
                                                    <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                    <strong>Xətalı!</strong><br>
                                                    Proqram Məlumatları Yenilənmədi.. 
                                                   </div>');
          redirect('admin/programs');
        }

    }
    else
    {
        $data = [
                  'program_name'  => trim(strip_tags(htmlspecialchars($this->input->post('program_name')))),
                  'sef'           => permalink($this->input->post('program_name')),
                  'info'          => trim(strip_tags(htmlspecialchars($this->input->post('info')))),
                  'status'        => $this->input->post('status')
                ];
        $result = $this->dtbs->update($data,$id,'id','programs');
        if($result)
        {
          $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                 fade show">
                                                    <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                    <strong>Başarılı!</strong><br>
                                                    Proqram Məlumatları Yeniləndi.. 
                                                   </div>');
          redirect('admin/programs');
        }
        else
        {
          $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                 fade show">
                                                    <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                    <strong>Xətalı!</strong><br>
                                                    Proqram Məlumatları Yenilənmədi.. 
                                                   </div>');
          redirect('admin/programs');
        }

    }

 }

   public function programs_delete($id,$where,$from)
   {

      $image_delete      = programs_image($id);
      $tmb_image_delete  = programs_tmb_image($id);
      unlink($image_delete);
      unlink($tmb_image_delete);

      $result = $this->dtbs->delete($id,$where,$from);
      if($result)
      {
          $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                 fade show">
                                                    <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                    <strong>Başarılı!</strong><br>
                                                    Proqram Silindi.. 
                                                   </div>');
          redirect('admin/programs');
      }
      else
      {
          $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                 fade show">
                                                    <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                    <strong>Xətalı!</strong><br>
                                                    Proqram Silinmədi.. 
                                                   </div>');
          redirect('admin/programs');
      }
   }



     public function zulallar()
     {
        $result = $this->dtbs->list('zulallar');
        $data['info'] = $result;
        $this->load->view('back/zulallar/anasehife',$data);
     }

     public function zulal_add()
     {
       $result = $this->dtbs->list('zulallar');
       $data['info'] = $result;
       $this->load->view('back/zulallar/insert/anasehife', $data);
     }

     public function zulal_insert()
     {
       $config['upload_path']   = FCPATH.'assets/front/images/zulallar';
       $config['allowed_types'] = '*';
       $config['encrypt_name']  = TRUE;
       $this->load->library('upload', $config);
         
         if($this->upload->do_upload('image'))
         {
           //tmb operation start
           $image                    = $this->upload->data();
           $image_path               = $image['file_name'];
           $image_save               = 'assets/front/images/zulallar/'.$image_path.'';
           $image_tmb                = 'assets/front/images/zulallar/tmb/'.$image_path.'';
           $config['image_library']  = 'gd2';
           $config['source_image']   = 'assets/front/images/zulallar/'.$image_path.'';
           $config['new_image']      = 'assets/front/images/zulallar/tmb/'.$image_path.'';
           $config['create_thumb']   = false;
           $config['maintain_ratio'] = false;
           $config['quality']        = '60%';
           $config['width']          = 800;
           $config['height']         = 500;
           $this->load->library('image_lib',$config);
           $this->image_lib->initialize($config);
           $this->image_lib->resize();
           $this->image_lib->clear();
           //tmb operation end
            $data =  [
                      'image'        => $image_save,
                      'tmb'          => $image_tmb,
                      'protein_name' => trim(strip_tags(htmlspecialchars($this->input->post('protein_name')))),
                      'sef'          => permalink($this->input->post('protein_name')),
                      'price'        => trim(strip_tags(htmlspecialchars($this->input->post('price')))),
                      'info'         => trim(strip_tags(htmlspecialchars($this->input->post('info')))),
                      'status'       => $status = 0
                    ];
            $result = $this->dtbs->insert('zulallar',$data);
            if($result)
            {
                $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Başarılı!</strong><br>
                                                        Protein Əlavə Edildi.. 
                                                       </div>');
                redirect('admin/zulallar');
            }
            else
            {
                $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Xətalı!</strong><br>
                                                        Protein Əlavə Edilmədi
                                                       </div>');
                redirect('admin/zulallar');
            }

       }
     }

     public function zulal_update($id)
     {
         $result       = $this->dtbs->show($id,'zulallar');
         $data['info'] = $result;
         $this->load->view('back/zulallar/edit/anasehife',$data);
     }


     public function zulal_edit()
     {
         $id     = $this->input->post('id');
         $status = $this->input->post('status');

         $config['upload_path']   = FCPATH.'assets/front/images/zulallar';
         $config['allowed_types'] = '*';
         $config['encrypt_name']  = TRUE;
         $this->load->library('upload', $config);
         
         if($this->upload->do_upload('image'))
         {
           //tmb operation start
           $image                    = $this->upload->data();
           $image_path               = $image['file_name'];
           $image_save               = 'assets/front/images/zulallar/'.$image_path.'';
           $image_tmb                = 'assets/front/images/zulallar/tmb/'.$image_path.'';
           $config['image_library']  = 'gd2';
           $config['source_image']   = 'assets/front/images/zulallar/'.$image_path.'';
           $config['new_image']      = 'assets/front/images/zulallar/tmb/'.$image_path.'';
           $config['create_thumb']   = false;
           $config['maintain_ratio'] = false;
           $config['quality']        = '60%';
           $config['width']          = 800;
           $config['height']         = 500;
           $this->load->library('image_lib',$config);
           $this->image_lib->initialize($config);
           $this->image_lib->resize();
           $this->image_lib->clear();
           //tmb operation end
           
           $image_delete      = zulal_image($id);
           $tmb_image_delete  = zulal_tmb_image($id);
           unlink($image_delete);
           unlink($tmb_image_delete);

            $data = [
                      'image'         => $image_save,
                      'tmb'           => $image_tmb,
                      'protein_name'  => trim(strip_tags(htmlspecialchars($this->input->post('protein_name')))),
                      'sef'           => permalink($this->input->post('protein_name')),
                      'price'         => trim(strip_tags(htmlspecialchars($this->input->post('price')))),
                      'info'          => trim(strip_tags(htmlspecialchars($this->input->post('info')))),
                      'status'        => $status
                    ];
            $result = $this->dtbs->update($data,$id,'id','zulallar');
            if($result)
            {
              $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Başarılı!</strong><br>
                                                        Protein Yeniləndi.. 
                                                       </div>');
              redirect('admin/zulallar');
            }
            else
            {
              $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Xətalı!</strong><br>
                                                        Protein Yenilənmədi.. 
                                                       </div>');
              redirect('admin/zulallar');
            }

        }
        else
        {
            $data = [
                      'id'           => $this->input->post('id'),
                      'protein_name' => trim(strip_tags(htmlspecialchars($this->input->post('protein_name')))),
                      'sef'          => permalink($this->input->post('protein_name')),
                      'price'        => trim(strip_tags(htmlspecialchars($this->input->post('price')))),
                      'info'         => trim(strip_tags(htmlspecialchars($this->input->post('info')))),
                      'status'       => $status
                    ];
            $result = $this->dtbs->update($data,$id,'id','zulallar');
            if($result)
            {
              $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Başarılı!</strong><br>
                                                        Protein Yeniləndi.. 
                                                       </div>');
              redirect('admin/zulallar');
            }
            else
            {
              $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Xətalı!</strong><br>
                                                        Protein Yenilənmədi.. 
                                                       </div>');
              redirect('admin/zulallar');
            }

        }

     }

       public function zulal_delete($id,$where,$from)
       {

          $image_delete      = zulal_image($id);
          $tmb_image_delete  = zulal_tmb_image($id);
          unlink($image_delete);
          unlink($tmb_image_delete);

          $result = $this->dtbs->delete($id,$where,$from);
          if($result)
          {
              $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Başarılı!</strong><br>
                                                        Protein Silindi.. 
                                                       </div>');
              redirect('admin/zulallar');
          }
          else
          {
              $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Xətalı!</strong><br>
                                                        Protein Silinmədi.. 
                                                       </div>');
              redirect('admin/zulallar');
          }
       }

     public function amin_tursulari()
     {
        $result = $this->dtbs->list('amin_tursulari');
        $data['info'] = $result;
        $this->load->view('back/amin_tursulari/anasehife',$data);
     }

     public function amin_tursu_add()
     {
       $result = $this->dtbs->list('amin_tursulari');
       $data['info'] = $result;
       $this->load->view('back/amin_tursulari/insert/anasehife', $data);
     }

     public function amin_tursu_insert()
     {
       $config['upload_path']   = FCPATH.'assets/front/images/amin_tursulari';
       $config['allowed_types'] = '*';
       $config['encrypt_name']  = TRUE;
       $this->load->library('upload', $config);
         
         if($this->upload->do_upload('image'))
         {
           //tmb operation start
           $image                    = $this->upload->data();
           $image_path               = $image['file_name'];
           $image_save               = 'assets/front/images/amin_tursulari/'.$image_path.'';
           $image_tmb                = 'assets/front/images/amin_tursulari/tmb/'.$image_path.'';
           $config['image_library']  = 'gd2';
           $config['source_image']   = 'assets/front/images/amin_tursulari/'.$image_path.'';
           $config['new_image']      = 'assets/front/images/amin_tursulari/tmb/'.$image_path.'';
           $config['create_thumb']   = false;
           $config['maintain_ratio'] = false;
           $config['quality']        = '60%';
           $config['width']          = 800;
           $config['height']         = 500;
           $this->load->library('image_lib',$config);
           $this->image_lib->initialize($config);
           $this->image_lib->resize();
           $this->image_lib->clear();
           //tmb operation end
            $data =  [
                      'image'        => $image_save,
                      'tmb'          => $image_tmb,
                      'protein_name' => trim(strip_tags(htmlspecialchars($this->input->post('protein_name')))),
                      'sef'          => permalink($this->input->post('protein_name')),
                      'price'        => trim(strip_tags(htmlspecialchars($this->input->post('price')))),
                      'info'         => trim(strip_tags(htmlspecialchars($this->input->post('info')))),
                      'status'       => $status = 0
                    ];
            $result = $this->dtbs->insert('amin_tursulari',$data);
            if($result)
            {
                $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Başarılı!</strong><br>
                                                        Protein Əlavə Edildi.. 
                                                       </div>');
                redirect('admin/amin_tursulari');
            }
            else
            {
                $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Xətalı!</strong><br>
                                                        Protein Əlavə Edilmədi
                                                       </div>');
                redirect('admin/amin_tursulari');
            }

       }
     }

     public function amin_tursu_update($id)
     {
         $result       = $this->dtbs->show($id,'amin_tursulari');
         $data['info'] = $result;
         $this->load->view('back/amin_tursulari/edit/anasehife',$data);
     }


     public function amin_tursu_edit()
     {
         $id     = $this->input->post('id');
         $status = $this->input->post('status');

         $config['upload_path']   = FCPATH.'assets/front/images/amin_tursulari';
         $config['allowed_types'] = '*';
         $config['encrypt_name']  = TRUE;
         $this->load->library('upload', $config);
         
         if($this->upload->do_upload('image'))
         {
           //tmb operation start
           $image                    = $this->upload->data();
           $image_path               = $image['file_name'];
           $image_save               = 'assets/front/images/amin_tursulari/'.$image_path.'';
           $image_tmb                = 'assets/front/images/amin_tursulari/tmb/'.$image_path.'';
           $config['image_library']  = 'gd2';
           $config['source_image']   = 'assets/front/images/amin_tursulari/'.$image_path.'';
           $config['new_image']      = 'assets/front/images/amin_tursulari/tmb/'.$image_path.'';
           $config['create_thumb']   = false;
           $config['maintain_ratio'] = false;
           $config['quality']        = '60%';
           $config['width']          = 800;
           $config['height']         = 500;
           $this->load->library('image_lib',$config);
           $this->image_lib->initialize($config);
           $this->image_lib->resize();
           $this->image_lib->clear();
           //tmb operation end
           
           $image_delete      = amin_tursu_image($id);
           $tmb_image_delete  = amin_tursu_tmb_image($id);
           unlink($image_delete);
           unlink($tmb_image_delete);

            $data = [
                      'image'         => $image_save,
                      'tmb'           => $image_tmb,
                      'protein_name'  => trim(strip_tags(htmlspecialchars($this->input->post('protein_name')))),
                      'sef'           => permalink($this->input->post('protein_name')),
                      'price'         => trim(strip_tags(htmlspecialchars($this->input->post('price')))),
                      'info'          => trim(strip_tags(htmlspecialchars($this->input->post('info')))),
                      'status'        => $status
                    ];
            $result = $this->dtbs->update($data,$id,'id','amin_tursulari');
            if($result)
            {
              $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Başarılı!</strong><br>
                                                        Protein Yeniləndi.. 
                                                       </div>');
              redirect('admin/amin_tursulari');
            }
            else
            {
              $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Xətalı!</strong><br>
                                                        Protein Yenilənmədi.. 
                                                       </div>');
              redirect('admin/amin_tursulari');
            }

        }
        else
        {
            $data = [
                      'id'           => $this->input->post('id'),
                      'protein_name' => trim(strip_tags(htmlspecialchars($this->input->post('protein_name')))),
                      'sef'          => permalink($this->input->post('protein_name')),
                      'price'        => trim(strip_tags(htmlspecialchars($this->input->post('price')))),
                      'info'         => trim(strip_tags(htmlspecialchars($this->input->post('info')))),
                      'status'       => $status
                    ];
            $result = $this->dtbs->update($data,$id,'id','amin_tursulari');
            if($result)
            {
              $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Başarılı!</strong><br>
                                                        Protein Yeniləndi.. 
                                                       </div>');
              redirect('admin/amin_tursulari');
            }
            else
            {
              $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Xətalı!</strong><br>
                                                        Protein Yenilənmədi.. 
                                                       </div>');
              redirect('admin/amin_tursulari');
            }

        }

     }

       public function amin_tursu_delete($id,$where,$from)
       {

          $image_delete      = amin_tursu_image($id);
          $tmb_image_delete  = amin_tursu_tmb_image($id);
          unlink($image_delete);
          unlink($tmb_image_delete);

          $result = $this->dtbs->delete($id,$where,$from);
          if($result)
          {
              $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Başarılı!</strong><br>
                                                        Protein Silindi.. 
                                                       </div>');
              redirect('admin/amin_tursulari');
          }
          else
          {
              $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Xətalı!</strong><br>
                                                        Protein Silinmədi.. 
                                                       </div>');
              redirect('admin/amin_tursulari');
          }
       }

     public function yag_yandiranlar()
     {
        $result = $this->dtbs->list('yag_yandiranlar');
        $data['info'] = $result;
        $this->load->view('back/yag_yandiranlar/anasehife',$data);
     }

     public function yag_yandiran_add()
     {
       $result = $this->dtbs->list('yag_yandiranlar');
       $data['info'] = $result;
       $this->load->view('back/yag_yandiranlar/insert/anasehife', $data);
     }

     public function yag_yandiran_insert()
     {
       $config['upload_path']   = FCPATH.'assets/front/images/yag_yandiranlar';
       $config['allowed_types'] = '*';
       $config['encrypt_name']  = TRUE;
       $this->load->library('upload', $config);
         
         if($this->upload->do_upload('image'))
         {
           //tmb operation start
           $image                    = $this->upload->data();
           $image_path               = $image['file_name'];
           $image_save               = 'assets/front/images/yag_yandiranlar/'.$image_path.'';
           $image_tmb                = 'assets/front/images/yag_yandiranlar/tmb/'.$image_path.'';
           $config['image_library']  = 'gd2';
           $config['source_image']   = 'assets/front/images/yag_yandiranlar/'.$image_path.'';
           $config['new_image']      = 'assets/front/images/yag_yandiranlar/tmb/'.$image_path.'';
           $config['create_thumb']   = false;
           $config['maintain_ratio'] = false;
           $config['quality']        = '60%';
           $config['width']          = 800;
           $config['height']         = 500;
           $this->load->library('image_lib',$config);
           $this->image_lib->initialize($config);
           $this->image_lib->resize();
           $this->image_lib->clear();
           //tmb operation end
            $data =  [
                      'image'        => $image_save,
                      'tmb'          => $image_tmb,
                      'protein_name' => trim(strip_tags(htmlspecialchars($this->input->post('protein_name')))),
                      'sef'          => permalink($this->input->post('protein_name')),
                      'price'        => trim(strip_tags(htmlspecialchars($this->input->post('price')))),
                      'info'         => trim(strip_tags(htmlspecialchars($this->input->post('info')))),
                      'status'       => $status = 0
                    ];
            $result = $this->dtbs->insert('yag_yandiranlar',$data);
            if($result)
            {
                $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Başarılı!</strong><br>
                                                        Protein Əlavə Edildi.. 
                                                       </div>');
                redirect('admin/yag_yandiranlar');
            }
            else
            {
                $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Xətalı!</strong><br>
                                                        Protein Əlavə Edilmədi
                                                       </div>');
                redirect('admin/yag_yandiranlar');
            }

       }
     }

     public function yag_yandiran_update($id)
     {
         $result       = $this->dtbs->show($id,'yag_yandiranlar');
         $data['info'] = $result;
         $this->load->view('back/yag_yandiranlar/edit/anasehife',$data);
     }


     public function yag_yandiran_edit()
     {
         $id     = $this->input->post('id');
         $status = $this->input->post('status');

         $config['upload_path']   = FCPATH.'assets/front/images/yag_yandiranlar';
         $config['allowed_types'] = '*';
         $config['encrypt_name']  = TRUE;
         $this->load->library('upload', $config);
         
         if($this->upload->do_upload('image'))
         {
           //tmb operation start
           $image                    = $this->upload->data();
           $image_path               = $image['file_name'];
           $image_save               = 'assets/front/images/yag_yandiranlar/'.$image_path.'';
           $image_tmb                = 'assets/front/images/yag_yandiranlar/tmb/'.$image_path.'';
           $config['image_library']  = 'gd2';
           $config['source_image']   = 'assets/front/images/yag_yandiranlar/'.$image_path.'';
           $config['new_image']      = 'assets/front/images/yag_yandiranlar/tmb/'.$image_path.'';
           $config['create_thumb']   = false;
           $config['maintain_ratio'] = false;
           $config['quality']        = '60%';
           $config['width']          = 800;
           $config['height']         = 500;
           $this->load->library('image_lib',$config);
           $this->image_lib->initialize($config);
           $this->image_lib->resize();
           $this->image_lib->clear();
           //tmb operation end
           
           $image_delete      = yag_yandiranlar_image($id);
           $tmb_image_delete  = yag_yandiranlar_tmb_image($id);
           unlink($image_delete);
           unlink($tmb_image_delete);

            $data = [
                      'image'         => $image_save,
                      'tmb'           => $image_tmb,
                      'protein_name'  => trim(strip_tags(htmlspecialchars($this->input->post('protein_name')))),
                      'sef'           => permalink($this->input->post('protein_name')),
                      'price'         => trim(strip_tags(htmlspecialchars($this->input->post('price')))),
                      'info'          => trim(strip_tags(htmlspecialchars($this->input->post('info')))),
                      'status'        => $status
                    ];
            $result = $this->dtbs->update($data,$id,'id','yag_yandiranlar');
            if($result)
            {
              $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Başarılı!</strong><br>
                                                        Protein Yeniləndi.. 
                                                       </div>');
              redirect('admin/yag_yandiranlar');
            }
            else
            {
              $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Xətalı!</strong><br>
                                                        Protein Yenilənmədi.. 
                                                       </div>');
              redirect('admin/yag_yandiranlar');
            }

        }
        else
        {
            $data = [
                      'id'           => $this->input->post('id'),
                      'protein_name' => trim(strip_tags(htmlspecialchars($this->input->post('protein_name')))),
                      'sef'          => permalink($this->input->post('protein_name')),
                      'price'        => trim(strip_tags(htmlspecialchars($this->input->post('price')))),
                      'info'         => trim(strip_tags(htmlspecialchars($this->input->post('info')))),
                      'status'       => $status
                    ];
            $result = $this->dtbs->update($data,$id,'id','yag_yandiranlar');
            if($result)
            {
              $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Başarılı!</strong><br>
                                                        Protein Yeniləndi.. 
                                                       </div>');
              redirect('admin/yag_yandiranlar');
            }
            else
            {
              $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Xətalı!</strong><br>
                                                        Protein Yenilənmədi.. 
                                                       </div>');
              redirect('admin/yag_yandiranlar');
            }

        }

     }

       public function yag_yandiran_delete($id,$where,$from)
       {

          $image_delete      = yag_yandiranlar_image($id);
          $tmb_image_delete  = yag_yandiranlar_tmb_image($id);
          unlink($image_delete);
          unlink($tmb_image_delete);

          $result = $this->dtbs->delete($id,$where,$from);
          if($result)
          {
              $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Başarılı!</strong><br>
                                                        Protein Silindi.. 
                                                       </div>');
              redirect('admin/yag_yandiranlar');
          }
          else
          {
              $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Xətalı!</strong><br>
                                                        Protein Silinmədi.. 
                                                       </div>');
              redirect('admin/yag_yandiranlar');
          }
       }


     public function vitaminler()
     {
        $result = $this->dtbs->list('vitaminler');
        $data['info'] = $result;
        $this->load->view('back/vitaminler/anasehife',$data);
     }

     public function vitamin_add()
     {
       $result = $this->dtbs->list('vitaminler');
       $data['info'] = $result;
       $this->load->view('back/vitaminler/insert/anasehife', $data);
     }

     public function vitamin_insert()
     {
       $config['upload_path']   = FCPATH.'assets/front/images/vitaminler';
       $config['allowed_types'] = '*';
       $config['encrypt_name']  = TRUE;
       $this->load->library('upload', $config);
         
         if($this->upload->do_upload('image'))
         {
           //tmb operation start
           $image                    = $this->upload->data();
           $image_path               = $image['file_name'];
           $image_save               = 'assets/front/images/vitaminler/'.$image_path.'';
           $image_tmb                = 'assets/front/images/vitaminler/tmb/'.$image_path.'';
           $config['image_library']  = 'gd2';
           $config['source_image']   = 'assets/front/images/vitaminler/'.$image_path.'';
           $config['new_image']      = 'assets/front/images/vitaminler/tmb/'.$image_path.'';
           $config['create_thumb']   = false;
           $config['maintain_ratio'] = false;
           $config['quality']        = '60%';
           $config['width']          = 800;
           $config['height']         = 500;
           $this->load->library('image_lib',$config);
           $this->image_lib->initialize($config);
           $this->image_lib->resize();
           $this->image_lib->clear();
           //tmb operation end
            $data =  [
                      'image'        => $image_save,
                      'tmb'          => $image_tmb,
                      'protein_name' => trim(strip_tags(htmlspecialchars($this->input->post('protein_name')))),
                      'sef'          => permalink($this->input->post('protein_name')),
                      'price'        => trim(strip_tags(htmlspecialchars($this->input->post('price')))),
                      'info'         => trim(strip_tags(htmlspecialchars($this->input->post('info')))),
                      'status'       => $status = 0
                    ];
            $result = $this->dtbs->insert('vitaminler',$data);
            if($result)
            {
                $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Başarılı!</strong><br>
                                                        Protein Əlavə Edildi.. 
                                                       </div>');
                redirect('admin/vitaminler');
            }
            else
            {
                $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Xətalı!</strong><br>
                                                        Protein Əlavə Edilmədi
                                                       </div>');
                redirect('admin/vitaminler');
            }

       }
     }

     public function vitamin_update($id)
     {
         $result       = $this->dtbs->show($id,'vitaminler');
         $data['info'] = $result;
         $this->load->view('back/vitaminler/edit/anasehife',$data);
     }


     public function vitamin_edit()
     {
         $id     = $this->input->post('id');
         $status = $this->input->post('status');

         $config['upload_path']   = FCPATH.'assets/front/images/vitaminler';
         $config['allowed_types'] = '*';
         $config['encrypt_name']  = TRUE;
         $this->load->library('upload', $config);
         
         if($this->upload->do_upload('image'))
         {
           //tmb operation start
           $image                    = $this->upload->data();
           $image_path               = $image['file_name'];
           $image_save               = 'assets/front/images/vitaminler/'.$image_path.'';
           $image_tmb                = 'assets/front/images/vitaminler/tmb/'.$image_path.'';
           $config['image_library']  = 'gd2';
           $config['source_image']   = 'assets/front/images/vitaminler/'.$image_path.'';
           $config['new_image']      = 'assets/front/images/vitaminler/tmb/'.$image_path.'';
           $config['create_thumb']   = false;
           $config['maintain_ratio'] = false;
           $config['quality']        = '60%';
           $config['width']          = 800;
           $config['height']         = 500;
           $this->load->library('image_lib',$config);
           $this->image_lib->initialize($config);
           $this->image_lib->resize();
           $this->image_lib->clear();
           //tmb operation end
           
           $image_delete      = vitamin_image($id);
           $tmb_image_delete  = vitamin_tmb_image($id);
           unlink($image_delete);
           unlink($tmb_image_delete);

            $data = [
                      'image'         => $image_save,
                      'tmb'           => $image_tmb,
                      'protein_name'  => trim(strip_tags(htmlspecialchars($this->input->post('protein_name')))),
                      'sef'           => permalink($this->input->post('protein_name')),
                      'price'         => trim(strip_tags(htmlspecialchars($this->input->post('price')))),
                      'info'          => trim(strip_tags(htmlspecialchars($this->input->post('info')))),
                      'status'        => $status
                    ];
            $result = $this->dtbs->update($data,$id,'id','vitaminler');
            if($result)
            {
              $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Başarılı!</strong><br>
                                                        Protein Yeniləndi.. 
                                                       </div>');
              redirect('admin/vitaminler');
            }
            else
            {
              $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Xətalı!</strong><br>
                                                        Protein Yenilənmədi.. 
                                                       </div>');
              redirect('admin/vitaminler');
            }

        }
        else
        {
            $data = [
                      'id'           => $this->input->post('id'),
                      'protein_name' => trim(strip_tags(htmlspecialchars($this->input->post('protein_name')))),
                      'sef'          => permalink($this->input->post('protein_name')),
                      'price'        => trim(strip_tags(htmlspecialchars($this->input->post('price')))),
                      'info'         => trim(strip_tags(htmlspecialchars($this->input->post('info')))),
                      'status'       => $status
                    ];
            $result = $this->dtbs->update($data,$id,'id','vitaminler');
            if($result)
            {
              $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Başarılı!</strong><br>
                                                        Protein Yeniləndi.. 
                                                       </div>');
              redirect('admin/vitaminler');
            }
            else
            {
              $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Xətalı!</strong><br>
                                                        Protein Yenilənmədi.. 
                                                       </div>');
              redirect('admin/vitaminler');
            }

        }

     }

       public function vitamin_delete($id,$where,$from)
       {

          $image_delete      = vitamin_image($id);
          $tmb_image_delete  = vitamin_tmb_image($id);
          unlink($image_delete);
          unlink($tmb_image_delete);

          $result = $this->dtbs->delete($id,$where,$from);
          if($result)
          {
              $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Başarılı!</strong><br>
                                                        Protein Silindi.. 
                                                       </div>');
              redirect('admin/vitaminler');
          }
          else
          {
              $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Xətalı!</strong><br>
                                                        Protein Silinmədi.. 
                                                       </div>');
              redirect('admin/vitaminler');
          }
       }


     public function ceki_ve_hecm()
     {
        $result = $this->dtbs->list('ceki_hecm');
        $data['info'] = $result;
        $this->load->view('back/ceki_ve_hecm/anasehife',$data);
     }

     public function ceki_ve_hecm_add()
     {
       $result = $this->dtbs->list('ceki_hecm');
       $data['info'] = $result;
       $this->load->view('back/ceki_ve_hecm/insert/anasehife', $data);
     }

     public function ceki_ve_hecm_insert()
     {
       $config['upload_path']   = FCPATH.'assets/front/images/ceki_ve_hecm';
       $config['allowed_types'] = '*';
       $config['encrypt_name']  = TRUE;
       $this->load->library('upload', $config);
         
         if($this->upload->do_upload('image'))
         {
           //tmb operation start
           $image                    = $this->upload->data();
           $image_path               = $image['file_name'];
           $image_save               = 'assets/front/images/ceki_ve_hecm/'.$image_path.'';
           $image_tmb                = 'assets/front/images/ceki_ve_hecm/tmb/'.$image_path.'';
           $config['image_library']  = 'gd2';
           $config['source_image']   = 'assets/front/images/ceki_ve_hecm/'.$image_path.'';
           $config['new_image']      = 'assets/front/images/ceki_ve_hecm/tmb/'.$image_path.'';
           $config['create_thumb']   = false;
           $config['maintain_ratio'] = false;
           $config['quality']        = '60%';
           $config['width']          = 800;
           $config['height']         = 500;
           $this->load->library('image_lib',$config);
           $this->image_lib->initialize($config);
           $this->image_lib->resize();
           $this->image_lib->clear();
           //tmb operation end
            $data =  [
                      'image'        => $image_save,
                      'tmb'          => $image_tmb,
                      'protein_name' => trim(strip_tags(htmlspecialchars($this->input->post('protein_name')))),
                      'sef'          => permalink($this->input->post('protein_name')),
                      'price'        => trim(strip_tags(htmlspecialchars($this->input->post('price')))),
                      'info'         => trim(strip_tags(htmlspecialchars($this->input->post('info')))),
                      'status'       => $status = 0
                    ];
            $result = $this->dtbs->insert('ceki_hecm',$data);
            if($result)
            {
                $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Başarılı!</strong><br>
                                                        Protein Əlavə Edildi.. 
                                                       </div>');
                redirect('admin/ceki_ve_hecm');
            }
            else
            {
                $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Xətalı!</strong><br>
                                                        Protein Əlavə Edilmədi
                                                       </div>');
                redirect('admin/ceki_ve_hecm');
            }

       }
     }

     public function ceki_ve_hecm_update($id)
     {
         $result       = $this->dtbs->show($id,'ceki_hecm');
         $data['info'] = $result;
         $this->load->view('back/ceki_ve_hecm/edit/anasehife',$data);
     }


     public function ceki_ve_hecm_edit()
     {
         $id     = $this->input->post('id');
         $status = $this->input->post('status');

         $config['upload_path']   = FCPATH.'assets/front/images/ceki_ve_hecm';
         $config['allowed_types'] = '*';
         $config['encrypt_name']  = TRUE;
         $this->load->library('upload', $config);
         
         if($this->upload->do_upload('image'))
         {
           //tmb operation start
           $image                    = $this->upload->data();
           $image_path               = $image['file_name'];
           $image_save               = 'assets/front/images/ceki_ve_hecm/'.$image_path.'';
           $image_tmb                = 'assets/front/images/ceki_ve_hecm/tmb/'.$image_path.'';
           $config['image_library']  = 'gd2';
           $config['source_image']   = 'assets/front/images/ceki_ve_hecm/'.$image_path.'';
           $config['new_image']      = 'assets/front/images/ceki_ve_hecm/tmb/'.$image_path.'';
           $config['create_thumb']   = false;
           $config['maintain_ratio'] = false;
           $config['quality']        = '60%';
           $config['width']          = 800;
           $config['height']         = 500;
           $this->load->library('image_lib',$config);
           $this->image_lib->initialize($config);
           $this->image_lib->resize();
           $this->image_lib->clear();
           //tmb operation end
           
           $image_delete      = ceki_ve_hecm_image($id);
           $tmb_image_delete  = ceki_ve_hecm_tmb_image($id);
           unlink($image_delete);
           unlink($tmb_image_delete);

            $data = [
                      'image'         => $image_save,
                      'tmb'           => $image_tmb,
                      'protein_name'  => trim(strip_tags(htmlspecialchars($this->input->post('protein_name')))),
                      'sef'           => permalink($this->input->post('protein_name')),
                      'price'         => trim(strip_tags(htmlspecialchars($this->input->post('price')))),
                      'info'          => trim(strip_tags(htmlspecialchars($this->input->post('info')))),
                      'status'        => $status
                    ];
            $result = $this->dtbs->update($data,$id,'id','ceki_hecm');
            if($result)
            {
              $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Başarılı!</strong><br>
                                                        Protein Yeniləndi.. 
                                                       </div>');
              redirect('admin/ceki_ve_hecm');
            }
            else
            {
              $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Xətalı!</strong><br>
                                                        Protein Yenilənmədi.. 
                                                       </div>');
              redirect('admin/ceki_ve_hecm');
            }

        }
        else
        {
            $data = [
                      'id'           => $this->input->post('id'),
                      'protein_name' => trim(strip_tags(htmlspecialchars($this->input->post('protein_name')))),
                      'sef'          => permalink($this->input->post('protein_name')),
                      'price'        => trim(strip_tags(htmlspecialchars($this->input->post('price')))),
                      'info'         => trim(strip_tags(htmlspecialchars($this->input->post('info')))),
                      'status'       => $status
                    ];
            $result = $this->dtbs->update($data,$id,'id','ceki_hecm');
            if($result)
            {
              $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Başarılı!</strong><br>
                                                        Protein Yeniləndi.. 
                                                       </div>');
              redirect('admin/ceki_ve_hecm');
            }
            else
            {
              $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Xətalı!</strong><br>
                                                        Protein Yenilənmədi.. 
                                                       </div>');
              redirect('admin/ceki_ve_hecm');
            }

        }

     }

       public function ceki_ve_hecm_delete($id,$where,$from)
       {

          $image_delete      = ceki_ve_hecm_image($id);
          $tmb_image_delete  = ceki_ve_hecm_tmb_image($id);
          unlink($image_delete);
          unlink($tmb_image_delete);

          $result = $this->dtbs->delete($id,$where,$from);
          if($result)
          {
              $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Başarılı!</strong><br>
                                                        Protein Silindi.. 
                                                       </div>');
              redirect('admin/ceki_ve_hecm');
          }
          else
          {
              $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Xətalı!</strong><br>
                                                        Protein Silinmədi.. 
                                                       </div>');
              redirect('admin/ceki_ve_hecm');
          }
       }


     public function guc_enerji()
     {
        $result = $this->dtbs->list('guc_enerji');
        $data['info'] = $result;
        $this->load->view('back/guc_ve_enerji/anasehife',$data);
     }

     public function guc_enerji_add()
     {
       $result = $this->dtbs->list('guc_enerji');
       $data['info'] = $result;
       $this->load->view('back/guc_ve_enerji/insert/anasehife', $data);
     }

     public function guc_enerji_insert()
     {
       $config['upload_path']   = FCPATH.'assets/front/images/guc_enerji';
       $config['allowed_types'] = '*';
       $config['encrypt_name']  = TRUE;
       $this->load->library('upload', $config);
         
         if($this->upload->do_upload('image'))
         {
           //tmb operation start
           $image                    = $this->upload->data();
           $image_path               = $image['file_name'];
           $image_save               = 'assets/front/images/guc_enerji/'.$image_path.'';
           $image_tmb                = 'assets/front/images/guc_enerji/tmb/'.$image_path.'';
           $config['image_library']  = 'gd2';
           $config['source_image']   = 'assets/front/images/guc_enerji/'.$image_path.'';
           $config['new_image']      = 'assets/front/images/guc_enerji/tmb/'.$image_path.'';
           $config['create_thumb']   = false;
           $config['maintain_ratio'] = false;
           $config['quality']        = '60%';
           $config['width']          = 800;
           $config['height']         = 500;
           $this->load->library('image_lib',$config);
           $this->image_lib->initialize($config);
           $this->image_lib->resize();
           $this->image_lib->clear();
           //tmb operation end
            $data =  [
                      'image'        => $image_save,
                      'tmb'          => $image_tmb,
                      'protein_name' => trim(strip_tags(htmlspecialchars($this->input->post('protein_name')))),
                      'sef'          => permalink($this->input->post('protein_name')),
                      'price'        => trim(strip_tags(htmlspecialchars($this->input->post('price')))),
                      'info'         => trim(strip_tags(htmlspecialchars($this->input->post('info')))),
                      'status'       => $status = 0
                    ];
            $result = $this->dtbs->insert('guc_enerji',$data);
            if($result)
            {
                $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Başarılı!</strong><br>
                                                        Protein Əlavə Edildi.. 
                                                       </div>');
                redirect('admin/guc_enerji');
            }
            else
            {
                $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Xətalı!</strong><br>
                                                        Protein Əlavə Edilmədi
                                                       </div>');
                redirect('admin/guc_enerji');
            }

       }
     }

     public function guc_enerji_update($id)
     {
         $result       = $this->dtbs->show($id,'guc_enerji');
         $data['info'] = $result;
         $this->load->view('back/guc_ve_enerji/edit/anasehife',$data);
     }


     public function guc_enerji_edit()
     {
         $id     = $this->input->post('id');
         $status = $this->input->post('status');

         $config['upload_path']   = FCPATH.'assets/front/images/guc_enerji';
         $config['allowed_types'] = '*';
         $config['encrypt_name']  = TRUE;
         $this->load->library('upload', $config);
         
         if($this->upload->do_upload('image'))
         {
           //tmb operation start
           $image                    = $this->upload->data();
           $image_path               = $image['file_name'];
           $image_save               = 'assets/front/images/guc_enerji/'.$image_path.'';
           $image_tmb                = 'assets/front/images/guc_enerji/tmb/'.$image_path.'';
           $config['image_library']  = 'gd2';
           $config['source_image']   = 'assets/front/images/guc_enerji/'.$image_path.'';
           $config['new_image']      = 'assets/front/images/guc_enerji/tmb/'.$image_path.'';
           $config['create_thumb']   = false;
           $config['maintain_ratio'] = false;
           $config['quality']        = '60%';
           $config['width']          = 800;
           $config['height']         = 500;
           $this->load->library('image_lib',$config);
           $this->image_lib->initialize($config);
           $this->image_lib->resize();
           $this->image_lib->clear();
           //tmb operation end
           
           $image_delete      = guc_enerji_image($id);
           $tmb_image_delete  = guc_enerji_tmb_image($id);
           unlink($image_delete);
           unlink($tmb_image_delete);

            $data = [
                      'image'         => $image_save,
                      'tmb'           => $image_tmb,
                      'protein_name'  => trim(strip_tags(htmlspecialchars($this->input->post('protein_name')))),
                      'sef'           => permalink($this->input->post('protein_name')),
                      'price'         => trim(strip_tags(htmlspecialchars($this->input->post('price')))),
                      'info'          => trim(strip_tags(htmlspecialchars($this->input->post('info')))),
                      'status'        => $status
                    ];
            $result = $this->dtbs->update($data,$id,'id','guc_enerji');
            if($result)
            {
              $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Başarılı!</strong><br>
                                                        Protein Yeniləndi.. 
                                                       </div>');
              redirect('admin/guc_enerji');
            }
            else
            {
              $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Xətalı!</strong><br>
                                                        Protein Yenilənmədi.. 
                                                       </div>');
              redirect('admin/guc_enerji');
            }

        }
        else
        {
            $data = [
                      'id'           => $this->input->post('id'),
                      'protein_name' => trim(strip_tags(htmlspecialchars($this->input->post('protein_name')))),
                      'sef'          => permalink($this->input->post('protein_name')),
                      'price'        => trim(strip_tags(htmlspecialchars($this->input->post('price')))),
                      'info'         => trim(strip_tags(htmlspecialchars($this->input->post('info')))),
                      'status'       => $status
                    ];
            $result = $this->dtbs->update($data,$id,'id','guc_enerji');
            if($result)
            {
              $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Başarılı!</strong><br>
                                                        Protein Yeniləndi.. 
                                                       </div>');
              redirect('admin/guc_enerji');
            }
            else
            {
              $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Xətalı!</strong><br>
                                                        Protein Yenilənmədi.. 
                                                       </div>');
              redirect('admin/guc_enerji');
            }

        }

     }

       public function guc_enerji_delete($id,$where,$from)
       {

          $image_delete      = guc_enerji_image($id);
          $tmb_image_delete  = guc_enerji_tmb_image($id);
          unlink($image_delete);
          unlink($tmb_image_delete);

          $result = $this->dtbs->delete($id,$where,$from);
          if($result)
          {
              $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Başarılı!</strong><br>
                                                        Protein Silindi.. 
                                                       </div>');
              redirect('admin/guc_enerji');
          }
          else
          {
              $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Xətalı!</strong><br>
                                                        Protein Silinmədi.. 
                                                       </div>');
              redirect('admin/guc_enerji');
          }
       }


     public function diger_mehsullar()
     {
        $result = $this->dtbs->list('diger_mehsullar');
        $data['info'] = $result;
        $this->load->view('back/diger_mehsullar/anasehife',$data);
     }

     public function diger_mehsullar_add()
     {
       $result = $this->dtbs->list('diger_mehsullar');
       $data['info'] = $result;
       $this->load->view('back/diger_mehsullar/insert/anasehife', $data);
     }

     public function diger_mehsullar_insert()
     {
       $config['upload_path']   = FCPATH.'assets/front/images/diger_mehsullar';
       $config['allowed_types'] = '*';
       $config['encrypt_name']  = TRUE;
       $this->load->library('upload', $config);
         
         if($this->upload->do_upload('image'))
         {
           //tmb operation start
           $image                    = $this->upload->data();
           $image_path               = $image['file_name'];
           $image_save               = 'assets/front/images/diger_mehsullar/'.$image_path.'';
           $image_tmb                = 'assets/front/images/diger_mehsullar/tmb/'.$image_path.'';
           $config['image_library']  = 'gd2';
           $config['source_image']   = 'assets/front/images/diger_mehsullar/'.$image_path.'';
           $config['new_image']      = 'assets/front/images/diger_mehsullar/tmb/'.$image_path.'';
           $config['create_thumb']   = false;
           $config['maintain_ratio'] = false;
           $config['quality']        = '60%';
           $config['width']          = 800;
           $config['height']         = 500;
           $this->load->library('image_lib',$config);
           $this->image_lib->initialize($config);
           $this->image_lib->resize();
           $this->image_lib->clear();
           //tmb operation end
            $data =  [
                      'image'        => $image_save,
                      'tmb'          => $image_tmb,
                      'protein_name' => trim(strip_tags(htmlspecialchars($this->input->post('protein_name')))),
                      'sef'          => permalink($this->input->post('protein_name')),
                      'price'        => trim(strip_tags(htmlspecialchars($this->input->post('price')))),
                      'info'         => trim(strip_tags(htmlspecialchars($this->input->post('info')))),
                      'status'       => $status = 0
                    ];
            $result = $this->dtbs->insert('diger_mehsullar',$data);
            if($result)
            {
                $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Başarılı!</strong><br>
                                                        Protein Əlavə Edildi.. 
                                                       </div>');
                redirect('admin/diger_mehsullar');
            }
            else
            {
                $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Xətalı!</strong><br>
                                                        Protein Əlavə Edilmədi
                                                       </div>');
                redirect('admin/diger_mehsullar');
            }

       }
     }

     public function diger_mehsullar_update($id)
     {
         $result       = $this->dtbs->show($id,'diger_mehsullar');
         $data['info'] = $result;
         $this->load->view('back/diger_mehsullar/edit/anasehife',$data);
     }


     public function diger_mehsullar_edit()
     {
         $id     = $this->input->post('id');
         $status = $this->input->post('status');

         $config['upload_path']   = FCPATH.'assets/front/images/diger_mehsullar';
         $config['allowed_types'] = '*';
         $config['encrypt_name']  = TRUE;
         $this->load->library('upload', $config);
         
         if($this->upload->do_upload('image'))
         {
           //tmb operation start
           $image                    = $this->upload->data();
           $image_path               = $image['file_name'];
           $image_save               = 'assets/front/images/diger_mehsullar/'.$image_path.'';
           $image_tmb                = 'assets/front/images/diger_mehsullar/tmb/'.$image_path.'';
           $config['image_library']  = 'gd2';
           $config['source_image']   = 'assets/front/images/diger_mehsullar/'.$image_path.'';
           $config['new_image']      = 'assets/front/images/diger_mehsullar/tmb/'.$image_path.'';
           $config['create_thumb']   = false;
           $config['maintain_ratio'] = false;
           $config['quality']        = '60%';
           $config['width']          = 800;
           $config['height']         = 500;
           $this->load->library('image_lib',$config);
           $this->image_lib->initialize($config);
           $this->image_lib->resize();
           $this->image_lib->clear();
           //tmb operation end
           
           $image_delete      = diger_mehsullar_image($id);
           $tmb_image_delete  = diger_mehsullar_tmb_image($id);
           unlink($image_delete);
           unlink($tmb_image_delete);

            $data = [
                      'image'         => $image_save,
                      'tmb'           => $image_tmb,
                      'protein_name'  => trim(strip_tags(htmlspecialchars($this->input->post('protein_name')))),
                      'sef'           => permalink($this->input->post('protein_name')),
                      'price'         => trim(strip_tags(htmlspecialchars($this->input->post('price')))),
                      'info'          => trim(strip_tags(htmlspecialchars($this->input->post('info')))),
                      'status'        => $status
                    ];
            $result = $this->dtbs->update($data,$id,'id','diger_mehsullar');
            if($result)
            {
              $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Başarılı!</strong><br>
                                                        Protein Yeniləndi.. 
                                                       </div>');
              redirect('admin/diger_mehsullar');
            }
            else
            {
              $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Xətalı!</strong><br>
                                                        Protein Yenilənmədi.. 
                                                       </div>');
              redirect('admin/diger_mehsullar');
            }

        }
        else
        {
            $data = [
                      'id'           => $this->input->post('id'),
                      'protein_name' => trim(strip_tags(htmlspecialchars($this->input->post('protein_name')))),
                      'sef'          => permalink($this->input->post('protein_name')),
                      'price'        => trim(strip_tags(htmlspecialchars($this->input->post('price')))),
                      'info'         => trim(strip_tags(htmlspecialchars($this->input->post('info')))),
                      'status'       => $status
                    ];
            $result = $this->dtbs->update($data,$id,'id','diger_mehsullar');
            if($result)
            {
              $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Başarılı!</strong><br>
                                                        Protein Yeniləndi.. 
                                                       </div>');
              redirect('admin/diger_mehsullar');
            }
            else
            {
              $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Xətalı!</strong><br>
                                                        Protein Yenilənmədi.. 
                                                       </div>');
              redirect('admin/diger_mehsullar');
            }

        }

     }

       public function diger_mehsullar_delete($id,$where,$from)
       {

          $image_delete      = diger_mehsullar_image($id);
          $tmb_image_delete  = diger_mehsullar_tmb_image($id);
          unlink($image_delete);
          unlink($tmb_image_delete);

          $result = $this->dtbs->delete($id,$where,$from);
          if($result)
          {
              $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Başarılı!</strong><br>
                                                        Protein Silindi.. 
                                                       </div>');
              redirect('admin/diger_mehsullar');
          }
          else
          {
              $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Xətalı!</strong><br>
                                                        Protein Silinmədi.. 
                                                       </div>');
              redirect('admin/diger_mehsullar');
          }
       }


     public function qeydiyyat()
     {
       $result = $this->dtbs->qeydiyyat_list('qeydiyyat');
       $data['info'] = $result;
       $this->load->view('back/qeydiyyat/anasehife', $data);
     }

     public function vaxti_bitenler()
     {
       $result = $this->dtbs->vaxti_bitenler('qeydiyyat');
       $data['info'] = $result;
       $this->load->view('back/vaxti_bitenler/anasehife', $data);
     }

     public function qeydiyyat_add()
     {
       $result = $this->dtbs->list('qeydiyyat');
       $data['info'] = $result;
       $this->load->view('back/qeydiyyat/insert/anasehife', $data);
     }


     public function qeydiyyat_insert()
     {
            $data =  [
                      'fullname'    => trim(strip_tags(htmlspecialchars($this->input->post('fullname')))),
                      'quantity'    => trim(strip_tags(htmlspecialchars($this->input->post('quantity')))),
                      'start_date'  => trim(strip_tags(htmlspecialchars($this->input->post('start_date')))),
                      'end_date'    => trim(strip_tags(htmlspecialchars($this->input->post('end_date')))),
                      'gender'      => $this->input->post('gender')
                    ];
            $result = $this->dtbs->insert('qeydiyyat',$data);
            if($result)
            {
                $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Başarılı!</strong><br>
                                                        Qeydiyyat Tamamlandı 
                                                       </div>');
                redirect('admin/qeydiyyat');
            }
            else
            {
                $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Xətalı!</strong><br>
                                                        Qeydiyyat Tamamlanmadı
                                                       </div>');
                redirect('admin/qeydiyyat');
            }
     }


     public function qeydiyyat_update($id)
     {
         $result       = $this->dtbs->show($id,'qeydiyyat');
         $data['info'] = $result;
         $this->load->view('back/qeydiyyat/edit/anasehife',$data);
     }


     public function qeydiyyat_edit()
     {
         $id     = $this->input->post('id');
          
          $data = [
                      'fullname'    => trim(strip_tags(htmlspecialchars($this->input->post('fullname')))),
                      'quantity'    => trim(strip_tags(htmlspecialchars($this->input->post('quantity')))),
                      'start_date'  => trim(strip_tags(htmlspecialchars($this->input->post('start_date')))),
                      'end_date'    => trim(strip_tags(htmlspecialchars($this->input->post('end_date')))),
                      'gender'      => $this->input->post('gender')
                  ];
            $result = $this->dtbs->update($data,$id,'id','qeydiyyat');
            if($result)
            {
              $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Başarılı!</strong><br>
                                                        Qeydiyyat Yeniləndi
                                                       </div>');
              redirect('admin/qeydiyyat');
            }
            else
            {
              $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Xətalı!</strong><br>
                                                        Qeydiyyat Yenilənmədi 
                                                       </div>');
              redirect('admin/qeydiyyat');
            }

     }

       public function qeydiyyat_delete($id,$where,$from)
       {
          $result = $this->dtbs->delete($id,$where,$from);
          if($result)
          {
              $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Başarılı!</strong><br>
                                                        Qeydiyyat Silindi.. 
                                                       </div>');
              redirect('admin/qeydiyyat');
          }
          else
          {
              $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Xətalı!</strong><br>
                                                        Qeydiyyat Silinmədi.. 
                                                       </div>');
              redirect('admin/qeydiyyat');
          }
       }


     public function gundelik_qeydiyyat()
     {
       $result = $this->dtbs->gundelik_qeydiyyat('qeydiyyat');
       $data['info'] = $result;
       $this->load->view('back/gundelik_qeydiyyat/anasehife', $data);
     }




}
