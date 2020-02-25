@extends('layouts.app')

@section('title', 'Zamówienia')   
@section('content')

<table class="table table-hover">
    <div class="pt-3">
        <?php
            $x=0;
        ?>
        @foreach($sites as $site) 
            @if($site->user_id===auth()->user()->id)
                @php
                    $x++;
                    $db_date = $site -> created_at;
                    $db_date -> modify('+1 day');
                    $current_date = date('Y-m-d H:i:s');
                @endphp

                <tr>
                    <td>
                        <a href="{{route('sites.show', $site)}}">Order no. {{$x}}
                            @if ($db_date > $current_date) 
                                in progress
                            @endif
                        </a>
                    </td>
                    <td class="text-white">
                        {{$site -> price}} zł
                    </td>
                </tr>
            @endif
        @endforeach
    </div>
</table>

@endsection

@section('iffer')
    @if (!($site->user_id===auth()->user()->id))
        <p class="m-2 d-flex justify-content-center" style="font-size: 1.5rem">There's no ordrers!</p>
    @endif
@endsection