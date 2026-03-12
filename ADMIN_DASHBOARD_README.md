# Admin Dashboard Documentation

## Overview

The Admin Dashboard is a comprehensive management interface for administrators to track, manage, and respond to all user submissions and activities on the Flare Spark Global platform, including:

- **Contact Messages** - View and reply to visitor contact forms
- **Transactions** - Monitor and update all user transactions
- **Users** - View user profiles and their transaction histories
- **Investment Plans** - Manage investment plans and view investor details

## Features

### 1. Dashboard Overview
- **Quick Stats**: Display total users, contact messages, transactions, and investment plans
- **Unread Contacts Alert**: Shows count of unread contact messages
- **Pending Transactions Alert**: Shows count of pending transactions
- **Recent Activity Widgets**: Display latest contact messages and transactions
- **Quick Access Menu**: Fast navigation to all admin sections

### 2. Contact Messages Management
- **View All Messages**: Paginated list of all contact messages with status indicators
- **Filter by Status**: Messages tagged as "new", "read", or "replied"
- **Quick Preview**: Message subject and preview text for scanning
- **Detailed View**: Full message content with sender information
- **Reply System**: Send replies directly from the admin panel
- **Status Updates**: Automatically marks messages as "read" when viewed, "replied" when answered
- **Delete Messages**: Remove messages when no longer needed

### 3. Transaction Management
- **Transaction Tracking**: View all user transactions with complete details
- **Filter by Status**: Pending, completed, or failed transactions
- **User Information**: See which user made each transaction
- **Investment Plan Details**: Shows which plan each investment is for
- **Update Transaction Status**: Change status and add blockchain transaction hashes
- **Transaction Notes**: Add notes about transactions for reference
- **Pagination**: Browse through transactions efficiently

### 4. User Management
- **User List**: View all registered users with key information
- **Admin Badge**: Identifies which users have admin privileges
- **Transaction Count**: Shows how many transactions each user has made
- **User Profiles**: Detailed user pages showing:
  - Account verification status
  - Member since date
  - Total transactions count
  - Total investment amount
  - Last activity date
  - Complete transaction history

### 5. Investment Plans Management
- **Plan Overview**: View all investment plans with key metrics
- **Active/Inactive Status**: See which plans are accepting new investments
- **Investor Statistics**: Track number of investors per plan and total capital invested
- **Plan Details**: View:
  - Minimum/Maximum investment amounts
  - Monthly return percentage
  - Plan duration
  - Description
  - Complete list of investor transactions

## Security

### Admin Authentication
- Access requires user login and admin role verification
- `Admin` middleware checks both authentication and `is_admin` flag on user
- Protects all admin routes at `/admin/*`

### Setting Up Admin Users
To create an admin user, update the database directly:

```sql
UPDATE users SET is_admin = 1 WHERE id = {user_id};
```

Or programmatically:
```php
$user = User::find($user_id);
$user->is_admin = true;
$user->save();
```

## Routes

All admin routes are prefixed with `/admin` and protected with `admin` middleware:

```
GET    /admin/dashboard              - Main dashboard
GET    /admin/contacts               - Contact messages list
GET    /admin/contacts/{id}          - Contact message details
POST   /admin/contacts/{id}/reply    - Send reply to contact
DELETE /admin/contacts/{id}          - Delete contact message
GET    /admin/transactions           - Transactions list
GET    /admin/transactions/{id}      - Transaction details
PATCH  /admin/transactions/{id}      - Update transaction
GET    /admin/users                  - Users list
GET    /admin/users/{id}             - User details
GET    /admin/investment-plans       - Investment plans list
GET    /admin/investment-plans/{id}  - Plan details
```

## Database Schema

### New Column Added
A new migration adds `is_admin` column to users table:
- Column: `is_admin` (boolean, default: false)
- Migration: `2026_03_12_000000_add_is_admin_to_users_table.php`

Run migrations to apply:
```bash
php artisan migrate
```

## File Structure

```
app/
├── Http/
│   ├── Controllers/
│   │   └── AdminController.php
│   └── Middleware/
│       └── Admin.php
│
resources/views/admin/
├── dashboard.blade.php
├── contacts/
│   ├── index.blade.php
│   └── show.blade.php
├── transactions/
│   ├── index.blade.php
│   └── show.blade.php
├── users/
│   ├── index.blade.php
│   └── show.blade.php
└── investment-plans/
    ├── index.blade.php
    └── show.blade.php

database/migrations/
└── 2026_03_12_000000_add_is_admin_to_users_table.php
```

## Navigation

Admin users will see an **"Admin Dashboard"** link in the top navigation bar (highlighted in gold/yellow) when logged in.

## Styling

The admin dashboard uses a consistent design system:
- **Color Scheme**: Uses accent colors for different sections
  - Contacts: Blue (#3B82F6)
  - Transactions: Green (#10B981)
  - Users: Purple (#8B5CF6)
  - Plans: Amber (#F59E0B)
- **Responsive Design**: Fully responsive for mobile, tablet, and desktop
- **Status Badges**: Color-coded status indicators for quick scanning
- **Clean Tables**: Organized data presentation with hover effects
- **Easy Navigation**: Breadcrumbs and back buttons for navigation

## Usage Examples

### Viewing Dashboard
Navigate to `/admin/dashboard` to see the overview with quick stats and recent activity.

### Managing Contact Messages
1. Go to `/admin/contacts` to see all messages
2. Click "View" on a message to see full details
3. Use the reply form to respond to the visitor
4. Status automatically updates from "new" → "read" → "replied"

### Updating Transactions
1. Go to `/admin/transactions` to browse all transactions
2. Click "View" on a transaction to see details
3. Update the status (pending/completed/failed)
4. Add the blockchain transaction hash when available
5. Add notes if needed
6. Click "Save Changes"

### Viewing User Profiles
1. Go to `/admin/users` to see all users
2. Click "View" on a user to see their profile
3. View their complete transaction history
4. Track total invested amount and transaction count

### Analyzing Investment Plans
1. Go to `/admin/investment-plans` to see all plans
2. Click "View" on a plan to see investor details
3. View statistics: number of investors, total capital, transaction types
4. See all investor transactions for that plan

## Performance Considerations

- Lists use pagination with 15 items per page
- Queries use eager loading (`.with()`) to prevent N+1 problems
- Transaction counts use `withCount()` for efficient aggregation
- Recently accessed data is displayed first for quick scanning

## Future Enhancements

Potential features to add:
- Advanced filtering and search
- CSV/PDF export functionality
- Email notifications for new submissions
- Automated response templates
- Analytics dashboard
- Bulk transaction status updates
- User activity logs
- Admin action audit trail
- Two-factor authentication for admin accounts
