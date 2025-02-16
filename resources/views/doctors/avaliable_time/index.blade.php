@extends('dashboard.master')

@section('sidebar')
    @include('partials.sidebarDoctor')
  
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Available Times</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Day</th>
                                    <th scope="col">Start Time</th>
                                    <th scope="col">End Time</th>
                                    <th scope="col">Duration</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($avaliableTimes as $avaliableTime)
                                <tr>
                                    <th scope="row">{{ $avaliableTime->id }}</th>
                                    <td>{{ $avaliableTime->day }}</td>
                                    <td>{{ $avaliableTime->start_time }}</td>
                                    <td>{{ $avaliableTime->end_time }}</td>
                                    <td>{{ $avaliableTime->duration }}</td>
                                    <td>
                                        <a href="{{ route('doctor.avaliable_times.edit', $avaliableTime->id) }}" class="btn btn-primary">Edit</a>
                                        <form action="{{ route('doctor.avaliable_times.destroy', $avaliableTime->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                        <a href="{{ route('doctor.avaliable_times.show', $avaliableTime->id) }}" class="btn btn-info">Show</a>
                                    </td>
                                </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
