# Admin Dashboard Setup Guide

## Quick Start

Follow these steps to activate the admin dashboard in your application.

### Step 1: Run Migration
First, run the database migration to add the `is_admin` column to the users table:

```bash
php artisan migrate
```

### Step 2: Create an Admin User
You have two options to create an admin user:

#### Option A: Using Tinker (Recommended)
```bash
php artisan tinker
```

Then in the Tinker shell:
```php
$user = User::find(1); // or the ID of the user you want to make admin
$user->is_admin = true;
$user->save();
exit;
```

#### Option B: Direct Database Update
If you prefer SQL, run this query:
```sql
UPDATE users SET is_admin = 1 WHERE id = 1;
```

#### Option C: Using Database Seed (for fresh installs)
Add to your `DatabaseSeeder.php`:
```php
User::create([
    'name' => 'Admin User',
    'email' => 'admin@example.com',
    'password' => Hash::make('password'),
    'is_admin' => true,
]);
```

Then run: `php artisan db:seed`

### Step 3: Access the Admin Dashboard
1. Log in with your admin account
2. Click "Admin Dashboard" in the top navigation (it will appear in gold/yellow if you're an admin)
3. Or navigate directly to `/admin/dashboard`

## What You Can Do

### Dashboard Overview
View statistics at a glance:
- Total users on the platform
- Total contact messages
- Unread contact messages
- Total transactions
- Pending transactions
- Investment plans

### Contact Messages (`/admin/contacts`)
- **View all messages** from visitors
- **See message status**: new, read, replied
- **Reply to messages** directly from the admin panel
- **Delete messages** when finished
- **Pagination** for easy browsing

### Transactions (`/admin/transactions`)
- **Monitor all transactions** from users
- **View transaction details**: user, amount, plan, status
- **Update status**: pending → completed → failed
- **Add transaction hash** from blockchain
- **Add notes** for reference

### Users (`/admin/users`)
- **View all registered users**
- **See user transaction count** and total invested
- **Check verification status**
- **View complete transaction history**
- **Identify admin users** with badge

### Investment Plans (`/admin/investment-plans`)
- **View all investment plans**
- **See active/inactive status**
- **Track investor count** and capital invested
- **View all plan investors** and their transactions
- **Monitor plan performance**

## File Locations

### New Files Created
- `app/Http/Controllers/AdminController.php` - Admin controller with all logic
- `app/Http/Middleware/Admin.php` - Middleware for admin protection
- `database/migrations/2026_03_12_000000_add_is_admin_to_users_table.php` - Add admin column
- `resources/views/admin/` - All admin dashboard views
- `ADMIN_DASHBOARD_README.md` - Full documentation

### Modified Files
- `routes/web.php` - Added admin routes
- `bootstrap/app.php` - Registered admin middleware
- `resources/views/layouts/navigation.blade.php` - Added admin link to navbar

## Testing the Dashboard

### Create Test Data (Optional)
To test with sample data, you can use your existing database:

1. **Contact Messages** - Navigate to `/` and submit a contact form
2. **Users** - Create accounts at `/register`
3. **Investment Plans** - Should already exist in your database
4. **Transactions** - Log in as a user and create an investment

Then access `/admin/dashboard` to see your data!

## Troubleshooting

### "Unauthorized access" Error
- Make sure your user has `is_admin = 1` in the database
- Verify you're logged in: Look for "Welcome, [Name]" in the navbar
- Clear browser cache and try again

### Admin Dashboard Link Not Showing
- Check that you're logged in
- Check database that `is_admin = true` for your user
- Clear Laravel cache: `php artisan cache:clear`

### Pages Look Unstyled
- Run: `npm run build` (if using Vite/Tailwind)
- Or clear Laravel's view cache: `php artisan view:clear`

### 403 Forbidden on Admin Routes
- Ensure your user has `is_admin = 1`
- Make sure you're logged in and verified
- Check your browser cookies/session

## Security Notes

✅ **Protected Routes**
- All `/admin/*` routes require both login and admin role
- Middleware validates `is_admin` flag on every request

✅ **Safe to Deploy**
- Admin links only show to admin users
- Attempting to access admin routes without permission returns 403
- No sensitive data exposed to non-admins

⚠️ **Recommendations**
- Use strong passwords for admin accounts
- Consider adding two-factor authentication in the future
- Regularly audit who has admin access
- Keep logs of admin actions for security

## Support

For detailed information about features, see `ADMIN_DASHBOARD_README.md`.

For questions about specific features, check the code comments in:
- `app/Http/Controllers/AdminController.php` - Logic and explanations
- `resources/views/admin/*` - Template structure

## Next Steps

After setup:
1. ✅ Run migration: `php artisan migrate`
2. ✅ Create admin user (see Step 2 above)
3. ✅ Log in and access `/admin/dashboard`
4. ✅ Start managing your platform!

Enjoy your new admin dashboard! 🎉
