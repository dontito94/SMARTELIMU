@extends('layouts.app', ['title' => 'Habari', 'header' =>'Habari'])

@push('after-styles')

<style>
    #image_box
    {

        max-width:200px; /* or whatever width you want. */

    }
</style>
@endpush

@section('content')
    <!-- Start main-content -->
    <div class="main-content">

                <!-- Section: About -->
                <section class="">
                    <div class="container">
                        <div class="section-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <h6 class="letter-space-4 text-gray-darkgray text-uppercase mt-0 mb-0">{!! trans('label.about_smart_elimu') !!}</h6>
                                    <h2 class="text-uppercase font-weight-600 mt-0 font-28 line-bottom">{!! trans('label.smart_elimu_intro') !!}</h2>
                                    <h4 class="text-theme-colored">{!! isset($about->introduction)? $about->introduction:'' !!}</h4>
                                    <p>.</p>
                                </div>

                            </div>
                        </div>
                    </div>
                </section>

                <!-- Section: Services -->
                <section id="services" class="bg-lighter">
                    <div class="container">

                        <div class="row mtli-row-clearfix">
                            <div class="col-xs-12 col-sm-6 col-md-4">
                                <div class="icon-box iconbox-theme-colored bg-white p-15 mb-30 border-1px">
                                    <a class="icon icon-dark border-left-theme-color-2-3px pull-left flip mb-0 mr-0 mt-5" href="#">
                                        <i class="pe-7s-target"></i>
                                    </a>
                                    <div class="icon-box-details">
                                        <h4 class="icon-box-title font-16 font-weight-600 m-0 mb-5">{!! trans('label.mission') !!}</h4>
                                        <p class="text-gray font-13 mb-0">{!! isset($about->mission)?$about->mission :''!!}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-4">
                                <div class="icon-box iconbox-theme-colored bg-white p-15 mb-30 border-1px">
                                    <a class="icon icon-dark border-left-theme-color-2-3px pull-left flip mb-0 mr-0 mt-5" href="#">
                                        <i class="pe-7s-world"></i>
                                    </a>
                                    <div class="icon-box-details">
                                        <h4 class="icon-box-title font-16 font-weight-600 m-0 mb-5">{!! trans('label.vision') !!}</h4>
                                        <p class="text-gray font-13 mb-0">{!! isset($about->vision)?$about->vision:'' !!}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-4">
                                <div class="icon-box iconbox-theme-colored bg-white p-15 mb-30 border-1px">
                                    <a class="icon icon-dark border-left-theme-color-2-3px pull-left flip mb-0 mr-0 mt-5" href="#">
                                        <i class="pe-7s-users"></i>
                                    </a>
                                    <div class="icon-box-details">
                                        <h4 class="icon-box-title font-16 font-weight-600 m-0 mb-5">{!! trans('label.partners') !!}</h4>
                                        <p class="text-gray font-13 mb-0">{!! isset($about->pioneers)?$about->pioneers:'' !!}</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </section>





{{--        <section class="">--}}
{{--            <div class="container">--}}
{{--                <div class="section-content">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-md-12">--}}
{{--                            <h6 class="letter-space-4 text-gray-darkgray text-uppercase mt-0 mb-0">{!! trans('label.about_smart_elimu') !!}</h6>--}}
{{--                            <h4 class="text-theme-colored">Lorem ipsum dolor sit amet soluta saepe odit error, maxime praesentium sunt udiandae!</h4>--}}
{{--                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore atque officiis maxime suscipit expedita obcaecati nulla in ducimus iure quos quam recusandae dolor quas et perspiciatis voluptatum accusantium delectus nisi reprehenderit, eveniet fuga modi pariatur, eius vero. Ea vitae maiores.</p>--}}
{{--                        </div>--}}

{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </section>--}}

        <!-- Divider: Funfact -->
        <section class="divider parallax layer-overlay overlay-theme-colored-2" data-bg-img="images/bg/bg2.jpg" data-parallax-ratio="0.7">
            <div class="container">
                <div class="row">
                    <div class="col-md-12" style="margin-top: 0px">
                        <div class="mt-2">
                            <div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
                                <div class="funfact text-center">
                                    <img class="item" src="{!! url('img/content/WANAFUNZI.png') !!}" width="100">                                    </a>
                                    <h2 data-animation-duration="2000" data-value="5248" class="animate-number text-black mt-0 font-38 font-weight-500">0</h2>
                                    <h5 class="text-black text-uppercase mb-0">{!! trans('label.candidates') !!}</h5>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
                                <div class="funfact text-center">
                                    <img class="item mt-1" src="{!! url('img/content/WAZAZI.png') !!}" width="100" style="margin-top: 10px">                                    </a>
                                    <h2 data-animation-duration="2000" data-value="675" class="animate-number text-black mt-0 font-38 font-weight-500">0</h2>
                                    <h5 class="text-black text-uppercase mb-0">{!! trans('label.parents') !!}</h5>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
                                <div class="funfact text-center">
                                    <img class="item" src="{!! url('img/content/WALIMU.png') !!}" width="100">                                    </a>
                                    <h2 data-animation-duration="2000" data-value="248" class="animate-number text-black mt-0 font-38 font-weight-500">0</h2>
                                    <h5 class="text-black text-uppercase mb-0">{!! trans('label.teachers') !!}</h5>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3 mb-md-0">
                                <div class="funfact text-center">
                                    <img class="item" src="{!! url('img/content/WADAU.png') !!}" width="100" >                                    </a>
                                    <h2 data-animation-duration="2000" data-value="24" class="animate-number text-black mt-0 font-38 font-weight-500">0</h2>
                                    <h5 class="text-black text-uppercase mb-0">{!! trans('label.partners') !!}</h5>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </section>


{{----}}

    </div>
    <!-- end main-content -->

@endsection
