@extends('dashboard.master')
@section('title')
    get all Doctor
@endsection
@section('content')
<div class="col-lg-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Responsive Table</h5>
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">id</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Speciality</th>
                <th scope="col">Address</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($doctors as $doctor)
              <tr>
                <th scope="row">{{$doctor->id}}</th>
                <td>{{$doctor->name}}</td>
                <td>{{$doctor->email}}</td>
                <td>{{$doctor->phone}}</td>
                <td>{{$doctor->speciality}}</td>
                <td>{{$doctor->address}}</td>
                <td>Cell</td>


              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection
