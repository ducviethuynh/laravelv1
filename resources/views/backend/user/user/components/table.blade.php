<table class="table table-hover">
    <thead>
    <tr>
        <th><input type="checkbox" name="" id="checkAll" class="input-checkbox"></th>
        <th>ID</th>
        <td>Avatar</td>
        <th>Thông tin thành viên</th>
        <th>Địa chỉ</th>
        <th>Tình trạng</th>
        <th>Thao tác</th>
    </tr>
    </thead>
    <tbody>
    @if(isset($users) && is_object($users))
        @foreach($users as $user)
            <tr class="">
                <td><input type="checkbox" name="" value="{{ $user->id }}" id="input-checkbox checkbox-item" class="checkBoxItem"></td>
                <td>{{ $user->id }}</td>
                <td style="width: 100px">
                    <img class="img-cover" src="https://visabaongoc.com/wp-content/uploads/2017/11/20170314104803-22-1489484341784.jpg" alt="">
                </td>
                <td>
                    <div class="user-item name"><strong>Họ và tên:</strong> {{ $user->name }} </div>
                    <div class="user-item email"><strong>Email:</strong> {{ $user->email }}</div>
                    <div class="user-item phone"><strong>Số điện thoại:</strong> {{ $user->phone }} </div>
                </td>
                <td>
                    <div class="user-item name"><strong>Địa chỉ: </strong>{{ $user->address }} </div>
                    <div class="user-item email"><strong>Phường:</strong> {{ $user->ward_id }}</div>
                    <div class="user-item phone"><strong>Quận:</strong> {{ $user->district_id }}</div>
                    <div class="user-item phone"><strong>Thành phố:</strong>{{ $user->province_id }}</div>
                </td>
                <td class="js-switch-{{$user->id}}">
                    <input data-modelId="{{ $user->id }}" type="checkbox" name="" id="" class="js-switch status " data-field="publish" data-model="User" value="{{ $user->publish }}" {{ ($user->publish === 1 ? 'checked' : '') }}>
                </td>
                <td>
                    <a href="" class="text-info"><i class="fa fa-eye"></i> Detail</a> <br>
                    <a href="{{ route('user.edit', [$user->id]) }}" class="text-warning"><i class="fa fa-edit"></i> Edit</a> <br>
                    <a href="{{ route('user.delete', [$user->id]) }}" class="text-danger"><i class="fa fa-trash"></i> Delete</a>
                </td>
            </tr>
        @endforeach
    @endif
    </tbody>
</table>
{{ $users->links('pagination::bootstrap-4') }}

{{--<script>--}}
{{--    $(document).ready(function() {--}}
{{--        var elem = document.querySelector('.js-switch');--}}
{{--        var switchery = new Switchery(elem, {color: '#1AB394'});--}}
{{--    })--}}
{{--</script>--}}
