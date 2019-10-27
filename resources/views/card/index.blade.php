@extends('layouts.app', ['title' => __('User Management')])
@section('content')
    @include('layouts.headers.cards')
    <div class="container-fluid mt--7">
        <div class="row">
        @foreach($board as $a)
            <div class="col">
            <i class="ni ni-air-baloon text-white"></i>
            <span class="h2 font-weight-bold mb-0 text-white">{{$a->name}} Board</span>
            <br><br><br><br>
            <nav aria-label="breadcrumb-custom">
            <ol class="breadcrumb-custom">
                <li class="breadcrumb-item"><a href="home">Home</a></li>
                <li class="breadcrumb-item"><a href="/board">Board</a></li>
                <li class="breadcrumb-item active" aria-current="page">Your Board</li>
            </ol>
            </nav>
                <!-- Card stats -->
            <div class="row">
            @foreach($a->card as $b)
                <!-- tes -->
                    <div class="col-lg-4 col-md-5">
                        <div class="card bg-secondary shadow border-0">
                            <div class="card-body px-lg-4 py-lg-4">
                            <div class="text-muted text-center mt-2 mb-3">{{$b->name}}</div>
                                <form method="post" action="{{ route('task.store') }}">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <div class="input-group input-group-alternative">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="ni ni-check-bold"></i></span>
                                            </div>
                                            <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Add your Task" required autofocus>
                                            <input type="hidden" name="card_id" id="input-card-id" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ $b->id }}">
                                            <input type="hidden" name="user_id" id="input-user-id" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ auth()->user()->id }}">
                                            @if(auth()->user()->id == $b->user_id || auth()->user()->id == 2)
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-primary btn-sm ">{{ __('ADD') }}</button>
                                            </div>
                                            @else
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-primary btn-sm" disabled>{{ __('ADD') }}</button>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </form>
                                <div class="card-custom card-stats mb-4 mb-xl-0" >
                                   @include('task.index')
                                </div>
                            </div>
                        </div>
                    </div>
                
                    @endforeach
                <!-- batas -->
                
                @if( auth()->user()->id == $b->user_id || auth()->user()->id == 2 )
                <div class="col-lg-4 col-md-5">
                    <div class="card bg-secondary shadow border-0">
                        <div class="card-body px-lg-4 py-lg-4">
                            <div class="card-custom card-stats mb-4 mb-xl-0" ><a href="board/create">
                                <div class="card-body">
                                    <div class="row">
                                    <h4 class="center-content">+ Create New Card</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </a>
                    <!-- Batas -->
                </div>
                </a>
                @endif
            </div>
            @endforeach
        </div>
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection
