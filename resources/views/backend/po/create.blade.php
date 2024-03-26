@extends('../backend/layout/side-menu')

@section('subhead')
    <title>Backend - {{ $default_pagename }}</title>
@endsection

@section('subcontent')
    <div class="mt-5">
        @livewire('po.create')
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
