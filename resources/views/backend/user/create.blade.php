@include('backend.dashboard.components.breadcumb')

<form action="" method="post" class="box">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-5">
                <div class="panel-title">Thong tin chung</div>
                <div class="panel-description">Nhap thong tin chung cua nguoi su dung</div>
            </div>
            <div class="col-lg-7">
                <div class="ibox">
                    <div class="ibox-title">
                        <h5>Thong tin chung</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Email</label>
                                    <span class="text-danger">(*)</span>
                                    <input type="text" name="email" id="" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Ho va ten</label>
                                    <span class="text-danger">(*)</span>
                                    <input type="text" name="name" id="" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Nhom thanh vien</label>
                                    <span class="text-danger">(*)</span>
                                    <select name="user_catelogue_id" id="" class="form-control">
                                        <option value="0">--Chon nhom thanh vien--</option>
                                        <option value="1">--Quan tri vien--</option>
                                        <option value="2">--Cong tac vien--</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Ngay sinh</label>
                                    <input type="text" name="name" id="" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Mat khau</label>
                                    <span class="text-danger">(*)</span>
                                    <input type="password" name="password" id="" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Nhap lai mat khau</label>
                                    <span class="text-danger">(*)</span>
                                    <input type="password" name="re_password" id="" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Anh dai dien</label>
                                    <span class="text-danger">(*)</span>
                                    <input type="text" name="avatar" id="" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Email</label>
                                    <span class="text-danger">(*)</span>
                                    <input type="text" name="email" id="" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Ho va ten</label>
                                    <span class="text-danger">(*)</span>
                                    <input type="text" name="name" id="" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Nhom thanh vien</label>
                                    <span class="text-danger">(*)</span>
                                    <select name="user_catelogue_id" id="" class="form-control">
                                        <option value="0">--Chon nhom thanh vien--</option>
                                        <option value="1">--Quan tri vien--</option>
                                        <option value="2">--Cong tac vien--</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Ngay sinh</label>
                                    <input type="text" name="name" id="" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Mat khau</label>
                                    <span class="text-danger">(*)</span>
                                    <input type="password" name="password" id="" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Nhap lai mat khau</label>
                                    <span class="text-danger">(*)</span>
                                    <input type="password" name="re_password" id="" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Anh dai dien</label>
                                    <span class="text-danger">(*)</span>
                                    <input type="text" name="avatar" id="" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>