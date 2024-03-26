@extends('../backend/layout/side-menu')

@section('subhead')
    <title>Backend - {{ $default_pagename }}</title>
@endsection

@section('subcontent')
    <div class="intro-y mt-5 flex flex-wrap items-center sm:flex-nowrap" style="justify-content:space-between">
        <div>
            <p>Po_id :0001</p>
            <p>ผู้จัดจำหน่ายรายย่อย : Jone Cena</p>
        </div>
        <div></div>
        <div class="flex">
            <a href="{{ route('po.index') }}" class="btn btn-primary mx-2 text-white">
                <i class="fa-regular fa-floppy-disk mr-1"></i>
                Save
            </a>
        </div>
    </div>
    <div class="mt-10">
        <select class="tom-select" style="width: 30rem;">
            <option value="กรุณาเลือกสถานะใบ PO">กรุณาเลือกสถานะใบ PO</option>
            <option value="รออนุมัติ">รออนุมัติ</option>
            <option value="อนุมัติ">อนุมัติ</option>
            <option value="ไม่อนุมัติ">ไม่อนุมัติ</option>
        </select>
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
