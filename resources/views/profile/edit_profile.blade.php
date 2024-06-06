<div class="card">
    <div class="card-header bg-primary text-white">
        <h3>Thông tin cá nhân</h3>
        <img class="card-img-right rounded-circle float-end" id ="avatar" src="" alt="Avatar" width="150px" height="150px">
        <input type="file" id= "fileInput" onchange="previewAvatar()">
    </div>
    <div class="card-body">
    <table class="table">
      <tr>
        <td>Tên</td>
        <td><input type="text" placeholder="ví  dụ: Nguyễn Văn A"></td>
      </tr>
      <tr>
        <td>Email</td>
        <td><input type="email" placeholder="nguyenvana@gmail.com"></td>
      </tr>
      <tr>
        <td>Số điện thoại</td>
        <td><input type="number" placeholder="xxxxxxxxxx"></td>
      </tr>
      <tr>
        <td>Ngày sinh</td>
        <td>
          <input type="date" value="2024-06-02"/>
        </td>
      </tr>
      <tr>
        <td>Quốc tịch</td>
        <td><input type="text" placeholder="Việt Nam"></td>
      </tr>
      <tr>
        <td>Giới Tính</td>
        <td>
            <select name="" id="">
              <option value="nam">Nam</option>
              <option value="nữ">Nữ</option>
            </select>
        </td>
      </tr>
      <tr>
        <td>Địa chỉ</td>
        <td><input type="text" placeholder="Việt Nam"></td>
      </tr>
    </table>
    <a href="#" class="btn btn-primary">Save</a>
  </div>
</div>
<!-- script -->
<script>
  function previewAvatar(){
    const fileInput = document.getElementById("fileInput");
    const avatar = document.getElementById("avatar");
    fileInput.addEventListener('change', function(event){
      const file = event.target.files[0];
      if(file){
        const reader = new FileReader();
        reader.onload = function(e){
          avatar.src = e.target.result;
        };
        reader.readAsDataURL(file);
      }
    });
  }
</script>
