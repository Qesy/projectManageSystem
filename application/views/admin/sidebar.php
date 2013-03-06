<aside class="visible-desktop">
    <!-- search -->
    <form class="form-search">
        <div class="input-prepend">
            <button type="submit" class="btn"></button>
            <input type="text" class="search-query">
        </div>
    </form>

    <!-- menu -->
    <ul class="sideMenu">
        <li <?=($this->router->class == 'system') ? 'class="active"' : ''?>>
            <a href="<?=site_url(array('admin', 'system'))?>">系统设置</a>
        </li>
        <li <?=($this->router->class == 'userlist') ? 'class="active"' : ''?>>
            <a href="<?=site_url(array('admin', 'userlist'))?>">用户列表</a>
        </li>
<!--          <li>
            <a href="#">用户组</a>
        </li>
        -->
        <li <?=($this->router->class == 'mail') ? 'class="active"' : ''?>>
            <a href="<?=site_url(array('admin', 'mail'))?>">邮箱配置</a>
        </li>
        <li>
            <a href="<?=site_url(array('home', 'logout'))?>">安全退出</a>
        </li>
    </ul>

</aside>