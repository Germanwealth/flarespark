@extends('layouts.app')

@section('title', 'Investment Plans - Admin')

@section('styles')
<style>
    .page-header {
        background: linear-gradient(135deg, #F59E0B 0%, #FBBF24 100%);
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

    .badge-active {
        background-color: #DCFCE7;
        color: #166534;
        font-weight: 600;
    }

    .badge-inactive {
        background-color: #FEE2E2;
        color: #DC2626;
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
        background-color: #FEF3C7;
        color: #B45309;
    }

    .action-links a:hover {
        opacity: 0.8;
    }

    .pagination {
        margin-top: 20px;
    }

    .pagination .page-link {
        color: #F59E0B;
        border-color: #E5E7EB;
    }

    .pagination .page-link:hover {
        background-color: #FEF3C7;
        border-color: #F59E0B;
    }

    .pagination .page-item.active .page-link {
        background-color: #F59E0B;
        border-color: #F59E0B;
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
        color: #F59E0B;
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
            <span class="breadcrumb-item active">Investment Plans</span>
        </nav>

        <!-- Page Header -->
        <div class="page-header">
            <h1>Investment Plans</h1>
            <p class="mb-0">Manage investment plans and view investor details</p>
        </div>

        <!-- Plans Table -->
        @if($plans->count() > 0)
            <div class="table-container">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Plan Name</th>
                            <th>Min Investment</th>
                            <th>Monthly Return</th>
                            <th>Duration</th>
                            <th>Investors</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($plans as $plan)
                            <tr>
                                <td><strong>{{ $plan->name }}</strong></td>
                                <td>${{ number_format($plan->minimum_investment, 2) }}</td>
                                <td>
                                    <span style="color: #F59E0B; font-weight: 600;">
                                        {{ $plan->monthly_return_percentage }}%
                                    </span>
                                </td>
                                <td>{{ $plan->duration_months }} months</td>
                                <td>
                                    <span class="badge bg-info text-dark">
                                        {{ $plan->transactions_count }} investors
                                    </span>
                                </td>
                                <td>
                                    <span class="badge badge-{{ $plan->is_active ? 'active' : 'inactive' }}">
                                        {{ $plan->is_active ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                <td class="action-links">
                                    <a href="{{ route('admin.investment-plans.show', $plan) }}">View</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center">
                {{ $plans->links() }}
            </div>
        @else
            <div class="table-container">
                <div class="empty-state">
                    <i class="fas fa-chart-line"></i>
                    <h3>No Investment Plans</h3>
                    <p>There are no investment plans to display.</p>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
