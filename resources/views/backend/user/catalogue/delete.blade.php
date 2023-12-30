{{--@include('backend.dashboard.components.breadcumb', ['title' => $config['seo']['delete']['title']])--}}

<form action="{{ route('user.catalogue.destroy', $catalogue->id) }}" method="post" class="box">
    @csrf
    @method('delete')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox">
                    <div class="panel-heading">
                        <h3>Cảnh báo</h3>
                        <p>
                            Bạn đang muốn xóa nhóm có tên là: <strong>{{ $catalogue->name }}</strong>
                        </p>
                        <p class="text-danger">Lưu ý: Không thể khôi phục dữ liệu sau khi xóa. Hãy chắc chắn bạn muốn thực hiện chức năng này.</p>

                    </div>

                    <div class="ibox-content">

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right"> Tên nhóm </label>
                                    <input type="text" name="name" class="form-control" value="{{ old('name', $catalogue->name ?? '') }}" disabled>
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

