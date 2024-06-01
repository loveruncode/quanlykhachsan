<div class="col-12 col-md-8">
    <div class="row">
        <!-- title -->
        <div class="col-md-12 col-12">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <label class="control-label col-form-label p-0">@lang('Title'):</label>
                    <span class="float-end text-yellow" data-bs-toggle="tooltip" data-bs-placement="top"
                        data-bs-title="{{ __('Title') }}">
                        <i class="fas fa-fw fa-bell"></i>
                    </span>
                </div>
                <div class="card-body p-2">
                    <input class="form-control " name="title" value="{{$data->title}}" placeholder="Tiêu Đề"/>
                </div>
            </div>
        </div>
        <!-- desc -->
        <div class="col-md-12 col-12 mt-2">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <label class="control-label col-form-label p-0">@lang('Nội Dung'):</label>
                    <i class="fas fa-fw fa-book"></i>
                </div>
                <div class="card-body p-2">
                    <textarea id="editor1" name="desc" class="form-control w-100" style="height: 30vh;" id="descriptionInput" rows="3" >{{$data->desc}}</textarea>
                </div>
            </div>
        </div>
    </div>
</div>
