<!-- Logic Progress Bar -->
<?php
$done = 0;
$total = 0;
$hasil = 0;
$belum = 0;
?>
@foreach($b->task as $t)
<?php
$total++;
?>
@if($t->is_done == 1)
<?php
$done++;
?>
<!-- Selesai -->
@endif
<?php
$hasil = round($done/$total * 100);
$belum = 100 - $hasil;
?>
@endforeach
<div class="progress">
  <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: {{$hasil ?? ''}}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">{{$hasil ?? ''}}%</div>
  <div class="progress-bar bg-danger" role="progressbar" style="width: {{$belum ?? ''}}%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">{{$belum ?? ''}}%</div>
</div>
<div class="card-body">
<div class="row2">
        <div class="col">
            <h5 class="card-title text-muted mb-0">List Task {{$b->name}}</h5>
        </div>
    </div>
    @foreach($tasks as $t)
    <div class="row">
        <div class="col">
            <table>
                <tr>
                    @if($t->card_id == $b->id)
                    @if($t->is_done == 1)
                    <td><i class="ni ni-check-bold"></i></td>
                    <td  width="600px"><h5 class="done-true"> {{$t->name}} </h5> </td>
                    @else
                    <td><i class="ni ni-fat-remove"></i></td>
                    <td  width="600px"><h5> {{$t->name}} </h5> </td>
                    @endif
                    <td>
                        @if(auth()->user()->id == $b->user_id || auth()->user()->id == 2)
                        <div class="dropdown">
                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-toggle="tooltip" data-placement="top" title="Menu">
                                    <i class="fas fa-ellipsis-v"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        <form action="{{ route('task.destroy', $t->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <a class="dropdown-item" href="{{url('task/done/' .$t->id)}}">{{ __('Done') }}</a>
                                            <!-- <a class="dropdown-item" href="#">{{ __('Done') }}</a> -->
                                            <button type="button" class="dropdown-item" name="action" value="delete" onclick="confirm('{{ __("Are you sure you want to delete Task?") }}') ? this.parentElement.submit() : ''">
                                                {{ __('Delete') }}
                                            </button>
                                        </form>
                                        <!-- <button type="button" class="dropdown-item" name="action" value="done">{{ __('Done') }}<a href="{{url('/task/done/' .$t->id)}}"></a> -->
                                </div>
                            </div>
                        <!-- <button type="submit" class="btn btn-primary btn-sm ">{{ __('Done') }}</button> -->
                        @endif
                        </td>
                    @endif
                </tr>
            </table>
        </div>
    </div>
    @endforeach
</div>