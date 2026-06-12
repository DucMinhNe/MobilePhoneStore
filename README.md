# MobilePhoneStore

> A full-stack e-commerce platform for a mobile phone & iPad retail store — storefront, AJAX cart and checkout, member accounts, a complete admin CMS, and POS-integrated warranty lookup — built in framework-free PHP 8 with a custom MVC-style core.

![PHP](https://img.shields.io/badge/PHP-8.x-777BB4?logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL%20%2F%20MariaDB-10.6-4479A1?logo=mariadb&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap-5.0.2-7952B3?logo=bootstrap&logoColor=white)
![jQuery](https://img.shields.io/badge/jQuery-3.5.1-0769AD?logo=jquery&logoColor=white)
![Apache](https://img.shields.io/badge/Apache-mod__rewrite-D22128?logo=apache&logoColor=white)
![AdminLTE](https://img.shields.io/badge/Admin-AdminLTE%203-00A65A)

No Laravel, no Composer — the entire application core (router dispatch, PDO data layer, caching, templating, image pipeline) is hand-rolled and bundled in `libraries/`, which makes this repo a readable end-to-end example of how an e-commerce site actually works under the hood.

## Features

### Storefront
- **Product catalog** with brands, multi-level categories (`product_list` → `product_cat` → `product_item`), tags, hot-sale and new-arrival sections, and AJAX "load more" pagination (`api/product.php`, `api/load_ajax_product.php`)
- **Product variants** — per-product color and size options with independent regular/sale prices per size (`api/color.php`, `api/load_size_product.php`)
- **Session-based AJAX cart** — add / update quantity / remove without page reloads, with live price recalculation (`api/cart.php` + `libraries/class/class.Cart.php`)
- **Checkout** with Vietnamese administrative address cascade (city → district → ward via `api/district.php` / `api/ward.php`) and optional per-ward shipping fees (`order.ship` config flag)
- **Member accounts** — registration, login, email activation, forgot/reset password (`sources/user.php`), with login throttling (5 attempts, 15-minute lockout)
- **Warranty lookup integrated with KiotViet POS** — customers enter an invoice code + phone number and the site verifies the purchase live against the [KiotViet](https://www.kiotviet.vn/) retail API (OAuth2 client-credentials flow, invoice/customer/product endpoints) in `api/tracuubaohanh.php` + `libraries/class/class.KiotViet.php`
- **Repair booking** form with Google reCAPTCHA score validation (`sources/booking.php`, `api/suachua.php`)
- News/blog, video gallery, photo albums, static pages, tag pages, site-wide search, contact form, product/photo/video comments, and newsletter signup
- **Separate desktop and mobile template sets** (`templates/` vs `templates-mobile/`), selected per request via MobileDetect

### Admin CMS (`/admin`)
- AdminLTE dashboard with traffic statistics (daily/monthly counters, online users)
- CRUD modules for products, news, static pages, galleries, photos/videos, tags, comments, contacts, newsletters, members, and order management with order statuses
- **Excel import/export** of catalog data (PHPExcel) and **Word export** of orders (PHPWord, with `.docx` templates in `libraries/sample/`)
- Rich-text editing with CKEditor 4.13 and file management via CKFinder (v7 & v8) and elFinder
- Per-page SEO manager (`seopage`), site settings, language strings, and places (city/district/ward) administration
- User roles via permission groups (`permission`, `permission_group` tables)
- OneSignal web-push notification sender (`admin/sources/pushOnesignal.php`)

### Performance & SEO
- **On-the-fly image pipeline** — thumbnails are generated on demand from URL patterns (`thumbs/{w}x{h}x{zoom}/{src}`) with optional watermark overlay routes for product and news images; WebP conversion library included
- **File-based query cache** with TTL (`libraries/class/class.Cache.php`) plus CSS/JS minification with per-asset debug toggles
- Dynamic `sitemap.xml` generated from the route table, breadcrumb trails, structured-data templates, and friendly slug-based URLs for every content type
- `.htaccess` with gzip compression, far-future expires, and cache-control headers

### Security
- All queries go through a PDO wrapper with prepared statements (`class.PDODb.php`) plus an `AntiSQLInjection` request scrubber
- Salted password hashing, session-scoped login keys for admin and members, Google reCAPTCHA on public forms

## Tech stack

| Layer | Technology |
|---|---|
| Language | PHP 8.x (tuned `php.ini` notes for 8.2.4 in `libraries/database/`) |
| Database | MySQL / MariaDB 10.6, `utf8mb4`, 46 tables (full dump: `ipadstore.sql`) |
| Routing | AltoRouter (bundled) |
| Email | PHPMailer 6.1.6 (SMTP) |
| Office export | PHPExcel, PHPWord (bundled) |
| Device detection | MobileDetect |
| Images | GD + bundled WebpConvert |
| Frontend | Bootstrap 5.0.2, jQuery 3.5.1, Owl Carousel 2, Slick, Fancybox 4/5, AOS, mmenu, Magic Zoom Plus, Fotorama, Font Awesome 6.4 |
| Admin UI | AdminLTE, CKEditor 4.13.1, CKFinder 7/8, elFinder, Select2, ApexCharts |
| 3rd-party APIs | KiotViet POS, Google reCAPTCHA, OneSignal push |

## Architecture

Every request is rewritten by `.htaccess` to a single front controller:

```
.htaccess ──▶ index.php           bootstrap: autoloader + service objects
                 │                (PDODb, Cache, Cart, Seo, Email, Statistic, …)
                 ▼
            libraries/router.php  AltoRouter maps the URL and picks the
                 │                desktop or mobile template set (MobileDetect)
                 ▼
            sources/{page}.php    controller: queries via PDO + cache,
                 │                handles POSTs (cart, checkout, booking, …)
                 ▼
            templates/…           view: layout + page template render HTML
```

- `api/*.php` are standalone JSON endpoints consumed by the storefront's jQuery frontend (cart, variant prices, address cascade, paginated product feeds, warranty lookup).
- `admin/` is a parallel application sharing the same `libraries/` core with its own sources, templates, and API.
- Special routes generate assets at request time: `thumbs/800x600x1/<path>` resizes an upload, `watermark/product/...` composites the configured watermark before caching the result.
- Content types (product, news, photo, static, tags, newsletter) are described declaratively in `libraries/type/config-type-*.php`, which drives the admin CRUD forms.

## Project structure

```
.
├── index.php             # Front controller (bootstraps services, router, template)
├── .htaccess             # Rewrite all routes to index.php + caching/gzip rules
├── ipadstore.sql         # Full database dump (46 tables, sample catalog data)
├── api/                  # JSON/AJAX endpoints (cart, product feeds, address, warranty)
├── sources/              # Page controllers (product, order, news, user, booking, …)
├── templates/            # Desktop storefront views
├── templates-mobile/     # Mobile storefront views (auto-selected per device)
├── admin/                # Admin CMS (own sources/, templates/, api/, editors)
├── libraries/
│   ├── config.php        # Central config: DB, base URL, debug flags, API keys
│   ├── router.php        # Route table + friendly-URL (slug) resolution
│   ├── autoload.php      # Class autoloader
│   ├── class/            # Core services: PDODb, Cache, Cart, Seo, KiotViet, …
│   ├── lang/             # vi/en language strings (vi active, en scaffolded)
│   └── type/             # Declarative content-type definitions for the admin
├── assets/               # Storefront CSS/JS/vendor libraries
├── upload/               # User-uploaded media
├── thumbs/, watermark/   # Generated images (created on demand)
└── caches/, logs/        # Query cache files and logs (must be writable)
```

## Getting started

### Prerequisites

- Apache with `mod_rewrite` enabled (XAMPP/Laragon work out of the box)
- PHP 8.x with the **GD** and **PDO MySQL** extensions
- MySQL or MariaDB

### Setup

1. **Clone into your web root** (the default base path is `/IpadStore/`):

   ```bash
   git clone https://github.com/DucMinhNe/MobilePhoneStore.git IpadStore
   ```

2. **Create the database and import the dump:**

   ```bash
   mysql -u root -p -e "CREATE DATABASE khang_store CHARACTER SET utf8mb4"
   mysql -u root -p khang_store < ipadstore.sql
   ```

3. **Configure** `libraries/config.php` — update the `database` block (`host`, `username`, `password`, `dbname`, and `url` if you cloned into a folder other than `IpadStore`). Table prefix is `table_`.

4. **Make runtime directories writable** if your server user differs from the file owner: `caches/`, `thumbs/`, `logs/`, `upload/`.

5. **Open the site:**
   - Storefront: `http://localhost/IpadStore/`
   - Admin panel: `http://localhost/IpadStore/admin/`

### Configuration notes

- `website.debug-css` / `website.debug-js` — serve raw assets instead of minified bundles while developing; `website.error-reporting` toggles `E_ALL`.
- `googleAPI.recaptcha` — supply your own reCAPTCHA site/secret keys for the contact and booking forms.
- `oneSignal` / `libraries/class/class.KiotViet.php` — set your own OneSignal app and KiotViet API credentials to enable push notifications and live warranty lookup.
- `order.ship` — set to `true` to enable per-ward shipping fees at checkout.
- The site is Vietnamese-first (`Asia/Ho_Chi_Minh` timezone); an English locale is scaffolded in `libraries/lang/en.php` and the `comlang` slug map.
