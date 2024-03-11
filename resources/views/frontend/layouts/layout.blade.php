<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    @include('frontend.layouts.inc_header')
    <?php $pageName = "index"; ?>
</head>

<body>

@include('frontend.layouts.inc_topmenu')

    <section class="BannerIndex">
        <div class="container">
            <div class="BoxText-Banner">
                <p class="TextHeadBanner-Green">
                    Signature
                    <span class="TextHeadBanner-Gold">
                        Thailand
                    </span>
                </p>
                <br />
                <h1 class="TextBanner">
                    ออกแบบลายเซ็น ตัวอย่างลายเซ็น
                    ดาวน์โหลดลายเซ็น คลังลายเซ็น
                    สั่งซื้อลายเซ็น
                </h1>
                <br />
                <a class="btn ButtonSeemore" href="product.php">
                    คลังลายเซ็น
                    <span>
                        <img class="ms-1" src="./images/index/ic_pen.svg" alt="">
                    </span>
                </a>
                <!-- <form role="search">
                    <div class="search BoxSearch">
                        <input type="text" class="InputSearchBanner" placeholder="พิมพ์ชื่อเพื่อค้นหาลายเซ็น">
                        <button type="submit" class="searchButtonBanner">
                            ค้นหาลายเซ็น
                        </button>
                    </div>
                </form> -->
            </div>
        </div>
    </section>

@include('frontend.layouts.inc_menusignature')
@include('frontend.layouts.inc_searchsignature')

@yield('content')

@include('frontend.layouts.inc_menupreorder')
@include('frontend.layouts.inc_footer')

@yield('script')


{{-- Display SweetAlert on session success --}}
@if(session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                title: 'Success!',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        });
    </script>
@endif

{{-- Display SweetAlert on session error --}}
@if(session('error'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                title: 'Error!',
                text: '{{ session('error') }}',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        });
    </script>
@endif
</body>

</html>
