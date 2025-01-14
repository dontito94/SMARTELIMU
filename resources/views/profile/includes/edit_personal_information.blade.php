
@extends('layouts.app')

@section('content')
<!-- Start main-content -->
<div class="main-content" style="margin-top: 50px">

    <section>
        <div class="container pt-20 pb-20">
            {{--<div class="esc-heading lr-line left-heading">--}}
                {{--<h4>Vertical Tabs</h4>--}}
                {{--</div>--}}
            <div class="row">
                <div class="col-md-3">
                    <div class="vertical-tab">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab16" data-toggle="tab">{!! trans('label.personal_contacts') !!}</a></li>
{{--                            <li><a href="#tab17" data-toggle="tab">{!! trans('label.candidate_information') !!}</a></li>--}}
{{--                            <li><a href="#tab18" data-toggle="tab">{!! trans('label.course') !!}</a></li>--}}
                            {{--                                <li><a href="#tab19" data-toggle="tab">Testing</a></li>--}}
                        </ul>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-8 col-md-8">
                    <form method="POST" action="{{ route('profile.update_personal_info',$user->uuid) }}">
                        @csrf
                        <div class="icon-box mb-0 p-0">
                            <a href="#" class="icon icon-bordered icon-rounded icon-sm pull-left mb-0 mr-10">
                                <i class="fa fa-user"></i>
                            </a>
                            <h4 class="text-gray pt-10 mt-0 mb-30">{!! trans('label.edit_profile') !!}</h4>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>{!! trans('label.first_name') !!}</label>
                                <input name="first_name" class="form-control" value="{!! $user->first_name !!}" type="text">
                                @if ($errors->has('first_name'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong style="color: red">{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label>{!! trans('label.last_name') !!}</label>
                                <input name="last_name" class="form-control" value="{!! $user->last_name !!}" type="test">
                                @if ($errors->has('last_name'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong style="color: red">{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>{!! trans('label.username') !!}</label>
                                <input name="username" class="form-control" value="{!! $user->userName !!}" type="text">
                                @if ($errors->has('username'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong style="color: red">{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label>{!! trans('label.email') !!}</label>
                                <input name="email" class="form-control"  value="{!! $user->email !!}" type="text">
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong style="color: red">{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>{!! trans('label.phone') !!}</label>
                                <input name="phone" value="{!! $user->phone !!}" class="form-control" type="text">
                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong style="color: red">{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label>{!! trans('label.gender') !!}</label>
                                {!! Form::select('gender', code_value()->getCodeForSelect(1), $user->gender, ['class' => 'form-control select2', 'placeholder' => '', 'autocomplete' => 'off', 'id' => 'country', 'aria-describedby' => 'countryHelp', 'required']) !!}
                                @if ($errors->has('gender'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong style="color: red">{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>{!! trans('label.country') !!}
                                </label>
                                {!! Form::select('country', code_value()->getCountryIdsForSelect(),$user->country_id, ['class' => 'form-control select2', 'placeholder' => '', 'autocomplete' => 'off', 'id' => 'country', 'aria-describedby' => 'countryHelp', 'required']) !!}
                                @if ($errors->has('country'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong style="color: red">{{ $errors->first('country') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label>{!! trans('label.region') !!}</label>
                                {!! Form::select('region',  code_value()->getRegionForSelect(), $user->region_id, [ 'class' => 'form-control select2', 'placeholder' => '', 'autocomplete' => 'off', 'id' => 'region', 'aria-describedby' => '', 'required']) !!}
                                @if ($errors->has('region'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong style="color: red">{{ $errors->first('region') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>{!! trans('label.account_category') !!}
                                </label>
                                {!! Form::select('account_category', code_value()->getCodeForSelect(2), $user->category_cv_id, ['class' => 'form-control select2', 'placeholder' => '', 'autocomplete' => 'off', 'id' => 'country', 'aria-describedby' => 'countryHelp', 'required']) !!}
                                @if ($errors->has('account_category'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong style="color: red">{{ $errors->first('account_category') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group col-md-6">

                            </div>
                        </div>


                        <div class="form-group">
{{--                            {!! link_to_route('profile.personal_info',trans('buttons.general.cancel'),[],['id'=> 'cancel', 'class' => 'btn btn-primary cancel_button', ]) !!}--}}
                            <a href="{!! route('profile.personal_info') !!}" class="btn btn-default btn-lg mt-15" >{!! trans('buttons.general.cancel') !!}</a>

                            <button class="btn btn-dark btn-lg mt-15" type="submit">{!! trans('buttons.general.crud.update') !!}</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">

                </div>
            </div>
        </div>

    </section>
</div>
@endsection




