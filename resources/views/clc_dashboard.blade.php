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
        <!-- Main content -->
        <section class="content">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-12">
                            <h3><strong>CLC DASHBOARD</strong></h3>
                        </div>
                    </div>
                </div>
            </section>
            
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12 col-lg-6 mt-6">
                        <a href="{{ route('clc_category_pmi_clc') }}">
                        {{-- <a href="" data-toggle="modal" data-target="#modalOnGoing"> --}}
                            <div class="info-box">
                                <span class="info-box-icon bg-dark"><i class="fas fa-book-reader"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text" style="position:absolute !important; text-align: center; margin-top: 17px;"><h5><strong>PMI CLC</strong></h5></span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12 col-lg-6 mt-6">
                        <a href="{{ route('clc_category_pmi_fcrp') }}">
                        {{-- <a href="" data-toggle="modal" data-target="#modalOnGoing"> --}}
                            <div class="info-box">
                                <span class="info-box-icon bg-dark"><i class="fas fa-book-reader"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text" style="position:absolute !important; text-align: center; margin-top: 17px;"><h5><strong>PMI FCRP</strong></h5></span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12 col-lg-6 mt-6">
                        <a href="{{ route('clc_category_pmi_it_clc') }}">
                        {{-- <a href="" data-toggle="modal" data-target="#modalOnGoing"> --}}
                            <div class="info-box">
                                <span class="info-box-icon bg-dark"><i class="fas fa-book-reader"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text" style="position:absolute !important; text-align: center; margin-top: 17px;"><h5><strong>PMI IT-CLC</strong></h5></span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        
        </section>
    </div>
@endsection

<!--     {{-- JS CONTENT --}} -->
@section('js_content')
    <script type="text/javascript">

    </script>
@endsection
