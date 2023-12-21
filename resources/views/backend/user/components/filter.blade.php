<div class="filter">
    <div class="">
        <div class="perpage col-md-2">
            <select name="perpage" class="form-control filter perpage mr10">
                @for($i = 10; $i <= 100; $i += 10)
                    <option value="{{ $i }}">Lấy {{$i }} bản ghi</option>
                @endfor
            </select>
        </div>

        <div class="action col-md-10">
            <select name="user_catelogue_id" id="" class="form-control mr10">
                <option value="0" selected>--Chọn nhóm thành viên--</option>
                <option value="1" >Quản trị viên</option>
                <option value="1" >Nhân viên</option>
                <option value="1" >Người dùng</option>
            </select>

            <div class="">
                <div class="input-group">
                    <input type="text" name="keyword" id="" placeholder="Nhập từ khóa cần tìm..." class="form-control">
                    <span class="input-group-btn">
                            <button type="submit" name="search" value="" class="btn btn-primary">Tìm Kiếm</button>
                        </span>
                </div>
            </div>
        </div>
    </div>
</div>
