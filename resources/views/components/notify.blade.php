<li class="nav-item dropdown no-arrow mx-1">
    <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-bell fa-fw"></i>
        <!-- Counter - Alerts -->
        @if ($sl > 9)
        <span class="badge badge-danger badge-counter">10+</span>
        @else
        <span class="badge badge-danger badge-counter">{{$sl}}</span>
        @endif

    </a>
    <!-- Dropdown - Alerts -->
    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
        aria-labelledby="alertsDropdown">
        <h6 class="dropdown-header">
           Thông Báo
        </h6>
        @foreach ($notify->reverse()->take(5) as $key => $value)
        <a class="dropdown-item d-flex align-items-center" href="#">
            <div class="mr-3">
                <div class="icon-circle bg-success ">
                    {{-- <i class="fas fa-file-alt text-white"></i> --}}
                    <i class="fas fa-bell  text-white"></i>
                </div>
            </div>
            <div>
                <div class="small text-gray-500">{{ $value->created_at }}</div>
                <span class="font-weight-bold text-truncate ">{{ $value->title }}</span>
                <p class="text-muted text-truncate ">{{ $value->desc }}</p>
            </div>
        </a>
    @endforeach

        {{-- <a class="dropdown-item d-flex align-items-center" href="#">
            <div class="mr-3">
                <div class="icon-circle bg-success">
                    <i class="fas fa-donate text-white"></i>
                </div>
            </div>
            <div>
                <div class="small text-gray-500">December 7, 2019</div>
                $290.29 has been deposited into your account!
            </div>
        </a> --}}
        {{-- <a class="dropdown-item d-flex align-items-center" href="#">
            <div class="mr-3">
                <div class="icon-circle bg-success ">
                    <i class="fas fa-exclamation-triangle text-white"></i>
                    <i class="fas fa-donate text-white"></i>
                </div>
            </div>
            <div>
                <div class="small text-gray-500">December 2, 2019</div>
                Spending Alert: We've noticed unusually high spending for your account.
            </div>
        </a> --}}
        <a class="dropdown-item text-center small text-gray-500" href="#">Show All
            Alerts</a>
    </div>
</li>
