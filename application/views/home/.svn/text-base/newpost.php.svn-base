<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>发表——<?=$this->siteInfoArr->project_name?></title>
<?php 	
		$this->common->load_css(array('bootstrap', 'bootstrap-responsive', 'wmd', 'style', 'prettify'));
		$this->common->load_js(array('jquery.min', 'bootstrap','prettify','application'));
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
<?php $this->load->view('home/header');?>
<div class="container">
  <div class="row">
    <div class="span12">
      <ul class="breadcrumb">
        <li> <a href="/"><i class="icon-home"></i> 首页</a> <span class="divider">/</span> </li>
        <li class="active">文章</li>
      </ul>
     
 
    </div>
  </div>
     <div class="row">
    <div class="span9">
      <div class="content">
       <form method="post" class="form-vertical" id="topic-form">
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
			
            </div>
            <p>
            <div class="control-group">
              <div class="controls">
                <label class="control-label" for="node" style="float:left; padding-right:55px;">状态 </label>
                <select id="node" name="status">
                  <option value="1">未解决</option>
                  <option value="2">进行中</option>
                  <option value="3">已完成</option>
                  <option value="4">已关闭</option>
                  <option value="5">已取消</option>
                </select>
              </div>
              <div class="controls">
                <label class="control-label" for="node" style="float:left; padding-right:40px;">处理人</label> 
                
                 <select id="node" name="processorid">
                  <?php foreach ($userdata as $row):?>
                  	<option value="<?php echo $row->id?>"><?php echo $row->username?></option>
                  	 <?php endforeach;?>    
                   </select>	
                 
              </div>
              <div class="controls">
                <label class="control-label" for="node" style="float:left; padding-right:55px;">程度</label>

                <select id="node" name="priority">
                  <option value="1">紧急</option>
                  <option value="2">正常</option>
                  <option value="3">计划</option>
                </select>
              </div>
               <button type="submit" class="btn btn-primary" style=" margin-left:250px;">提交</button>
            </div>
   
          </fieldset>
        </form>
      </div>

</div>
<?php $this->load->view('home/sidebar');?>
</div></div>
<?php $this->load->view('home/footer');?>

</body>
</html>
