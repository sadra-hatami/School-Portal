<div align="center">

# پورتال آموزشگاهی
# 🎓

### یک پورتال PHP برای درس، ثبت‌نام و نمره

یک میز دوطرفه: دانشجو ثبت‌نام می‌کند و نمره می‌خواند، مدیر جلسه، درس و رکورد را اداره می‌کند. داده در MySQL می‌ماند.

<br>

# 👨‍💻 **صدرا حاتمی**

### *توسعه‌دهنده • مهندس نرم‌افزار • سازنده*

<br>

[![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://www.php.net/)
[![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)](https://www.mysql.com/)
[![Bootstrap](https://img.shields.io/badge/Bootstrap-3-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white)](https://getbootstrap.com/docs/3.4/)
[![HTML5](https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white)](https://developer.mozilla.org/en-US/docs/Web/HTML)
[![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white)](https://developer.mozilla.org/en-US/docs/Web/CSS)
[![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black)](https://developer.mozilla.org/en-US/docs/Web/JavaScript)
[![jQuery](https://img.shields.io/badge/jQuery-0769AD?style=for-the-badge&logo=jquery&logoColor=white)](https://jquery.com/)
[![Sessions](https://img.shields.io/badge/Auth-PHP%20Sessions-4F5B93?style=for-the-badge&logo=php&logoColor=white)](https://www.php.net/manual/en/book.session.php)
[![Admin](https://img.shields.io/badge/Side-Admin%20Panel-2C3E50?style=for-the-badge)](https://github.com/sadra-hatami/School-Portal/tree/main/admin)
[![Student](https://img.shields.io/badge/Side-Student%20Portal-1ABC9C?style=for-the-badge)](https://github.com/sadra-hatami/School-Portal)
[![SQL](https://img.shields.io/badge/Schema-acourse.sql-003B57?style=for-the-badge)](https://github.com/sadra-hatami/School-Portal/blob/main/sqlfile/acourse.sql)
[![XAMPP](https://img.shields.io/badge/Run-XAMPP-FB7A24?style=for-the-badge&logo=xampp&logoColor=white)](https://www.apachefriends.org/)
[![License](https://img.shields.io/badge/License-MIT-green.svg?style=for-the-badge)](https://opensource.org/license/mit)
[![Open Source](https://img.shields.io/badge/Open_Source-Project-black?style=for-the-badge&logo=github)](https://opensource.org/)

<br>

[🌐 پروفایل گیت‌هاب](https://github.com/sadra-hatami)
•
[📘 English README | راهنمای انگلیسی](README.md)
•
[📧 ایمیل](mailto:sadra.hatami.1732@gmail.com)

</div>

---

# 📑 فهرست

- [درباره](#-درباره)
- [چرا این پروژه](#-چرا-این-پروژه)
- [قابلیت‌ها](#-قابلیتها)
- [دو سمت](#-دو-سمت)
- [ساختار](#-ساختار)
- [فناوری‌ها](#-فناوریها)
- [نصب](#-نصب)
- [پیکربندی](#-پیکربندی)
- [استفاده](#-استفاده)
- [یادداشت](#-یادداشت)
- [پرسش‌ها](#-پرسشها)
- [تماس](#-تماس)
- [مجوز](#-مجوز)
- [حمایت](#-حمایت)

---

# 📖 درباره

**School Portal** یک برنامهٔ وب PHP برای میز یک آموزشگاه است.

صفحه‌های ریشه سمت دانشجو هستند: پروفایل، ثبت‌نام درس، نمره و تغییر رمز. پوشهٔ `admin` سمت مدیریت است: جلسه، ترم، گروه، درس، ثبت‌نام و گزارش ورود. هر دو سمت یک پایگاه MySQL را می‌خوانند و می‌نویسند.

ورود با نشست PHP جدا می‌شود. مدیر از `admin/index.php` وارد می‌شود و دانشجو از `index.php`. فهرست درس، ظرفیت، ثبت‌نام و نمره در جدول‌های `Acourse` می‌مانند. فایل `sqlfile/acourse.sql` همین ساختار را دوباره می‌سازد.

> **جمله کوتاه:** *پورتال PHP دانشجو و مدیر برای درس، ثبت‌نام و نمره.*

---

# 🚀 چرا این پروژه

یک پورتال فقط یک فرم نیست. دو نقش و یک پایگاه مشترک می‌خواهد.

این پروژه همان جدایی را نگه می‌دارد:

- دانشجو صفحهٔ خودش را می‌بیند
- مدیر فهرست و رکورد را اداره می‌کند
- درس، ثبت‌نام و نمره در MySQL هستند
- ساختار پایگاه داخل مخزن است و میز از نو ساخته می‌شود

برنامهٔ کنسول در [Student Information System](https://github.com/sadra-hatami/Student-Information-System) پروژهٔ جداست.

---

# ✨ قابلیت‌ها

- 🔐 ورود مدیر و دانشجو
- 🗓️ رکورد جلسه، ترم و گروه
- 📚 فهرست درس
- 📝 ثبت‌نام دانشجو
- 📊 صفحهٔ نمره
- 👤 پروفایل و تغییر رمز
- 📋 تاریخ ثبت‌نام و گزارش ورود
- 🖨️ نمای چاپ
- 💾 ساختار MySQL در `sqlfile/acourse.sql`

---

# 👥 دو سمت

| سمت | مسیر | کار |
|---|---|---|
| دانشجو | ریشهٔ مخزن | پروفایل، ثبت‌نام، نمره، رمز |
| مدیر | `admin/` | فهرست، ثبت‌نام، تاریخچه، گزارش |

سمت دانشجو را از `index.php` باز کن. سمت مدیر را از `admin/index.php`.

---

# 📁 ساختار

```text
School-Portal/
├── index.php
├── enroll.php
├── marks.php
├── my-profile.php
├── includes/
├── assets/
├── admin/
│   ├── index.php
│   ├── language.php
│   ├── courses.php
│   └── includes/
├── sqlfile/acourse.sql
└── README.md
```

صفحهٔ درس زبان `admin/language.php` است. کپی داخل `admin/img` را باز نکن.

---

# 🛠️ فناوری‌ها

- PHP
- MySQL
- Bootstrap 3
- HTML و CSS و JavaScript
- jQuery

---

# 🚀 نصب

```bash
git clone https://github.com/sadra-hatami/School-Portal.git
cd School-Portal
```

1. پوشه را زیر یک سرور PHP بگذار، مثل `htdocs` در XAMPP.
2. پایگاه `Acourse` را بساز.
3. `sqlfile/acourse.sql` را وارد کن.
4. `index.php` را برای دانشجو و `admin/index.php` را برای میز مدیر باز کن.

---

# ⚙️ پیکربندی

تنظیم پایگاه اینجاست:

- `includes/config.php`
- `admin/includes/config.php`

پیش‌فرض محلی:

```text
DB_SERVER  localhost
DB_USER    root
DB_PASS
DB_NAME    Acourse
```

قبل از سرور عمومی این مقدارها را عوض کن. رمز واقعی را commit نکن.

---

# ▶️ استفاده

1. فایل SQL را وارد کن.
2. از سمت لازم وارد شو.
3. به عنوان مدیر، جلسه و درس و ثبت‌نام اضافه کن.
4. به عنوان دانشجو، ثبت‌نام و نمره و پروفایل را باز کن.

---

# 📝 یادداشت

- عکس پروفایل پوشهٔ `studentphoto` می‌خواهد. آن پوشه در مخزن نیست، پس نبودن عکس صفحه را متوقف نمی‌کند.
- `admin/controller.php` به فایل‌هایی وصل است که در این بسته نبودند. از صفحه‌های منوی مدیر استفاده کن.
- این پورتال فقط برای دادهٔ تمرینی است.

---

# ❓ پرسش‌ها

### آیا این همان برنامهٔ C++ است؟

نه. آن یکی [Student Information System](https://github.com/sadra-hatami/Student-Information-System) است. این مخزن پورتال PHP است.

### بدون MySQL کار می‌کند؟

نه. اول `acourse.sql` را وارد کن.

### صفحهٔ درست زبان کدام است؟

`admin/language.php`.

---

# 📬 تماس

### صدرا حاتمی

📧 [ایمیل](mailto:sadra.hatami.1732@gmail.com)

🌐 [گیت‌هاب](https://github.com/sadra-hatami)

---

# 📄 مجوز

این پروژه تحت مجوز **MIT** است.

---

# ⭐ حمایت

اگر این پورتال به عنوان نمونهٔ تمرینی مفید است، به مخزن ستاره بده.

---

<div align="center">

## طراحی و توسعه با علاقه برای جامعهٔ برنامه‌نویسان ایران و جهان توسط **صدرا حاتمی**

</div>
