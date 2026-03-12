@extends('layouts.app')

@section('title', 'Contact Message - Admin')

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

    .content-card {
        background: white;
        border-radius: 12px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        padding: 30px;
        margin-bottom: 30px;
    }

    .message-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-bottom: 20px;
        border-bottom: 2px solid #E5E7EB;
        margin-bottom: 30px;
    }

    .sender-info h2 {
        margin: 0;
        font-size: 1.5rem;
        font-weight: 700;
        color: #1F2937;
    }

    .sender-info p {
        margin: 5px 0 0 0;
        color: #6B7280;
    }

    .message-meta {
        display: flex;
        gap: 30px;
        margin-bottom: 30px;
        padding: 15px;
        background-color: #F9FAFB;
        border-radius: 8px;
    }

    .meta-item {
        flex: 1;
    }

    .meta-label {
        font-size: 0.85rem;
        text-transform: uppercase;
        color: #6B7280;
        font-weight: 600;
        margin-bottom: 5px;
        letter-spacing: 0.5px;
    }

    .meta-value {
        font-size: 1.1rem;
        color: #1F2937;
        font-weight: 500;
    }

    .status-badge {
        display: inline-block;
        padding: 8px 16px;
        border-radius: 20px;
        font-size: 0.9rem;
        font-weight: 600;
    }

    .status-new {
        background-color: #FEE2E2;
        color: #DC2626;
    }

    .status-read {
        background-color: #DBEAFE;
        color: #1E40AF;
    }

    .status-replied {
        background-color: #DCFCE7;
        color: #166534;
    }

    .message-section h3 {
        font-size: 1.1rem;
        font-weight: 600;
        color: #1F2937;
        margin-bottom: 15px;
        margin-top: 0;
    }

    .message-content {
        background-color: #F9FAFB;
        padding: 20px;
        border-radius: 8px;
        border-left: 4px solid #3B82F6;
        line-height: 1.8;
        color: #374151;
        white-space: pre-wrap;
        word-wrap: break-word;
    }

    .reply-form {
        margin-top: 30px;
        padding-top: 30px;
        border-top: 2px solid #E5E7EB;
    }

    .reply-section {
        background-color: #F0FDF4;
        padding: 20px;
        border-radius: 8px;
        border-left: 4px solid #10B981;
        margin-top: 20px;
    }

    .reply-section h4 {
        font-weight: 600;
        color: #166534;
        margin-bottom: 10px;
    }

    .reply-content {
        color: #374151;
        white-space: pre-wrap;
        word-wrap: break-word;
        line-height: 1.8;
    }

    textarea {
        min-height: 150px;
        border: 1px solid #E5E7EB;
        border-radius: 8px;
        padding: 12px;
        font-family: 'Poppins', sans-serif;
        resize: vertical;
    }

    textarea:focus {
        border-color: #3B82F6;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        outline: none;
    }

    .action-buttons {
        display: flex;
        gap: 10px;
        margin-top: 15px;
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
        background-color: #3B82F6;
        color: white;
    }

    .btn-primary:hover {
        background-color: #2563EB;
    }

    .btn-danger {
        background-color: #EF4444;
        color: white;
    }

    .btn-danger:hover {
        background-color: #DC2626;
    }

    .btn-secondary {
        background-color: #6B7280;
        color: white;
    }

    .btn-secondary:hover {
        background-color: #4B5563;
    }

    .delete-form {
        display: inline;
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
            <a href="{{ route('admin.contacts') }}" class="breadcrumb-item">Contact Messages</a>
            <span class="breadcrumb-item active">{{ $contactMessage->name }}</span>
        </nav>

        <!-- Page Header -->
        <div class="page-header">
            <h1>Contact Message Details</h1>
            <p class="mb-0">Manage and respond to this message</p>
        </div>

        <!-- Success Message -->
        @if(session('success'))
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i>
                {{ session('success') }}
            </div>
        @endif

        <!-- Message Card -->
        <div class="content-card">
            <div class="message-header">
                <div class="sender-info">
                    <h2>{{ $contactMessage->name }}</h2>
                    <p>{{ $contactMessage->email }}</p>
                </div>
                <div>
                    <span class="status-badge status-{{ $contactMessage->status }}">
                        {{ ucfirst($contactMessage->status) }}
                    </span>
                </div>
            </div>

            <div class="message-meta">
                <div class="meta-item">
                    <div class="meta-label">Subject</div>
                    <div class="meta-value">{{ $contactMessage->subject }}</div>
                </div>
                <div class="meta-item">
                    <div class="meta-label">Received</div>
                    <div class="meta-value">{{ $contactMessage->created_at->format('M d, Y H:i') }}</div>
                </div>
            </div>

            <!-- Original Message -->
            <div class="message-section">
                <h3>Message</h3>
                <div class="message-content">{{ $contactMessage->message }}</div>
            </div>

            <!-- Existing Reply -->
            @if($contactMessage->reply)
                <div class="reply-section">
                    <h4><i class="fas fa-reply"></i> Your Reply</h4>
                    <div class="reply-content">{{ $contactMessage->reply }}</div>
                </div>
            @endif

            <!-- Reply Form -->
            @if($contactMessage->status !== 'replied')
                <div class="reply-form">
                    <h3>Send Reply</h3>
                    <form action="{{ route('admin.contacts.reply', $contactMessage) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="reply" class="form-label">Message</label>
                            <textarea 
                                name="reply" 
                                id="reply" 
                                class="form-control @error('reply') is-invalid @enderror"
                                placeholder="Type your reply here..."
                                required></textarea>
                            @error('reply')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="action-buttons">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-paper-plane"></i> Send Reply
                            </button>
                            <a href="{{ route('admin.contacts') }}" class="btn btn-secondary">Back</a>
                        </div>
                    </form>
                </div>
            @else
                <div class="action-buttons" style="margin-top: 30px;">
                    <a href="{{ route('admin.contacts') }}" class="btn btn-secondary">Back to Messages</a>
                    <form action="{{ route('admin.contacts.delete', $contactMessage) }}" method="POST" class="delete-form" onsubmit="return confirm('Are you sure you want to delete this message?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash"></i> Delete Message
                        </button>
                    </form>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
