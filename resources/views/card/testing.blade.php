@foreach($tasks as $t)
<div class="col">
    <h5 class="card-title text-muted mb-0">ID {{$t->id}}</h5>
</div>
@endforeach
<div class="card-body">
<div class="row2">
        <div class="col">
            <h5 class="card-title text-muted mb-0">List Task {{$b->name}}</h5>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table>
                <tr>
                    <td  width="600px"><h5> Test Driven </h5> </td>
                    <td>
                        @if(auth()->user()->id == $b->user_id || auth()->user()->id == 2)
                        <button type="submit" class="btn btn-primary btn-sm ">{{ __('Done') }}</button>
                        @else
                        <button type="submit" class="btn btn-primary btn-sm" disabled>{{ __('Done') }}</button>
                        @endif
                        </td>
                </tr>
            </table>
        </div>
    </div>
</div>