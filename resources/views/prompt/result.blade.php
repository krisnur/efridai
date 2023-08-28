@extends('layouts.app')

@section('title', 'Generated AI Prompt')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Prompt Result</h3>
                </div>
                <div class="card-body">
                    <!-- Apply custom styling to the "generatedPrompt" text -->
                    <p class="card-text">{{ $generatedPrompt }}</p>

                    <div class="d-flex justify-content-start">
                        <!-- Add "Copy to Clipboard" button -->
                        <div style="margin-right: 10px">
                            <button id="copyButton" class="btn btn-primary btn-sm" onclick="copyToClipboard()">Copy</button>
                        </div>
                        <!-- Add "Save to Database" button -->
                        <div style="margin-right: 10px">
                            <form method="post" action="{{ route('save.prompt') }}">
                                @csrf
                                <input type="hidden" name="generated_prompt" value="{{ $generatedPrompt }}">
                                <button type="submit" class="btn btn-success btn-sm">Save Prompt</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add JavaScript to handle copy to clipboard functionality -->
<script>
    function copyToClipboard() {
        var textarea = document.createElement('textarea');
        textarea.value = "{{ $generatedPrompt }}";
        document.body.appendChild(textarea);
        textarea.select();
        document.execCommand('copy');
        document.body.removeChild(textarea);
        alert('Prompt copied to clipboard!');
    }
</script>
@endsection
