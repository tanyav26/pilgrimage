<tpl:layout name="navbar" xmlns:tpl="http://tuiyo.co.uk/tpl">
    <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <a class="brand logo" href="/~livingstonefultang/">Pilgrimage</a>
                <div class="nav-collapse">
                    
                    <ul class="nav pull-left">                     
                        <li><a href="/~livingstonefultang/sign-in">Featured</a></li>
                        <li><a href="/~livingstonefultang/system/start/explore">Explore</a></li>
                        <li><a href="/~livingstonefultang/system/activity/stream">Activity</a></li>
                        <li class="divider-vertical"></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">@drstonyhills<b class="caret">&nbsp;</b></a>
                            <ul class="dropdown-menu">
                                <li><a href="/~livingstonefultang/system/start/dashboard">Dashboard</a></li>
                                <li><a href="/~livingstonefultang/member/profile/view">View your profile</a></li>
                                <li class="divider"></li>
                                <li><a href="/~livingstonefultang/member/settings/account">Profile settings</a></li>
                                <li><a href="#">Privacy</a></li>
                                <li class="divider"></li>
                                <li><a href="/~livingstonefultang/member/messages/inbox">Direct messages</a></li>
                                <li><a href="#">Relationships</a></li>
                                <li><a href="#">Analytics</a></li>
                                <li class="divider"></li>
                                <li><a href="/~livingstonefultang/sign-out">Sign out</a></li>
                            </ul>
                        </li>
                    </ul> 
                    
                    <ul class="nav">                     
                        <li class="notification dropdown">
                            <a href="/~livingstonefultang/sign-in" class="dropdown-toggle" data-toggle="dropdown">4</a>
                            <ul class="dropdown-menu">
                                <li>
                                    <div class="alert-info alert no-margin">
                                        No new notifications
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    
                    <form class="navbar-search pull-right" action="/~livingstonefultang/search" method="get">
                          <input type="text" class="search-query span4" name="query" placeholder="Search" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</tpl:layout>