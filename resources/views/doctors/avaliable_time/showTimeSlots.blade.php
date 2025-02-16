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
                    <h5 class="card-title">Time Slots for {{ $avaliableTime->day }}</h5> <!-- عرض اليوم هنا -->
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Start Time</th>
                                    <th scope="col">End Time</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($avaliableTime->timeSlots as $timeSlot)
                                    <tr>
                                        <td>{{ $timeSlot->id }}</td>
                                        <td>{{ $timeSlot->start_time }}</td>
                                        <td>{{ $timeSlot->end_time }}</td>
                                        <td>{{ $timeSlot->date }}</td>
                                        <td>{{ $timeSlot->status }}</td>
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
