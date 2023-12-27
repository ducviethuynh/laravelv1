@include('backend.dashboard.components.breadcumb', ['title' => $config['seo']['edit']['title']])

<form action="{{ route('user.update', $user->id) }}" method="post" class="box">
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
                                    <label for="" class="control-label text-right">Email</label>
                                    <span class="text-danger">(*)</span>
                                    <input type="text" name="email" class="form-control" value="{{ old('email', $user->email ?? '') }}">
                                    @if($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right"> Họ và tên </label>
                                    <span class="text-danger">(*)</span>
                                    <input type="text" name="name" class="form-control" value="{{ old('name', $user->name ?? '') }}">
                                    @if($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Nhóm thành viên</label>
                                    <span class="text-danger">(*)</span>

                                    @php
                                        $userCatalogue = [
                                            '--[Chọn nhóm thành viên]--',
                                            'Quản tri viên',
                                            'Cộng tác viên'
                                        ];
                                    @endphp

                                    <select label="" name="user_catalogue_id" class="form-control">
                                        @foreach($userCatalogue as $key => $item)
                                            <option value="{{ $key }}"
                                                    {{ old('user_catalogue_id', (isset($user->user_catalogue_id) ? $user->user_catalogue_id : '' )) === $key ? 'selected' : '' }}
                                            >
                                                {{ $item }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('user_catelogue_id'))
                                        <span class="text-danger">{{ $errors->first('user_catelogue_id') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Ngày sinh</label>
                                    <input type="date" name="birthday" class="form-control" value="{{ old('birthday', $user->birthday ?? '')  }}">
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Ảnh đại diện</label>
                                    <input type="text" name="image" class="form-control input-image" value="{{ old('image', $user->image ?? '') }}" data-upload="Images">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="ibox-title">
                        <h5>Thông tin liên hệ</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="province_id" class="control-label text-right">Thành phố</label>
                                    <select name="province_id" class="setupSelect2 form-control province location" data-target="districts">
                                        <option disable>--[Chọn thành phố]--</option>
                                        @if (isset($provinces))
                                            @foreach ($provinces as $province)
                                                <option @if(old('province_id') === $province->code) selected @endif value="{{ $province->code }}">
                                                {{ $province->name }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>


                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="district_id" class="control-label text-right">Quận/Huyện</label>
                                    <select name="district_id" class="form-control setupSelect2 districts location" data-target="wards">
                                        <option value="">--[Chọn Quận/Huyện]--</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="ward_id" class="control-label text-right">Phường/Xã</label>
                                    <select name="ward_id" class="form-control setupSelect2 wards">
                                        <option value="">--[Chọn Phường/Xã]--</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="address" class="control-label text-right">Địa chỉ</label>
                                    <input type="text" name="address" class="form-control" value="{{ old('address', $user->address ?? '') }}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right"> Điện thoại </label>
                                    <input type="text" name="phone" class="form-control" value="{{ old('phone', $user->phone ?? '') }}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="description" class="control-label text-right">Ghi chú</label>
                                    <textarea class="form-control" name="description">{{ old('description', $user->description ?? '') }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-15 text-right">
            <button type="submit" name="send" value="send" class="btn btn-primary">Cập nhật</button>
        </div>
    </div>
</form>

<script>
    var province_id = '{{ isset($user->province_id) ? $user->province_id :  old('province_id') }}';
    var district_id = '{{ isset($user->district_id) ? $user->district_id : old('district_id') }}';
    var ward_id = '{{ isset($user->ward_id) ? $user->ward_id : old('ward_id')  }}';
</script>
