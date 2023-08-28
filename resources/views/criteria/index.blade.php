<!-- resources/views/criteria/index.blade.php -->
@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Criteria</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('criteria.index') }}" method="GET" class="form-inline">
                        <input type="text" name="search" class="form-control mr-sm-2" placeholder="Search">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </form>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($criteria as $criterion)
                            <tr>
                                <td>{{ ($criteria->currentPage() - 1) * $criteria->perPage() + $loop->index + 1 }}</td>
                                <td>{{ $criterion->name }}</td>
                                <td>{{ $criterion->category }}</td>
                                <td>
                                    <a href="{{ route('criteria.edit', $criterion) }}" class="btn btn-primary">Edit</a>
                                    <a href="{{ route('criteria.destroy', $criterion) }}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- Pagination Links -->
                    <div class="d-flex justify-content-center">
                        {{ $criteria->links() }}
                    </div>
                    <a href="{{ route('criteria.create') }}" class="btn btn-success mt-3">Add New</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
