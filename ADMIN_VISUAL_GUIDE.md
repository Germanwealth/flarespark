# Admin Dashboard - Visual Guide & Features

## 🎯 Dashboard Overview

The admin dashboard provides a complete management interface organized into 5 main sections:

```
┌─────────────────────────────────────────────────────────────┐
│                     ADMIN DASHBOARD                          │
│  Welcome back, [Admin Name]!                                 │
├─────────────────────────────────────────────────────────────┤
│                     QUICK STATISTICS                          │
│  ┌──────────────┬──────────────┬──────────────┬──────────┐   │
│  │ Total Users  │ Contact Msgs │ Transactions │ Plans    │   │
│  │   [Count]    │   [Count]    │   [Count]    │ [Count]  │   │
│  │              │  +[unread]   │  +[pending]  │          │   │
│  └──────────────┴──────────────┴──────────────┴──────────┘   │
├─────────────────────────────────────────────────────────────┤
│                    QUICK ACCESS MENU                         │
│  ┌──────────────┬──────────────┬──────────────┬──────────┐   │
│  │ 📧 Contact   │ 💱 Trans-    │ 👥 Users     │ 📈 Plans │   │
│  │ Messages     │ actions      │              │          │   │
│  └──────────────┴──────────────┴──────────────┴──────────┘   │
├─────────────────────────────────────────────────────────────┤
│                  RECENT CONTACT MESSAGES                     │
│  ┌──────────────────────────────────────────────────────┐   │
│  │ Name    │ Email          │ Subject  │ Status   │ Date │   │
│  ├──────────────────────────────────────────────────────┤   │
│  │ John    │ john@example   │ Question │ [NEW]    │ 2min │   │
│  │ Jane    │ jane@example   │ Feedback │ [READ]   │ 1hr  │   │
│  │ Bob     │ bob@example    │ Support  │ [REPLIED]│ 3min │   │
│  └──────────────────────────────────────────────────────┘   │
├─────────────────────────────────────────────────────────────┤
│                   RECENT TRANSACTIONS                        │
│  ┌──────────────────────────────────────────────────────┐   │
│  │ User    │ Plan     │ Type    │ Amount  │ Status  │ Date │  │
│  ├──────────────────────────────────────────────────────┤   │
│  │ Alice   │ Plan A   │ Deposit │ $1000   │ Pending │ 5min │  │
│  │ Charlie │ Plan B   │ Deposit │ $500    │ Done    │ 1hr  │  │
│  └──────────────────────────────────────────────────────┘   │
└─────────────────────────────────────────────────────────────┘
```

## 📧 Contact Messages Section

### List View (`/admin/contacts`)
```
┌─────────────────────────────────────────────────────────────┐
│  CONTACT MESSAGES                                   [View All]│
├─────────────────────────────────────────────────────────────┤
│ From    │ Email          │ Subject     │ Preview      │ St. │
├─────────────────────────────────────────────────────────────┤
│ Sarah   │ sarah@email    │ Investment  │ I want to... │ 🔴  │ → Click to view
│ Mike    │ mike@email     │ Support     │ Is this...   │ 🔵  │
│ Emma    │ emma@email     │ Partnership │ Interested   │ 🟢  │
│ (Pagination: < 1 2 3 4 > )                                   │
└─────────────────────────────────────────────────────────────┘

Status Colors:
🔴 NEW (Red)     - Not read yet
🔵 READ (Blue)   - Read but not replied
🟢 REPLIED (Green) - Reply has been sent
```

### Detail View (`/admin/contacts/{id}`)
```
┌─────────────────────────────────────────────────────────────┐
│  FROM: Sarah Martinez                              [🔴 NEW]  │
│  Email: sarah@example.com                                    │
├─────────────────────────────────────────────────────────────┤
│                                                               │
│  Subject: Investment Opportunity                             │
│  Received: March 12, 2026 at 10:30 AM                       │
│                                                               │
│  ┌────────────────────────────────────────────────────────┐ │
│  │ MESSAGE                                                │ │
│  │ I am interested in your investment plans. Can you     │ │
│  │ provide more details about the monthly returns and    │ │
│  │ minimum investment requirements?                      │ │
│  └────────────────────────────────────────────────────────┘ │
│                                                               │
│  ┌────────────────────────────────────────────────────────┐ │
│  │ SEND REPLY                                             │ │
│  │ [Text Area for your response]                          │ │
│  │ [Send Reply Button] [Back]                            │ │
│  └────────────────────────────────────────────────────────┘ │
└─────────────────────────────────────────────────────────────┘
```

## 💱 Transactions Section

### List View (`/admin/transactions`)
```
┌──────────────────────────────────────────────────────────────┐
│  TRANSACTIONS                                     [View All]  │
├──────────────────────────────────────────────────────────────┤
│ User      │ Plan      │ Type      │ Amount  │ Status   │ Date │
├──────────────────────────────────────────────────────────────┤
│ Alice K   │ Premium   │ 🔵 Dep.   │ $2000   │ ⏳ Pend. │ 10m  │
│ Bob S     │ Standard  │ 🟢 Ret.   │ $150    │ ✅ Done │ 2h   │
│ Carol J   │ Basic     │ 🔴 With.  │ $500    │ ❌ Failed│ 5h   │
│ (Pagination: < 1 2 3 > )                                     │
└──────────────────────────────────────────────────────────────┘

Type Indicators:
🔵 Deposit     (Blue)   - Money going in
🟢 Return      (Green)  - Investment returns
🔴 Withdrawal  (Red)    - Money going out

Status Indicators:
⏳ Pending     (Yellow) - Awaiting confirmation
✅ Completed   (Green)  - All done
❌ Failed      (Red)    - Transaction failed
```

### Detail View (`/admin/transactions/{id}`)
```
┌──────────────────────────────────────────────────────────────┐
│  TRANSACTION #1234                                [✅ DONE]  │
│  March 12, 2026 at 02:30 PM                                  │
├──────────────────────────────────────────────────────────────┤
│  ┌─────────────┬─────────────┬──────────────┬────────────┐  │
│  │ User        │ Plan        │ Type         │ Amount     │  │
│  │ Alice K.    │ Premium     │ 🔵 Deposit   │ $2,000.00  │  │
│  ├─────────────┼─────────────┼──────────────┼────────────┤  │
│  │ Wallet Addr │ TX Hash     │ Status       │ Created    │  │
│  │ 0x123...    │ Pending...  │ Completed    │ 2 hours ago│  │
│  └─────────────┴─────────────┴──────────────┴────────────┘  │
│                                                               │
│  ┌──────────────────────────────────────────────────────┐   │
│  │ UPDATE TRANSACTION                                  │   │
│  │ Status: [Dropdown: Pending / Completed / Failed]   │   │
│  │ TX Hash: [Input field]                              │   │
│  │ Notes: [Large text area]                            │   │
│  │ [Save Changes] [Cancel]                             │   │
│  └──────────────────────────────────────────────────────┘   │
└──────────────────────────────────────────────────────────────┘
```

## 👥 Users Section

### List View (`/admin/users`)
```
┌──────────────────────────────────────────────────────────────┐
│  USERS                                            [View All]  │
├──────────────────────────────────────────────────────────────┤
│ Name      │ Email              │ Trans. │ Joined    │ Action  │
├──────────────────────────────────────────────────────────────┤
│ Sarah M   │ sarah@example      │ 5      │ Mar 10    │ [View] │
│ Admin ⭐ │ admin@example      │ 12     │ Mar 1     │ [View] │
│ John D    │ john@example       │ 2      │ Mar 11    │ [View] │
│ Emma L    │ emma@example       │ 8      │ Mar 8     │ [View] │
│ (Pagination: < 1 2 > )                                       │
└──────────────────────────────────────────────────────────────┘

⭐ = Admin user
```

### Detail View (`/admin/users/{id}`)
```
┌──────────────────────────────────────────────────────────────┐
│  SARAH MARTINEZ                                              │
│  sarah@example.com                                           │
├──────────────────────────────────────────────────────────────┤
│  ┌───────────────┬──────────────┬──────────────────────────┐ │
│  │ Email         │ Status       │ Member Since             │ │
│  │ sarah@...     │ ✓ Verified   │ Mar 10, 2026             │ │
│  ├───────────────┼──────────────┼──────────────────────────┤ │
│  │ Total Trans   │ Total Invested│ Last Activity            │ │
│  │ 5             │ $5,500        │ 2 hours ago             │ │
│  └───────────────┴──────────────┴──────────────────────────┘ │
│                                                               │
│  TRANSACTION HISTORY                                          │
│  ┌──────────────────────────────────────────────────────┐   │
│  │ Plan     │ Type  │ Amount   │ Status  │ Date         │   │
│  ├──────────────────────────────────────────────────────┤   │
│  │ Premium  │ Dep   │ $2000    │ Done    │ Mar 12, 10am │   │
│  │ Standard │ Ret   │ $100     │ Done    │ Mar 11, 3pm  │   │
│  │ Basic    │ Dep   │ $1500    │ Pending │ Mar 10       │   │
│  └──────────────────────────────────────────────────────┘   │
│  [Back to Users]                                             │
└──────────────────────────────────────────────────────────────┘
```

## 📈 Investment Plans Section

### List View (`/admin/investment-plans`)
```
┌──────────────────────────────────────────────────────────────┐
│  INVESTMENT PLANS                                 [View All]  │
├──────────────────────────────────────────────────────────────┤
│ Name      │ Min Inv  │ Return │ Duration │ Investors │ Status │
├──────────────────────────────────────────────────────────────┤
│ Premium   │ $1000    │ 5%/mo  │ 12 mo   │ 42        │ ✅ Act │
│ Standard  │ $500     │ 3%/mo  │ 6 mo    │ 28        │ ✅ Act │
│ Basic     │ $100     │ 2%/mo  │ 3 mo    │ 5         │ ⏸ Ina │
│ (Pagination: < 1 > )                                         │
└──────────────────────────────────────────────────────────────┘

✅ Active   (Green)  - Accepting new investors
⏸ Inactive (Red)    - Not accepting new investors
```

### Detail View (`/admin/investment-plans/{id}`)
```
┌──────────────────────────────────────────────────────────────┐
│  PREMIUM INVESTMENT PLAN                          [✅ ACTIVE] │
│  Created: March 1, 2026                                      │
├──────────────────────────────────────────────────────────────┤
│  ┌──────────────┬──────────────┬──────────────┬───────────┐  │
│  │ Min Invest   │ Max Invest   │ Return Rate  │ Duration  │  │
│  │ $1,000       │ Unlimited    │ 5.00% /mo    │ 12 months │  │
│  ├──────────────┼──────────────┼──────────────┼───────────┤  │
│  │ Total Inv.   │ Investors    │                           │  │
│  │ $84,000      │ 42           │                           │  │
│  └──────────────┴──────────────┴──────────────┴───────────┘  │
│                                                               │
│  DESCRIPTION                                                 │
│  "Premium tier investment with monthly compounding returns"  │
│                                                               │
│  INVESTOR TRANSACTIONS                                        │
│  ┌──────────────────────────────────────────────────────┐   │
│  │ Investor  │ Type  │ Amount   │ Status  │ Date         │   │
│  ├──────────────────────────────────────────────────────┤   │
│  │ Sarah M   │ Dep   │ $2000    │ Done    │ Mar 12, 10am │   │
│  │ John D    │ Dep   │ $1000    │ Done    │ Mar 11, 3pm  │   │
│  │ Emma L    │ Ret   │ $100     │ Done    │ Mar 10       │   │
│  └──────────────────────────────────────────────────────┘   │
│  [Back to Plans]                                             │
└──────────────────────────────────────────────────────────────┘
```

## 🎨 Color Coding System

### Status Colors
| Status | Color | Meaning |
|--------|-------|---------|
| 🔴 NEW | Red | Unread/New |
| 🔵 READ | Blue | Read but no action |
| 🟢 REPLIED | Green | Complete/Replied |
| ⏳ PENDING | Yellow | Awaiting confirmation |
| ✅ COMPLETED | Green | Done |
| ❌ FAILED | Red | Error/Failed |

### Section Colors
| Section | Color | Hex |
|---------|-------|-----|
| 📧 Contacts | Blue | #3B82F6 |
| 💱 Transactions | Green | #10B981 |
| 👥 Users | Purple | #8B5CF6 |
| 📈 Plans | Amber | #F59E0B |

## 🔐 Navigation & Security

### Visible to Admins Only
- "Admin Dashboard" link in navbar (gold/yellow color)
- All `/admin/*` routes
- Admin-specific options in menus

### Protected Routes
All admin routes require:
- ✅ User to be logged in
- ✅ Email verified
- ✅ `is_admin = true` in database

Unauthorized access → 403 Forbidden

## 📱 Responsive Design

### Desktop (1024px+)
- Full table layout
- Side-by-side columns
- Grid layout for statistics

### Tablet (768px - 1023px)
- Optimized column widths
- Touch-friendly buttons
- Readable fonts

### Mobile (< 768px)
- Stacked layout
- Single column tables
- Full-width buttons
- Scrollable tables

## ⌨️ Common Actions

### Quick Tasks
1. **Check unread messages**: Go to dashboard → Click "Contact Messages"
2. **Reply to message**: Click message → Type reply → Send
3. **Update transaction**: Click transaction → Change status → Save
4. **View user history**: Click user → See all transactions
5. **Check plan performance**: Click plan → See investor list

### Bulk Checks
1. **Daily overview**: Visit `/admin/dashboard`
2. **Check all messages**: Go to `/admin/contacts`
3. **Monitor transactions**: Go to `/admin/transactions`
4. **Review users**: Go to `/admin/users`
5. **Plan performance**: Go to `/admin/investment-plans`

---

**This visual guide helps understand the admin dashboard layout and features at a glance!**
