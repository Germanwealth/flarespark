@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('styles')
<style>
    .admin-header {
        background: linear-gradient(135deg, #EF4444 0%, #FCA5A5 100%);
        color: white;
        padding: 40px 0;
        margin-top: 20px;
        border-radius: 12px;
        margin-bottom: 30px;
    }

    .admin-header h1 {
        margin: 0;
        font-weight: 700;
    }

    .stat-card {
        background: white;
        padding: 25px;
        border-radius: 12px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        margin-bottom: 20px;
        border-left: 4px solid #EF4444;
    }

    .stat-label {
        color: #6B7280;
        font-size: 0.9rem;
        font-weight: 500;
        margin-bottom: 10px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .stat-value {
        font-size: 2.5rem;
        font-weight: 700;
        color: #1F2937;
    }

    .stat-card.contacts { border-left-color: #3B82F6; }
    .stat-card.transactions { border-left-color: #10B981; }
    .stat-card.users { border-left-color: #8B5CF6; }
    .stat-card.plans { border-left-color: #F59E0B; }

    .section-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: #1F2937;
        margin-top: 30px;
        margin-bottom: 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .section-title a {
        font-size: 0.9rem;
        text-decoration: none;
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
    }

    .badge-read {
        background-color: #DBEAFE;
        color: #1E40AF;
    }

    .badge-replied {
        background-color: #DCFCE7;
        color: #166534;
    }

    .badge-pending {
        background-color: #FEF3C7;
        color: #B45309;
    }

    .badge-completed {
        background-color: #DCFCE7;
        color: #166534;
    }

    .badge-failed {
        background-color: #FEE2E2;
        color: #DC2626;
    }

    .action-links a {
        margin-right: 10px;
        text-decoration: none;
        color: #3B82F6;
        font-weight: 500;
        font-size: 0.9rem;
    }

    .action-links a:hover {
        text-decoration: underline;
    }

    .menu-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 15px;
        margin-bottom: 30px;
    }

    .menu-card {
        background: white;
        padding: 20px;
        border-radius: 12px;
        text-align: center;
        text-decoration: none;
        color: inherit;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
        border-top: 3px solid #EF4444;
    }

    .menu-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        color: inherit;
        text-decoration: none;
    }

    .menu-card i {
        font-size: 2.5rem;
        margin-bottom: 10px;
        color: #EF4444;
    }

    .menu-card h3 {
        font-size: 1.1rem;
        font-weight: 600;
        margin-bottom: 5px;
    }

    .menu-card p {
        font-size: 0.85rem;
        color: #6B7280;
        margin: 0;
    }

    .empty-state {
        text-align: center;
        padding: 40px 20px;
        color: #6B7280;
    }

    .empty-state i {
        font-size: 3rem;
        color: #D1D5DB;
        margin-bottom: 15px;
    }
</style>
@endsection

@section('content')
<div class="container-fluid">
    <div class="admin-header">
        <div class="container">
            <h1>Admin Dashboard</h1>
            <p class="mb-0">Welcome back, {{ auth()->user()->name }}!</p>
        </div>
    </div>

    <div class="container">
        <!-- Quick Stats -->
        <div class="row">
            <div class="col-md-6 col-lg-3">
                <div class="stat-card users">
                    <div class="stat-label">Total Users</div>
                    <div class="stat-value">{{ $stats['total_users'] }}</div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="stat-card contacts">
                    <div class="stat-label">Contact Messages</div>
                    <div class="stat-value">{{ $stats['total_contacts'] }}</div>
                    @if($stats['unread_contacts'] > 0)
                        <small class="text-danger">{{ $stats['unread_contacts'] }} unread</small>
                    @endif
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="stat-card transactions">
                    <div class="stat-label">Total Transactions</div>
                    <div class="stat-value">{{ $stats['total_transactions'] }}</div>
                    @if($stats['pending_transactions'] > 0)
                        <small class="text-warning">{{ $stats['pending_transactions'] }} pending</small>
                    @endif
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="stat-card plans">
                    <div class="stat-label">Investment Plans</div>
                    <div class="stat-value">{{ $stats['total_investment_plans'] }}</div>
                </div>
            </div>
        </div>

        <!-- Quick Navigation Menu -->
        <div class="section-title">Quick Access</div>
        <div class="menu-grid">
            <a href="{{ route('admin.contacts') }}" class="menu-card">
                <i class="fas fa-envelope"></i>
                <h3>Contact Messages</h3>
                <p>View & reply to messages</p>
            </a>
            <a href="{{ route('admin.transactions') }}" class="menu-card">
                <i class="fas fa-exchange-alt"></i>
                <h3>Transactions</h3>
                <p>Manage all transactions</p>
            </a>
            <a href="{{ route('admin.users') }}" class="menu-card">
                <i class="fas fa-users"></i>
                <h3>Users</h3>
                <p>View all users</p>
            </a>
            <a href="{{ route('admin.investment-plans') }}" class="menu-card">
                <i class="fas fa-chart-line"></i>
                <h3>Investment Plans</h3>
                <p>Manage plans</p>
            </a>
        </div>

        <!-- Recent Contact Messages -->
        <div class="section-title">
            Recent Contact Messages
            <a href="{{ route('admin.contacts') }}" class="btn btn-sm btn-outline-primary">View All</a>
        </div>
        @if($recent_contacts->count() > 0)
            <div class="table-container">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Status</th>
                            <th>Received</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($recent_contacts as $contact)
                            <tr>
                                <td><strong>{{ $contact->name }}</strong></td>
                                <td>{{ $contact->email }}</td>
                                <td>{{ Str::limit($contact->subject, 30) }}</td>
                                <td>
                                    <span class="badge badge-{{ $contact->status }}">
                                        {{ ucfirst($contact->status) }}
                                    </span>
                                </td>
                                <td>{{ $contact->created_at->diffForHumans() }}</td>
                                <td class="action-links">
                                    <a href="{{ route('admin.contacts.show', $contact) }}">View</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="table-container">
                <div class="empty-state">
                    <i class="fas fa-inbox"></i>
                    <p>No contact messages yet</p>
                </div>
            </div>
        @endif

        <!-- Recent Transactions -->
        <div class="section-title">
            Recent Transactions
            <a href="{{ route('admin.transactions') }}" class="btn btn-sm btn-outline-primary">View All</a>
        </div>
        @if($recent_transactions->count() > 0)
            <div class="table-container">
                <table class="table">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Plan</th>
                            <th>Type</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($recent_transactions as $transaction)
                            <tr>
                                <td><strong>{{ $transaction->user->name ?? 'N/A' }}</strong></td>
                                <td>{{ $transaction->investmentPlan->name ?? 'N/A' }}</td>
                                <td>
                                    <span class="badge bg-info text-dark">
                                        {{ ucfirst($transaction->type) }}
                                    </span>
                                </td>
                                <td>${{ number_format($transaction->amount, 2) }}</td>
                                <td>
                                    <span class="badge badge-{{ $transaction->status }}">
                                        {{ ucfirst($transaction->status) }}
                                    </span>
                                </td>
                                <td>{{ $transaction->created_at->format('M d, Y') }}</td>
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
</div>
@endsection
