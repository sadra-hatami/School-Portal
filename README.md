<div align="center">

# Student Portal
# 🎓

### A PHP portal for courses, enrollment, and marks

A two-sided school desk: students enroll and read marks, and an admin manages sessions, courses, and records. Data lives in MySQL.

<br>

# 👨‍💻 **Sadra Hatami**

### *Developer • Software Engineer • Creator*

<br>

[![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://www.php.net/)
[![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)](https://www.mysql.com/)
[![Bootstrap](https://img.shields.io/badge/Bootstrap-3-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white)](https://getbootstrap.com/docs/3.4/)
[![HTML5](https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white)](https://developer.mozilla.org/en-US/docs/Web/HTML)
[![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white)](https://developer.mozilla.org/en-US/docs/Web/CSS)
[![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black)](https://developer.mozilla.org/en-US/docs/Web/JavaScript)
[![jQuery](https://img.shields.io/badge/jQuery-0769AD?style=for-the-badge&logo=jquery&logoColor=white)](https://jquery.com/)
[![Sessions](https://img.shields.io/badge/Auth-PHP%20Sessions-4F5B93?style=for-the-badge&logo=php&logoColor=white)](https://www.php.net/manual/en/book.session.php)
[![Admin](https://img.shields.io/badge/Side-Admin%20Panel-2C3E50?style=for-the-badge)](https://github.com/sadra-hatami/Student-Portal/tree/main/admin)
[![Student](https://img.shields.io/badge/Side-Student%20Portal-1ABC9C?style=for-the-badge)](https://github.com/sadra-hatami/Student-Portal)
[![SQL](https://img.shields.io/badge/Schema-acourse.sql-003B57?style=for-the-badge)](https://github.com/sadra-hatami/Student-Portal/blob/main/sqlfile/acourse.sql)
[![XAMPP](https://img.shields.io/badge/Run-XAMPP-FB7A24?style=for-the-badge&logo=xampp&logoColor=white)](https://www.apachefriends.org/)
[![License](https://img.shields.io/badge/License-MIT-green.svg?style=for-the-badge)](https://opensource.org/license/mit)
[![Open Source](https://img.shields.io/badge/Open_Source-Project-black?style=for-the-badge&logo=github)](https://opensource.org/)

<br>

[🌐 GitHub Profile](https://github.com/sadra-hatami)
•
[📧 Email](mailto:sadra.hatami.1732@gmail.com)

</div>

---

# 📑 Table of Contents

- [About](#-about)
- [Why This Project?](#-why-this-project)
- [Key Features](#-key-features)
- [Two Sides](#-two-sides)
- [Project Structure](#-project-structure)
- [Technologies](#️-technologies)
- [Installation](#-installation)
- [Configuration](#️-configuration)
- [Usage](#️-usage)
- [Notes](#-notes)
- [FAQ](#-faq)
- [Contact](#-contact)
- [License](#-license)
- [Support](#-support)

---

# 📖 About

**Student Portal** is a PHP web application for a small school desk.

The root pages are the student side: profile, course enrollment, marks, and password change. The `admin` folder is the management side: sessions, semesters, departments, courses, registration, and logs. Both sides read and write the same MySQL database.

> **Tagline:** *A PHP student and admin portal for courses, enrollment, and marks, with a shared MySQL database.*

This is a study portal, not a school information system for real student records.

---

# 🚀 Why This Project?

A portal is more than one form. It needs two roles and a shared database.

This project keeps that split:

- Students see their own pages
- Admins manage the catalog and records
- Course, enrollment, and marks sit in MySQL
- The schema is included, so the desk can be rebuilt

It is a practice web app. The console student file in [Student Information System](https://github.com/sadra-hatami/Student-Information-System) is a separate project.

---

# ✨ Key Features

- 🔐 Admin and student login
- 🗓️ Session, semester, and department records
- 📚 Course catalog
- 📝 Student enrollment
- 📊 Marks and grade pages
- 👤 Profile and password change
- 📋 Enrollment history and user log
- 🖨️ Print view
- 💾 MySQL schema in `sqlfile/acourse.sql`

---

# 👥 Two Sides

| Side | Path | Role |
|---|---|---|
| Student | repository root | Profile, enroll, marks, password |
| Admin | `admin/` | Catalog, registration, history, logs |

Open the student side from `index.php`. Open the admin side from `admin/index.php`.

---

# 📁 Project Structure

```text
Student-Portal/
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

`admin/language.php` is the language-course page. Do not use a copy inside `admin/img`.

---

# 🛠️ Technologies

- PHP
- MySQL
- Bootstrap 3
- HTML, CSS, and JavaScript
- jQuery

---

# 🚀 Installation

```bash
git clone https://github.com/sadra-hatami/Student-Portal.git
cd Student-Portal
```

1. Put the folder under a PHP server, such as XAMPP `htdocs`.
2. Create a database named `Acourse`.
3. Import `sqlfile/acourse.sql`.
4. Open `index.php` for students, or `admin/index.php` for the desk.

---

# ⚙️ Configuration

Database settings are in:

- `includes/config.php`
- `admin/includes/config.php`

Local defaults:

```text
DB_SERVER  localhost
DB_USER    root
DB_PASS
DB_NAME    Acourse
```

Change these before any public server. Do not commit a real password.

---

# ▶️ Usage

1. Import the SQL file.
2. Sign in on the side you need.
3. As admin, add a session, a course, and a registration.
4. As a student, open enrollment, marks, and profile.

---

# 📝 Notes

- Profile photos expect a `studentphoto` folder. That folder is not in this repository, so a missing image does not stop the page.
- `admin/controller.php` points at files that were not part of this package. Use the admin menu pages instead.
- This portal is for practice data only.

---

# ❓ FAQ

### Is this the C++ student program?

No. That one is [Student Information System](https://github.com/sadra-hatami/Student-Information-System). This repository is the PHP portal.

### Does it work without MySQL?

No. Import `acourse.sql` first.

### Which language page is the right one?

`admin/language.php`.

---

# 📬 Contact

**Developer:**

### Sadra Hatami

📧 [Email](mailto:sadra.hatami.1732@gmail.com)

🌐 [GitHub](https://github.com/sadra-hatami)

---

# 📄 License

This project is licensed under the **MIT License**.

---

# ⭐ Support

If this portal is useful as a study sample, please consider giving it a ⭐ on GitHub.

---

<div align="center">

## Designed & Developed with ❤️ for the developer community of Iran and the world by **Sadra Hatami**

</div>
