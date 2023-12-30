@include('backend.dashboard.components.breadcumb', ['title' => $config['seo']['create']['title']])

<form action="{{ route('user.catalogue.store') }}" method="post" class="box">
    @csrf
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox">
                    <div class="ibox-title">
                        <h5>Thông tin chung | <span class="text-danger">(*)</span> là bắt buộc)</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Tên nhóm</label>
                                    <span class="text-danger">(*)</span>
                                    <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                                    @if($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Ghi chú</label>
                                    <input type="text" name="description" class="form-control" value="{{ old('description') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-15 text-right">
            <button type="submit" name="send" value="send" class="btn btn-primary">Thêm mới</button>
        </div>
    </div>
</form>


