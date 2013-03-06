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

<div id="content" class="container-fluid">
<form method="post">
  <fieldset>
    <legend>用户添加</legend>
    <label>用户名</label>
    <input type="text" placeholder="用户名" name="add_username" value="">
    <label>密码</label>
    <input type="password" placeholder="密码" name="add_password" value="">
    <label>确认密码</label>
    <input type="password" placeholder="确认密码密码" name="add_repassword" value="">
    <label>电子邮件</label>
    <input type="text" placeholder="电子邮件" name="add_email" value="">
    <label>工作组</label>
    <select name="add_workgroup">
    <?php foreach ($query->result() as $row): ?>
     	<option value="<?=$row->id?>"><?=$row->workgroupname?></option>
    <?php endforeach;?>
    </select>
    <br/><br/>
    <label class="checkbox">
      <input type="checkbox" name="add_status" checked="true"> 账户可用
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
