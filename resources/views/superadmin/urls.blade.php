@extends('layouts.app')
@section('content')
<style>
    .pagination svg {
        width: 16px!important;
        height: 16px!important;
    }
</style>
<div class="container-fluid py-4">
    <div class="mb-5">
        <div class="mb-4">
            <a href="{{ route('superadmin.dashboard') }}" class="btn btn-secondary">
                ← Back to Dashboard
            </a>
        </div>
        <h2 class="mb-4">All URLs</h2>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Short URL</th>
                        <th>Long URL</th>
                        <th>Company</th>
                        <th>Hits</th>
                        <th>Created</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($urls as $url)
                        <tr>
                            <td><code>{{ $url['short_url'] }}</code></td>
                            <td>{{ $url['long_url'] }}</td>
                            <td>{{ $url['company_name'] }}</td>
                            <td>{{ $url['hits'] }}</td>
                            <td>{{ $url['created_at'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center mt-4">
            <div style="font-size: 0.875rem;">
                {{ $urls->links() }}
            </div>
        </div>
    </div>
</div>
@endsection