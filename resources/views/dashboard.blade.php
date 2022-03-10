@php $layout = 'layouts.super_user_layout'; @endphp

@auth
    @php
        if(Auth::user()->user_level_id == 1){
            $layout = 'layouts.super_user_layout';
        }
        else if(Auth::user()->user_level_id == 2){
            $layout = 'layouts.admin_layout';
        }
        else if(Auth::user()->user_level_id == 3){
            $layout = 'layouts.user_layout';
        }
    @endphp
@endauth

{{-- Here I removed the @auth because the dashboard isn't loading properly --}}
@extends($layout)
@section('title', 'Dashboard')

@section('content_page')
<div class="content-wrapper">
<div class="container-fluid yes">
    <div>
        <img src="{{ asset('public/images/under construction.gif') }}" style="height:100vh; width:87vw;">
        {{-- <img src="{{ asset('public/images/background.png') }}" style="height:88vh; width:87vw;"> --}}
    </div>
</div>
</div>
@endsection

<!-- {{-- JS CONTENT --}} -->
@section('js_content')
    <script type="text/javascript">

    </script>
@endsection
