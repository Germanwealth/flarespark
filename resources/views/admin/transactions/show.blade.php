@extends('layouts.app')

@section('title', 'Transaction Details - Admin')

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

    .content-card {
        background: white;
        border-radius: 12px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        padding: 30px;
        margin-bottom: 30px;
    }

    .transaction-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-bottom: 20px;
        border-bottom: 2px solid #E5E7EB;
        margin-bottom: 30px;
    }

    .transaction-info h2 {
        margin: 0;
        font-size: 1.5rem;
        font-weight: 700;
        color: #1F2937;
    }

    .transaction-info p {
        margin: 5px 0 0 0;
        color: #6B7280;
    }

    .status-badge {
        display: inline-block;
        padding: 8px 16px;
        border-radius: 20px;
        font-size: 0.9rem;
        font-weight: 600;
    }

    .status-pending {
        background-color: #FEF3C7;
        color: #B45309;
    }

    .status-completed {
        background-color: #DCFCE7;
        color: #166534;
    }

    .status-failed {
        background-color: #FEE2E2;
        color: #DC2626;
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
        border-left: 4px solid #10B981;
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

    .info-value a {
        color: #10B981;
        text-decoration: none;
    }

    .info-value a:hover {
        text-decoration: underline;
    }

    .type-badge {
        display: inline-block;
        padding: 6px 12px;
        border-radius: 6px;
        font-size: 0.9rem;
        font-weight: 600;
        margin-top: 5px;
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

    .update-form {
        margin-top: 30px;
        padding-top: 30px;
        border-top: 2px solid #E5E7EB;
    }

    .update-form h3 {
        font-size: 1.1rem;
        font-weight: 600;
        color: #1F2937;
        margin-bottom: 20px;
        margin-top: 0;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: #374151;
    }

    .form-control {
        width: 100%;
        padding: 10px 12px;
        border: 1px solid #E5E7EB;
        border-radius: 8px;
        font-family: 'Poppins', sans-serif;
        font-size: 1rem;
    }

    .form-control:focus {
        border-color: #10B981;
        box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1);
        outline: none;
    }

    textarea.form-control {
        min-height: 100px;
        resize: vertical;
    }

    .action-buttons {
        display: flex;
        gap: 10px;
        margin-top: 20px;
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

    .btn-primary {
        background-color: #10B981;
        color: white;
    }

    .btn-primary:hover {
        background-color: #059669;
    }

    .btn-secondary {
        background-color: #6B7280;
        color: white;
    }

    .btn-secondary:hover {
        background-color: #4B5563;
    }

    .alert {
        padding: 15px 20px;
        border-radius: 8px;
        margin-bottom: 20px;
        border-left: 4px solid;
    }

    .alert-success {
        background-color: #DCFCE7;
        color: #166534;
        border-left-color: #10B981;
    }
</style>
@endsection

@section('content')
<div class="container-fluid">
    <div class="container">
        <!-- Breadcrumb -->
        <nav class="breadcrumb" aria-label="breadcrumb">
            <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item">Admin</a>
            <a href="{{ route('admin.transactions') }}" class="breadcrumb-item">Transactions</a>
            <span class="breadcrumb-item active">Transaction #{{ $transaction->id }}</span>
        </nav>

        <!-- Page Header -->
        <div class="page-header">
            <h1>Transaction Details</h1>
            <p class="mb-0">Manage transaction status and information</p>
        </div>

        <!-- Success Message -->
        @if(session('success'))
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i>
                {{ session('success') }}
            </div>
        @endif

        <!-- Transaction Card -->
        <div class="content-card">
            <div class="transaction-header">
                <div class="transaction-info">
                    <h2>Transaction #{{ $transaction->id }}</h2>
                    <p>{{ $transaction->created_at->format('M d, Y H:i') }}</p>
                </div>
                <div>
                    <span class="status-badge status-{{ $transaction->status }}">
                        {{ ucfirst($transaction->status) }}
                    </span>
                </div>
            </div>

            <!-- Transaction Details Grid -->
            <div class="info-grid">
                <div class="info-box">
                    <div class="info-label">User</div>
                    <div class="info-value">
                        @if($transaction->user)
                            <a href="{{ route('admin.users.show', $transaction->user) }}">
                                {{ $transaction->user->name }}
                            </a>
                            <br>
                            <small class="text-muted">{{ $transaction->user->email }}</small>
                        @else
                            N/A
                        @endif
                    </div>
                </div>

                <div class="info-box">
                    <div class="info-label">Investment Plan</div>
                    <div class="info-value">
                        @if($transaction->investmentPlan)
                            <a href="{{ route('admin.investment-plans.show', $transaction->investmentPlan) }}">
                                {{ $transaction->investmentPlan->name }}
                            </a>
                        @else
                            N/A
                        @endif
                    </div>
                </div>

                <div class="info-box">
                    <div class="info-label">Transaction Type</div>
                    <div class="info-value">
                        <span class="type-badge type-{{ $transaction->type }}">
                            {{ ucfirst($transaction->type) }}
                        </span>
                    </div>
                </div>

                <div class="info-box">
                    <div class="info-label">Amount</div>
                    <div class="info-value" style="font-size: 1.5rem; color: #10B981;">
                        ${{ number_format($transaction->amount, 2) }}
                    </div>
                </div>

                <div class="info-box">
                    <div class="info-label">Wallet Address</div>
                    <div class="info-value">
                        {{ $transaction->wallet_address ?? 'Not provided' }}
                    </div>
                </div>

                <div class="info-box">
                    <div class="info-label">Transaction Hash</div>
                    <div class="info-value" style="word-break: break-all;">
                        {{ $transaction->transaction_hash ?? 'Not set' }}
                    </div>
                </div>
            </div>

            <!-- Notes -->
            @if($transaction->notes)
                <div style="background-color: #F3F4F6; padding: 20px; border-radius: 8px; margin-bottom: 30px;">
                    <h3 style="margin-top: 0; color: #1F2937; font-weight: 600;">Notes</h3>
                    <p style="margin: 0; color: #374151; line-height: 1.8; white-space: pre-wrap;">{{ $transaction->notes }}</p>
                </div>
            @endif

            <!-- Update Form -->
            <div class="update-form">
                <h3>Update Transaction</h3>
                <form action="{{ route('admin.transactions.update', $transaction) }}" method="POST">
                    @csrf
                    @method('PATCH')

                    <div class="form-group">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" id="status" class="form-control @error('status') is-invalid @enderror" required>
                            <option value="pending" {{ $transaction->status === 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="completed" {{ $transaction->status === 'completed' ? 'selected' : '' }}>Completed</option>
                            <option value="failed" {{ $transaction->status === 'failed' ? 'selected' : '' }}>Failed</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="transaction_hash" class="form-label">Transaction Hash</label>
                        <input
                            type="text"
                            name="transaction_hash"
                            id="transaction_hash"
                            class="form-control @error('transaction_hash') is-invalid @enderror"
                            value="{{ $transaction->transaction_hash }}"
                            placeholder="Blockchain transaction hash">
                        @error('transaction_hash')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="notes" class="form-label">Notes</label>
                        <textarea
                            name="notes"
                            id="notes"
                            class="form-control @error('notes') is-invalid @enderror"
                            placeholder="Additional notes about this transaction...">{{ $transaction->notes }}</textarea>
                        @error('notes')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="action-buttons">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Save Changes
                        </button>
                        <a href="{{ route('admin.transactions') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
