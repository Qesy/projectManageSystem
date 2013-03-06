<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>系统管理——<?=$this->siteInfoArr->project_name?></title>
<?php 
$this->common->load_css(array('bootstrap', 'bootstrap-responsive', 'bootstrap-responsive-fluid', 'prometheus', 'preview', 'menu'));
$this->common->load_js(array('jquery-latest', 'bootstrap', 'bootstrap.min', 'modernizr', 'menu', 'jquery.flot', 'jquery.flot.pie', 'excanvas.min', 'ajaxupload'));
?>
<script > function yesno() { if(confirm("确认删除此用户?")){ return true;}else return false;} </script> 
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

<a href="<?= site_url(array('admin','userlist','add')) ?>" role="button" class="btn btn-primary" >添加新用户</a><br/><br/>

<table class="table table-striped">
<tr>
	<td>用户编号</td>
	<td>用户名</td>
	<td>电子邮件</td>
	<td>用户组</td>
	<td>账户状态</td>
	<td>注册时间</td>
	<td></td>
	<td></td>
	<td></td>
</tr>
<?php $this->load->model('workgroup_model'); ?>
<?php foreach($userRs as $row): ?> 
<tr>
	<td><?php echo $row->id ?></td>
	<td><?php echo $row->username ?></td>
	<td><?php echo $row->email ?></td>
	<td><?php echo $groupRs[$row->workgroup_id]->workgroupname ?></td>
	<td><?php echo ($row->status) ? '<lable class="btn btn-mini btn-success">账户可用</lable>' : '<lable class="btn btn-mini btn-danger">账户禁用</lable>'?></td>
	<td><?php echo date('Y-m-d H:i:s', $row->reg_time) ?></td>
	<td><a href="<?=site_url(array('admin','userlist','edit',$row->id))?>" class="btn btn-mini btn btn-primary">编辑</a></td>
	<td><a href="<?=site_url(array('admin','userlist','limit',$row->id))?>" class="btn btn-mini btn btn-primary">权限</a></td>
	<td><a href="<?=site_url(array('admin','userlist','del',$row->id))?>" class="btn btn-mini btn btn-danger" onclick="return yesno()">删除</a></td>           
</tr>
<?php endforeach;?>
</table>


<!-- ========================
          Javascripts
============================= -->
<?php $this->load->view('admin/footer');?>




</body>
</html>
