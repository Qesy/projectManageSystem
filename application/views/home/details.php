<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $topicdata[0]->title ?>——<?=$this->siteInfoArr->project_name?></title>
<?php 	
		$this->common->load_css(array('bootstrap', 'bootstrap-responsive', 'wmd', 'style', 'prettify'));
		$this->common->load_js(array('jquery.min', 'bootstrap','prettify','application','ajaxupload'));
?>
<script type="text/javascript" src="/static/js/editor/kindeditor.js"></script>
<script type="text/javascript" src="/static/js/editor/lang/zh_CN.js"></script>	
<script>
        var editor;
        KindEditor.ready(function(K) {
                editor = K.create('#postedit',{
                    uploadJson : '<?=site_url(array('home', 'upload'))?>',
                    fileManagerJson : '<?=site_url(array('home', 'upload'))?>',
                    allowFileManager : false,
                    filePostName : 'filedata'
                });
        });
</script>
<link rel="shortcut icon" href="/static/favicon.ico">
</head>

<body>
<!-- ========================
            Header
============================= -->
<?php $this->load->view('home/header');?>


<div class="container">
  <div class="row">
    <div class="span12">
      <ul class="breadcrumb">
        <li> <a href="/"><i class="icon-home"></i> 首页</a> <span class="divider">/</span> </li>
        <li class="active">文章</li>
      </ul>
     
      
    </div></div>
     <div class="row">
    <div class="span9">
      <div class="content">
        <dl class="topics">
           <?
      $tclassColor = '';
      switch ($topicdata[0]->status) {
        case 1:
          $tclassColor = '<a class="btn pull-right btn-danger">未解决</a>';
          break;
        case 2:
          $tclassColor = '<a class="btn pull-right btn-warning">进行中</a>';
          break;
        case 3:
          $tclassColor = '<a class="btn pull-right btn-success">已完成</a>';
          break;
        case 4:
          $tclassColor = '<a class="btn pull-right btn-primary">已关闭</a>';
          break;
        case 5:
          $tclassColor = '<a class="btn pull-right btn-inverse">已取消</a>';
          break;      
        default:
          $tclassColor = '<a class="btn pull-right btn-danger">未解决</a>';
          break;
      }
      ?>
           <dd><h2 class="img-rounded">&nbsp;<a><?php echo $topicdata[0]->title ?></a></h2><?=$tclassColor?>
            <div class="space"></div>
            
            <div class="space"></div>
            <p class="muted"><?php echo htmlspecialchars_decode($topicdata[0]->content)?></p>
            <div class="info"> <a class="muted">发起人</a> • <a href=""><?php echo $userRS[$topicdata[0]->post_user_id] ->username ?></a> • <a class="muted">处理人</a> • <a href=""><?php echo $userRS[$topicdata[0]->process_user_id] ->username ?></a> •
              <a class="muted">时间：<?php echo date('y年m月d日 H点i分',$topicdata[0]->post_time);?></a></div>
            <div class="clear"></div>
          </dd>
        
        <?php foreach($data as $row):?>
        <?
      $classColor = '';
      switch ($row->status) {
        case 1:
          $classColor = '<a class="btn pull-right btn-danger">未解决</a>';
          break;
        case 2:
          $classColor = '<a class="btn pull-right btn-warning">进行中</a>';
          break;
        case 3:
          $classColor = '<a class="btn pull-right btn-success">已完成</a>';
          break;
        case 4:
          $classColor = '<a class="btn pull-right btn-primary">已关闭</a>';
          break;
        case 5:
          $classColor = '<a class="btn pull-right btn-inverse">已取消</a>';
          break;      
        default:
          $classColor = '<a class="btn pull-right btn-danger">未解决</a>';
          break;
      }
      ?>
          <dd> <h2 class="img-rounded"><a href="#">&nbsp;<?php echo $row->title ?> </a></h2> <?=$classColor?>
            <div class="space"></div>
            
            <div class="space"></div>
            <p class="muted"><?php echo htmlspecialchars_decode($row->content)?></p><div class="info"> <a class="muted">由</a> • <a href=""><?php echo $userRS[$row->post_user_id] ->username ?></a> • 转交给 • <a href=""><?php echo $userRS[$row->process_user_id] ->username ?></a> • 处理
              <a class="muted">时间：<?php echo date('y年m月d日 H点i分',$row->post_time);?></a></div>
            <div class="clear"></div>
          </dd>
        <?php endforeach; ?>
        </dl>
        <hr>
      </div>
      <div class="content">
       <form action="/home/postReply" method="post" class="form-vertical" id="topic-form">
          <fieldset>
      
            <div class="control-group">
              <label class="control-label" for="title">标题</label>
              <div class="controls">
                <textarea id="title" name="title" rows="1" class="span8"></textarea>
              </div>
            </div>
            <div class="wmd-panel">
            
				<textarea id="postedit" name="content" style="height:300px;" class="span8">
				
				</textarea>
			<input type="hidden" name="postid" value="<?php echo $post_id?>" />
			
            </div>
            <p>
            <div class="control-group">
              <div class="controls">
                <label class="control-label" for="node" style="float:left; padding-right:55px;">状态 </label>
                <select id="node" name="status">
                  <option value="1" <?= $topicdata[0]->status==1 ? 'selected="selected"' : ''?>>未解决</option>
                  <option value="2" <?= $topicdata[0]->status==2 ? 'selected="selected"' : ''?>>进行中</option>
                  <option value="3" <?= $topicdata[0]->status==3 ? 'selected="selected"' : ''?>>已完成</option>
                  <option value="4" <?= $topicdata[0]->status==4 ? 'selected="selected"' : ''?>>已关闭</option>
                  <option value="5" <?= $topicdata[0]->status==5 ? 'selected="selected"' : ''?>>已取消</option>
                </select>
              </div>
              <div class="controls">
                <label class="control-label" for="node" style="float:left; padding-right:40px;">处理人</label>
 
                <select id="node" name="processorid">
                  <?php foreach ($userRS as $row):?>
                  <option value="<?= $row->id?>" <?= $row->id==$topicdata[0]->process_user_id ? 'selected="selected"' : ''?>><?= $row->username?></option>
                   <?php endforeach;?>          
                </select>
              </div>
              <div class="controls">
                <label class="control-label" for="node" style="float:left; padding-right:55px;">程度</label>

                <select id="node" name="priority">
                  <option value="1" <?= $topicdata[0]->priority==1 ? 'selected="selected"' : ''?>>紧急</option>
                  <option value="2" <?= $topicdata[0]->priority==2 ? 'selected="selected"' : ''?>>正常</option>
                  <option value="3" <?= $topicdata[0]->priority==3 ? 'selected="selected"' : ''?>>计划</option>
                </select>
              </div>
               <button type="submit" class="btn btn-primary" style=" margin-left:250px;">提交</button>
            </div>
   
          </fieldset>
        </form>
      </div></div>
      <?php $this->load->view('home/sidebar');?>
  </div>
</div>
<?php $this->load->view('home/footer');?>

</body>
</html>
