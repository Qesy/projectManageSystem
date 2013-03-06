<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>邮件配置——<?=$this->siteInfoArr->project_name?></title>
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
    <legend>邮件配置</legend>
    <label>SMTP地址</label>
    <input type="text" placeholder="邮件服务器的STMP地址" class="span4" name="smtp_host" value="<?=$rs->smtp_host?>">
    <label>SMTP账号</label>
    <input type="text" placeholder="邮件服务器的SMTP账号" name="smtp_user" value="<?=$rs->smtp_user?>">
    <label>SMTP密码</label>
    <input type="password" placeholder="邮件服务器的SMTP密码" name="smtp_pass" value="<?=$rs->smtp_pass?>">
    <label>SMTP端口</label>
    <input type="text" placeholder="25" name="smtp_port" class="span1" value="<?=$rs->smtp_port?>"><br>
    <button type="submit" class="btn">提交</button>
  </fieldset>
</form>
<fieldset>
    <legend>发送测试</legend>
    <label>Mail地址</label>
    <input type="text" placeholder="需要发送的邮件地址" class="span4" name="mail" id="mail" value=""><br>
    <button type="submit" class="btn" id="test">测试</button>
  </fieldset>
</bodyer>

<!-- ========================
          Javascripts
============================= -->
<?php $this->load->view('admin/footer');?>
<script>
$(function(){
  $('#test').click(function(){
    $.post('<?=site_url(array('admin', 'mail', 'test'))?>', {'mail':$('#mail').val()}, function(data){
        if(data == 1){
          alert('发送成功');
        }else{
          alert('发送失败');
        }
    })
  })
})
</script



</body>
</html>
