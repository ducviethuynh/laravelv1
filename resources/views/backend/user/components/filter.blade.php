<div class="filter">
    <div class="row">
        <div class="perpage col-md-2">
            <select name="perpage" class="form-control filter perpage mr10">
                @for($i = 10; $i <= 100; $i += 10)
                    <option value="{{ $i }}">Lấy {{$i }} bản ghi</option>
                @endfor
            </select>
        </div>
        <div class="action col-md-6">
            <select name="user_catelogue_id" id="" class="form-control mr10">
                <option value="0" selected>--[Chọn nhóm thành viên]--</option>
                <option value="1" >Quản trị viên--</option>
                <option value="2" >Nhân viên</option>
                <option value="3" >Người dùng</option>
            </select>
        </div>
        <div class="col-md-4">
            <div class="input-group">
                <input type="text" name="keyword" id="" placeholder="Nhập từ khóa cần tìm..." class="form-control">
                <span class="input-group-btn">
                            <button type="submit" name="search" value="" class="btn btn-primary">Tìm Kiếm</button>
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
