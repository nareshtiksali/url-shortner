@extends('layouts.app')
@section('content')
<div class="container-fluid py-4">
    <div class="mb-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">Generated URLs</h2>
            <a href="{{ route('url.create') }}" class="btn btn-primary">
                Generate URL
            </a>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Short URL</th>
                        <th>Long URL</th>
                        <th>Hits</th>
                        <th>User</th>
                        <th>Created On</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($urls as $url)
                        <tr>
                            <td>                               
                                <a href="{{ url($url['short_code']) }}" target="_blank">
    {{ url($url['short_code']) }}
</a>
                            </td>
                            <td>{{ $url->original_url }}</td>
                            <td>{{ $url->hits ?? 0 }}</td>
                            <td>{{ optional($url->user)->name }}</td>
                            <td>{{ $url->created_at->format('d M Y, h:i A') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">
                                No URLs found
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mb-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">Team Members</h2>
            <a href="{{ route('admin.user.create') }}" class="btn btn-primary">
                Add Member
            </a>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Total Generated URLs</th>
                        <th>Total URL Hits</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td><strong>{{ $user->name }}</strong></td>
                            <td>{{ $user->email }}</td>
                            <td>{{ optional($user->role)->name }}</td>
                            <td>{{ $user->generated_urls_count ?? 0 }}</td>
                            <td>{{ $user->url_hits_count ?? 0 }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection