<nav class="page-sidebar" id="sidebar">
<div id="sidebar-collapse">
<ul class="side-menu metismenu">
    <li class="active">
        <a href="<?=linkto('admin');?>"><i class="sidebar-item-icon ti-home"></i>
            <span class="nav-label">ANA SƏHİFƏ</span></a>
    </li>
    <li>
        <a href="<?=linkto('admin/resumes');?>"><i class="sidebar-item-icon ti-menu"></i>
            <span class="nav-label">İŞ AXTARANLAR</span>
        </a>
    </li>
    <li>
        <a href="<?=linkto('admin/cv_rules');?>"><i class="sidebar-item-icon ti-menu"></i>
            <span class="nav-label">CV QAYDALARI</span>
        </a>
    </li>
    <li>
        <a href="<?=linkto('admin/vacancies');?>"><i class="sidebar-item-icon ti-menu"></i>
            <span class="nav-label">İŞ ELANLARI</span>
        </a>
    </li>
    <li>
        <a href="<?=linkto('admin/job_rules');?>"><i class="sidebar-item-icon ti-menu"></i>
            <span class="nav-label">ELAN QAYDALARI</span>
        </a>
    </li>
    <li>
        <a href="<?=linkto('admin/categories');?>"><i class="sidebar-item-icon ti-menu"></i>
            <span class="nav-label">KATEQORİYALAR</span>
        </a>
    </li>
    <li>
        <a href="<?=linkto('admin/sub_categories');?>"><i class="sidebar-item-icon ti-menu"></i>
            <span class="nav-label">ALT KATEQORİYALAR</span>
        </a>
    </li>
    <li>
        <a href="<?=linkto('admin/city');?>"><i class="sidebar-item-icon ti-menu"></i>
            <span class="nav-label">ŞƏHƏRLƏR</span>
        </a>
    </li>
    <li>
        <a href="<?=linkto('admin/education');?>"><i class="sidebar-item-icon ti-menu"></i>
            <span class="nav-label">TƏHSİL DƏRƏCƏSİ</span>
        </a>
    </li>
    <li>
        <a href="<?=linkto('admin/experience');?>"><i class="sidebar-item-icon ti-menu"></i>
            <span class="nav-label">İŞ TƏCRÜBƏSİ</span>
        </a>
    </li>
    <li>
        <a href="<?=linkto('admin/gender');?>"><i class="sidebar-item-icon ti-menu"></i>
            <span class="nav-label">CİNS</span>
        </a>
    </li>
    <li>
        <a href="<?=linkto('admin/work_time');?>"><i class="sidebar-item-icon ti-menu"></i>
            <span class="nav-label">İŞ GÜNÜ FORMATI</span>
        </a>
    </li>
    <li>
        <a href="<?=linkto('admin/social_media');?>"><i class="sidebar-item-icon ti-joomla"></i>
            <span class="nav-label">SOSİAL ŞƏBƏKƏLƏR</span>
        </a>
    </li>
    <li>
        <a href="<?=linkto('admin/message');?>"><i class="sidebar-item-icon ti-email"></i>
            <span class="nav-label">MESAJLAR</span>
        </a>
    </li>
    <?php $info = session('read','admininfo');?>
    <?php if($info->permission != 0){ ?>
    <li style="display: none;">
        <a href="<?=linkto('admin/users');?>"><i class="sidebar-item-icon ti-user"></i>
            <span class="nav-label">İSTİFADƏÇİLƏR</span>
        </a>
    </li>
    <?php } else { ?>
    <li>
        <a href="<?=linkto('admin/users');?>"><i class="sidebar-item-icon ti-user"></i>
            <span class="nav-label">İSTİFADƏÇİLƏR</span>
        </a>
    </li>
    <?php } ?>
    <?php if($info->permission != 0){ ?>
    <li style="display: none;">
        <a href="<?=linkto('admin/settings');?>"><i class="sidebar-item-icon ti-settings"></i>
            <span class="nav-label">PARAMETRLƏR</span>
        </a>
    </li>
   <?php } else { ?>
    <li>
        <a href="<?=linkto('admin/settings');?>"><i class="sidebar-item-icon ti-settings"></i>
            <span class="nav-label">PARAMETRLƏR</span>
        </a>
    </li>
   <?php } ?>
    <li>
        <a href="<?=base_url();?>" target="_blank"><i class="sidebar-item-icon ti-shift-left"></i>
            <span class="nav-label">SAYTA GET</span>
        </a>
    </li>
    <li>
        <a href="<?=linkto('admin/close');?>"><i class="sidebar-item-icon ti-shift-right"></i>
            <span class="nav-label">ÇIXIŞ</span>
        </a>
    </li>
    </ul>
</div>
</nav>

