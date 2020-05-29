<?php $this->load->view('front/include/header');?>
<!--inner heading start-->
<div class="inner-heading">
  <div class="container">
    <h3>BİZİMLƏ ƏLAQƏ</h3>
  </div>
</div>
<!--inner heading end--> 
<!--Inner Content start-->
<div class="inner-content contact-now"> 
<div class="container">  
  <!--Contact Start-->
  <div class="row">
        <div class="col-md-4">
        <div class="contact"> <span><i class="fa fa-home"></i></span>
          <div class="information"> <strong>ÜNVAN:</strong>
            <p>Bakı şəhər Yasamal rayon Şərifzadə küçəsi</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="contact"> <span><i class="fa fa-phone"></i></span>
          <div class="information"> <strong>TELEFON:</strong>
            <p>(+994) 55 576 96 37</p>
            <p>(+994) 51 354 55 16</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="contact"> <span><i class="fa fa-envelope"></i></span>
          <div class="information"> <strong>EMAİL:</strong>
            <p>pervizfetulla@gmail.com</p>
          </div>
        </div>
      </div>
    </div> 
    <div class="row formCont">
      <div class="col-md-6">
        <form autocomplete="off" action="<?php echo base_url('home/send_message');?>" method="post">
          <div class="row">
            <div class="col-sm-6">
              <div class="input-wrap">
                <input type="text" name="fullname" placeholder="ad soyadınızı yazın" class="form-control">
                <div class="form-icon"><i class="fa fa-user" aria-hidden="true"></i></div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="input-wrap">
                <input type="number" name="phone" placeholder="telefon nömrənizi yazın" class="form-control">
                <div class="form-icon"><i class="fa fa-phone" aria-hidden="true"></i></div>
              </div>
            </div>
          </div>
          <div class="input-wrap">
            <input type="text" name="email" placeholder="emailinizi yazın" class="form-control">
            <div class="form-icon"><i class="fa fa-envelope" aria-hidden="true"></i></div>
          </div>
          <div class="input-wrap">
            <input type="hidden" name="ip" value="<?php echo getIP();?>">
            <textarea name="message" class="form-control" placeholder="mesajınızı yazın"></textarea>
            <div class="form-icon"><i class="fa fa-comment" aria-hidden="true"></i></div>
          </div>
          <div class="contact-btn">
            <button class="sub" type="submit" value="submit" name="submitted"> <i class="fa fa-paper-plane" aria-hidden="true"></i> Göndər</button>
          </div>
          <div class="input-wrap">
             <?php echo $this->session->flashdata('info');?>
          </div>
        </form>
      </div>
      <div class="col-md-6">
      <div class="mapWrp">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3039.188188662935!2d49.797726514761194!3d40.382521565644375!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40307df472f95203%3A0xe1c255392ca0016a!2sDadash%20Bunyad-Zadeh%2C%20Baku%2C%20Azerbaijan!5e0!3m2!1sen!2s!4v1586516230774!5m2!1sen!2s" width="100" height="300" style="border:0" allowfullscreen=""></iframe>
      </div>
      </div>
    </div>
  <!--Contact End--> 
  </div>
</div>
<!--Inner Content End-->
<?php $this->load->view('front/include/footer');?>