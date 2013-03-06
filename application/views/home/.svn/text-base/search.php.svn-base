<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>搜索——<?=$this->siteInfoArr->project_name?></title>
<?php 	
		$this->common->load_css(array('bootstrap', 'bootstrap-responsive', 'wmd', 'style', 'prettify'));
		$this->common->load_js(array('jquery', 'bootstrap','prettify','application'));
?>
	<link rel="shortcut icon" href="/static/favicon.ico"></head>
<body>
<?php $this->load->view('home/header');?>
	<div class="container">
		<div class="row">
			
			<div class="span9">
			
<div class="content">
	<h3>欢迎来到Golang中国社区</h3>
	<a href="<?=site_url(array('home', 'newpost'))?>" class="btn btn-success">发表话题</a>

	

	<dl class="topics">
		<?php foreach($data as $row):?>
		<dd>
			<a class="pull-left" style="margin-right: 10px;"><img src="http://www.gravatar.com/avatar/18cf355651a268b970e8dcafbe0745b4?s=48"></a>
			
				<a class="badge pull-right"></a>
			
			<a href="<?=site_url(array('home','details',$row->id))?>" class="title"><?php echo $row->title ?></a>
			<div class="space"></div>
			<div class="info">
				<a class="label">处理人</a> • 
				<a href="#"><strong></strong> <?= $userRS[$row->post_user_id]->username ?></a> • 
				
					<?php echo date('Y-m-d H:i:s',$row->post_time);?> • 
				
			</div>
			<div class="clear"></div>
		</dd>
	<?php endforeach; ?>
	</dl>
	<hr>
	
</ul></div>

			</div>
			
<?php $this->load->view('home/sidebar');?>

		</div>
	</div>
<?php $this->load->view('home/footer');?>
	


</body>
</body>
</html>
