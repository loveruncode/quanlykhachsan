<div class="col-12 col-md-8">
    <div class="row">
        <!-- Name -->
        <div class="col-12 mt-2">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <label class="control-label col-form-label p-0">@lang('Họ và Tên'):</label>
                    <span class="float-end text-yellow" data-bs-toggle="tooltip" data-bs-placement="top"
                        title="{{ __('Họ và Tên') }}">
                    </span>
                </div>
                <div class="card-body p-2">
                    <input type="text" class="form-control" name="name" :value="old('name')" placeholder="Họ và Tên" />
                </div>
            </div>
        </div>
        <!-- Email -->
        <div class="col-12 mt-2">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <label class="control-label col-form-label p-0">@lang('Email'):</label>
                </div>
                <div class="card-body p-2">
                    <input type="email" class="form-control" name="email" :value="old('email')" placeholder="Email" />
                </div>
            </div>
        </div>
        <!-- Phone -->
        <div class="col-12 mt-2">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <label class="control-label col-form-label p-0">@lang('Số Điện Thoại'):</label>
                </div>
                <div class="card-body p-2">
                    <input type="text" class="form-control" name="phone" :value="old('phone')"
                        placeholder="Số Điện Thoại" />
                </div>
            </div>
        </div>
        <!-- Gender & Roles -->
        <div class="col-12 mt-2">
            <div class="row">
                <!-- Gender -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <label class="control-label col-form-label p-0">@lang('Giới Tính'):</label>
                        </div>
                        <div class="card-body p-2">
                            <select name="status" class="form-control ">
                                <option value="male">@lang('Nam')</option>
                                <option value="female">@lang('Nữ')</option>
                                <option value="other">@lang('Khác')</option>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- Roles -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <label class="control-label col-form-label p-0">@lang('Vai Trò'):</label>
                        </div>
                        <div class="card-body p-2">
                            <select name="status" class="form-control ">
                                <option value="admin">Admin</option>
                                <option value="user">Người dùng</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Password & Confirm Password -->
        <div class="col-12 mt-2">
            <div class="row">
                <!-- Password -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <label class="control-label col-form-label p-0">@lang('Mật Khẩu'):</label>
                        </div>
                        <div class="card-body p-2">
                            <input type="password" class="form-control" name="password" placeholder="Mật Khẩu" />
                        </div>
                    </div>
                </div>
                <!-- Confirm Password -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <label class="control-label col-form-label p-0">@lang('Xác Nhận Mật Khẩu'):</label>
                        </div>
                        <div class="card-body p-2">
                            <input type="password" class="form-control" name="password_confirmation"
                                placeholder="Xác Nhận Mật Khẩu" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>