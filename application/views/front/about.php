<?php $this->load->view('front/include/header');?>
<div class="inner-heading">
  <div class="container">
    <h3>HAQQIMIZDA</h3>
  </div>
</div>
<div class="inner-content about"> 
  <div class="container">
    <div class="row" style="text-align:center;margin-bottom:50px;">
      <h1 style="color:red;">HAQQIMIZDA</h1>
    </div>
    <div class="col-md-10" style="margin-left:100px;">
      <div class="row">
        <h3 style="color:red;">Layihə haqqında : </h3>
      </div>
      <div class="row" style="text-align:center;">
        <p style="font-style:italic;text-align:justify;"><?=$info['project_about'];?></p>
      </div>
      <div class="row">
        <h3 style="color:red;">Elanların yerləşdirilməsi : </h3>
      </div>
      <div class="row" style="text-align:center;">
        <p style="font-style:italic;text-align:justify;"><?=$info['job_procedure'];?></p>
      </div>
      <div class="row">
        <h3 style="color:red;">Bizimlə əlaqə : </h3>
      </div>
      <div class="row" style="text-align:center;">
        <p style="font-style:italic;text-align:justify;"><?=$info['contact'];?></p>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('front/include/footer');?>
