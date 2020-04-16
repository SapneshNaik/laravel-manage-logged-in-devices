@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row justify-content-center">
        <div class="col-lg">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    Currently Logged In Devices
                    <a href="{{ count($devices) > 1 ? '/logout/all' : '#' }}" class="btn btn-danger {{ count($devices) == 1 ? 'disabled' : '' }}">Remove All Devices</a>
                  </div>
                <table class="table  table-hover">

                    <thead class="thead-dark">
                        <tr>
                            <th>Device</th>
                            <th>IP</th>
                            <th style="width:12%" >Last Activity</th>
                            <th style="width:12%" >Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($devices as $device)

                        <tr>
                            <td>{{ $device->user_agent }}</td>
                            <td>{{ $device->ip_address }}</td>
                            <td>{{ Carbon\Carbon::parse($device->last_activity)->diffForHumans() }}</td>
                            @if ($current_session_id == $device->id)
                                <td><button type="button" :disabled="true" class="btn btn-primary">This Device</button></td>
                            @else
                                <td><a href="/logout/{{$device->id}}" class="btn btn-danger">Remove</a></td>
                            @endif

                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>
@endsection
