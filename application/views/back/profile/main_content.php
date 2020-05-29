<div class="content-wrapper">
<div class="page-content fade-in-up">
<div class="col-12">
<div class="row">
    <div class="col-lg-5">
        <div class="ibox">
            <div class="ibox-body">
                <div class="row mb-3">
                    <div class="col-12">
                      <img class="img" src="<?php echo base_url(); echo $info['image'];?>" alt="image" width="110">
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-4"><b>Ad Soyad</b></div>
                    <div class="col-6"><?=$info['fullname'];?></div>
                </div>
                <div class="row mb-2">
                    <div class="col-4"><b>İstifadəçi adı</b></div>
                    <div class="col-6"><?=$info['username'];?></div>
                </div>
                <div class="row mb-2">
                    <div class="col-4"><b>Yaş</b></div>
                    <div class="col-6"><?=$info['age'];?></div>
                </div>
                <div class="row mb-2">
                    <div class="col-4"><b>Vəzifə</b></div>
                    <div class="col-6"><?=$info['position'];?></div>
                </div>
                <div class="row mb-2">
                    <div class="col-4"><b>Şəhər</b></div>
                    <div class="col-6"><?=$info['city'];?></div>
                </div>
                <div class="row mb-2">
                    <div class="col-4"><b>Ünvan</b></div>
                    <div class="col-6"><?=$info['adress'];?></div>
                </div>
                <div class="row mb-2">
                    <div class="col-4"><b>Telefon</b></div>
                    <div class="col-6"><?=$info['phone'];?></div>
                </div>
                <div class="row mb-2">
                    <div class="col-4"><b>Email</b></div>
                    <div class="col-6"><?=$info['email'];?></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-7">
        <div class="ibox">
            <div class="ibox-body">
                <h5 class="font-strong mb-4" style="text-align:center;font-style:italic;color:red;">Tərcümeyi-Hal</h5>
                <p style="font-style:italic;"><?=$info['info'];?></p>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>