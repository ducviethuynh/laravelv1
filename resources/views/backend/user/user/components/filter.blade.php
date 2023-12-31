<form action="{{ route('user.index') }}" method="get">
<div class="filter">
    <div class="row">
        <div class="perpage col-md-2">
            @php
            $perpage = request('perpage') ?: old('perpage');
            @endphp
            <select name="perpage" class="form-control filter perpage mr10">
                @for($i = 10; $i <= 100; $i += 10)
                    <option value="{{ $i }}" {{ $perpage == $i ? 'selected' : '' }}>Lấy {{$i }} bản ghi</option>
                @endfor
            </select>
        </div>
        <div class="action col-md-3">
            @php
            $publishArray = ['Kích hoạt', 'Không kích hoạt', 'Bỏ chọn lọc'];
            $publish = request('publist') ?: old('publish')
            @endphp
            <select name="publish" id="" class="form-control col-md-6 mr10">
                <option value="" disabled selected>--[Chọn trạng thái]--</option>
                @foreach($publishArray as $key => $value)
                <option {{ $publish == $key ? 'selected' : '' }} value="{{ $key }}" >{{ $value }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3">
            <select name="user_catelogue_id" id="" class="form-control col-md-6 mr10">
                <option value="0" disabled selected>--[Chọn nhóm thành viên]--</option>
                <option value="1" >Quản trị viên</option>
                <option value="2" >Nhân viên</option>
                <option value="3" >Người dùng</option>
            </select>
        </div>
        <div class="col-md-4">
            <div class="input-group">
                <input type="text" value="{{ request('keyword') ?: old('keyword') }}" name="keyword" id="" placeholder="Nhập từ khóa cần tìm..." class="form-control">
                <span class="input-group-btn">
                    <button type="submit" name="search" value="search" class="btn btn-primary">Tìm Kiếm</button>
                </span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('user.create') }}" class="btn btn-primary alignright">
                <i class="fa fa-plus"> Thêm thành viên mới</i>
            </a>
        </div>
    </div>
</div>
</form>