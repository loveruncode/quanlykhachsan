<div class="col-12 col-md-4 ">
    <div class="card mb-3 mt-2">
        <div class="card-header col-form-label">
            @lang('Hành Động')
        </div>
        <div class="card-body d-flex flex-column flex-sm-row align-items-center col-12 d-sm-flex p-1">
            <button type="submit" class="btn btn-primary btn-sm p-1 mx-1 btn-lg ml-2 btn-sm  mt-1 mb-1 ">Thêm Món
                Ăn</button>
            <a href="{{ route('food.index') }}" class="btn btn-primary btn-sm p-1 mx-1 btn-lg mr-1 btn-sm mt-1  ">Danh
                Sách</a>
        </div>
    </div>

    <div class="card mb-3 mt-2">
        <div class="card-header col-form-label">
            @lang('Hình Ảnh')
        </div>
        <div class="input-group mb-3 mx-auto p-2">
            <input type="file" name="image[]" id="images" onchange="previewImages(event)" multiple>
        </div>
        <div class="card-body">
            <div id="image-preview" class="mt-2">
                @php
                    $images = explode(',', $data->image);
                @endphp
                @foreach ($images as $key => $value)
                    <img src="{{ asset('/storage/' . $value) }}" alt=" hinh anh mon an " style="height:60px">
                @endforeach
            </div>
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
