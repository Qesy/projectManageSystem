<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>登陆——<?=$this->siteInfoArr->project_name?></title>
<?php 
$this->common->load_css(array('bootstrap', 'bootstrap-responsive', 'bootstrap-responsive-fluid', 'prometheus', 'preview', 'menu','wmd'));
$this->common->load_js(array('jquery-latest', 'bootstrap', 'bootstrap.min', 'modernizr', 'menu', 'jquery.flot', 'jquery.flot.pie', 'excanvas.min', 'ajaxupload', 'jquery.min', 'application','prettify','modal'));
?>

</head>

<body>
<div style=" width:603px; margin:0 auto;">

<form class="box-example form-horizontal" method="post">
         
<div class="control-group"><div class="controls"><img src="<?=$this->siteInfoArr->logo?>" width="176" height="68" / style=" text-align:center; margin:0 auto;"></div></div>
                    <div class="control-group">
                  
                        <label class="control-label" for="inputEmail">邮箱</label>
                        <div class="controls">
                            <input type="text" name="inputEmail" placeholder="Username">  @9yuejiu.com
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="inputPassword">密码</label>
                        <div class="controls">
                            <input type="password" name="inputPassword" placeholder="Password">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <label class="checkbox">
                                <input type="checkbox"> Remember me
                            </label>
                            <br/>
                            <button type="submit" class="btn btn-primary">登陆</button>&nbsp;&nbsp;&nbsp; 
                            <?
                            if(!empty($this->siteInfoArr->is_open_reg)){
                            ?> 
                            <a class="btn" href="<?= site_url(array('welcome','reg'))?>">注册</a>
                            <?
                                }
                            ?>
                        </div>
                    </div>
                </form>
</div>


</body>
</html>
