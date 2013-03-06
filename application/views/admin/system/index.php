<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>系统管理——<?=$this->siteInfoArr->project_name?></title>
<?php 
$this->common->load_css(array('bootstrap', 'bootstrap-responsive', 'bootstrap-responsive-fluid', 'prometheus', 'preview', 'menu'));
$this->common->load_js(array('jquery-latest', 'bootstrap', 'bootstrap.min', 'modernizr', 'menu', 'jquery.flot', 'jquery.flot.pie', 'excanvas.min', 'ajaxupload'));
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
    <legend>系统设置</legend>
    <label>网站名称</label>
    <input type="text" placeholder="你的网站名称" name="project_name" value="<?=$this->siteInfoArr->project_name?>">
    <label>网站LOGO</label>
    <input type="text" placeholder="你的网站logo" id="logo" name="logo" value="<?=$this->siteInfoArr->logo?>"> <button id="upload_input" class="btn">上传</button>
    <label>网站版权</label>
    <textarea rows="3" class="span5" placeholder="你的网站版权" name="copyright"><?=$this->siteInfoArr->copyright?></textarea>
    <label class="checkbox">
      <input type="checkbox" name='is_open_reg' value="1" <?=!empty($this->siteInfoArr->is_open_reg) ? 'checked="checked"' : '';?>> 是否开放注册
    </label>
    <button type="submit" class="btn">提交</button>
  </fieldset>
</form>
</bodyer>

<!-- ========================
          Javascripts
============================= -->
<?php $this->load->view('admin/footer');?>
<script>
$(function(){
  var button = $('#upload_input'), interval;    
    new AjaxUpload(button, {
      action: '<?=site_url(array('home', 'upload'))?>', 
      name: 'filedata',
      onSubmit : function(file, ext){
        this.disable();     
      },      
      onComplete: function(file, response){ 
        var json_str = eval("(" + response + ")");
        if(json_str['error'] != 0)
        {
          this.enable();
          alert(json_str['err']);return;
        }
        window.clearInterval(interval);
        this.enable();        
        $('#logo').val(json_str['url']);    
      }
    });

})
</script>
</body>
</html>
