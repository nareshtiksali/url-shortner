@extends('layouts.app')
@section('content')
<div class="container-fluid py-4">
    <div class="mb-5">
        <h2 class="mb-4">Generated URLs <a href="{{ route('member.url.create') }}" class="btn btn-primary">
    Generate URL
</a></h2>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Short URL</th>
                        <th>Long URL</th>
                        <th>Hits</th>
                        <th>Created On</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($urls as $url)
                        <tr>
                            <td>
                                <a href="{{ url($url->short_code) }}" target="_blank">
                                    <code>{{ url($url->short_code) }}</code>
                                </a>
                            </td>
                            <td>{{ $url->original_url }}</td>
                            <td>{{ $url->hits ?? 0 }}</td>
                            <td>{{ $url->created_at->format('d M Y, h:i A') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">
                                No URLs found
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection