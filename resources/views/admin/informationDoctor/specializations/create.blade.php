@extends('dashboard.master')

@section('sidebar')
    @include('partials.sidebarAdmin')
@endsection

@section('content')
<div class="col-lg-6">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Create Specialization</h5>
            <form action="{{ route('admin.doctor.specialization.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
</div>
@endsection
