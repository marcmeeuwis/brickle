<nav class="navbar navbar-default navbar-left">
    <div class="container-fluid">

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="{{ route('admin::index') }}" data-toggle="tooltip" data-placement="right" title="Dashboard"><i class="fa fa-dashboard"></i></a></li>
                <li><a href="{{ route('admin::content.index') }}" data-toggle="tooltip" data-placement="right" title="Content"><i class="fa fa-file-text"></i></a></li>
                <li><a href="#" data-toggle="tooltip" data-placement="right" title="Media"><i class="fa fa-image"></i></a></li>
                <li><a href="#" data-toggle="tooltip" data-placement="right" title="Users"><i class="fa fa-users"></i></a></li>
                <li>
                    <a href="{{ route('admin::developer.index') }}" data-toggle="tooltip" data-placement="right" title="Developer">
                        <i class="fa fa-gear"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div><!-- /.container-fluid -->
</nav>