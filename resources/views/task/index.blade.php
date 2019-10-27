
<div class="card-body">
<div class="row2">
        <div class="col">
            <h5 class="card-title text-muted mb-0">List Task {{$b->name}} </h5>
        </div>
    </div>
    @foreach($tasks as $t)
    <div class="row">
        <div class="col">
            <table>
                <tr>
                    @if($t->card_id == $b->id)
                    <td  width="600px"><h5> {{$t->name}} </h5> </td>
                    <td>
                        @if(auth()->user()->id == $b->user_id || auth()->user()->id == 2)
                        <button type="submit" class="btn btn-primary btn-sm ">{{ __('Done') }}</button>
                        @else
                        <button type="submit" class="btn btn-primary btn-sm" disabled>{{ __('Done') }}</button>
                        @endif
                        </td>
                    @else
                    <td  width="600px"><h5> Task Empty </h5> </td>
                    @endif
                </tr>
            </table>
        </div>
    </div>
    @endforeach
</div>