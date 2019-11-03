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
                <li class="breadcrumb-item active" aria-current="page">Your Card</li>
            </ol>
            </nav>
                <!-- Card stats -->
            <div class="row">
            @foreach($a->card as $b)
                <!-- tes -->
                    <div class="col-lg-4 col-md-5">
                        <div class="card bg-secondary shadow border-0">
                            <div class="card-body px-lg-4 py-lg-4">
                            <form  action="{{ route('card.destroy', $b->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="button" class="icon-custome icon-shape-custome bg-danger text-white rounded-circle shadow" onclick="confirm('{{ __("Are you sure you want to delete Card $b->name ?") }}') ? this.parentElement.submit() : ''">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                            <div class="text-muted text-center mt-2 mb-3">{{$b->name}} <br/>
                            @if(strtotime($b->due_on) > strtotime("now"))
                            <span class="text-muted-green text-center mt-2 mb-3-custome">Deadline: {{date('j F Y', strtotime ($b->due_on))}}
                            </span></div>
                            @else
                            <span class="text-muted-red text-center mt-2 mb-3-custome">Deadline: {{date('j F Y', strtotime ($b->due_on))}}
                            </span><span class="text-muted-black text-center mt-2 mb-3-custome">Expired!
                            </span></div>
                            @endif
                                <form method="post" action="{{ route('task.store')}}">
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
                @if(!$a->card->isEmpty())
                @if( auth()->user()->id == $b->user_id || auth()->user()->id == 2 )
                <div class="col-lg-4 col-md-5">
                    <div class="card bg-secondary shadow border-0">
                        <div class="card-body px-lg-4 py-lg-4">
                            <div class="card-custom card-stats mb-4 mb-xl-0" type="button" data-toggle="modal" data-target="#exampleModal">
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
                @else
                @if( auth()->user()->id == $a->user_id || auth()->user()->id == 2 )
                <div class="col-lg-4 col-md-5">
                    <div class="card bg-secondary shadow border-0">
                        <div class="card-body px-lg-4 py-lg-4">
                        <div class="card-custom card-stats mb-4 mb-xl-0" type="button" data-toggle="modal" data-target="#exampleModal">
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
                @endif
            </div>
            @endforeach
        </div>
        </div>
        @include('layouts.footers.auth')
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New Card</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      @foreach($board as $a)
        <form method="post" action="{{ route('card.store') }}" autocomplete="off">
            @csrf
            
            <h6 class="heading-small text-muted mb-4">{{ __('Detail Card') }}</h6>
            <div class="pl-lg-4">
                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                    <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                    <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name') }}" required autofocus>

                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                    <label class="form-control-label" for="input-name">{{ __('Deadline') }}</label>
                    <input name="due_on" class="due_on form-control form-control-alternative{{ $errors->has('Deadline') ? ' is-invalid' : '' }}" placeholder="{{ __('Deadline') }}" type="text" placeholder="{{ __('Deadline') }}">
                    <input type="hidden" name="board_id" id="input-card-id" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ $a->id }}">
                    <input type="hidden" name="user_id" id="input-card-id" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ auth()->user()->id }}">
                </div>
                <div class="modal-footer text-center">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
        @endforeach
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
    $('.due_on').datepicker({
        format:'yyyy-mm-dd'
    });  
</script>
@endsection

