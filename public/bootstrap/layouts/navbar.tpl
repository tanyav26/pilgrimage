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
                        <tpl:condition  data="user.isauthenticated" test="boolean" value="1" >
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
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">@<tpl:element type="text" data="user.username">username</tpl:element><b class="caret">&nbsp;</b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="/~livingstonefultang/system/start/dashboard">Dashboard</a></li>
                                    <li><a href="/~livingstonefultang/member/profile/view">View your profile</a></li>
                                    <li><a href="/~livingstonefultang/member/messages/inbox">Direct messages</a></li>
                                    <li class="divider"></li>
                                    <li><a href="/~livingstonefultang/member/settings/account">Profile settings</a></li>
                                    <li><a href="/~livingstonefultang/member/settings/privacy">Privacy</a></li>                            
                                    <li class="divider"></li>
                                    <li><a href="/~livingstonefultang/sign-out">Sign out</a></li>
                                </ul>
                            </li>
                            
                        </tpl:condition>
                        <tpl:condition  data="user.isauthenticated" test="boolean" value="0" >
                            <li><a href="/~livingstonefultang/member/session/start">Sign in</a></li>
                        </tpl:condition>

                    </ul> 


                    <form class="navbar-search pull-right" action="/~livingstonefultang/search" method="get">
                        <input type="text" class="search-query span4" name="query" placeholder="Search" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</tpl:layout>