<header>

    <!-- navbar -->
    <div class="navbar navbar-inverse">
        <div class="navbar-inner">
            <div class="container">

                <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>

                <!-- Be sure to leave the brand out there if you want it shown -->
                <!-- logo -->
                <a class="logo" href="<?=site_url(array('home', 'index'))?>" target="_blank"><?=$this->siteInfoArr->project_name?></a>

                <!-- breadcrumbs -->
                <!--<ul class="breadcrumb visible-desktop">
                    <li class="home"><a href="#"></a> <span class="divider"></span></li>
                    <li><a href="#">Sample 1</a> <span class="divider"></span></li>
                    <li class="active">Sample 2</li>
                </ul>-->

                <!-- profile bar -->
                <ul class="profileBar">
                    <li class="user visible-desktop"><img src="http://www.gravatar.com/avatar/<?=md5($this->email)?>?size=50" alt="" /></li>
                    <li class="profile">
                        <a class="dropdown-toggle" href="<?=site_url(array('admin', 'userlist', 'edit', $this->userId))?>">Welcome <?=$this->userName?> !<!--<span class="caret"></span>--></a>
                        <!--<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                            <li><a tabindex="-1" href="#">Action</a></li>
                            <li><a tabindex="-1" href="#">Another action</a></li>
                            <li><a tabindex="-1" href="#">Something else here</a></li>
                            <li class="divider"></li>
                            <li><a tabindex="-1" href="#">Separated link</a></li>
                        </ul>-->
                    </li>
                    <!--<li class="notify"><a href="#"><span>2</span></a></li>
                    <li class="calendar"><a href="#"></a></li>
                    <li class="mail"><a href="#"></a><span class="attention">!</span></li>-->
                </ul>

                <!-- Everything you want hidden at 940px or less, place within here -->
                <div class="nav-collapse collapse">
                    <!-- .nav, .navbar-search, .navbar-form, etc -->

                    <!-- top menu -->
                    <ul class="topMenu hidden-desktop">
                        <li class="active">
                            <a href="index.html">Dashboard</a>
                        </li>
                        <li>
                            <a href="typography.html">Typography &amp; Grid</a>
                        </li>
                        <li>
                            <a href="form.html">Form elements</a>
                        </li>
                        <li>
                            <a href="buttons.html">Buttons &amp; Icons</a>
                        </li>
                        <li>
                            <a href="components.html">Components</a>
                        </li>
                        <li>
                            <a href="#">Sample menu</a>
                            <ul>
                                <li><a href="sample.html">Sample item 1</a></li>
                                <li><a href="sample.html">Sample item 2</a></li>
                                <li><a href="sample.html">Sample item 3</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript.html">Javascript</a>
                        </li>
                    </ul>

                </div>

            </div>
        </div>
    </div>

</header>