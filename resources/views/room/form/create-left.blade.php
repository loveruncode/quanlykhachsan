<div class="col-12 col-md-8">
    <!-- title -->
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
    <!-- status -->
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
                    <input type="text" class="form-control" name="status" :value="old('status')"
                        placeholder="Trạng Thái" />
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
                    <textarea class="form-control" name="description" placeholder="Miêu Tả"></textarea>
                </div>
            </div>
        </div>
    </div>
    <!-- Address -->
    <div class="row">
        <div class="col-12 mt-2">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <label class="control-label col-form-label p-0">@lang('Địa Chỉ'):</label>
                    <span class="float-end text-yellow" data-bs-toggle="tooltip" data-bs-placement="top"
                        title="{{ __('Address') }}">
                    </span>
                </div>
                <div class="card-body p-2">
                    <input class="form-control" name="address" placeholder="Địa chỉ Đường/ Phường/ Quận/ TP" />
                </div>
            </div>
        </div>
    </div>
    <!-- start - end day -->
    <div class="row">
        <!-- start -->
        <div class="col-12 col-md-6 mt-2">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <label class="control-label col-form-label p-0">@lang('Ngày Bắt Đầu'):</label>
                    <span class="float-end text-yellow" data-bs-toggle="tooltip" data-bs-placement="top"
                        title="{{ __('Start Rent') }}">
                    </span>
                </div>
                <div class="card-body p-2">
                    <input type="date" class="form-control" name="start_rent" :value="old('start_rent')"
                        placeholder="Ngày Bắt Đầu" />
                </div>
            </div>
        </div>
        <!-- end -->
        <div class="col-12 col-md-6 mt-2">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <label class="control-label col-form-label p-0">@lang('Ngày Kết Thúc'):</label>
                    <span class="float-end text-yellow" data-bs-toggle="tooltip" data-bs-placement="top"
                        title="{{ __('End Rent') }}">
                    </span>
                </div>
                <div class="card-body p-2">
                    <input type="date" class="form-control" name="end_rent" :value="old('end_rent')"
                        placeholder="Ngày Kết Thúc" />
                </div>
            </div>
        </div>
    </div>
    <!-- selling-price - discount -->
    <div class="row">
        <!-- selling-price -->
        <div class="col-12 col-md-6 mt-2">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <label class="control-label col-form-label p-0">@lang('Giá Thuê'):</label>
                    <span class="float-end text-yellow" data-bs-toggle="tooltip" data-bs-placement="top"
                        title="{{ __('Selling Price') }}">
                    </span>
                </div>
                <div class="card-body p-2">
                    <input type="text" class="form-control" id="sellingPrice" name="selling price"
                        :value="old('selling price')" placeholder="Giá Thuê" />
                </div>
            </div>
        </div>
        <!-- discount -->
        <div class="col-12 col-md-6 mt-2">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <label class="control-label col-form-label p-0">@lang('Giảm Giá'):</label>
                    <span class="float-end text-yellow" data-bs-toggle="tooltip" data-bs-placement="top"
                        title="{{ __('Discount') }}">
                    </span>
                </div>
                <div class="card-body p-2">
                    <input type="text" class="form-control" id="discount" name="discount" :value="old('discount')"
                        placeholder="% Giảm Giá" />
                </div>
            </div>
        </div>
    </div>
    <!-- total -->
    <div class="row">
        <div class="col-12 mt-2">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <label class="control-label col-form-label p-0">@lang('Tổng Giá'):</label>
                    <span class="float-end text-yellow" data-bs-toggle="tooltip" data-bs-placement="top"
                        title="{{ __('Total') }}">
                    </span>
                </div>
                <div class="card-body p-2">
                    <input readonly type="text" class="form-control" id="total" name="total" placeholder="Tổng Giá" />
                </div>
            </div>
        </div>
    </div>
</div>


<script>
document.addEventListener("DOMContentLoaded", function() {
    let sellingPriceInput = document.getElementById('sellingPrice');
    let discountInput = document.getElementById('discount');
    let totalInput = document.getElementById('total');

    function calculateTotal() {
        let sellingPrice = parseFloat(sellingPriceInput.value) || 0;
        let discount = parseFloat(discountInput.value) || 0;

        let discountAmount = sellingPrice * (discount / 100);
        let total = sellingPrice - discountAmount;

        if (isNaN(discount) || discount === null) {
            total = sellingPrice;
        }

        totalInput.value = total
    }

    sellingPriceInput.addEventListener('input', calculateTotal);
    discountInput.addEventListener('input', calculateTotal);
});
</script>