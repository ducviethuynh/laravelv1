@include('backend.dashboard.components.breadcumb', ['title' => $config['seo']['index']['title']])

<div class="ibox float-e-margins">
		<div class="ibox-title">
				<h5>{{ $config['seo']['index']['table'] }}</h5>

				@include('backend.user.user.components.toolbox')
		</div>
		<div class="ibox-content">
				@include('backend.user.user.components.filter')

				@include('backend.user.user.components.table')
		</div>
</div>
