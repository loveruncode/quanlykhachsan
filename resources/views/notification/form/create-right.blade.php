
<div class="col-12 col-md-4">
    <div class="card mb-3">
        <div class="card-header col-form-label">
            @lang('Hành Động')
        </div>
        <div class="card-body p-2">
            <div class="d-flex align-items-center h-100 gap-2">
                <button type="submit" class="btn btn-primary ">Gửi</button>
            </div>
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-header">
            {{ __('Trạng thái') }}
        </div>
        <div class="card-body p-2">
            <select name="status"  class="form-control ">
                @foreach ($status as $key => $value)
                <option value="{{$key}}">{{$value}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="card mb-3" style="width: 100%; overflow-y: auto;">
        <div class="card-header">
            {{ __('Đại Lý&Seller') }}
        </div>
        <div  class="card-body p-3" style="max-height: 200px;">
            <select  name="user_id[]"  class="form-control" id="userSelect">
            </select>

        </div>
    </div>

</div>
