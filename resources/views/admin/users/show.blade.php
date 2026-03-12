@extends('layouts.app')

@section('title', 'User Details - Admin')

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

    .content-card {
        background: white;
        border-radius: 12px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        padding: 30px;
        margin-bottom: 30px;
    }

    .user-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-bottom: 20px;
        border-bottom: 2px solid #E5E7EB;
        margin-bottom: 30px;
    }

    .user-info h2 {
        margin: 0;
        font-size: 1.5rem;
        font-weight: 700;
        color: #1F2937;
    }

    .user-info p {
        margin: 5px 0 0 0;
        color: #6B7280;
    }

    .badge-admin {
        background-color: #DDD6FE;
        color: #6D28D9;
        font-weight: 600;
        padding: 8px 16px;
        border-radius: 20px;
    }

    .info-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
        margin-bottom: 30px;
    }

    .info-box {
        background-color: #F9FAFB;
        padding: 20px;
        border-radius: 8px;
        border-left: 4px solid #8B5CF6;
    }

    .info-label {
        font-size: 0.85rem;
        text-transform: uppercase;
        color: #6B7280;
        font-weight: 600;
        margin-bottom: 8px;
        letter-spacing: 0.5px;
    }

    .info-value {
        font-size: 1.1rem;
        color: #1F2937;
        font-weight: 500;
    }

    .section-title {
        font-size: 1.3rem;
        font-weight: 700;
        color: #1F2937;
        margin-top: 30px;
        margin-bottom: 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .table-container {
        background: white;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
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
        padding: 12px 15px;
        text-transform: uppercase;
        font-size: 0.85rem;
        letter-spacing: 0.5px;
        border: none;
    }

    .table tbody td {
        padding: 12px 15px;
        border-color: #E5E7EB;
        vertical-align: middle;
    }

    .table tbody tr:hover {
        background-color: #F9FAFB;
    }

    .type-deposit {
        background-color: #DBEAFE;
        color: #1E40AF;
        font-weight: 600;
    }

    .type-withdrawal {
        background-color: #FEE2E2;
        color: #DC2626;
        font-weight: 600;
    }

    .type-return {
        background-color: #DCFCE7;
        color: #166534;
        font-weight: 600;
    }

    .status-pending {
        background-color: #FEF3C7;
        color: #B45309;
        font-weight: 600;
    }

    .status-completed {
        background-color: #DCFCE7;
        color: #166534;
        font-weight: 600;
    }

    .status-failed {
        background-color: #FEE2E2;
        color: #DC2626;
        font-weight: 600;
    }

    .action-links a {
        text-decoration: none;
        padding: 6px 12px;
        border-radius: 6px;
        font-size: 0.85rem;
        font-weight: 500;
        background-color: #DDD6FE;
        color: #6D28D9;
        margin-right: 8px;
    }

    .action-links a:hover {
        opacity: 0.8;
    }

    .empty-state {
        text-align: center;
        padding: 40px 20px;
        color: #6B7280;
    }

    .empty-state i {
        font-size: 2.5rem;
        color: #D1D5DB;
        margin-bottom: 15px;
    }

    .btn {
        padding: 10px 20px;
        border-radius: 8px;
        font-weight: 600;
        text-decoration: none;
        border: none;
        cursor: pointer;
        transition: all 0.3s ease;
        font-size: 0.95rem;
    }

    .btn-secondary {
        background-color: #6B7280;
        color: white;
    }

    .btn-secondary:hover {
        background-color: #4B5563;
    }
</style>
@endsection

@section('content')
<div class="container-fluid">
    <div class="container">
        <!-- Breadcrumb -->
        <nav class="breadcrumb" aria-label="breadcrumb">
            <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item">Admin</a>
            <a href="{{ route('admin.users') }}" class="breadcrumb-item">Users</a>
            <span class="breadcrumb-item active">{{ $user->name }}</span>
        </nav>

        <!-- Page Header -->
        <div class="page-header">
            <h1>User Details</h1>
            <p class="mb-0">View user information and transaction history</p>
        </div>

        <!-- User Card -->
        <div class="content-card">
            <div class="user-header">
                <div class="user-info">
                    <h2>{{ $user->name }}</h2>
                    <p>{{ $user->email }}</p>
                </div>
                @if($user->is_admin)
                    <span class="badge-admin">Admin User</span>
                @endif
            </div>

            <!-- User Details Grid -->
            <div class="info-grid">
                <div class="info-box">
                    <div class="info-label">Email Address</div>
                    <div class="info-value">
                        <a href="mailto:{{ $user->email }}" style="color: #8B5CF6; text-decoration: none;">
                            {{ $user->email }}
                        </a>
                    </div>
                </div>

                <div class="info-box">
                    <div class="info-label">Account Status</div>
                    <div class="info-value">
                        @if($user->email_verified_at)
                            <span style="color: #10B981;">✓ Verified</span>
                            <br>
                            <small class="text-muted">{{ $user->email_verified_at->format('M d, Y') }}</small>
                        @else
                            <span style="color: #EF4444;">✗ Not Verified</span>
                        @endif
                    </div>
                </div>

                <div class="info-box">
                    <div class="info-label">Member Since</div>
                    <div class="info-value">{{ $user->created_at->format('M d, Y H:i') }}</div>
                </div>

                <div class="info-box">
                    <div class="info-label">Total Transactions</div>
                    <div class="info-value" style="font-size: 1.8rem; color: #8B5CF6;">
                        {{ $user->transactions->count() }}
                    </div>
                </div>

                <div class="info-box">
                    <div class="info-label">Total Invested</div>
                    <div class="info-value" style="font-size: 1.3rem; color: #10B981;">
                        ${{ number_format($user->transactions->sum('amount'), 2) }}
                    </div>
                </div>

                <div class="info-box">
                    <div class="info-label">Last Activity</div>
                    <div class="info-value">
                        {{ $user->updated_at->diffForHumans() }}
                    </div>
                </div>
            </div>

            <!-- Transaction History -->
            <div class="section-title">
                Transaction History
                <a href="{{ route('admin.transactions') }}" class="btn btn-secondary">View All Transactions</a>
            </div>

            @if($user->transactions->count() > 0)
                <div class="table-container">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Investment Plan</th>
                                <th>Type</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($user->transactions as $transaction)
                                <tr>
                                    <td>{{ $transaction->investmentPlan->name ?? 'N/A' }}</td>
                                    <td>
                                        <span class="badge type-{{ $transaction->type }}">
                                            {{ ucfirst($transaction->type) }}
                                        </span>
                                    </td>
                                    <td><strong>${{ number_format($transaction->amount, 2) }}</strong></td>
                                    <td>
                                        <span class="badge status-{{ $transaction->status }}">
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
            @else
                <div class="table-container">
                    <div class="empty-state">
                        <i class="fas fa-exchange-alt"></i>
                        <p>No transactions yet</p>
                    </div>
                </div>
            @endif
        </div>

        <div class="text-center">
            <a href="{{ route('admin.users') }}" class="btn btn-secondary">Back to Users</a>
        </div>
    </div>
</div>
@endsection
