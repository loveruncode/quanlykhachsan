<div class="card">
    <div class="card-header bg-primary text-white m-1">
        <h3>Thông tin cá nhân</h3>
        @if ($user->avatar == null)
            <td class="text-center"><img class="text-center" src="{{ asset('img/loading.svg') }}" height="50px"></td>
        @else
            <td class="text-center"><img src="{{ asset('/storage/' . $user->avatar) }}" height="50px"></td>
        @endif
        <input type="file" id= "fileInput" onchange="previewAvatar()">
    </div>
    <div class="card-body">
        <table class="table">
            <tr>
                <td>Tên</td>
                <td><input type="text" value="{{ $user->name }}" class='form-control'></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="email" value="{{ $user->email }}" class='form-control'></td>
            </tr>
            <tr>
                <td>Số điện thoại</td>
                <td><input type="number" value="{{ $user->phone }}" class='form-control'></td>
            </tr>
            <tr>
                <td>Giới Tính</td>
                <td>
                    <select class="form-control" name="gender">
                        <option value="{{ $user->gender }}">{{ \App\Enum\UserRoles::translate($user->roles) }}</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Đặt lại mật khẩu</td>
                <td>
                    <label for="" class='d-flex flex-column'>Mật khẩu cũ</label>
                    <input type="password" class='form-control'>
                    <label for="" class='d-flex flex-column'>Mật khẩu mới</label>
                    <input type="password" class='form-control'>
                </td>
            </tr>
        </table>
        <a href="#" class="btn btn-primary">Save</a>
    </div>
</div>
<!-- script -->
<script>
    function previewAvatar() {
        const fileInput = document.getElementById("fileInput");
        const avatar = document.getElementById("avatar");
        fileInput.addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    avatar.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    }
</script>
