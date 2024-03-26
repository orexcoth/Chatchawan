@extends('../backend/layout/side-menu')

@section('subhead')
    <title>Backend - {{ $default_pagename }}</title>
@endsection

@section('subcontent')
    <div class="intro-y mt-5 flex flex-wrap items-center sm:flex-nowrap" style="justify-content:space-between">
        <div>
            Po_id :
        </div>
        <div>
            <p>ผู้จัดจำหน่ายรายย่อย : Jone Cena</p>
        </div>
        <div class="flex">
            <button class="btn btn-primary mx-2 text-white">
                <i class="fa-regular fa-floppy-disk mr-1"></i>
                Save
            </button>
        </div>
    </div>

    @livewire('po.detail')
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
