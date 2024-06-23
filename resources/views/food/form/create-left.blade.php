<div class="col-12 col-md-8">
    <!-- Title -->
    <div class="row">
        <div class="col-12 mt-2">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <label class="control-label col-form-label p-0">@lang('Tên Món Ăn'):</label>
                    <span class="float-end text-yellow" data-bs-toggle="tooltip" data-bs-placement="top"
                        title="{{ __('NameFood') }}">
                    </span>
                </div>
                <div class="card-body p-2">
                    <input class="form-control" name="name" placeholder="Tên Món Ăn" />
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
                    <textarea  class="form-control checkEditor" name="desc" placeholder="Miêu Tả" ></textarea>
                </div>
            </div>
        </div>
    </div>

    <!-- Eat Time -->
    <div class="row">
        <div class="col-12 mt-2">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <label class="control-label col-form-label p-0">@lang('Giờ Ăn'):</label>
                    <span class="float-end text-yellow" data-bs-toggle="tooltip" data-bs-placement="top"
                        title="{{ __('eat-time') }}">
                    </span>
                </div>
                <div class="card-body p-2">
                    <input class="form-control" type="time" name="eat_time" placeholder="Giờ Ăn" />
                </div>
            </div>
        </div>
    </div>

    <!-- Price -->
    <div class="row">
        <div class="col-12 mt-2">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <label class="control-label col-form-label p-0">@lang('Giá Tiền'):</label>
                    <span class="float-end text-yellow" data-bs-toggle="tooltip" data-bs-placement="top"
                        title="{{ __('price') }}">
                    </span>
                </div>
                <div class="card-body p-2">
                    <input type="number" class="form-control" name="price" placeholder="Giá Tiền Món Ăn" />
                </div>
            </div>
        </div>
    </div>
     {{-- qty --}}
    <div class="row">
        <div class="col-12 mt-2">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <label class="control-label col-form-label p-0">@lang('Số Lượng'):</label>
                    <span class="float-end text-yellow" data-bs-toggle="tooltip" data-bs-placement="top"
                        title="{{ __('Số Lượng') }}">
                    </span>
                </div>
                <div class="card-body p-2">
                    <input type="number" class="form-control" name="qty" placeholder="Số Lượng ..." />
                </div>
            </div>
        </div>
    </div>
</div>
