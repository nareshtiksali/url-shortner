@extends('layouts.app')
@section('content')
<div class="container-fluid py-4">   
      @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif 
    <div class="mb-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">Clients</h2>
            <a href="{{ route('superadmin.company.create') }}" class="btn btn-primary">
                Create New Client
            </a>
            <a href="{{ route('superadmin.admin.create') }}" class="btn btn-primary">
                Invite Admin
            </a>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Client</th>
                        <th>Users</th>
                        <th>Total Generated URL's</th>
                        <th>Total Clicks</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($companies as $company)
                        <tr>           
                            <td>
                                <strong>{{ $company['name'] }}</strong><br/>
                                <small class="text-muted">{{ $company['email'] }}</small>
                            </td>
                            <td>{{ $company['total_users'] }}</td>
                            <td>{{ $company['total_urls'] }}</td>
                            <td>{{ $company['total_hits'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="{{ route('superadmin.companies') }}" class="btn btn-outline-primary">
                View All
            </a>
        </div>
    </div>

    <div>
        <h2 class="mb-4">Generated URLs</h2>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Short URL</th>
                        <th>Long URL</th>
                        <th>Hits</th>
                        <th>Company</th>            
                        <th>Created on</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($urls as $url)
                        <tr>
                            <td><a href="{{ url($url['short_url']) }}" target="_blank">
    {{ url($url['short_url']) }}
</a></td>   
                            <td>{{ $url['long_url'] }}</td>     
                            <td>{{ $url['hits'] ?? 0 }}</td>           
                            <td>{{ $url['company_name'] ?? 'N/A' }}</td>
                            <td>{{ $url['created_at'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="{{ route('superadmin.urls') }}" class="btn btn-outline-primary">
                View All
            </a>
        </div>
    </div>
</div>
@endsection