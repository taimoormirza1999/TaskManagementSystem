@extends('dashboard_applayout')
@php
use Carbon\Carbon;
@endphp
@section('additional_links')
@endsection

@section('content')
<div class="card">
    <h5 class="card-header">Project Task Notes</h5>
    <div class="card-body">
        <div class="list-group">
            @foreach ($notes as $item)
                
           
            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start active">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1 text-white">{{ $item->content }}</h5>
                    <small>@php
                        $dateTime = Carbon::parse($item->created_at);
$daysAgo = $dateTime->diffForHumans();
echo $daysAgo;
                    @endphp</small>
                </div>
                <p class="mb-1">{{ $item->content }}</p>
                <small>Donec id elit non mi porta.</small>
            </a> @endforeach
          
        
          
        </div>
    </div>
</div>
@endsection
