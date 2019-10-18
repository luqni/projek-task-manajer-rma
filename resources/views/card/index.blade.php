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
                @if (!empty($a->card))
                <div class="col-xl-3 col-lg-6">
                    <div class="card-custom card-stats mb-4 mb-xl-0" >
                        <div class="card-body">
                            <div class="row2">
                                <div class="col">
                                    <h4 class="card-title text-muted mb-0">{{$b->name}}</h5>
                                </div>
                            </div>
                            @if( auth()->user()->id == $b->user_id || auth()->user()->id == 2 )
                           <h5><a href="#" data-toggle="modal" data-target="#ModalLoginForm"> + Add Checklist </a></h5>
                           @endif
                        </div>
                    </div>
                    @endif
                </div>
                @if( auth()->user()->id == $b->user_id || auth()->user()->id == 2 )
                <div class="col-xl-3 col-lg-6">
                    <div class="card-custom card-stats mb-4 mb-xl-0" data-clickable="true"><a href="board/create">
                        <div class="card-body">
                            <div class="row3">
                                <h4 class="center-content">+ Create New Card</h2>
                            </div>
                        </div>
                    </div>
                </div>
                </a>
                @endif
            </div>
            @endforeach
            @endforeach
        </div>
        </div>
        @include('layouts.footers.auth')
    </div>
<!-- Modal HTML Markup -->
<div id="ModalLoginForm" class="modal fade">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title">Add Checklist</h1>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form role="form" method="POST" action="">
                    <input type="hidden" name="_token" value="">
                    <div class="form-group">
                        <label class="control-label">Your Checklist</label>
                        <div>
                            <input type="email" class="form-control input-lg" name="email" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <div>
                            <button type="submit" class="btn btn-success">Add</button>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endsection