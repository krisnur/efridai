<!-- resources/views/criteria/edit.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Add New Criteria</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('criteria.update', $criteria) }}" method="post">
                        @csrf
                        @method('PUT')
                    
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" value="{{ $criteria->name }}" class="form-control" required>
                        </div>
                    
                        <div class="form-group">
                            <label for="category">Category</label>
                            <input type="text" name="category" id="category" value="{{ $criteria->category }}" class="form-control" required>
                        </div>
                    
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection