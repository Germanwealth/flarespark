@extends('layouts.app')

@section('title', 'PRISM - Advanced Crypto Asset Management Platform')

@section('styles')
<style>
    :root {
      --page-bg: #f4f7fb;
      --surface: #ffffff;
      --surface-alt: #f8fbff;
      --ink-strong: #0f172a;
      --ink: #334155;
      --ink-soft: #64748b;
      --line: #dbe4ee;
      --line-strong: #c9d7e6;
      --brand: #2563eb;
      --brand-2: #0f172a;
      --accent: #0ea5e9;
      --success: #10b981;
      --shadow-soft: 0 12px 32px rgba(15, 23, 42, 0.08);
      --shadow-lg: 0 28px 60px rgba(15, 23, 42, 0.14);
    }

    body {
      background:
        radial-gradient(circle at top left, rgba(37, 99, 235, 0.06), transparent 32%),
        linear-gradient(180deg, #f8fbff 0%, var(--page-bg) 100%);
      color: var(--ink);
    }

    /* ANIMATIONS */
    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(30px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @keyframes slideInRight {
      from {
        opacity: 0;
        transform: translateX(-30px);
      }
      to {
        opacity: 1;
        transform: translateX(0);
      }
    }

    @keyframes glow {
      0%, 100% {
        box-shadow: 0 0 20px rgba(59, 130, 246, 0.5);
      }
      50% {
        box-shadow: 0 0 40px rgba(59, 130, 246, 0.8);
      }
    }

    @keyframes float {
      0%, 100% {
        transform: translateY(0px);
      }
      50% {
        transform: translateY(-20px);
      }
    }

    /* MOBILE FIRST - Default for small screens */
    .hero {
      background: linear-gradient(120deg, #0F172A 0%, #111827 45%, #1E293B 100%);
      color: white;
      padding: 64px 20px 56px;
      position: relative;
      overflow: hidden;
      margin-top: 0;
      min-height: 92vh;
      display: flex;
      align-items: center;
    }

    .hero::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: radial-gradient(circle at 86% 18%, rgba(59, 130, 246, 0.18) 0%, transparent 38%),
                  radial-gradient(circle at 14% 82%, rgba(16, 185, 129, 0.14) 0%, transparent 42%);
      animation: float 6s ease-in-out infinite;
    }

    .hero::after {
      content: '';
      position: absolute;
      inset: 0;
      background-image:
        linear-gradient(rgba(148, 163, 184, 0.06) 1px, transparent 1px),
        linear-gradient(90deg, rgba(148, 163, 184, 0.06) 1px, transparent 1px);
      background-size: 42px 42px;
      mask-image: linear-gradient(180deg, rgba(0, 0, 0, 0.7), transparent 85%);
      pointer-events: none;
    }

    .hero-content {
      position: relative;
      z-index: 1;
      width: 100%;
      animation: fadeInUp 0.8s ease-out;
    }

    /* Hero Row Alignment */
    .hero .row {
      align-items: stretch;
      margin-left: 0;
      margin-right: 0;
    }

    .hero .col-lg-6 {
      padding: 0;
      margin-bottom: 30px;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .hero .col-lg-6:first-child {
      padding-right: 20px;
    }

    .hero .col-lg-6:last-child {
      padding-left: 0;
    }

    @media (min-width: 768px) {
      .hero .col-lg-6 {
        padding: 0 20px;
        margin-bottom: 0;
      }

      .hero .col-lg-6:first-child {
        padding-right: 30px;
      }

      .hero .col-lg-6:last-child {
        padding-left: 30px;
      }
    }

    @media (min-width: 1024px) {
      .hero .col-lg-6 {
        padding: 0 40px;
      }

      .hero .col-lg-6:first-child {
        padding-right: 60px;
      }

      .hero .col-lg-6:last-child {
        padding-left: 60px;
      }
    }

    .hero h1 {
      font-size: 2.05rem;
      font-weight: 800;
      margin-bottom: 16px;
      line-height: 1.12;
      background: linear-gradient(135deg, #F8FAFC 0%, #CBD5E1 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
      letter-spacing: -0.03em;
    }

    .hero p {
      font-size: 1rem;
      margin-bottom: 26px;
      opacity: 0.94;
      line-height: 1.75;
      color: #D1D5DB;
      animation: fadeInUp 0.8s ease-out 0.2s both;
    }

    .hero-tag {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      padding: 8px 12px;
      border-radius: 999px;
      margin-bottom: 16px;
      background: rgba(37, 99, 235, 0.18);
      border: 1px solid rgba(96, 165, 250, 0.4);
      color: #BFDBFE;
      font-size: 0.78rem;
      font-weight: 700;
      letter-spacing: 0.05em;
      text-transform: uppercase;
    }

    .hero-tag::before {
      content: '';
      width: 7px;
      height: 7px;
      border-radius: 999px;
      background: #22C55E;
      box-shadow: 0 0 0 6px rgba(34, 197, 94, 0.2);
    }

    /* Tablet and larger screens */
    @media (min-width: 768px) {
      .hero {
        padding: 106px 40px 86px;
      }

      .hero h1 {
        font-size: 2.95rem;
      }

      .hero p {
        font-size: 1.08rem;
      }
    }

    /* Desktop screens */
    @media (min-width: 1024px) {
      .hero {
        padding: 146px 0 110px;
      }

      .hero h1 {
        font-size: 3.65rem;
      }

      .hero p {
        font-size: 1.12rem;
        max-width: 560px;
      }
    }

    .btn-primary-hero {
      background: linear-gradient(135deg, #3B82F6 0%, #2563EB 100%);
      color: white;
      border: none;
      border-radius: 12px;
      padding: 14px 24px;
      font-weight: 700;
      cursor: pointer;
      transition: all 0.3s ease;
      display: inline-block;
      margin-right: 0;
      margin-bottom: 10px;
      text-decoration: none;
      box-shadow: 0 8px 24px rgba(59, 130, 246, 0.3);
      font-size: 0.92rem;
      width: 100%;
      text-align: center;
      animation: fadeInUp 0.8s ease-out 0.3s both;
    }

    .btn-primary-hero:hover {
      background: linear-gradient(135deg, #2563EB 0%, #1D4ED8 100%);
      transform: translateY(-3px);
      box-shadow: 0 14px 35px rgba(59, 130, 246, 0.4);
      color: white;
    }

    .btn-secondary-hero {
      background: rgba(15, 23, 42, 0.55);
      color: #E2E8F0;
      border: 1px solid #475569;
      border-radius: 12px;
      padding: 13px 24px;
      font-weight: 700;
      cursor: pointer;
      transition: all 0.3s ease;
      display: inline-block;
      text-decoration: none;
      font-size: 0.92rem;
      width: 100%;
      text-align: center;
      animation: fadeInUp 0.8s ease-out 0.4s both;
    }

    /* Tablet and larger */
    @media (min-width: 768px) {
      .btn-primary-hero,
      .btn-secondary-hero {
        width: auto;
        margin-bottom: 0;
      }

      .btn-primary-hero {
        margin-right: 12px;
        padding: 16px 30px;
      }

      .btn-secondary-hero {
        padding: 15px 28px;
      }
    }

    .btn-secondary-hero:hover {
      background: #1E293B;
      color: #F8FAFC;
      border-color: #94A3B8;
      transform: translateY(-3px);
    }

    .hero-cta {
      display: flex;
      flex-direction: column;
      gap: 10px;
      margin-bottom: 24px;
    }

    .hero-stats {
      display: grid;
      grid-template-columns: repeat(2, minmax(0, 1fr));
      gap: 10px;
      margin: 0;
      padding: 0;
      list-style: none;
    }

    .hero-stats li {
      background: rgba(15, 23, 42, 0.5);
      border: 1px solid rgba(100, 116, 139, 0.45);
      border-radius: 12px;
      padding: 12px;
    }

    .hero-stats strong {
      display: block;
      font-size: 1.15rem;
      color: #F8FAFC;
      line-height: 1.15;
      letter-spacing: -0.02em;
      margin-bottom: 4px;
    }

    .hero-stats span {
      display: block;
      font-size: 0.78rem;
      color: #CBD5E1;
      text-transform: uppercase;
      letter-spacing: 0.04em;
    }

    .hero-note {
      display: flex;
      align-items: center;
      gap: 10px;
      margin-top: 20px;
      color: #cbd5e1;
      font-size: 0.92rem;
    }

    .hero-note::before {
      content: '';
      width: 40px;
      height: 1px;
      background: linear-gradient(90deg, rgba(96, 165, 250, 0.1), rgba(96, 165, 250, 0.9));
    }

    @media (min-width: 768px) {
      .hero-cta {
        flex-direction: row;
        align-items: center;
      }
    }

    /* FEATURES/BASIC SECTION - MOBILE FIRST */
    .basic-1 {
      padding: 56px 20px;
      background: transparent;
      position: relative;
    }

    .basic-1::before {
      content: '';
      position: absolute;
      top: -50%;
      right: -50%;
      width: 200%;
      height: 200%;
      background: radial-gradient(circle at 40% 60%, rgba(59, 130, 246, 0.05) 0%, transparent 50%);
      pointer-events: none;
    }

    .basic-1 h2 {
      font-size: 1.75rem;
      font-weight: 800;
      margin-bottom: 25px;
      color: #0F172A;
      text-align: center;
      background: linear-gradient(135deg, #0F172A 0%, #334155 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
      position: relative;
      z-index: 1;
      animation: fadeInUp 0.8s ease-out;
    }

    .basic-1 p {
      font-size: 0.95rem;
      color: var(--ink);
      line-height: 1.9;
      margin-bottom: 20px;
      position: relative;
      z-index: 1;
      animation: fadeInUp 0.8s ease-out 0.1s both;
    }

    .section-kicker {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      font-size: 0.78rem;
      font-weight: 700;
      letter-spacing: 0.08em;
      color: var(--brand);
      text-transform: uppercase;
      margin-bottom: 14px;
    }

    .section-kicker::before {
      content: '';
      width: 24px;
      height: 1px;
      background: currentColor;
    }

    .insight-panel {
      background: linear-gradient(165deg, #ffffff 0%, #f2f8ff 100%);
      border: 1px solid rgba(148, 163, 184, 0.22);
      border-radius: 24px;
      padding: 22px;
      box-shadow: var(--shadow-soft);
      position: relative;
      overflow: hidden;
    }

    .insight-panel::before {
      content: '';
      position: absolute;
      width: 220px;
      height: 220px;
      border-radius: 999px;
      background: radial-gradient(circle, rgba(14, 165, 233, 0.14) 0%, transparent 70%);
      top: -80px;
      right: -60px;
    }

    .insight-shell {
      position: relative;
      z-index: 1;
      display: grid;
      gap: 16px;
    }

    .insight-topbar {
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 12px;
      margin-bottom: 6px;
    }

    .insight-badge {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      padding: 8px 12px;
      border-radius: 999px;
      background: rgba(37, 99, 235, 0.08);
      color: var(--brand);
      font-size: 0.8rem;
      font-weight: 700;
    }

    .insight-badge::before {
      content: '';
      width: 8px;
      height: 8px;
      border-radius: 999px;
      background: var(--success);
      box-shadow: 0 0 0 5px rgba(16, 185, 129, 0.12);
    }

    .insight-caption {
      font-size: 0.85rem;
      color: var(--ink-soft);
      font-weight: 600;
    }

    .insight-chart {
      background: linear-gradient(180deg, #0f172a 0%, #16253d 100%);
      border-radius: 20px;
      padding: 20px;
      min-height: 260px;
      box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.05);
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      gap: 18px;
    }

    .insight-figure {
      display: flex;
      align-items: end;
      justify-content: space-between;
      gap: 14px;
    }

    .insight-value strong {
      display: block;
      color: #f8fafc;
      font-size: 2rem;
      line-height: 1;
      letter-spacing: -0.04em;
    }

    .insight-value span {
      color: #94a3b8;
      font-size: 0.88rem;
    }

    .insight-pill {
      padding: 8px 12px;
      border-radius: 999px;
      background: rgba(16, 185, 129, 0.16);
      color: #a7f3d0;
      font-size: 0.82rem;
      font-weight: 700;
    }

    .insight-bars {
      display: grid;
      grid-template-columns: repeat(6, minmax(0, 1fr));
      align-items: end;
      gap: 10px;
      min-height: 130px;
    }

    .insight-bars span {
      display: block;
      border-radius: 999px 999px 10px 10px;
      background: linear-gradient(180deg, #38bdf8 0%, #2563eb 100%);
      box-shadow: 0 10px 18px rgba(37, 99, 235, 0.22);
    }

    .insight-summary {
      display: grid;
      grid-template-columns: repeat(2, minmax(0, 1fr));
      gap: 12px;
    }

    .insight-card {
      background: var(--surface);
      border: 1px solid rgba(148, 163, 184, 0.18);
      border-radius: 18px;
      padding: 16px;
      box-shadow: 0 12px 24px rgba(15, 23, 42, 0.06);
    }

    .insight-card strong {
      display: block;
      color: var(--ink-strong);
      font-size: 1.1rem;
      margin-bottom: 4px;
    }

    .insight-card span {
      display: block;
      color: var(--ink-soft);
      font-size: 0.84rem;
      line-height: 1.5;
    }

    .text-link {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      text-decoration: none;
      color: var(--ink-strong);
      font-weight: 700;
      margin-top: 4px;
    }

    .text-link:hover {
      color: var(--brand);
    }

    /* Tablet screens */
    @media (min-width: 768px) {
      .basic-1 {
        padding: 60px 40px;
      }

      .basic-1 h2 {
        font-size: 2.2rem;
        text-align: left;
      }

      .basic-1 p {
        font-size: 1.02rem;
      }

      .insight-panel {
        padding: 28px;
      }

      .insight-chart {
        min-height: 320px;
      }
    }

    /* Desktop screens */
    @media (min-width: 1024px) {
      .basic-1 {
        padding: 100px 0;
      }

      .basic-1 h2 {
        font-size: 2.8rem;
      }

      .basic-1 p {
        font-size: 1.05rem;
      }
    }

    .benefits-section {
      padding: 88px 0;
      position: relative;
    }

    .benefits-section::before {
      content: '';
      position: absolute;
      inset: 0;
      background:
        radial-gradient(circle at 82% 22%, rgba(37, 99, 235, 0.08), transparent 26%),
        linear-gradient(180deg, rgba(255, 255, 255, 0.7) 0%, rgba(248, 250, 252, 0.8) 100%);
      pointer-events: none;
    }

    .section-head {
      position: relative;
      z-index: 1;
      margin-bottom: 40px;
    }

    .section-head h2 {
      font-size: 2.25rem;
      font-weight: 800;
      color: var(--ink-strong);
      margin-bottom: 12px;
      letter-spacing: -0.03em;
    }

    .section-head p {
      color: var(--ink-soft);
      font-size: 1.02rem;
      max-width: 620px;
      margin: 0 auto;
    }

    .benefit-card {
      position: relative;
      background: rgba(255, 255, 255, 0.82);
      backdrop-filter: blur(10px);
      border: 1px solid rgba(148, 163, 184, 0.18);
      border-radius: 22px;
      padding: 28px;
      box-shadow: var(--shadow-soft);
      transition: transform 0.28s ease, box-shadow 0.28s ease, border-color 0.28s ease;
      height: 100%;
      overflow: hidden;
    }

    .benefit-card::before {
      content: '';
      position: absolute;
      inset: 0 auto auto 0;
      width: 100%;
      height: 4px;
      background: linear-gradient(90deg, var(--brand), var(--accent));
      opacity: 0.85;
    }

    .benefit-card:hover {
      transform: translateY(-8px);
      box-shadow: var(--shadow-lg);
      border-color: rgba(37, 99, 235, 0.28);
    }

    .benefit-icon {
      width: 62px;
      height: 62px;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      border-radius: 18px;
      background: linear-gradient(135deg, #eff6ff 0%, #dbeafe 100%);
      color: var(--brand);
      margin-bottom: 18px;
      box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.8);
    }

    .benefit-card h3 {
      font-size: 1.18rem;
      font-weight: 700;
      color: var(--ink-strong);
      margin-bottom: 10px;
    }

    .benefit-card p {
      color: var(--ink-soft);
      line-height: 1.7;
      margin-bottom: 0;
      font-size: 0.96rem;
    }

    .transactions-section {
      background: transparent;
      padding: 56px 20px 88px;
      position: relative;
    }

    /* FEATURE CARDS */
    .feature-card {
      background: white;
      border-radius: 12px;
      padding: 24px;
      margin-bottom: 20px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
      border: 1px solid #E2E8F0;
      transition: all 0.3s ease;
      animation: fadeInUp 0.8s ease-out both;
    }

    .feature-card:nth-child(1) { animation-delay: 0.2s; }
    .feature-card:nth-child(2) { animation-delay: 0.3s; }
    .feature-card:nth-child(3) { animation-delay: 0.4s; }
    .feature-card:nth-child(4) { animation-delay: 0.5s; }

    .feature-card:hover {
      box-shadow: 0 12px 30px rgba(59, 130, 246, 0.15);
      transform: translateY(-8px);
      border-color: #3B82F6;
    }

    .feature-card h3 {
      font-size: 1.25rem;
      font-weight: 700;
      color: #0F172A;
      margin-bottom: 12px;
    }

    .feature-card p {
      font-size: 0.95rem;
      color: #475569;
      line-height: 1.7;
    }

    .feature-icon {
      width: 48px;
      height: 48px;
      background: linear-gradient(135deg, #3B82F6 0%, #2563EB 100%);
      border-radius: 10px;
      display: flex;
      align-items: center;
      justify-content: center;
      margin-bottom: 15px;
      color: white;
      font-size: 1.5rem;
    }

    @media (min-width: 768px) {
      .feature-card {
        padding: 32px;
        margin-bottom: 0;
      }

      .feature-card:hover {
        transform: translateY(-12px);
      }

      .feature-icon {
        width: 56px;
        height: 56px;
        font-size: 1.75rem;
      }
    }

    /* TRANSACTIONS SECTION - MOBILE FIRST */
    .transactions-section::before {
      content: '';
      position: absolute;
      inset: 0;
      background: linear-gradient(180deg, rgba(255, 255, 255, 0.2), transparent 30%);
      pointer-events: none;
    }

    .card-header {
      background: linear-gradient(135deg, #3B82F6 0%, #2563EB 100%) !important;
      color: white !important;
      padding: 12px 16px !important;
      font-size: 0.95rem;
    }

    .transactions-shell {
      border: 1px solid rgba(148, 163, 184, 0.2);
      border-radius: 22px;
      overflow: hidden;
      box-shadow: var(--shadow-soft);
      background: rgba(255, 255, 255, 0.92);
      backdrop-filter: blur(10px);
    }

    .transactions-meta {
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 12px;
      padding: 18px 24px;
      border-bottom: 1px solid rgba(148, 163, 184, 0.16);
      background: linear-gradient(180deg, rgba(248, 250, 252, 0.9) 0%, rgba(255, 255, 255, 0.98) 100%);
    }

    .transactions-meta span {
      color: var(--ink-soft);
      font-size: 0.88rem;
      font-weight: 600;
    }

    @media (max-width: 767.98px) {
      .transactions-meta {
        flex-direction: column;
        align-items: flex-start;
      }

      .insight-summary {
        grid-template-columns: 1fr;
      }

      .insight-topbar,
      .insight-figure {
        flex-direction: column;
        align-items: flex-start;
      }
    }

    .status-chip {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      color: var(--ink-strong);
      font-size: 0.82rem;
      font-weight: 700;
      padding: 8px 12px;
      border-radius: 999px;
      background: rgba(16, 185, 129, 0.08);
    }

    .status-chip::before {
      content: '';
      width: 8px;
      height: 8px;
      border-radius: 999px;
      background: var(--success);
      box-shadow: 0 0 0 5px rgba(16, 185, 129, 0.1);
    }

    .table {
      font-size: 0.85rem;
      margin-bottom: 0;
    }

    .table th {
      background-color: #F1F5F9;
      font-weight: 700;
      color: #0F172A;
      border-bottom: 2px solid #E2E8F0;
      padding: 10px 8px;
      font-size: 0.85rem;
    }

    .table td {
      vertical-align: middle;
      border-color: #E2E8F0;
      color: #334155;
      padding: 10px 8px;
    }

    .badge {
      font-size: 0.75rem;
      padding: 4px 8px;
    }

    /* Tablet screens */
    @media (min-width: 768px) {
      .transactions-section {
        padding: 60px 40px;
      }

      .table {
        font-size: 0.95rem;
      }

      .table th,
      .table td {
        padding: 12px 12px;
        font-size: 0.95rem;
      }

      .card-header {
        padding: 15px 20px !important;
        font-size: 1rem;
      }

      .badge {
        font-size: 0.8rem;
      }

      .section-head h2 {
        font-size: 2.6rem;
      }
    }

    /* Desktop screens */
    @media (min-width: 1024px) {
      .transactions-section {
        padding: 72px 0 110px;
      }

      .table {
        font-size: 1rem;
      }

      .table th,
      .table td {
        padding: 14px 16px;
        font-size: 1rem;
      }

      .badge {
        font-size: 0.85rem;
      }
    }

    /* GENERAL RESPONSIVE UTILITIES */
    .container-responsive {
      width: 100%;
      padding: 0 20px;
      margin: 0 auto;
    }

    @media (min-width: 768px) {
      .container-responsive {
        padding: 0 40px;
        max-width: 1200px;
      }
    }

    @media (min-width: 1024px) {
      .container-responsive {
        padding: 0 60px;
      }
    }

    /* Touch-friendly touch targets (48px minimum for mobile) */
    button, a.btn, .btn {
      min-height: 44px;
      min-width: 44px;
    }

    @media (min-width: 768px) {
      button, a.btn, .btn {
        min-height: 40px;
        min-width: 40px;
      }
    }

    /* RESPONSIVE IMAGE HANDLING */
    img {
      max-width: 100%;
      height: auto;
      display: block;
    }

    svg {
      max-width: 100%;
      height: auto;
    }

    /* Prevent horizontal scrolling on mobile */
    .hero, .basic-1, .transactions-section {
      overflow-x: hidden;
    }

    /* SPACING RESPONSIVE UTILITIES */
    .pt-responsive {
      padding-top: 30px;
    }

    .pb-responsive {
      padding-bottom: 30px;
    }

    .px-responsive {
      padding-left: 20px;
      padding-right: 20px;
    }

    @media (min-width: 768px) {
      .pt-responsive {
        padding-top: 50px;
      }

      .pb-responsive {
        padding-bottom: 50px;
      }

      .px-responsive {
        padding-left: 40px;
        padding-right: 40px;
      }
    }

    @media (min-width: 1024px) {
      .pt-responsive {
        padding-top: 70px;
      }

      .pb-responsive {
        padding-bottom: 70px;
      }

      .px-responsive {
        padding-left: 0;
        padding-right: 0;
      }
    }

    /* TYPOGRAPHY MOBILE-FIRST */
    h1 { line-height: 1.2; }
    h2 { line-height: 1.3; }
    h3 { line-height: 1.4; }
    p { line-height: 1.6; word-break: break-word; }

    /* GRID RESPONSIVE */
    .row {
      margin-right: -10px;
      margin-left: -10px;
    }

    [class*='col-'] {
      padding-right: 10px;
      padding-left: 10px;
      margin-bottom: 20px;
    }

    @media (min-width: 768px) {
      [class*='col-'] {
        margin-bottom: 0;
      }
    }

    /* Prevent text selection on interactive elements */
    button, a, .btn {
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    /* HIGH DPI SCREENS */
    @media (-webkit-min-device-pixel-ratio: 2), (min-resolution: 192dpi) {
      body {
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
      }
    }

    /* SVG ANALYTICS DIAGRAM */
    .analytics-diagram {
      background: linear-gradient(160deg, rgba(30, 41, 59, 0.9) 0%, rgba(15, 23, 42, 0.98) 100%);
      border: 1px solid rgba(96, 165, 250, 0.35);
      border-radius: 18px;
      padding: 16px;
      animation: fadeInUp 0.8s ease-out 0.2s both;
      box-shadow: 0 28px 60px rgba(2, 6, 23, 0.45);
      overflow: hidden;
      width: 100%;
      margin: 0 auto;
      position: relative;
    }

    .analytics-diagram img {
      width: 100%;
      height: 280px;
      max-width: 100%;
      object-fit: cover;
      display: block;
      border-radius: 12px;
      filter: saturate(1.02) contrast(1.05);
      transition: transform 0.35s ease, filter 0.35s ease;
    }

    .analytics-diagram:hover img {
      transform: scale(1.03);
      filter: saturate(1.06) contrast(1.08);
    }

    .hero-visual-label {
      position: absolute;
      bottom: 26px;
      left: 26px;
      background: rgba(15, 23, 42, 0.88);
      color: #E2E8F0;
      border: 1px solid rgba(148, 163, 184, 0.4);
      border-radius: 12px;
      padding: 10px 12px;
      font-size: 0.78rem;
      line-height: 1.4;
      max-width: 210px;
    }

    .hero-visual-label strong {
      display: block;
      color: #F8FAFC;
      font-size: 0.9rem;
      margin-bottom: 4px;
    }

    @media (min-width: 768px) {
      .analytics-diagram {
        padding: 18px;
      }

      .analytics-diagram img {
        height: 360px;
      }
    }

    @media (min-width: 1024px) {
      .analytics-diagram img {
        height: 430px;
      }
    }

    /* SECTION SEPARATORS */
    .section-divider {
      height: 2px;
      background: linear-gradient(90deg, transparent 0%, #E2E8F0 50%, transparent 100%);
      margin: 40px 0;
      animation: fadeInUp 0.8s ease-out;
    }

    @media (min-width: 768px) {
      .section-divider {
        margin: 60px 0;
      }
    }

    @media (min-width: 1024px) {
      .section-divider {
        margin: 80px 0;
      }
    }

</style>
@endsection

@section('content')
<section class="hero">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="hero-content">
                    <span class="hero-tag">Live Portfolio Intelligence</span>
                    <h1>Advanced Crypto Asset Management</h1>
                    <p>Track performance, automate strategy execution, and protect your capital in one clear workspace built for modern crypto investors.</p>
                    <div class="hero-cta">
                        <a href="/investments" class="btn-primary-hero">Start Investing</a>
                        @auth
                            <a href="/dashboard" class="btn-secondary-hero">Dashboard</a>
                        @else
                            <a href="/register" class="btn-secondary-hero">Create Account</a>
                        @endauth
                    </div>
                    <ul class="hero-stats">
                        <li>
                            <strong>$1.2M+</strong>
                            <span>Assets Tracked</span>
                        </li>
                        <li>
                            <strong>24/7</strong>
                            <span>Market Monitoring</span>
                        </li>
                    </ul>
                    <div class="hero-note">Structured for disciplined investors who want clarity, speed, and control.</div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="analytics-diagram">
                    <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=1600&q=80" alt="Trading dashboard preview">
                    <div class="hero-visual-label">
                        <strong>Portfolio Command Center</strong>
                        Real-time signals and risk controls in one unified view.
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="basic-1">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <div class="insight-panel">
                    <div class="insight-shell">
                        <div class="insight-topbar">
                            <span class="insight-badge">Performance Snapshot</span>
                            <span class="insight-caption">Updated every market cycle</span>
                        </div>
                        <div class="insight-chart">
                            <div class="insight-figure">
                                <div class="insight-value">
                                    <strong>18.4%</strong>
                                    <span>30-day portfolio growth</span>
                                </div>
                                <span class="insight-pill">Risk score: Balanced</span>
                            </div>
                            <div class="insight-bars" aria-hidden="true">
                                <span style="height: 38%;"></span>
                                <span style="height: 52%;"></span>
                                <span style="height: 64%;"></span>
                                <span style="height: 58%;"></span>
                                <span style="height: 82%;"></span>
                                <span style="height: 74%;"></span>
                            </div>
                        </div>
                        <div class="insight-summary">
                            <div class="insight-card">
                                <strong>12 Chains</strong>
                                <span>Coverage across major networks with one portfolio view.</span>
                            </div>
                            <div class="insight-card">
                                <strong>Smart Alerts</strong>
                                <span>Receive timely actions before market noise becomes risk.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 ps-lg-4">
                <span class="section-kicker">Built For Precision</span>
                <h2>Why Choose PRISM?</h2>
                <p>PRISM combines cutting-edge blockchain technology with professional-grade portfolio management tools. Our platform gives you complete control over your digital assets with transparent, real-time insights.</p>
                <p>With multi-chain support, advanced security features, and a user-friendly interface, PRISM is built for both beginners and seasoned crypto professionals.</p>
                <p>Experience seamless wallet integration, automated portfolio tracking, and intelligent market insights all in one place.</p>
                <a href="#transactions" class="text-link">See live platform activity <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
</section>

<section class="benefits-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center section-head">
                <span class="section-kicker justify-content-center">Platform Benefits</span>
                <h2>Why PRISM Stands Out</h2>
                <p>Enterprise-grade capabilities presented in a cleaner, calmer interface for serious portfolio oversight.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" style="width: 100%; height: 100%; filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.1));">
                            <defs>
                                <linearGradient id="secGrad1" x1="0%" y1="0%" x2="100%" y2="100%">
                                    <stop offset="0%" style="stop-color:#10B981;stop-opacity:1" />
                                    <stop offset="100%" style="stop-color:#059669;stop-opacity:1" />
                                </linearGradient>
                            </defs>
                            <rect x="12" y="16" width="40" height="48" rx="4" fill="url(#secGrad1)"/>
                            <path d="M32 16V8l-16 6v12c0 12 16 16 16 16s16-4 16-16V14l-16-6v8z" fill="white" opacity="0.9"/>
                        </svg>
                    </div>
                    <h3>Bank-Level Security</h3>
                    <p>Military-grade encryption and multi-signature wallets protect your assets with enterprise-level security protocols.</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 mb-4">
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" style="width: 100%; height: 100%; filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.1));">
                            <defs>
                                <linearGradient id="analyticGrad1" x1="0%" y1="100%" x2="100%" y2="0%">
                                    <stop offset="0%" style="stop-color:#3B82F6;stop-opacity:1" />
                                    <stop offset="100%" style="stop-color:#06B6D4;stop-opacity:1" />
                                </linearGradient>
                            </defs>
                            <rect x="10" y="42" width="8" height="16" rx="2" fill="url(#analyticGrad1)"/>
                            <rect x="24" y="28" width="8" height="30" rx="2" fill="url(#analyticGrad1)"/>
                            <rect x="38" y="10" width="8" height="48" rx="2" fill="url(#analyticGrad1)"/>
                            <rect x="52" y="18" width="8" height="40" rx="2" fill="url(#analyticGrad1)"/>
                            <line x1="8" y1="58" x2="56" y2="58" stroke="url(#analyticGrad1)" stroke-width="2"/>
                        </svg>
                    </div>
                    <h3>Advanced Analytics</h3>
                    <p>Real-time insights and predictive analysis powered by AI to optimize your portfolio performance.</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 mb-4">
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" style="width: 100%; height: 100%; filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.1));">
                            <defs>
                                <linearGradient id="speedGrad1" x1="0%" y1="0%" x2="100%" y2="100%">
                                    <stop offset="0%" style="stop-color:#F59E0B;stop-opacity:1" />
                                    <stop offset="100%" style="stop-color:#D97706;stop-opacity:1" />
                                </linearGradient>
                            </defs>
                            <circle cx="32" cy="32" r="26" fill="none" stroke="url(#speedGrad1)" stroke-width="3"/>
                            <circle cx="32" cy="32" r="20" fill="none" stroke="url(#speedGrad1)" stroke-width="2" opacity="0.6"/>
                            <line x1="32" y1="32" x2="32" y2="10" stroke="url(#speedGrad1)" stroke-width="3" stroke-linecap="round"/>
                            <circle cx="32" cy="32" r="4" fill="url(#speedGrad1)"/>
                        </svg>
                    </div>
                    <h3>Lightning Fast</h3>
                    <p>Transactions execute in milliseconds with optimized blockchain infrastructure for seamless trading.</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 mb-4">
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" style="width: 100%; height: 100%; filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.1));">
                            <defs>
                                <linearGradient id="chainGrad1" x1="0%" y1="0%" x2="100%" y2="100%">
                                    <stop offset="0%" style="stop-color:#A855F7;stop-opacity:1" />
                                    <stop offset="100%" style="stop-color:#7C3AED;stop-opacity:1" />
                                </linearGradient>
                            </defs>
                            <circle cx="16" cy="32" r="10" fill="url(#chainGrad1)"/>
                            <circle cx="32" cy="32" r="10" fill="url(#chainGrad1)"/>
                            <circle cx="48" cy="32" r="10" fill="url(#chainGrad1)"/>
                            <line x1="26" y1="32" x2="38" y2="32" stroke="white" stroke-width="2"/>
                            <line x1="42" y1="32" x2="54" y2="32" stroke="white" stroke-width="2"/>
                        </svg>
                    </div>
                    <h3>Multi-Chain Support</h3>
                    <p>Seamlessly manage assets across Ethereum, Polygon, Solana, and 10+ major blockchain networks.</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 mb-4">
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" style="width: 100%; height: 100%; filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.1));">
                            <defs>
                                <linearGradient id="walletGrad1" x1="0%" y1="0%" x2="100%" y2="100%">
                                    <stop offset="0%" style="stop-color:#EC4899;stop-opacity:1" />
                                    <stop offset="100%" style="stop-color:#DB2777;stop-opacity:1" />
                                </linearGradient>
                            </defs>
                            <rect x="8" y="18" width="48" height="32" rx="4" fill="url(#walletGrad1)" opacity="0.9"/>
                            <rect x="12" y="22" width="40" height="24" rx="3" fill="white" opacity="0.15"/>
                            <circle cx="48" cy="40" r="5" fill="white" opacity="0.7"/>
                            <rect x="8" y="14" width="32" height="6" rx="2" fill="url(#walletGrad1)"/>
                        </svg>
                    </div>
                    <h3>Wallet Integration</h3>
                    <p>Connect your favorite wallets including MetaMask, WalletConnect, and hardware wallets in seconds.</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 mb-4">
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" style="width: 100%; height: 100%; filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.1));">
                            <defs>
                                <linearGradient id="supportGrad1" x1="0%" y1="0%" x2="100%" y2="100%">
                                    <stop offset="0%" style="stop-color:#06B6D4;stop-opacity:1" />
                                    <stop offset="100%" style="stop-color:#0891B2;stop-opacity:1" />
                                </linearGradient>
                            </defs>
                            <circle cx="32" cy="28" r="14" fill="url(#supportGrad1)" opacity="0.2"/>
                            <path d="M20 32h4m-4-8h8m-8 16h8" stroke="url(#supportGrad1)" stroke-width="2" stroke-linecap="round"/>
                            <circle cx="44" cy="40" r="12" fill="url(#supportGrad1)"/>
                            <path d="M40 40h8M44 36v8" stroke="white" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                    </div>
                    <h3>24/7 Support</h3>
                    <p>Expert support team available around the clock to help with any questions or technical issues.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="transactions-section" id="transactions">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center section-head">
                <span class="section-kicker justify-content-center">Activity Feed</span>
                <h2>Live Activity</h2>
                <p>A clean operational view of recent platform movement, presented without the noise.</p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10">
                <div class="transactions-shell">
                    <div class="card-header text-white d-flex align-items-center" style="padding: 18px 24px;">
                        <i class="fas fa-circle-check me-2"></i>
                        <h5 class="mb-0" style="font-weight: 700;">Transaction History</h5>
                    </div>
                    <div class="transactions-meta">
                        <span>Sample activity generated to demonstrate the dashboard interface.</span>
                        <span class="status-chip">Stable feed</span>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>Wallet Address</th>
                                        <th>Transactions</th>
                                        <th>Volume</th>
                                        <th>Hash</th>
                                        <th>Time</th>
                                    </tr>
                                </thead>
                                <tbody id="transactionTableBody">
                                    <!-- Transactions will be inserted here by JavaScript -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
  const wallets = ["MetaMask", "Ledger Nano", "Trust Wallet", "Coinbase Wallet", "Argent"];

  function getRandomWallet() {
    return wallets[Math.floor(Math.random() * wallets.length)];
  }

  function getRandomTxCount() {
    return Math.floor(Math.random() * 200) + 10;
  }

  function getRandomVolume() {
    return `$${(Math.random() * 500000).toFixed(2)}`;
  }

  function getRandomHash() {
    const chars = "abcdefghijklmnopqrstuvwxyz0123456789";
    return Array.from({ length: 10 }, () => chars[Math.floor(Math.random() * chars.length)]).join('');
  }

  function getRandomTimeAgo() {
    const mins = Math.floor(Math.random() * 60);
    const hours = Math.floor(Math.random() * 24);
    return Math.random() > 0.5 ? `${mins}m ago` : `${hours}h ago`;
  }

  function generateRow() {
    const row = document.createElement("tr");

    row.innerHTML = `
      <td style="font-weight: 600; color: #0F172A;">${getRandomWallet()}</td>
      <td>${getRandomTxCount()}</td>
      <td style="color: #10B981; font-weight: 600;">${getRandomVolume()}</td>
      <td><code style="font-size: 0.85rem;">${getRandomHash().slice(0, 3)}...${getRandomHash().slice(-3)}</code></td>
      <td style="color: #6B7280; font-size: 0.9rem;">${getRandomTimeAgo()}</td>
    `;

    const tableBody = document.getElementById("transactionTableBody");
    if (tableBody.children.length >= 10) {
      tableBody.removeChild(tableBody.lastChild);
    }
    tableBody.prepend(row);
  }

  // Generate fixed initial rows (no auto-scrolling/auto-refresh behavior)
  for (let i = 0; i < 6; i++) generateRow();
</script>
@endsection
