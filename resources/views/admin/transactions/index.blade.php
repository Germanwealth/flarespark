@extends('layouts.app')

@section('title', 'Transactions - Admin')

@section('styles')
<style>
    .page-header {
        background: linear-gradient(135deg, #10B981 0%, #34D399 100%);
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

    .badge-pending {
        background-color: #FEF3C7;
        color: #B45309;
        font-weight: 600;
    }

    .badge-completed {
        background-color: #DCFCE7;
        color: #166534;
        font-weight: 600;
    }

    .badge-failed {
        background-color: #FEE2E2;
        color: #DC2626;
        font-weight: 600;
    }

    .type-deposit {
        background-color: #DBEAFE;
        color: #1E40AF;
    }

    .type-withdrawal {
        background-color: #FEE2E2;
        color: #DC2626;
    }

    .type-return {
        background-color: #DCFCE7;
        color: #166534;
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
        background-color: #DBEAFE;
        color: #1E40AF;
    }

    .action-links a:hover {
        opacity: 0.8;
    }

    .pagination {
        margin-top: 20px;
    }

    .pagination .page-link {
        color: #10B981;
        border-color: #E5E7EB;
    }

    .pagination .page-link:hover {
        background-color: #D1FAE5;
        border-color: #10B981;
    }

    .pagination .page-item.active .page-link {
        background-color: #10B981;
        border-color: #10B981;
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
        color: #10B981;
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
            <span class="breadcrumb-item active">Transactions</span>
        </nav>

        <!-- Page Header -->
        <div class="page-header">
            <h1>Transactions</h1>
            <p class="mb-0">Manage and track all user transactions</p>
        </div>

        <!-- Transactions Table -->
        @if($transactions->count() > 0)
            <div class="table-container">
                <table class="table">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Investment Plan</th>
                            <th>Type</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($transactions as $transaction)
                            <tr>
                                <td>
                                    <strong>{{ $transaction->user->name ?? 'N/A' }}</strong>
                                    <br>
                                    <small class="text-muted">{{ $transaction->user->email ?? '' }}</small>
                                </td>
                                <td>{{ $transaction->investmentPlan->name ?? 'N/A' }}</td>
                                <td>
                                    <span class="badge type-{{ $transaction->type }}">
                                        {{ ucfirst($transaction->type) }}
                                    </span>
                                </td>
                                <td><strong>${{ number_format($transaction->amount, 2) }}</strong></td>
                                <td>
                                    <span class="badge badge-{{ $transaction->status }}">
                                        {{ ucfirst($transaction->status) }}
                                    </span>
                                </td>
                                <td>{{ $transaction->created_at->format('M d, Y H:i') }}</td>
                                <td class="action-links">
                                    <a href="{{ route('admin.transactions.show', $transaction) }}">View</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center">
                {{ $transactions->links() }}
            </div>
        @else
            <div class="table-container">
                <div class="empty-state">
                    <i class="fas fa-exchange-alt"></i>
                    <h3>No Transactions</h3>
                    <p>There are no transactions to display.</p>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
