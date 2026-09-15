<div align="center">

<img src="resources/svg/laravel.svg" alt="Laravel" width="80" />

# 🚨 Laravel Error Pages

### Laravel-এর জন্য সুন্দর, রেডিমেড HTTP এরর পেজ — মাত্র ১টি কমান্ডে ✨

[![Latest Version on Packagist](https://img.shields.io/packagist/v/delwarhossaindev/laravel-error-pages.svg?style=for-the-badge&logo=packagist&color=blueviolet)](https://packagist.org/packages/delwarhossaindev/laravel-error-pages)
[![Total Downloads](https://img.shields.io/packagist/dt/delwarhossaindev/laravel-error-pages.svg?style=for-the-badge&logo=packagist&color=brightgreen)](https://packagist.org/packages/delwarhossaindev/laravel-error-pages)
[![PHP Version](https://img.shields.io/badge/PHP-5.5_%E2%86%92_8.x-777BB4?style=for-the-badge&logo=php)](https://www.php.net/)
[![Laravel](https://img.shields.io/badge/Laravel-5.x_%E2%86%92_13.x-FF2D20?style=for-the-badge&logo=laravel)](https://laravel.com)
[![License](https://img.shields.io/packagist/l/delwarhossaindev/laravel-error-pages.svg?style=for-the-badge&color=blue)](LICENSE)

</div>

---

## ⚡ ইনস্টল

```bash
composer require delwarhossaindev/laravel-error-pages
```

ব্যস! এখন `abort(404)` দিলেই সুন্দর পেজ দেখাবে — **কিছু publish করার দরকার নেই**।
ফাইলগুলো নিজে এডিট করতে চাইলে তখন `php artisan vendor:publish --tag=error-pages` চালাবেন।

---

## ✨ কী পাবেন

- 🎯 **৮টি HTTP error page** — 401, 402, 403, 404, 419, 429, 500, 503
- 🖼️ Split-screen layout — বার্তা + SVG illustration
- 🔌 **Zero-config** — শুধু `composer require`, publish লাগে না
- 🌍 **Translation-ready** — যেকোনো ভাষায় কাস্টমাইজ
- ⚡ Service Provider স্বয়ংক্রিয় আবিষ্কার
- 🦾 Laravel **5.x থেকে সব ভার্সন** (১৩ সহ), PHP **5.5.9 → 8.x**
- 📦 MIT লাইসেন্স

---

## 🖼️ প্রিভিউ

<table>
  <tr>
    <td align="center">
      <img src="screenshots/403.png" alt="403" width="380" />
      <br/><strong>403</strong> <sub>(401·402·419·429)</sub>
    </td>
    <td align="center">
      <img src="screenshots/404.png" alt="404" width="380" />
      <br/><strong>404</strong>
    </td>
  </tr>
  <tr>
    <td align="center">
      <img src="screenshots/500.png" alt="500" width="380" />
      <br/><strong>500</strong>
    </td>
    <td align="center">
      <img src="screenshots/503.png" alt="503" width="380" />
      <br/><strong>503</strong>
    </td>
  </tr>
</table>

---

## 📋 প্রয়োজনীয়তা

- 🐘 PHP `>=5.5.9`
- 🚀 Laravel `5.x` থেকে শুরু করে **যেকোনো ভার্সন** — কনস্ট্রেইন্ট খোলা রাখা আছে, তাই নতুন Laravel বের হলে এই প্যাকেজের নতুন রিলিজের জন্য অপেক্ষা করতে হবে না।

---

## 🏷️ পাবলিশের বিকল্প (ঐচ্ছিক)

publish না করলেও সব কাজ করে। নিজে এডিট করতে চাইলেই শুধু দরকার:

| Tag | কী পাবলিশ হবে | কোথায় |
|-----|--------------|--------|
| `error-pages` | সবকিছু (views + assets + lang) | — |
| `error-pages-views` | শুধু Blade ভিউ | `resources/views/errors/` |
| `error-pages-assets` | শুধু SVG | `public/svg/` |
| `error-pages-lang` | শুধু Translation file | `lang/vendor/error-pages/en/auth.php` |

---

## 🎨 কাস্টমাইজেশন

পাবলিশ করার পর সব ফাইল আপনার অ্যাপে — যা ইচ্ছা পরিবর্তন করুন।

**বার্তা পরিবর্তন:**
```bash
php artisan vendor:publish --tag=error-pages-lang
```
তারপর `lang/vendor/error-pages/en/auth.php`-এ keys এডিট করুন। (আপনার অ্যাপের নিজের `lang/en/auth.php` ছোঁয়া হয় না।)

**ইলাস্ট্রেশন বদলান:**
```bash
php artisan vendor:publish --tag=error-pages-assets
```
তারপর `public/svg/{403,404,500,503}.svg`-এ নিজের SVG রাখুন। ফাইল থাকলে সেটাই ব্যবহার হবে, না থাকলে প্যাকেজের SVG ইনলাইন হয়ে যাবে।

**Layout পরিবর্তন:** `resources/views/errors/illustrated-layout.blade.php` এডিট করুন।

**নতুন error যোগ:** `resources/views/errors/`-এ নতুন ফাইল রাখুন (যেমন `405.blade.php`):

```blade
@extends('errors::illustrated-layout')

@section('code', '405')
@section('title', 'Method Not Allowed')
@section('image')
<div style="background-image: url('{{ \Delwarhossaindev\ErrorPages\Illustration::url('404') }}');"></div>
@endsection
@section('message', 'এই URL-এ এই method সমর্থিত নয়।')
```

`Illustration::url()` আগে `public/svg/`-এ খোঁজে, না পেলে প্যাকেজের SVG data URI হিসেবে ইনলাইন করে দেয়।

---

## 🔼 v1.0.x থেকে আপগ্রেড

v1.1.0-তে দুটো জিনিস বদলেছে:

**১. publish আর বাধ্যতামূলক নয়** — শুধু `composer update` দিলেই চলবে।

**২. Translation ফাইলের জায়গা বদলেছে** — আগে publish হতো `lang/en/auth.php`-এ, যেটা Laravel-এর নিজের auth translation (`failed`, `password`, `throttle`) মুছে দিত। এখন যায় `lang/vendor/error-pages/en/auth.php`-এ।

আগের ভার্সনে lang publish করে থাকলে আপনার `lang/en/auth.php`-এ Laravel-এর আসল keys ফিরিয়ে দিন:

```php
return [
    'failed'   => 'These credentials do not match our records.',
    'password' => 'The provided password is incorrect.',
    'throttle' => 'Too many login attempts. Please try again in :seconds seconds.',
];
```

বার্তা কাস্টমাইজ করে থাকলে সেগুলো নতুন জায়গায় নিয়ে যান:

```bash
php artisan vendor:publish --tag=error-pages-lang
```

---

## 🛟 সমস্যা সমাধান

<details>
<summary><strong>😕 এখনো ডিফল্ট এরর পেজ দেখাচ্ছে</strong></summary>

```bash
php artisan view:clear
php artisan config:clear
```
`bootstrap/cache/packages.php` পুরোনো হলে `composer dump-autoload` চালান।
</details>

<details>
<summary><strong>🖼️ SVG লোড হচ্ছে না</strong></summary>

publish না করলে SVG ইনলাইন হয়ে আসে, তাই কিছু করার দরকার নেই।
publish করে থাকলে `public/svg/` ফোল্ডারে ফাইলগুলো আছে কিনা দেখুন।
</details>

<details>
<summary><strong>🧪 লোকালি ৫০০ পেজ কীভাবে দেখব?</strong></summary>

`.env`-এ `APP_DEBUG=false` দিন, তারপর `php artisan config:clear`।
</details>

<details>
<summary><strong>💥 "Class not found" দেখাচ্ছে</strong></summary>

```bash
composer dump-autoload
```
</details>

---

## 🚀 Git এ Package Upload করুন

নিজের প্যাকেজ Git এ push করতে চান? নিচের ৪টি ধাপ:

**১. Setup (একবার):**
```bash
git init
git config user.name "your-username"
git config user.email "your-email@example.com"
git branch -M main
```

**২. GitHub Remote:**
```bash
git remote add origin https://github.com/your-username/your-repo.git
```

**৩. Push:**
```bash
git add .
git commit -m "Initial commit"
git push -u origin main
```

**৪. Tag/Release** *(Packagist এর জন্য জরুরি)*:
```bash
git tag -a v1.0.0 -m "Release v1.0.0"
git push origin v1.0.0
```

**⚡ Daily workflow:**
```bash
git add .
git commit -m "your message"
git push
```

> 📚 **নিজে Laravel প্যাকেজ বানাতে চান?** শূন্য থেকে Packagist পর্যন্ত সম্পূর্ণ গাইড → **[TUTORIAL.md](TUTORIAL.md)**

---

## 🤝 অবদান রাখুন

```bash
১. 🍴 Fork করুন
২. 🌿 git checkout -b feature/my-feature
৩. 💾 git commit -m 'নতুন কিছু যোগ'
৪. 🚀 git push origin feature/my-feature
৫. 🎉 Pull Request খুলুন
```

🐛 বাগ/আইডিয়া? → <https://github.com/delwarhossaindev/laravel-error-pages/issues>

---

## 📜 লাইসেন্স

**MIT** — [LICENSE](LICENSE) দেখুন।

---

<div align="center">

### ⭐ কাজে লাগলে স্টার দিন!

[![Star](https://img.shields.io/github/stars/delwarhossaindev/laravel-error-pages?style=social)](https://github.com/delwarhossaindev/laravel-error-pages)

<sub>Made with ❤️ in Bangladesh 🇧🇩 by [Delwar Hossain](https://github.com/delwarhossaindev)</sub>

</div>
