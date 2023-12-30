<table class="table table-hover">
    <thead>
    <tr>
        <th><input type="checkbox" name="" id="checkAll" class="input-checkbox"></th>
        <th>ID</th>
        <th>Tên nhóm</th>
        <th>Mô tả</th>
        <th>Tình trạng</th>
        <th>Thao tác</th>
    </tr>
    </thead>
    <tbody>
    @if(isset($userCatalogues) && is_object($userCatalogues))
        @foreach($userCatalogues as $userCatalogue)
            <tr class="">
                <td><input type="checkbox" name="" value="{{ $userCatalogue->id }}" id="input-checkbox checkbox-item" class="checkBoxItem"></td>
                <td>{{ $userCatalogue->id }}</td>
                <td><div class="user-item name">{{ $userCatalogue->name }} </div></td>
                <td>{{ $userCatalogue->description }}</td>
                <td class="js-switch-{{$userCatalogue->id}}">
                    <input data-modelId="{{ $userCatalogue->id }}" type="checkbox" name="" id="" class="js-switch status " data-field="publish" data-model="User" value="{{ $userCatalogue->publish }}" {{ ($userCatalogue->publish === 1 ? 'checked' : '') }}>
                </td>
                <td>
                    <a href="" class="text-info"><i class="fa fa-eye"></i>Detail</a> <br>
                    <a href="{{ route('user.catalogue.edit', [$userCatalogue->id]) }}" class="text-warning"><i class="fa fa-edit"></i> Edit</a> <br>
                    <a href="{{ route('user.catalogue.delete', [$userCatalogue->id]) }}" class="text-danger"><i class="fa fa-trash"></i> Delete</a>
                </td>
            </tr>
        @endforeach
    @endif
    </tbody>
</table>
@if(isset($userCatalogues))
    {{ $userCatalogues->links('pagination::bootstrap-4') }}
@endif

{{--<script>--}}
{{--    $(document).ready(function() {--}}
{{--        var elem = document.querySelector('.js-switch');--}}
{{--        var switchery = new Switchery(elem, {color: '#1AB394'});--}}
{{--    })--}}
{{--</script>--}}
