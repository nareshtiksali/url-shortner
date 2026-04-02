@extends('layouts.app')
@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body p-4">
                    <h2 class="card-title mb-4">Create URL</h2>

                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Please fix the following errors:</strong>
                            <ul class="mb-0 mt-2">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('member.url.store') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="long_url" class="form-label">Long URL</label>
                            <input type="url" class="form-control" id="long_url" name="long_url" value="{{ old('long_url') }}" placeholder="https://example.com/very/long/url" required>
                        </div>                     

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">Generate URL</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection