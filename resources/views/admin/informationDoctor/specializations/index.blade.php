@extends('dashboard.master')

@section('sidebar')
    @include('partials.sidebarAdmin')
@endsection

@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Specializations</h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($specializations as $specialization)
                        <tr>
                            <td>{{ $specialization->name }}</td>
                            <td>
                                <a href="{{ route('admin.doctor.specialization.edit', $specialization->id) }}" class="btn btn-primary">Edit</a>
                                <form action="{{ route('admin.doctor.specialization.destroy', $specialization->id) }}" method="post" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" wire:confirm="Are you sure you want to delete this specialization?">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
