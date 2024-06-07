<div class="col-12 col-md-4 col-sm-8">
    <div class="card mb-3 mt-2">
        <div class="card-header col-form-label">
            @lang('Hành Động')
        </div>
        <div class="d-flex">
            <div class="card-body">
                <div class="align-items-center h-100 gap-2">
                    <button type="submit" class="btn btn-primary">Thêm Thành Viên</button>
                </div>
            </div>
            <div class="card-body">
                <div class="align-items-center h-100 gap-2">
                    <a href="{{ route('user.index') }}" class="btn btn-primary">Danh sách</a>
                </div>
            </div>
        </div>
    </div>
    <div class="card mb-3 mt-2">
        <div class="card-header col-form-label">
         @lang('Thêm Ảnh Đại Diện')
     </div>
     <div class="card-body d-flex flex-column flex-sm-row align-items-center justify-content-between">
         <input  type="file" name="avatar[]" id="images" multiple accept="image/jpeg,image/png"
             onchange="previewImages(event)">
     </div>
     <div class="card-body">
         <div id="image-preview" class="mt-2"></div>
     </div>
 </div>
</div>

<script>
    function previewImages(event) {
        const preview = document.getElementById('image-preview');
        preview.innerHTML = '';

        const files = event.target.files;
        for (const file of files) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const image = new Image();
                image.src = e.target.result;
                image.style.maxWidth = '100px';
                image.style.marginRight = '10px';
                preview.appendChild(image);
            };

            // Kiểm tra định dạng file trước khi đọc
            if (file.type === 'image/jpeg' || file.type === 'image/png') {
                reader.readAsDataURL(file);
            } else {
                alert('Chỉ chấp nhận file ảnh định dạng JPEG hoặc PNG.');
            }
        }
    }
    </script>
