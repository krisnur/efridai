@extends('layouts.app')

@section('title', 'Generate AI Prompt')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>Saved Prompt</h3>
            <div class="list-group">
                @forelse($prompts->paginate(10) as $prompt)
                    <div style="margin-bottom: 10px">
                        <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                            <p class="mb-1">{{$prompt->content}}</p>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex justify-content-start">
                                <div class="btn btn-success btn-sm" style="margin-right: 10px" onclick="copyToClipboard('{{$prompt->content}}')">Copy</div>
                                <div>
                                    <form method="post" action="{{ route('saved.prompt.delete', $prompt->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="id" value="{{$prompt->id}}">
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </div>
                            </div>
                            
                            <div class="text-right">
                                <small>{{$prompt->created_at->diffForHumans()}}</small>
                            </div>
                        </div>
                        
                        
                        
                        </a>
                    </div>
                @empty
                    <div class="list-group">
                        <a href="#" class="list-group-item list-group-item-action">No Saved Prompt</a>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@if (session('success'))
    <script>
        alert("{{ session('success') }}");
    </script>
@endif
<!-- Add JavaScript to handle copy to clipboard functionality -->
<script>
    function copyToClipboard(text) {
        const copyText = document.createElement('input');
        copyText.value = text;
        copyText.setAttribute('readonly', 'true');
        copyText.style.position = 'absolute';
        copyText.style.left = '-9999px';
        document.body.appendChild(copyText);
        copyText.select();
        document.execCommand('copy');
        document.body.removeChild(copyText);
        alert('Prompt copied to clipboard!');
    }
</script>
@endsection
