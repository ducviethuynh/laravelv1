<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>{{ config('apps.user.title') }}</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('dashboard.index') }}">Dashboard</a>
            </li>
            <li>
                <a class="active" href="{{ route('user.index') }}"><strong>{{ config('apps.user.title') }}</strong></a>
            </li>
        </ol>
    </div>
</div>

<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5>{{ config('apps.user.table_heading') }}</h5>

        @include('backend.user.components.toolbox')
    </div>
    <div class="ibox-content">
        @include('backend.user.components.filter')

        <a href="" class="btn btn-primary alignright">
            <i class="fa fa-plus"> Thêm thành viên mới</i>
        </a>

        @include('backend.user.components.table')
    </div>
</div>
