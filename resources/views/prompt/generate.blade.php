@extends('layouts.app')

@section('title', 'Generate AI Prompt')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Prompt Generator</h3>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('result.prompt') }}">
                        @csrf
                        <div class="mb-1">
                            <label for="subject" class="form-label">Subject:</label>
                            <input type="text" class="form-control" id="subject" name="subject" required>
                        </div>
                        @foreach($categoris as $categori)
                            <div class="mb-1">
                                <label for="color" class="form-label">{{$categori->category}} :</label>
                                <select class="form-control" id='{{$categori->category}}' name='{{$categori->category}}' required>
                                    <option value="None">None</option>
                                    @foreach($features->where('category', $categori->category) as $feature)
                                        <option value="{{ $feature->name }}">{{ $feature->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endforeach
                        <div style="margin-top: 10px">
                            <button type="submit" class="btn btn-primary">Generate Prompt</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection
