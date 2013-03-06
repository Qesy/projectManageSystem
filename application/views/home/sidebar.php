<div class="span3">
	
	<form action="<?=site_url(array('home','search'))?>" method="post">
	<div class="well sidebar-nav">
		<h4><small>搜索编号</small></h4>
		<hr>
		
		<input type="text" class="input" name="searchId">
		<button type="submit" name="btnsearch" class="btn btn-primary">搜索</button>
				
	</div>
	</form>

	<script type="text/javascript" src="http://gopher.qiniudn.com/static/js/jquery.githubRepoWidget.min.js"></script>
	<div class="well sidebar-nav">
		<h4><small>主题状态</small></h4>
		<hr>
			<?php 
		$Rscount1 = $this->ticket_model->getStatistics(array('ticket_id'=>0,'status'=>1))-> result();
		$Rscount2 = $this->ticket_model->getStatistics(array('ticket_id'=>0,'status'=>2))-> result();
		$Rscount3 = $this->ticket_model->getStatistics(array('ticket_id'=>0,'status'=>3))-> result();
		$Rscount4 = $this->ticket_model->getStatistics(array('ticket_id'=>0,'status'=>4))-> result();
		$Rscount5 = $this->ticket_model->getStatistics(array('ticket_id'=>0,'status'=>5))-> result();
		
		

		?>	
		<table width="100%" class="status">
			<tbody>
			<tr>
				<td class="status-label">未解决</td>
				<td class="value"><?php echo $Rscount1[0] -> count?></td>
			</tr>
			<tr>
				<td class="status-label">进行中</td>
				<td class="value"><?php echo $Rscount2[0] -> count?></td>
			</tr>
			<tr>
				<td class="status-label">已完成</td>
				<td class="value"><?php echo $Rscount3[0] -> count?></td>
			</tr>
			<tr>
				<td class="status-label">已关闭</td>
				<td class="value"><?php echo $Rscount4[0] -> count?></td>
			</tr>
			<tr>
				<td class="status-label">已取消</td>
				<td class="value"><?php echo $Rscount5[0] -> count?></td>
			</tr>
			
			</tbody>
		</table>
	</div>
</div>