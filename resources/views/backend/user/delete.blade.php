@include('backend.dashboard.components.breadcumb', ['title' => $config['seo']['edit']['title']])

<form action="{{ route('user.destroy', $user->id) }}" method="post" class="box">
    @csrf
    @method('delete')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox">
                    <div class="panel-heading">
                        <h3>Cảnh báo</h3>
                        <p>
                            Bạn đang muốn xóa thành viên có email là: <strong>{{ $user->email }}</strong>
                        </p>
                        <p class="text-danger">Lưu ý: Không thể khôi phục dữ liệu thành viên sau khi xóa. Hãy chắc chắn bạn muốn thực hiện chức năng này.</p>

                    </div>

                    <div class="ibox-content">

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Email</label>
                                    <input type="text" name="email" class="form-control" value="{{ old('email', $user->email ?? '') }}" disabled>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right"> Họ và tên </label>
                                    <input type="text" name="name" class="form-control" value="{{ old('name', $user->name ?? '') }}" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-15 text-right">
            <button type="submit" name="send" value="send" class="btn btn-danger">Xóa</button>
        </div>
    </div>
</form>

