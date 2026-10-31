<div align="center">

<a href="https://heycriss.dev/kash">
  <img src="assets/github-hero.svg" alt="Kash POS — Point of Sale, USD Inventory & Debtor Credit Ledger" width="100%" />
</a>

<br />

<a href="https://heycriss.dev/kash">
  <img src="https://readme-typing-svg.demolab.com?font=JetBrains+Mono&weight=600&size=18&duration=3200&pause=1000&color=10B981&center=true&vCenter=true&width=820&lines=High-Rotation+Point+of+Sale+%26+Commercial+Management;Relational+Debtor+Credit+Ledger+(Fiados)+in+USD+%26+BCV;1-Hour+Signed+Payment+Links+%26+Live+WhatsApp+QR+Billing;Installable+PWA+with+Real-Time+Exchange+Rate+Widgets" alt="Kash POS Highlights" />
</a>

<p align="center">
  <a href="https://heycriss.dev/kash"><img src="https://img.shields.io/badge/Project-heycriss.dev%2Fkash-10B981?style=for-the-badge&logo=googlechrome&logoColor=white" alt="Kash POS"></a>
  <img src="https://img.shields.io/badge/PHP-8.1+-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP">
  <img src="https://img.shields.io/badge/Laravel-11-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel">
  <img src="https://img.shields.io/badge/Filament-3.2-FBBF24?style=for-the-badge&logo=laravel&logoColor=black" alt="FilamentPHP">
  <img src="https://img.shields.io/badge/Tailwind_CSS-38BDF8?style=for-the-badge&logo=tailwind-css&logoColor=white" alt="Tailwind CSS">
  <img src="https://img.shields.io/badge/MySQL-005C84?style=for-the-badge&logo=mysql&logoColor=white" alt="MySQL">
  <img src="https://img.shields.io/badge/PWA-Ready-5A0FC8?style=for-the-badge&logo=pwa&logoColor=white" alt="PWA">
</p>

<p align="center">
  <a href="https://heycriss.dev/kash"><strong>Project Page</strong></a> ·
  <a href="#core-modules"><strong>Core Modules</strong></a> ·
  <a href="#debtor--credit-ledger-system-fiados"><strong>Debtor Ledger</strong></a> ·
  <a href="#real-time-dashboard-widgets"><strong>Dashboard Widgets</strong></a> ·
  <a href="#repository-structure"><strong>Structure</strong></a>
</p>

</div>

---

## Overview

**Kash POS** is a point-of-sale and commercial management system built for high-rotation retail environments. It connects cash register operations, a USD-indexed product inventory, real-time multi-currency exchange rates (BCV / EUR), and a relational debtor credit ledger (*fiados*) with automated WhatsApp QR billing and 1-hour tokenized payment links.

> **Resumen en Español:** **Kash POS** unifica caja registradora, inventario en dólares, tasas de cambio en tiempo real y un sistema relacional de deudores y créditos (*fiados*) con enlaces temporales de pago (1 hora) y cobro por código QR de WhatsApp con autocompletado `+58`.

<br />

<div align="center">
  <img src="assets/github-features-bento.svg" alt="Kash POS Architecture & Modules" width="100%" />
</div>

---

## Core Modules

### 1. Cash Register & USD Inventory
- **Products Catalog:** USD-priced inventory with SKU lookup, stock control, and direct association with customer ledger charges.
- **Cash Register:** Minimal, low-latency checkout interface for daily counter sales.
- **Dynamic Branding & RBAC:** Configurable store logo, favicon, corporate colors, and staff role permissions.

### 2. Debtor & Credit Ledger System (*Fiados*)
Designed to replace fragmented spreadsheets with a clean, per-customer relational ledger (`App\Models\DebtorAccount`):
- **Customer Profile:** Fast registration of full name, phone/WhatsApp, and an optional custom BCV exchange rate override.
- **Charges & Credits History:** Independent customer view with inventory search, price autocomplete, and custom dates.
- **Visual Balance Coding:** Partial payments (*abonos*) render in **green** (subtracting from the total) and charges render in **red**.
- **Quick Settlement Actions:**
  - **Abonar (`recordPartialPayment`):** Logs partial payments specifying amount and payment method (*Pago Móvil*, *USD Cash*), generating an automatic negative ledger entry.
  - **Pagar Todo (`settleAll`):** One-click confirmation to liquidate the entire outstanding balance.

### 3. Automation & Communication Channels
- **1-Hour Tokenized Payment Links (`PaymentLinkTokenService`):** Generates signed URLs with a strict 60-minute expiration window, paired with external shortlinks.
- **Smart WhatsApp Billing (`WhatsAppStatementService`):**
  - Renders a **live interactive QR code** directly inside the administrator modal.
  - Automatically formats Venezuelan local phone numbers with the `+58` international prefix.
  - Populates pre-formatted account statements with USD/VES totals and the 1-hour payment link.
- **Transactional HTML Email:** Dedicated HTML templates with exception handling and debug alerts.

---

## Real-Time Dashboard Widgets

Kash POS includes native PWA installation (*"Install Kash"* button in the admin sidebar) and 4 real-time Filament dashboard widgets:

| Widget Class | Scope | Function |
| :--- | :---: | :--- |
| `ExchangeRatesWidget` | Currency | Displays official BCV (USD / EUR) and parallel exchange rates in real time. |
| `ActionWidget` | Operations | Quick-action shortcuts and instant dashboard state reload. |
| `StatsOverview` | Analytics | Key revenue indicators, active credit totals, and low-stock alerts. |
| `LatestSalesWidget` | Audit | Live transaction table of recent register sales and credit settlements. |

---

## Repository Structure

```text
kash-pos/
├── app/
│   ├── Filament/
│   │   └── Widgets/
│   │       └── ExchangeRatesWidget.php   # Real-time BCV / EUR exchange rate widget
│   ├── Models/
│   │   └── DebtorAccount.php             # Relational debtor ledger (Abonar / Pagar Todo)
│   └── Services/
│       ├── PaymentLinkTokenService.php   # 1-hour temporary signed payment URLs
│       └── WhatsAppStatementService.php  # +58 phone normalizer & WhatsApp QR payload
├── assets/
│   ├── github-hero.svg                   # Animated editorial repository hero banner
│   └── github-features-bento.svg         # Animated 6-card Bento specification grid
├── config/
│   └── kash.php                          # Currency, token TTL, and WhatsApp settings
├── database/
│   └── migrations/
│       └── 2026_01_01_000001_create_kash_pos_tables.php
├── public/
│   └── manifest.json                     # Installable PWA manifest
├── .env.example                          # Environment configuration template
├── composer.json                         # PHP 8.1+, Laravel 11 & FilamentPHP 3 manifest
└── LICENSE                               # GPL-2.0-or-later
```

---

## Quick Start

```bash
git clone https://github.com/heycriss/kash-pos.git
cd kash-pos
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
```

---

## License

Released under the **GNU General Public License v2.0 or later (`GPL-2.0-or-later`)**.

<div align="center">
  <br />
  <p>Engineered by <strong><a href="https://heycriss.dev">Cristhian (Criss) · HeyCriss Labs</a></strong> · <a href="https://heycriss.dev/kash"><code>heycriss.dev/kash</code></a></p>
</div>
