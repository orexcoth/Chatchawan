@extends('../backend/layout/side-menu')

@section('subhead')
    <title>Backend - {{ $default_pagename }}</title>
@endsection

@section('subcontent')
    {{-- <h2 class="intro-y mt-10 text-lg font-medium">{{ $default_pagename }}</h2> --}}
    <div class="mt-5 grid grid-cols-12 gap-6">
        <div class="intro-y col-span-12 mt-2 flex flex-wrap items-center sm:flex-nowrap">
            <a href="{{ route('po.create') }}"
                class="border py-2 px-3 rounded-md font-medium cursor-pointer bg-primary border-primary text-white mr-2 shadow-md ">
                <i class="fa-solid fa-plus mr-1"></i>
                CREATE
            </a>
            <div class="mx-auto hidden text-slate-500 md:block"></div>
            <div class="mt-3 w-full sm:ml-auto sm:mt-0 sm:w-auto md:ml-0">
                <div class="relative w-56 text-slate-500">
                    <input type="text" placeholder="Search..."
                        class="text-sm border-slate-200 shadow-sm rounded-md placeholder:text-slate-400/90
                        w-56 pr-10">
                    <i data-lucide="search" class="stroke-1.5 absolute inset-y-0 right-0 my-auto mr-3 h-4 w-4"></i>
                </div>
            </div>
        </div>
        @livewire('po.table')
    </div>
@endsection

@section('script')
    <script>
        function applyFilters() {
            var keyword = document.getElementById('keyword').value;
            var newUrl = `{{ route('BN_users') }}?keyword=${keyword}`;
            window.location.href = newUrl;
        }

        function handleEnter(event) {
            if (event.key === 'Enter') {
                applyFilters();
            }
        }
    </script>
@endsection
