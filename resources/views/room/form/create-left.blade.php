<div class="col-12 col-md-8">
    <!-- title -->
    <div class="row">
        <div class="col-12 col-md-6 mt-2">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <label class="control-label col-form-label p-0">@lang('Mã Phòng'):</label>
                    <span class="float-end text-yellow" data-bs-toggle="tooltip" data-bs-placement="top"
                        title="{{ __('code') }}">
                    </span>
                </div>
                <div class="card-body p-2">
                    <input type="text" class="form-control" name="code" :value="old('code')"
                        placeholder="Mã Phòng: VD L01" />
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 mt-2">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <label class="control-label col-form-label p-0">@lang('Tiêu Đề'):</label>
                    <span class="float-end text-yellow" data-bs-toggle="tooltip" data-bs-placement="top"
                        title="{{ __('Title') }}">
                    </span>
                </div>
                <div class="card-body p-2">
                    <input type="text" class="form-control" name="title" :value="old('title')"
                        placeholder="Tiêu Đề" />
                </div>
            </div>
        </div>

    </div>



    <!-- status -->
    <div class="row">
        <div class="col-12 col-md-6 mt-2">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <label class="control-label col-form-label p-0">@lang('Diện Tích'):</label>
                    <span class="float-end text-yellow" data-bs-toggle="tooltip" data-bs-placement="top"
                        title="{{ __('area') }}">
                    </span>
                </div>
                <div class="card-body p-2">
                    <input id="area" type="text" class="form-control" name="area" :value="old('Diện Tích')"
                        placeholder="Diện Tích Đơn Vị: (m2)" />
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 mt-2">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <label class="control-label col-form-label p-0">@lang('Trạng Thái'):</label>
                    <span class="float-end text-yellow" data-bs-toggle="tooltip" data-bs-placement="top"
                        title="{{ __('Status') }}">
                    </span>
                </div>
                <div class="card-body p-2">
                    <select name="status" class="form-control ">
                        @foreach ($status as $key => $value)
                            <option value="{{ $key }}">{{ \App\Enum\RoomStatus::translate($key) }}</option>
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
                    <textarea class="form-control checkEditor" name="description" placeholder="Miêu Tả"></textarea>
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
                    <input id="start_date" type="date" class="form-control" name="start_rent"
                        :value="old('start_rent')" placeholder="Ngày Bắt Đầu" required/>
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
                    <input id="end_date" type="date" class="form-control" name="end_rent"
                        :value="old('end_rent')" placeholder="Ngày Kết Thúc" required/>
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
                    <input type="text" class="form-control" id="discount" name="discount"
                        :value="old('discount')" placeholder="Giảm Giá" />
                </div>
            </div>
        </div>
    </div>
    <!-- total -->
    <div class="row">
        <div class="col-12 col-md-6 mt-2 ">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <label class="control-label col-form-label p-0">@lang('Giá Theo Ngày'):</label>
                    <span class="float-end text-yellow" data-bs-toggle="tooltip" data-bs-placement="top"
                        title="{{ __('Price_per_date') }}">
                    </span>
                </div>
                <div class="card-body p-2">
                    <input readonly type="text" class="form-control" id="price_per_date" name="total"
                        placeholder="Giá Theo Ngày" />
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 mt-2 ">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <label class="control-label col-form-label p-0">@lang('Tổng Giá'):</label>
                    <span class="float-end text-yellow" data-bs-toggle="tooltip" data-bs-placement="top"
                        title="{{ __('Total') }}">
                    </span>
                </div>
                <div class="card-body p-2">
                    <input readonly type="text" class="form-control" id="total" name="total"
                        placeholder="Tổng Giá" />
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
        let start_DateInput = document.getElementById('start_date');
        let end_DateInput = document.getElementById('end_date');
        let pricePerDateInput = document.getElementById('price_per_date');

        function CalDate(total) {
            let startDate = new Date(start_DateInput.value);
            let endDate = new Date(end_DateInput.value);
            if (endDate < startDate) {
                alert("Ngày kết thúc phải lớn hơn ngày bắt đầu!");
                return 0;
            }
            let millisecondsDiff = endDate - startDate;
            let daysDiff = (millisecondsDiff / (1000 * 60 * 60 * 24)) + 1;
            let pricePerDate = Math.round(total / daysDiff);
            return pricePerDate;
        }

        function formatCurrency(value) {
            let number = parseInt(value.replace(/\D/g, ''), 10);
            if (isNaN(number)) {
                return "";
            }
            return new Intl.NumberFormat('vi-VN', {
                style: 'currency',
                currency: 'VND'
            }).format(number);
        }

        function calculateTotal() {
            let sellingPrice = parseFloat(sellingPriceInput.value.replace(/\D/g, '')) || 0;
            let discount = parseFloat(discountInput.value) || 0;

            let discountAmount = sellingPrice * (discount / 100);
            let total = sellingPrice - discountAmount;

            if (isNaN(discount) || discount === null) {
                total = sellingPrice;
            }

            totalInput.value = formatCurrency(total.toString());
            let pricePerDate = CalDate(total);
            pricePerDateInput.value = formatCurrency(pricePerDate.toString());
        }

        function formatInputValue(event) {
            let input = event.target;
            input.value = formatCurrency(input.value);
        }

        sellingPriceInput.addEventListener('input', calculateTotal);
        discountInput.addEventListener('input', calculateTotal);
        sellingPriceInput.addEventListener('blur', formatInputValue);
        totalInput.addEventListener('blur', formatInputValue);
        start_DateInput.addEventListener('change', calculateTotal);
        end_DateInput.addEventListener('change', calculateTotal);
    });
</script>
</script>
