@extends('layouts.app')
@section('content')
<style>
    .pagination svg {
        width: 16px;
        height: 16px;
    }
</style>
<div class="container-fluid py-4">
    <div class="mb-5">
        <div class="mb-4">
            <a href="{{ route('superadmin.dashboard') }}" class="btn btn-secondary">
                ← Back to Dashboard
            </a>
        </div>
        <h2 class="mb-4">All Companies</h2>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Users</th>
                        <th>URLs</th>
                        <th>Hits</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($companies as $company)
                        <tr>
                            <td>
                                <strong>{{ $company['name'] }}</strong>
                            </td>
                            <td>{{ $company['email'] }}</td>
                            <td>{{ $company['total_users'] }}</td>
                            <td>{{ $company['total_urls'] }}</td>
                            <td>{{ $company['total_hits'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center mt-4">
            <div style="font-size: 0.875rem;">
                {{ $companies->links() }}
            </div>
        </div>
    </div>
</div>
@endsection