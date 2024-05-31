<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

<!-- Page level plugins -->
<script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('js/demo/chart-area-demo.js') }}"></script>
<script src="{{ asset('js/demo/chart-pie-demo.js') }}"></script>
<script src="{{ asset('js/setup.js') }}"></script>
<script src="{{ asset('js/jquery-3.6.4.min.js') }}"></script>
<script src="{{ asset('js/sweetalert2@11.js') }}"></script>
<script>
    @if (session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Thành công!',
            text: '{{ session('success') }}',
        });
    @endif
</script>

<script>
    @if (session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Thất Bại!',
            text: '{{ session('error') }}',
        });
    @endif
</script>


<script>
    $(document).ready(function() {
        $('.delete-button').on('click', function(event) {
            event.preventDefault();
            var url = $(this).data('url');
            Swal.fire({
                title: 'Bạn có chắc không?',
                text: "Nếu bạn tiếp tục, dữ liệu sẽ bị xóa khỏi hệ thống.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Đồng ý',
                cancelButtonText: 'Hủy'
            }).then((result) => {
                if (result.isConfirmed) {
                    $('<form>', {
                        'method': 'POST',
                        'action': url
                    })
                    .append('@csrf')
                    .append('@method("DELETE")')
                    .appendTo('body')
                    .submit();
                }
            });
        });
    });




</script>
