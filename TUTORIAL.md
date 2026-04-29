<div align="center">

# 📚 সম্পূর্ণ টিউটোরিয়াল — নিজেই Laravel প্যাকেজ বানান

### Composer প্যাকেজ সম্পর্কে কিছু না জেনেও — শূন্য থেকে Packagist পর্যন্ত

[← README তে ফিরে যান](README.md)

</div>

---

> 👋 **স্বাগতম!** এই টিউটোরিয়াল ধরে নিচ্ছে আপনি Composer প্যাকেজ সম্পর্কে **একদম কিছু জানেন না**। শেষ পর্যন্ত আপনার নিজের একটি প্যাকেজ Packagist-এ থাকবে, যেটি যেকেউ `composer require` দিয়ে ইনস্টল করতে পারবে।
>
> উদাহরণ হিসেবে **এই রিপোটি** (`delwarhossaindev/laravel-error-pages`) ব্যবহার করা হবে।

## 🗺️ সামগ্রিক চিত্র

```
📐 পরিকল্পনা ──► ⚒️ তৈরি ──► 🧪 পরীক্ষা ──► 🚀 প্রকাশ ──► 🔄 রক্ষণাবেক্ষণ
  ধাপ ১-২        ধাপ ৩-৭      ধাপ ৮         ধাপ ৯-১৩      ধাপ ১৪
```

| পর্যায় | আপনি কী করবেন | ফলাফল |
|--------|---------------|-------|
| 📐 **১. পরিকল্পনা** | নাম, namespace, লাইসেন্স ঠিক করুন | পরিষ্কার ধারণা |
| ⚒️ **২. তৈরি** | `composer.json`, ServiceProvider, resources লিখুন | কার্যকর প্যাকেজ |
| 🧪 **৩. পরীক্ষা** | Validate করুন, path repo দিয়ে অ্যাপে ইনস্টল করুন | নিশ্চিত হলো কাজ করছে |
| 🚀 **৪. প্রকাশ** | Git → GitHub → Tag → Packagist | বিশ্ব ইনস্টল করতে পারবে |
| 🔄 **৫. রক্ষণাবেক্ষণ** | SemVer অনুযায়ী রিলিজ করুন | ভার্সন করা আপডেট |

---

## 🛠️ শুরু করার আগে যা লাগবে

| টুল | কাজ | ভার্সন চেক |
|-----|-----|-----------|
| 🐘 **PHP** | কোড রান করে | `php -v` *(৭.২+ রেকমেন্ডেড)* |
| 📦 **Composer** | PHP-র প্যাকেজ ম্যানেজার | `composer --version` |
| 🌿 **Git** | ভার্সন কন্ট্রোল | `git --version` |
| 🐙 **GitHub অ্যাকাউন্ট** | কোড হোস্ট করতে | <https://github.com/signup> |
| 📦 **Packagist অ্যাকাউন্ট** | প্যাকেজ পাবলিশ | <https://packagist.org/login> |
| ✏️ **কোড এডিটর** | VS Code, PhpStorm | — |

---

## 📐 পর্যায় ১ — পরিকল্পনা

### ধাপ ১: প্যাকেজের নাম ঠিক করুন

Composer প্যাকেজের নাম দুই অংশে: `vendor/package`।

| অংশ | উদাহরণ | নিয়ম |
|-----|--------|-------|
| `vendor` | `delwarhossaindev` | আপনার GitHub username — ছোট হাতের |
| `package` | `laravel-error-pages` | কাজের বর্ণনা — ছোট হাতের, হাইফেন |

✅ ভালো: `delwarhossaindev/laravel-error-pages`
❌ খারাপ: `MyAwesomeStuff/Cool_Package`

> ⚠️ একবার Packagist-এ প্রকাশ করলে নাম **পরিবর্তন করা যাবে না**।

### ধাপ ২: PHP namespace ঠিক করুন

Vendor ও package নাম PascalCase করুন:
`delwarhossaindev/laravel-error-pages` → `Delwarhossaindev\ErrorPages`

> JSON-এ `\\` (escaped backslash) ব্যবহার করুন: `"Delwarhossaindev\\ErrorPages\\"`.

---

## ⚒️ পর্যায় ২ — তৈরি

### ধাপ ৩: ফোল্ডার কাঠামো

```bash
mkdir laravel-error-pages
cd laravel-error-pages
mkdir -p src resources/views/errors resources/svg
```

চূড়ান্ত কাঠামো:

```
laravel-error-pages/
├── composer.json
├── LICENSE
├── README.md
├── .gitignore
├── .gitattributes
├── src/
│   └── ErrorPagesServiceProvider.php
└── resources/
    ├── views/errors/
    └── svg/
```

### ধাপ ৪: `composer.json` তৈরি করুন

```json
{
    "name": "delwarhossaindev/laravel-error-pages",
    "description": "Beautiful pre-styled Laravel error pages with SVG illustrations.",
    "type": "library",
    "license": "MIT",
    "keywords": ["laravel", "error-pages", "404", "500"],
    "authors": [
        { "name": "Your Name", "email": "you@example.com" }
    ],
    "require": {
        "php": "^5.5.9|^7.0|^8.0",
        "illuminate/support": "^5.0|^6.0|^7.0|^8.0|^9.0|^10.0|^11.0|^12.0"
    },
    "autoload": {
        "psr-4": { "Delwarhossaindev\\ErrorPages\\": "src/" }
    },
    "extra": {
        "laravel": {
            "providers": ["Delwarhossaindev\\ErrorPages\\ErrorPagesServiceProvider"]
        }
    },
    "minimum-stability": "stable",
    "prefer-stable": true
}
```

**গুরুত্বপূর্ণ field গুলো:**

| Field | কাজ |
|-------|-----|
| `name` | `vendor/package` slug — `composer require`-এ এটাই লেখা হয় |
| `require` | প্রয়োজনীয় নির্ভরতা |
| `autoload.psr-4` | namespace → ফোল্ডার ম্যাপিং |
| `extra.laravel.providers` | Laravel auto-discovery |

### ধাপ ৫: ServiceProvider তৈরি করুন

`src/ErrorPagesServiceProvider.php`:

```php
<?php

namespace Delwarhossaindev\ErrorPages;

use Illuminate\Support\ServiceProvider;

class ErrorPagesServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'error-pages');

        $this->publishes(array(
            __DIR__ . '/../resources/views/errors' => resource_path('views/errors'),
        ), 'error-pages-views');

        $this->publishes(array(
            __DIR__ . '/../resources/svg' => public_path('svg'),
        ), 'error-pages-assets');

        $this->publishes(array(
            __DIR__ . '/../resources/views/errors' => resource_path('views/errors'),
            __DIR__ . '/../resources/svg' => public_path('svg'),
        ), 'error-pages');
    }

    public function register() {}
}
```

- `loadViewsFrom()` — Laravel-কে বলে প্যাকেজের view খুঁজতে
- `publishes()` — `vendor:publish` চালালে কোন ফাইল কোথায় কপি হবে
- দ্বিতীয় argument **tag** — ব্যবহারকারী বেছে নেয়: views, assets, বা সব

### ধাপ ৬: Resources যোগ করুন

**Blade ভিউ** — একটি শেয়ার্ড layout, প্রতিটি error code-এর জন্য আলাদা ফাইল:

```blade
@extends('errors::illustrated-layout')

@section('code', '404')
@section('title', __('auth.page_not_found'))

@section('image')
<div style="background-image: url({{ asset('/svg/404.svg') }});"></div>
@endsection

@section('message', __('auth.page_not_found_msg'))
```

> 💡 Laravel **স্বয়ংক্রিয়ভাবে** `errors/{status}.blade.php` খোঁজে।

**SVG** — `resources/svg/`-এ ফাইল রাখুন। বিনামূল্যে: [unDraw](https://undraw.co), [Storyset](https://storyset.com)।

### ধাপ ৭: মেটা ফাইল

**`LICENSE`** — [MIT টেমপ্লেট](https://opensource.org/licenses/MIT) কপি করুন।

**`.gitignore`**:
```
/vendor/
composer.lock
.idea/
.vscode/
.DS_Store
```

**`.gitattributes`** — ডাউনলোডে test/docs বাদ দিতে:
```
/.gitattributes      export-ignore
/.gitignore          export-ignore
/tests               export-ignore
/phpunit.xml         export-ignore
* text=auto eol=lf
```

---

## 🧪 পর্যায় ৩ — পরীক্ষা

### ধাপ ৮: লোকালি যাচাই

```bash
composer validate --strict
```

**Path repository দিয়ে বাস্তব Laravel অ্যাপে পরীক্ষা:**

অ্যাপের `composer.json`-এ যোগ করুন:
```json
"repositories": [
    { "type": "path", "url": "../laravel-error-pages" }
]
```

তারপর:
```bash
composer require delwarhossaindev/laravel-error-pages:@dev
php artisan vendor:publish --tag=error-pages
```

কোনো অস্তিত্বহীন route-এ যান — কাস্টম 404 দেখবেন। 🎉

---

## 🚀 পর্যায় ৪ — প্রকাশ

### ধাপ ৯: Git শুরু করুন

```bash
git config --global user.name "Your Name"
git config --global user.email "you@example.com"

git init
git add .
git commit -m "Initial commit"
```

### ধাপ ১০: GitHub-এ push

১. <https://github.com/new>-এ যান
২. Repo name: `laravel-error-pages`
৩. **Public** visibility (Packagist-এর জন্য আবশ্যক)
৪. README/license **যোগ করবেন না**

```bash
git remote add origin https://github.com/yourusername/laravel-error-pages.git
git branch -M main
git push -u origin main
```

### ধাপ ১১: প্রথম রিলিজ tag

```bash
git tag v1.0.0
git push origin v1.0.0
```

**📐 SemVer:**

```
v[MAJOR].[MINOR].[PATCH]
        │         │       │
        │         │       └── বাগ ঠিক          (1.0.0 → 1.0.1)
        │         └────────── নতুন ফিচার         (1.0.1 → 1.1.0)
        └──────────────────── ভাঙে এমন পরিবর্তন   (1.1.0 → 2.0.0)
```

> 🚨 একবার tag push হলে **পরিবর্তন বা মুছবেন না**।

### ধাপ ১২: Packagist-এ Submit

১. <https://packagist.org>-এ **Login with GitHub**
২. **Submit** ক্লিক করুন
৩. রিপো URL পেস্ট করুন
৪. **Check** → **Submit**

`https://packagist.org/packages/yourusername/laravel-error-pages` — live!

### ধাপ ১৩: Auto-update Webhook

প্রতিটি push-এ সাথে সাথে Packagist আপডেট পেতে:

**সহজ উপায়:** <https://github.com/apps/packagist> install করুন → রিপো বেছে নিন।

---

## 🔄 পর্যায় ৫ — রক্ষণাবেক্ষণ

### ধাপ ১৪: নতুন ভার্সন রিলিজ

```bash
git add .
git commit -m "fix: 404 message"
git push

# SemVer অনুযায়ী tag
git tag v1.0.1
git push origin v1.0.1
```

### 🧠 পরামর্শ

- ✅ `CHANGELOG.md` লিখুন
- ✅ PHPUnit test যোগ করুন
- ✅ GitHub Actions দিয়ে CI সেট করুন
- ❌ secret push করবেন না
- ❌ SemVer ভাঙবেন না

---

## 📖 পরিভাষা

| শব্দ | অর্থ |
|------|------|
| **Composer** | PHP-র প্যাকেজ ম্যানেজার (npm-এর মতো) |
| **Packagist** | Composer প্যাকেজের ডিফল্ট পাবলিক রেজিস্ট্রি |
| **Vendor** | প্যাকেজ নামের প্রথম অংশ (`vendor/package`) |
| **PSR-4** | autoloading স্ট্যান্ডার্ড — namespace → ফোল্ডার |
| **Service Provider** | Laravel-এর hook |
| **Auto-discovery** | প্যাকেজ `composer.json` দিয়ে নিজেই register হয় |
| **Publishing** | প্যাকেজের ফাইল ব্যবহারকারীর অ্যাপে কপি |
| **Tag** | Git-এর named pointer (`v1.0.0`) |
| **SemVer** | Semantic Versioning: MAJOR.MINOR.PATCH |
| **Path repository** | লোকাল Composer source — প্যাকেজ লোকালি টেস্ট করতে |

---

<div align="center">

[← README তে ফিরে যান](README.md)

</div>
