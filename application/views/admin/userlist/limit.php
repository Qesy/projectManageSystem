<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>系统管理——<?=$this->siteInfoArr->project_name?></title>
<?php 
$this->common->load_css(array('bootstrap', 'bootstrap-responsive', 'bootstrap-responsive-fluid', 'prometheus', 'preview', 'menu'));
$this->common->load_js(array('jquery-latest', 'bootstrap', 'bootstrap.min', 'modernizr', 'menu', 'jquery.flot', 'jquery.flot.pie', 'excanvas.min'));
?>
</head>

<body>

<!-- ========================
            Header
============================= -->
<?php $this->load->view('admin/header');?>


<!-- ========================
            Sidebar
============================= -->
<?php $this->load->view('admin/sidebar');?>


<!-- ========================
            Content
============================= -->
<?php $limitRS=$query->result()?>
<div id="content" class="container-fluid">
<form method="post">
  <fieldset>
    <legend>用户权限</legend>
    <label class="checkbox">
      <input type="checkbox" name="is_no_process" <?= $limitRS[0]->is_no_process==1 ? 'checked="true"' : '';?>> 未处理
    </label>
    <label class="checkbox">
      <input type="checkbox" name="is_processing" <?= $limitRS[0]->is_processing==1 ? 'checked="true"' : '';?>> 处理中
    </label>
    <label class="checkbox">
      <input type="checkbox" name="is_finished" <?= $limitRS[0]->is_finished==1 ? 'checked="true"' : '';?>> 已完成
    </label>
    <label class="checkbox">
      <input type="checkbox" name="is_cancled" <?= $limitRS[0]->is_cancled==1 ? 'checked="true"' : '';?>> 已取消
    </label>      
    <label class="checkbox">
      <input type="checkbox" name="is_closed" <?= $limitRS[0]->is_closed==1 ? 'checked="true"' : '';?>> 已关闭
    </label>    
    

    <br/>
    <button type="submit" class="btn btn-primary">提交</button>
    <a href="javascript:history.back();" class="btn">返回</a>
    
  </fieldset>
</form>
</bodyer>

<!-- ========================
          Javascripts
============================= -->
<?php $this->load->view('admin/footer');?>




</body>
</html>
