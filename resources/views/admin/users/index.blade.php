@extends('layouts.app')

@section('title', 'Users - Admin')

@section('styles')
<style>
    .page-header {
        background: linear-gradient(135deg, #8B5CF6 0%, #A78BFA 100%);
        color: white;
        padding: 30px 0;
        margin-top: 20px;
        margin-bottom: 30px;
        border-radius: 12px;
    }

    .page-header h1 {
        margin: 0;
        font-weight: 700;
    }

    .table-container {
        background: white;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        margin-bottom: 30px;
    }

    .table {
        margin-bottom: 0;
    }

    .table thead {
        background-color: #F3F4F6;
        border-bottom: 2px solid #E5E7EB;
    }

    .table thead th {
        color: #374151;
        font-weight: 600;
        padding: 15px;
        text-transform: uppercase;
        font-size: 0.85rem;
        letter-spacing: 0.5px;
        border: none;
    }

    .table tbody td {
        padding: 15px;
        border-color: #E5E7EB;
        vertical-align: middle;
    }

    .table tbody tr:hover {
        background-color: #F9FAFB;
    }

    .user-badge {
        display: inline-block;
        padding: 4px 10px;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
        background-color: #DDD6FE;
        color: #6D28D9;
    }

    .action-links {
        display: flex;
        gap: 10px;
    }

    .action-links a {
        text-decoration: none;
        padding: 6px 12px;
        border-radius: 6px;
        font-size: 0.85rem;
        font-weight: 500;
        background-color: #DDD6FE;
        color: #6D28D9;
    }

    .action-links a:hover {
        opacity: 0.8;
    }

    .pagination {
        margin-top: 20px;
    }

    .pagination .page-link {
        color: #8B5CF6;
        border-color: #E5E7EB;
    }

    .pagination .page-link:hover {
        background-color: #EDE9FE;
        border-color: #8B5CF6;
    }

    .pagination .page-item.active .page-link {
        background-color: #8B5CF6;
        border-color: #8B5CF6;
    }

    .empty-state {
        text-align: center;
        padding: 60px 20px;
        color: #6B7280;
    }

    .empty-state i {
        font-size: 3rem;
        color: #D1D5DB;
        margin-bottom: 15px;
    }

    .breadcrumb {
        margin-bottom: 20px;
    }

    .breadcrumb a {
        color: #8B5CF6;
        text-decoration: none;
    }

    .breadcrumb a:hover {
        text-decoration: underline;
    }
</style>
@endsection

@section('content')
<div class="container-fluid">
    <div class="container">
        <!-- Breadcrumb -->
        <nav class="breadcrumb" aria-label="breadcrumb">
            <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item">Admin</a>
            <span class="breadcrumb-item active">Users</span>
        </nav>

        <!-- Page Header -->
        <div class="page-header">
            <h1>Users</h1>
            <p class="mb-0">Manage platform users and their activity</p>
        </div>

        <!-- Users Table -->
        @if($users->count() > 0)
            <div class="table-container">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Transactions</th>
                            <th>Joined</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>
                                    <strong>{{ $user->name }}</strong>
                                    @if($user->is_admin)
                                        <br>
                                        <span class="user-badge">Admin</span>
                                    @endif
                                </td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <span class="badge bg-info text-dark">
                                        {{ $user->transactions_count }} transactions
                                    </span>
                                </td>
                                <td>{{ $user->created_at->format('M d, Y') }}</td>
                                <td class="action-links">
                                    <a href="{{ route('admin.users.show', $user) }}">View</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center">
                {{ $users->links() }}
            </div>
        @else
            <div class="table-container">
                <div class="empty-state">
                    <i class="fas fa-users"></i>
                    <h3>No Users</h3>
                    <p>There are no users to display.</p>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
