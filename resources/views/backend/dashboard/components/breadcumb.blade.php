<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>{{ $title }}</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('dashboard.index') }}">Dashboard</a>
            </li>
            <li>
                <a class="active" href="{{ route('user.index') }}"><strong>{{ $title }}</strong></a>
            </li>
        </ol>
    </div>
</div>