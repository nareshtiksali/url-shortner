@extends('layouts.app')
@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body p-4">
                    <h2 class="card-title mb-4">Create New Client</h2>                 

                    <form method="POST" action="{{ route('superadmin.company.store') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Company Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>

                        <div class="mb-4">
                            <label for="email" class="form-label">Company Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">Invite</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection