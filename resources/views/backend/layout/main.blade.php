@extends('../backend/layout/base')

@section('body')
    <body class="py-5 md:py-0 bg-black/[0.15] dark:bg-transparent">
        @yield('content')

        {{-- @include('../backend/layout/components/dark-mode-switcher') --}}
        {{-- @include('../backend/layout/components/main-color-switcher') --}}
        <!-- BEGIN: JS Assets-->
        <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=["your-google-map-api"]&libraries=places"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <script src="{{asset('myassets/js/jquery.min.js')}}"></script>
        <script src="{{asset('myassets/js/jquery-ui.min.js')}}"></script>
        <script src="{{asset('myassets/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('myassets/js/owl.carousel.js')}}"></script>
        <script src="{{asset('myassets/js/wow.min.js')}}"></script>
        <script src="{{asset('myassets/js/fancybox.umd.js')}}"></script>
        <script src="{{asset('myassets/js/bootstrap-datepicker.min.js')}}"></script>
        <script src="{{asset('myassets/js/bootstrap-datepicker.th.min.js')}}"></script>
        <script src="{{asset('myassets/js/modernizr.custom.js')}}"></script>
        <script src="{{asset('myassets/js/nouislider.min.js')}}"></script>
        <script src="{{asset('myassets/js/wNumb.min.js')}}"></script>
        <script src="{{asset('myassets/js/sweetalert.min.js')}}"></script>
        <script src="{{asset('myassets/js/datatables.min.js')}}"></script>
        <script src="{{asset('myassets/js/ckeditor.js')}}"></script>
        <script src="{{asset('myassets/js/select2.min.js')}}"></script>

        <script src="{{ mix('dist/js/app.js') }}"></script>
        <!-- END: JS Assets-->

        @yield('script')
        @if(session('success'))

        <script>
            // Swal.fire(
            //     'Success',
            //     '&nbsp;',
            //     'warning'
            // )
            Swal.fire({
                title: '{{session('success')}}',
                // text: "You won't be able to revert this!",
                icon: 'success',
                // showCancelButton: true,
                // confirmButtonColor: '#3085d6',
                // cancelButtonColor: '#d33',
                // confirmButtonText: 'Yes, delete it!'
                // }).then((result) => {
                // if (result.isConfirmed) {
                //     Swal.fire(
                //     'Deleted!',
                //     'Your file has been deleted.',
                //     'success'
                //     )
                // }
            })
        </script>
        @endif
        @if(session('error'))

        <script>
            // Swal.fire(
            //     'Success',
            //     '&nbsp;',
            //     'warning'
            // )
            Swal.fire({
                title: '{{session('error')}}',
                // text: "You won't be able to revert this!",
                icon: 'success',
                // showCancelButton: true,
                // confirmButtonColor: '#3085d6',
                // cancelButtonColor: '#d33',
                // confirmButtonText: 'Yes, delete it!'
                // }).then((result) => {
                // if (result.isConfirmed) {
                //     Swal.fire(
                //     'Deleted!',
                //     'Your file has been deleted.',
                //     'success'
                //     )
                // }
            })
        </script>
        @endif
    </body>
@endsection
