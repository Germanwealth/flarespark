@extends('layouts.app')

@section('title', 'Contact Messages - Admin')

@section('styles')
<style>
    .page-header {
        background: linear-gradient(135deg, #3B82F6 0%, #60A5FA 100%);
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

    .filter-section {
        background: white;
        padding: 20px;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        margin-bottom: 30px;
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

    .badge-new {
        background-color: #FEE2E2;
        color: #DC2626;
        font-weight: 600;
    }

    .badge-read {
        background-color: #DBEAFE;
        color: #1E40AF;
        font-weight: 600;
    }

    .badge-replied {
        background-color: #DCFCE7;
        color: #166534;
        font-weight: 600;
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
    }

    .action-links .btn-view {
        background-color: #DBEAFE;
        color: #1E40AF;
    }

    .action-links .btn-delete {
        background-color: #FEE2E2;
        color: #DC2626;
    }

    .action-links a:hover {
        opacity: 0.8;
    }

    .pagination {
        margin-top: 20px;
    }

    .pagination .page-link {
        color: #3B82F6;
        border-color: #E5E7EB;
    }

    .pagination .page-link:hover {
        background-color: #DBEAFE;
        border-color: #3B82F6;
    }

    .pagination .page-item.active .page-link {
        background-color: #3B82F6;
        border-color: #3B82F6;
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
        color: #3B82F6;
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
            <span class="breadcrumb-item active">Contact Messages</span>
        </nav>

        <!-- Page Header -->
        <div class="page-header">
            <h1>Contact Messages</h1>
            <p class="mb-0">Manage and respond to contact messages from visitors</p>
        </div>

        <!-- Messages Table -->
        @if($contacts->count() > 0)
            <div class="table-container">
                <table class="table">
                    <thead>
                        <tr>
                            <th>From</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Message Preview</th>
                            <th>Status</th>
                            <th>Received</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($contacts as $contact)
                            <tr>
                                <td><strong>{{ $contact->name }}</strong></td>
                                <td>
                                    <a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a>
                                </td>
                                <td>{{ $contact->subject }}</td>
                                <td>
                                    <span title="{{ $contact->message }}">
                                        {{ Str::limit($contact->message, 50) }}
                                    </span>
                                </td>
                                <td>
                                    <span class="badge badge-{{ $contact->status }}">
                                        {{ ucfirst($contact->status) }}
                                    </span>
                                </td>
                                <td>{{ $contact->created_at->format('M d, Y H:i') }}</td>
                                <td class="action-links">
                                    <a href="{{ route('admin.contacts.show', $contact) }}" class="btn-view">View</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center">
                {{ $contacts->links() }}
            </div>
        @else
            <div class="table-container">
                <div class="empty-state">
                    <i class="fas fa-inbox"></i>
                    <h3>No Contact Messages</h3>
                    <p>There are no contact messages to display.</p>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
