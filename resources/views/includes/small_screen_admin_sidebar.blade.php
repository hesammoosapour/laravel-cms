<ul class="list-group " >
    <a href="/admin" class="bg-dark list-group-item list-group-item-action">
        <div class="d-flex w-100 justify-content-start align-items-center">
            <span class="fa fa-dashboard fa-fw mr-3"></span>
            <span class="menu-collapsed">Dashboard</span>
        </div>
    </a>
    <a href="#users" data-toggle="collapse" aria-expanded="false" class=" bg-dark list-group-item list-group-item-action flex-column align-items-start">
        <div class="d-flex w-100 justify-content-start align-items-center ">
            <span class="fa fa-user fa-fw mr-3 "></span>
            <span class="menu-collapsed ">Users</span>
            <span class="submenu-icon ml-auto "></span>
        </div>
    </a>
    <!-- Submenu content -->
    <div id='users' class="collapse sidebar-submenu ">
        <a href="{{route('admin.users.index')}}" class="list-group-item list-group-item-action bg-dark text-white">
            <span class="menu-collapsed"><i class="fa fa-group"></i> All Users</span>
        </a>
        <a href="{{route('admin.users.create')}}" class="list-group-item list-group-item-action bg-dark text-white">
            <span class="menu-collapsed"><i class='fas fa-user-plus'></i> Create User</span>
        </a>
    </div>

    <a href="#posts" data-toggle="collapse" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
        <div class="d-flex w-100 justify-content-start align-items-center">
            <span class="fa fa-list fa-fw mr-3"></span>
            <span class="menu-collapsed">Posts</span>
            <span class="submenu-icon ml-auto"></span>
        </div>
    </a>
    <!-- Submenu content -->
    <div id='posts' class="collapse sidebar-submenu">
        <a href="{{route('admin.posts.index')}}" class="list-group-item list-group-item-action bg-dark text-white">
            <span class="menu-collapsed"><i class="fa fa-list-ol fa-fw mr-3"></i> All Posts</span>
        </a>
        <a href="{{route('admin.posts.create')}}" class="list-group-item list-group-item-action bg-dark text-white">
            <span class="menu-collapsed"><i class="fa fa-plus-square fa-fw mr-3" ></i> Create Post</span>
        </a>
        <a href="#comments" data-toggle="collapse" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
            <div class="d-flex w-100 justify-content-start align-items-center">
                <span class="fa fa-comments fa-fw mr-3"></span>
                <span class="menu-collapsed">Comments</span>
                <span class="submenu-icon ml-auto"></span>
            </div>
        </a>
        <div id='comments' class="collapse sidebar-submenu">
            <a href="{{route('admin.comments.index')}}" class="list-group-item list-group-item-action bg-dark text-white">
                <span class="menu-collapsed"><i class="fa fa-comments-o fa-fw mr-3" ></i> All Comments</span>
            </a>
            <a href="{{route('admin.replies.index')}}" class="list-group-item list-group-item-action bg-dark text-white">
                <span class="menu-collapsed"><i class="fa fa-reply-all fa-fw mr-3" ></i> All Replies</span>
            </a>
        </div>
    </div>

    <a href="{{route('admin.categories.index')}}" class="bg-dark list-group-item list-group-item-action">
        <div class="d-flex w-100 justify-content-start align-items-center">
            <span class="fa fa-th-list fa-fw mr-3"></span>
            <span class="menu-collapsed">Categories</span>
        </div>
    </a>

    <!-- Separator without title -->
    <li class="list-group-item sidebar-separator menu-collapsed"></li>
    <!-- /END Separator -->

    <a href="#media" data-toggle="collapse" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
        <div class="d-flex w-100 justify-content-start align-items-center">
            <span class="fa fa-file-movie-o fa-fw mr-3"></span>
            <span class="menu-collapsed">Media</span>
            <span class="submenu-icon ml-auto"></span>
        </div>
    </a>
    <!-- Submenu content -->
    <div id='media' class="collapse sidebar-submenu">
        <a href="{{route('admin.media.index')}}" class="list-group-item list-group-item-action bg-dark text-white">
            <span class="menu-collapsed"><i class="fa fa-video-camera"></i>  All Media</span>
        </a>
        <a href="{{route('admin.media.create')}}" class="list-group-item list-group-item-action bg-dark text-white">
            <span class="menu-collapsed"><i class='fa fa-upload'></i> Upload Media</span>
        </a>
    </div>

    <!-- Separator with title -->
    <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed">
        <small >OPTIONS</small>
    </li>
    <!-- /END Separator -->
    <a href="#" class="bg-dark list-group-item list-group-item-action">
        <div class="d-flex w-100 justify-content-start align-items-center">
            <span class="fa fa-question fa-fw mr-3"></span>
            <span class="menu-collapsed">Help</span>
        </div>
    </a>
    <a href="#" class="bg-dark list-group-item list-group-item-action">
        <div class="d-flex w-100 justify-content-start align-items-center">
            <span class="fa fa-tasks fa-fw mr-3"></span>
            <span class="menu-collapsed">Tasks</span>
        </div>
    </a>
    <a href="#top" data-toggle="sidebar-colapse" class="bg-dark list-group-item list-group-item-action d-flex align-items-center">
        <div class="d-flex w-100 justify-content-start align-items-center">
            <span id="collapse-icon" class="fa fa-2x mr-3"></span>
            <span id="collapse-text" class="menu-collapsed">Collapse</span>
        </div>
    </a>
</ul><!-- List Group END-->
