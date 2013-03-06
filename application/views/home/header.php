	<header>
		<div class="container">
	
    <div class="form-inline pull-right login-form">

             欢迎登陆：<?= $this->userName?>，<a href="<?= site_url(array('home','logout'))?>">[退出]</a> &nbsp;
             <a href="<?= site_url(array('home','changepass'))?>">[修改密码]</a> &nbsp;
              <a href="<?= site_url(array('admin','system'))?>" target="_blank"><?= $this->workgroup==2 ? '[进入管理系统]' : ''?></a>
       <p style="padding-top: 20px;">  </p>
    </div>
   
			<div class="header-box">
				<a class="brand" href="/"><img src="<?=$this->siteInfoArr->logo?>" width="176" height="68" style="margin-top:-15px" /></a>
				<nav class="pull-left">
					<ul>
						<li><a class="btn btn-danger" href="<?=site_url(array('home', 'tobedone'))?>">未解决</a></li>
						<li><a class="btn btn-warning" href="<?=site_url(array('home', 'doing'))?>">进行中</a></li>
						<li><a class="btn btn-success" href="<?=site_url(array('home', 'finish'))?>">已完成</a></li>
						<li><a class="btn btn-primary" href="<?=site_url(array('home', 'close'))?>">已关闭 </a></li>
                        <li><a class="btn btn-inverse" href="<?=site_url(array('home', 'cancel'))?>">已取消 </a></li>
					</ul>
				</nav>
			</div>
		</div>
	</header>