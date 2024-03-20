@extends('../backend/layout/side-menu')

@section('subhead')
    <title>Backend - {{ $default_pagename }}</title>
@endsection

@section('subcontent')
    <?php
    // echo "<pre>";
    // print_r($page_name);
    // echo "</pre>";
    ?>
    <div class="intro-y mt-5 flex flex-col items-center sm:flex-row">
        <h2 class="mr-auto text-lg font-medium">{{ $default_pagename }}</h2>
        <div class="mt-4 flex w-full sm:mt-0 sm:w-auto">
            <a href="{{ route('box_add') }}" class="btn btn-primary shadow-md mr-2">เพิ่ม{{ $default_pagename }}</a>
        </div>
    </div>

    <div class="lg:flex intro-y mt-5 mb-5">

        <div class="relative">
            <input type="text" name="keyword" id="keyword" class="form-control py-3 px-4 w-full lg:w-64 box pr-10"
                placeholder="ชื่อ{{ $default_pagename }}..." value="{{ request()->input('keyword') }}"
                onkeypress="handleEnter(event)">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="search"
                class="lucide lucide-search w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0 text-slate-500"
                data-lucide="search">
                <circle cx="11" cy="11" r="8"></circle>
                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
            </svg>
        </div>

    </div>
    <!-- <div id="fetchUserss"></div> -->

    @if (isset($query) && count($query) > 0)
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="text-center whitespace-nowrap">#</th>
                        <th class="whitespace-nowrap">ชื่อ{{ $default_pagename }}</th>
                        <th class="whitespace-nowrap">ประเภท</th>
                        <th class="whitespace-nowrap">กว้าง</th>
                        <th class="whitespace-nowrap">ยาว</th>
                        <th class="whitespace-nowrap">สูง</th>
                        <th class="whitespace-nowrap">น้ำหนัก (KG)</th>
                        <th class="text-center whitespace-nowrap">จัดการข้อมูล</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($query as $keyres => $res)
                        <tr class="intro-x">
                            <td class="text-center">{{ ($query->currentPage() - 1) * 24 + $keyres + 1 }}</td>


                            <td>
                                <div class="font-medium whitespace-nowrap">{{ $res->name }}</div>
                            </td>
                            <td>
                                <div class="font-medium whitespace-nowrap">{{ $res->box_type->name }}</div>
                            </td>
                            <td>
                                <div class="font-medium whitespace-nowrap">{{ $res->width }}</div>
                            </td>
                            <td>
                                <div class="font-medium whitespace-nowrap">{{ $res->length }}</div>
                            </td>
                            <td>
                                <div class="font-medium whitespace-nowrap">{{ $res->height }}</div>
                            </td>
                            <td>
                                <div class="font-medium whitespace-nowrap">{{ $res->weight }}</div>
                            </td>

                            <td class="table-report__action w-56">
                                <div class="flex justify-center items-center">
                                    <a class="flex items-center" href="{{ route('box_edit', ['id' => $res->id]) }}">
                                        <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> แก้ไข
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- END: Data List -->
        <div class="d-flex">
            {!! $query->appends(request()->input())->links() !!}
        </div>
    @endif





@endsection

@section('script')
    <script>
        function applyFilters() {
            var keyword = document.getElementById('keyword').value;
            var newUrl = `{{ route('box') }}?keyword=${keyword}`;
            window.location.href = newUrl;
        }

        function handleEnter(event) {
            if (event.key === 'Enter') {
                applyFilters();
            }
        }
    </script>
@endsection