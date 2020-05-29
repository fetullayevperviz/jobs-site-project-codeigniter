<div class="content-wrapper">
<div class="page-content fade-in-up">
	<div class="card card-info bg-dark text-white">
      <div class="card-header">
        <h3 class="card-title">İstifadəçi Əlavə Etmə Formu</h3>
      </div>
      <form class="form-horizontal" autocomplete="off" enctype="multipart/form-data" method="POST" action="<?=base_url('admin/user_insert');?>">
        <div class="card-body">
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Ad Soyad</label>
            <div class="col-sm-10">
              <input type="text" required name="fullname" class="form-control" placeholder="Ad soyad yazın">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">İstifadəçi Adı</label>
            <div class="col-sm-10">
              <input type="text" required name="username" class="form-control" placeholder="İstifadəçi adı yazın">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
              <input type="email" required name="email" class="form-control" placeholder="Email yazın">
            </div>
          </div>

           <div class="form-group row">
            <label class="col-sm-2 col-form-label">Telefon</label>
            <div class="col-sm-10">
              <input type="number" required name="phone" class="form-control" placeholder="Telefon nömrəsi yazın">
            </div>
          </div>

           <div class="form-group row">
            <label class="col-sm-2 col-form-label">Ünvan</label>
            <div class="col-sm-10">
              <input type="text" required name="adress" class="form-control" placeholder="Ünvan yazın">
            </div>
          </div>

           <div class="form-group row">
            <label class="col-sm-2 col-form-label">Vəzifə</label>
            <div class="col-sm-10">
              <input type="text" required name="position" class="form-control" placeholder="Vəzifə yazın">
            </div>
          </div>

           <div class="form-group row">
            <label class="col-sm-2 col-form-label">Yaş</label>
            <div class="col-sm-10">
              <input type="number" required name="age" class="form-control" placeholder="Yaşını yazın">
            </div>
          </div>

           <div class="form-group row">
            <label class="col-sm-2 col-form-label">Şəhər</label>
            <div class="col-sm-10">
              <input type="text" required name="city" class="form-control" placeholder="Şəhər adı yazın">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Şifrə</label>
            <div class="col-sm-10">
              <input type="password" required name="pass" class="form-control" placeholder="Şifrə yazın">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Hüquq No</label>
            <div class="col-sm-10">
               <select name="permission" class="form-control">
                 <option value="1">İkinci</option>
                 <option value="2">Üçüncü</option>
                 <option value="3">Dördüncü</option>
               </select>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">İstifadəçi Şəkili</label>
            <div class="col-sm-10">
              <input type="file" required name="image" class="form-control">
            </div>
          </div>

           <div class="form-group row">
            <label class="col-sm-2 col-form-label">Tərcümeyi-Hal</label>
            <div class="col-sm-10">
              <textarea required name="info" cols="30" rows="10" class="form-control"></textarea>
            </div>
          </div>

        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">
          	 <a href="<?=base_url('admin/users');?>" style="color:white;">Geri Qayıt</a>
          </button>
          <button type="submit" class="btn btn-success float-right">
          	 Əlavə Et
          </button>
        </div>
      </form>
    </div>
</div>
