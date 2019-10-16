@extends('layouts.app', ['title' => __('User Management')])
@section('content')
    @include('layouts.headers.cards')
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
            <i class="ni ni-air-baloon text-white"></i>
            <span class="h8 font-weight-bold mb-0 text-white">Your Team Boards</span>
            <br><br><br><br><br>
            <div class="col-12">
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    </div>
                <!-- Card stats -->
            <div class="row">
                @foreach($boards as $board)
                <div class="col-xl-3 col-lg-6">
                <div class="card-custom card-stats mb-4 mb-xl-0" data-clickable="true"><a href="{{url('/board/card/' .$board->id)}}">
                    @if(auth()->user()->id == 2)
                        <div class="card-header-custom text-right">
                            <div class="dropdown">
                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        <form action="{{ route('board.destroy', $board) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <a class="dropdown-item" href="{{url('/board/card/' .$board->id)}}">{{ __('View') }}</a>
                                            <a class="dropdown-item" href="#">{{ __('Edit') }}</a>
                                            <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete board $board->name ?") }}') ? this.parentElement.submit() : ''">
                                                {{ __('Delete') }}
                                            </button>
                                        </form>
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="card-body">
                            <div class="row2">
                                <div class="col">
                                <span class="span-content h5 text-uppercas" >Board Title</span>
                                <span class="h5 text-uppercase font-weight-bold mb-0">{{$board->name}}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape {{$board->bg_icon}} text-white rounded-circle shadow">
                                    <i class="{{$board->icons}}"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @if(auth()->user()->id == 2 )
                <div class="col-xl-3 col-lg-6">
                    <div class="card-custom card-stats mb-4 mb-xl-0" data-clickable="true"><a href="board/create">
                        <div class="card-body">
                            <div class="row3">
                                <h4 class="center-content">+ Create New Board</h2>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection
