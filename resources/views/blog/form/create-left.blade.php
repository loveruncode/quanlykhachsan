<div class="col-12 col-md-8">
    <!-- title  -->
    <div class="row">
        <div class="col-12 mt-2">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <label class="control-label col-form-label p-0">@lang('Tiêu Đề'):</label>
                    <span class="float-end text-yellow" data-bs-toggle="tooltip" data-bs-placement="top"
                        title="{{ __('Title') }}">
                    </span>
                </div>
                <div class="card-body p-2">
                    <input type="text" class="form-control" name="title" :value="old('title')" placeholder="Tiêu Đề" />
                </div>
            </div>
        </div>
    </div>
    <!-- status  -->
    <div class="row">
        <div class="col-12 mt-2">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <label class="control-label col-form-label p-0">@lang('Trạng Thái'):</label>
                    <span class="float-end text-yellow" data-bs-toggle="tooltip" data-bs-placement="top"
                        title="{{ __('Status') }}">
                    </span>
                </div>
                <div class="card-body p-2">
                    <select name="status" id="status" class="form-control ">
                     @foreach ($status as $key => $value)
                        <option value="{{$key}}">{{$value}}</option>
                     @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
    <!-- DESC -->
    <div class="row">
        <div class="col-12 mt-2">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <label class="control-label col-form-label p-0">@lang('Miêu Tả'):</label>
                    <span class="float-end text-yellow" data-bs-toggle="tooltip" data-bs-placement="top"
                        title="{{ __('Description') }}">
                    </span>
                </div>
                <div class="card-body p-2">
                    <textarea class="form-control checkEditor" name="desc" placeholder="Miêu Tả"></textarea>
                </div>
            </div>
        </div>
    </div>
</div>
