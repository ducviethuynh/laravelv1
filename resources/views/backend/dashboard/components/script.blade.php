<!-- Mainly scripts -->

<script src="backend/js/bootstrap.min.js"></script>
<script src="backend/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="backend/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="backend/js/inspinia.js"></script>
<script src="backend/js/plugins/pace/pace.min.js"></script>

<!-- jQuery UI -->
<script src="backend/js/plugins/jquery-ui/jquery-ui.min.js"></script>

{{-- My lib --}}
<script src="backend/libraries/lib.js"></script>

@if (isset($config['js']) && is_array($config['js']))
    @foreach($config['js'] as $value)
        {!! '<script src='.$value.'></script>' !!}
    @endforeach
@endif


