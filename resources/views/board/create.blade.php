@extends('layouts.app', ['title' => __('User Management')])

@section('content')
    @include('board.partials.header', ['title' => __('Add Board')])   

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('User Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('board') }}" class="btn btn-sm btn-primary">{{ __('Back to Board') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('board.store') }}" autocomplete="off">
                            @csrf
                            
                            <h6 class="heading-small text-muted mb-4">{{ __('User information') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                                    <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('icons') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-icons">{{ __('Icon') }}</label>
                                    <select id="input-name" name="icons" class="form-control form-control-alternative{{ $errors->has('icons') ? ' is-invalid' : '' }}" required autofocus>
                                        <option value="fa fa-cart-plus">&#xf217;  fa-cart-plus</option>
                                        <option value="fa fa-briefcase">&#xf0b1;  fa-briefcase</option>
                                        <option value="fa fa-credit-card">&#xf09d; fa-credit-card</option>
                                        <option value="fa fa-book">&#xf02d;  fa-book</option>
                                        <option value="fa  fa-spinner">&#xf110;   fa-spinner</option>
                                        <option value="fa fa-laptop">&#xf109;  fa-laptop</option>
                                        <option value="fa fa-group">&#xf0c0;  fa-group</option>
                                        <option value="fa fa-coffee">&#xf0f4; fa-coffee</option>
                                    </select>
                                </div>
                                <div class="form-group{{ $errors->has('bg_icon') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-bg_icon">{{ __('Color') }}</label>
                                    <select id="input-name" name="bg_icon" class="form-control" >
                                        <option value="bg-primary">Ungu</option>
                                        <option value="bg-danger">Merah</option>
                                        <option value="bg-info">Biru</option>
                                        <option value="bg-success">Hijau</option>
                                        <option value="bg-warning">Orange</option>
                                    </select>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        @include('layouts.footers.auth')
    </div>
@endsection