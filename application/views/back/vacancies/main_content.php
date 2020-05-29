<div class="content-wrapper">
<div class="page-content fade-in-up">
<div class="col-12">
<?php echo $this->session->flashdata('status');?>
<div class="card">
  <div class="card-header">
    <h5 class="card-title">İŞ ELANLARI</h5>
  </div>
  
  <div class="card-body">
    <table id="myTable" class="table table-bordered table-striped table-responsive">
      <thead>
      <tr>
        <th class="text-center">No</th>
        <th>Şirkət</th>
        <th>Vakansiya</th>
        <th>Email</th>
        <th class="text-center">Aktiv / Passiv</th>
        <th class="text-center">Əməliyyatlar</th>
      </tr>
      </thead>
      <tbody>
          <?php $num=1; foreach ($info as $info): ?>
            <tr>
                <td style="width:5%;" class="text-center"><?=$num++;?></td>
                <td style="width:25%;"><?=word_limiter($info['firma'],3);?></td>
                <td style="width:20%;"><?=word_limiter($info['position'],2);?></td>
                <td style="width:15%;"><?=$info['email'];?></td>
                <td style="width:15%;" class="text-center">
                 <?php if($info['status']==1){ ?>
                      <button class="btn btn-success">Aktiv</button>
                   <?php } else { ?>
                      <button class="btn btn-danger">Passiv</button>
                   <?php } ?>
                </td>
                <td style="width:20%;" class="text-center">
                  <a href="<?=base_url('admin/vacancy_update/'.$info['id'].'');?>">
                    <button type="button" class="btn btn-success" name="button">Yenilə</button>
                  </a>
                  <a href="<?=base_url('admin/vacancy_delete/'.$info["id"].'/id/job_list');?>">
                    <button type="button" class="btn btn-danger" name="button">Sil</button>
                  </a>
                </td>
            </tr>
          <?php endforeach ?>
      </tbody>
    </table>
  </div>
</div>
</div>
</div>