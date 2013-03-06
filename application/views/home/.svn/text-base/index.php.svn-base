<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$this->siteInfoArr->project_name?></title>
<?php 	
		$this->common->load_css(array('bootstrap', 'bootstrap-responsive', 'wmd', 'style', 'prettify'));
		$this->common->load_js(array('jquery.min', 'bootstrap','prettify','application'));
?>
	
	<link rel="shortcut icon" href="static/favicon.ico"></head>
<body>
	<?php $this->load->view('home/header');?>
	<div class="container">
		<div class="row">
			
			<div class="span9">
			
<div class="content">
	<h3>欢迎来到9悦酒项目管理系统</h3>
	<a href="<?=site_url(array('home', 'newpost'))?>" class="btn btn-success">发表话题</a>

	

	<dl class="topics">
		<?php foreach($data as $row):?>
		<dd>
			<a href="#" class="pull-left" style="margin-right: 10px;"><img class="img-rounded" src="http://www.gravatar.com/avatar/<?=md5($userRS[$row->process_user_id]->email)?>?size=50"></a>
			<?
			$classColor = '';
			switch ($row->status) {
				case 1:
					$classColor = 'btn-danger';
					break;
				case 2:
					$classColor = 'btn-warning';
					break;
				case 3:
					$classColor = 'btn-success';
					break;
				case 4:
					$classColor = 'btn-primary';
					break;
				case 5:
					$classColor = 'btn-inverse';
					break;			
				default:
					$classColor = 'btn-danger';
					break;
			}
			?>

			<a class="btn pull-right <?=$classColor?>"><?php echo $statusArr[$row->status]?></a>	
			
			<a href="<?=site_url(array('home', 'details',$row->id))?>" class="title"><?php echo $row->title ?></a>
			<div class="space"></div>
			<div class="info">
				<a class="label" >处理人</a> • 
				
				<a href="#"><strong><?= $userRS[$row->process_user_id]->username ?></strong></a> • 
				
					<?php echo date('Y-m-d H:i:s',$row->post_time);?> 
				
			</div>
			<div class="clear"></div>
		</dd>
	<?php endforeach; ?>
	</dl>
	<hr>
</div>
  
         
         	 <?php echo $this->pagination->create_links(); ?>
     
			</div>
		
<?php $this->load->view('home/sidebar');?>

		</div>
	</div>
	<?php $this->load->view('home/footer');?>


</body>
</html>
