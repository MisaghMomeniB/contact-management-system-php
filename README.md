<div align="center">

# 📇 Contact Management System

**A full-stack PHP web application for managing contacts — built clean with MVC architecture.**

[![PHP](https://img.shields.io/badge/PHP-8%2B-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://www.php.net/)
[![MySQL](https://img.shields.io/badge/MySQL-Database-4479A1?style=for-the-badge&logo=mysql&logoColor=white)](https://www.mysql.com/)
[![Bootstrap](https://img.shields.io/badge/Bootstrap-Responsive%20UI-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white)](https://getbootstrap.com/)
[![MVC](https://img.shields.io/badge/Architecture-MVC-success?style=for-the-badge)](#)
[![License](https://img.shields.io/badge/License-MIT-green?style=for-the-badge)](LICENSE)

> *"Organize your world, one contact at a time."*

</div>

---

## 🧭 Table of Contents

- [About](#-about)
- [Features](#-features)
- [Tech Stack](#-tech-stack)
- [Project Structure](#-project-structure)
- [Getting Started](#-getting-started)
- [Database Setup](#-database-setup)
- [Usage](#-usage)
- [Security](#-security)
- [Roadmap](#️-roadmap)
- [Contributing](#-contributing)
- [Author](#-author)

---

## 📖 About

**Contact Management System** is a clean, full-featured web application built with **PHP**, **MySQL**, and the **MVC pattern**. It lets you add, view, edit, and delete contacts through a responsive, user-friendly interface — all powered by a secure, PDO-driven backend.

Whether you're learning PHP MVC from scratch or need a solid base for a CRM-style project, this codebase demonstrates how professional PHP applications are structured.

---

## ✨ Features

| Feature | Description |
|---|---|
| ➕ **Add Contacts** | Create new contacts with name, email, phone & address |
| ✏️ **Edit Contacts** | Update existing contact details inline |
| 🗑️ **Delete Contacts** | Remove contacts with a confirmation safeguard |
| 📋 **View All Contacts** | Browse all contacts in a sortable, searchable table |
| 🔐 **SQL Injection Protection** | PDO prepared statements throughout |
| 🛡️ **XSS Prevention** | Input sanitization with `htmlspecialchars` |
| ⏱️ **Timestamps** | Auto-track `created_at` and `updated_at` for every record |
| 📱 **Responsive UI** | Mobile-friendly layout via Bootstrap |
| 🧩 **MVC Architecture** | Clean separation of Models, Views, and Controllers |

---

## 🛠 Tech Stack

| Layer | Technology |
|---|---|
| **Backend** | PHP 8+ (Object-Oriented) |
| **Database** | MySQL / MariaDB |
| **Frontend** | HTML5, CSS3, JavaScript, Bootstrap |
| **DB Access** | PDO (PHP Data Objects) |
| **Architecture** | MVC (Model-View-Controller) |
| **Server** | Apache / Nginx (with `.htaccess` rewrite) |
| **Package Manager** | npm (for frontend assets) |

---

## 📁 Project Structure

```
contact-management-system-php/
│
├── 📂 config/            # Database config & app-wide settings
│   └── database.php      # PDO connection setup
│
├── 📂 controllers/       # Request handling & business logic
│   └── ContactController.php
│
├── 📂 models/            # Database layer — all SQL lives here
│   └── Contact.php
│
├── 📂 views/             # HTML templates rendered by controllers
│   ├── contacts/
│   │   ├── index.php     # List all contacts
│   │   ├── create.php    # Add new contact form
│   │   └── edit.php      # Edit contact form
│   └── layout/
│
├── 📂 helpers/           # Utility & helper functions
├── 📂 assets/            # Raw CSS, JS, image source files
├── 📂 public/            # Web root — entry point & compiled assets
│   └── index.php         # Front controller
│
├── package.json          # Frontend dependencies
├── .gitignore
├── LICENSE
└── README.md
```

**How it flows:**
```
Browser Request
     │
     ▼
public/index.php  (Front Controller)
     │
     ▼
controllers/ContactController.php  (Route & Logic)
     │           │
     ▼           ▼
models/       views/
Contact.php   (HTML Templates)
  (SQL/PDO)
```

---

## 🚀 Getting Started

### Prerequisites

Make sure you have the following installed:

- ✅ **PHP 7.4+** (PDO & MySQLi extensions enabled)
- ✅ **MySQL / MariaDB**
- ✅ **Apache** with `mod_rewrite` enabled (or Nginx)
- ✅ **XAMPP / LAMP / WAMP** — or any PHP-compatible stack
- ✅ **Composer** *(optional, for dependency management)*
- ✅ **Node.js / npm** *(optional, for frontend asset builds)*

### Installation

```bash
# 1. Clone the repository
git clone https://github.com/MisaghMomeniB/contact-management-system-php.git

# 2. Move into the project directory
cd contact-management-system-php

# 3. (Optional) Install frontend dependencies
npm install

# 4. Place the project in your web server root
#    e.g. for XAMPP: C:/xampp/htdocs/contact-management-system-php
```

---

## 🗄 Database Setup

```sql
-- 1. Create the database
CREATE DATABASE contact_management;
USE contact_management;

-- 2. Create the contacts table
CREATE TABLE contacts (
    id          INT AUTO_INCREMENT PRIMARY KEY,
    name        VARCHAR(100)  NOT NULL,
    email       VARCHAR(150)  UNIQUE,
    phone       VARCHAR(20),
    address     TEXT,
    created_at  TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at  TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
```

Then update your database credentials in `config/database.php`:

```php
define('DB_HOST', 'localhost');
define('DB_NAME', 'contact_management');
define('DB_USER', 'your_username');
define('DB_PASS', 'your_password');
```

### Start the App

```
Start Apache & MySQL → open your browser → http://localhost/contact-management-system-php/public
```

---

## 💻 Usage

### ➕ Adding a Contact
Navigate to **"Add Contact"**, fill in the name, email, phone, and address fields, then hit **Save**.

### 📋 Viewing Contacts
The home page lists all contacts in a clean table. Use the search bar to filter by name or email.

### ✏️ Editing a Contact
Click the **Edit** button next to any contact, update the fields, and confirm changes.

### 🗑️ Deleting a Contact
Click **Delete** — a confirmation prompt will appear before any record is permanently removed.

---

## 🔐 Security

This application takes security seriously:

- **PDO Prepared Statements** — all SQL queries use bound parameters, eliminating SQL injection risk
- **`htmlspecialchars()`** — all user-supplied output is escaped before rendering, preventing XSS
- **Input Validation** — server-side validation on all form fields
- **No Raw SQL Concatenation** — zero string-interpolated queries anywhere in the codebase

> ⚠️ For production deployments, also consider: HTTPS enforcement, CSRF token protection, rate limiting, and user authentication.

---

## 🛣️ Roadmap

- [x] Full CRUD (Create, Read, Update, Delete)
- [x] MVC architecture
- [x] PDO + prepared statements
- [x] Bootstrap responsive UI
- [x] Auto timestamps
- [ ] 🔍 Advanced search & filtering
- [ ] 🔑 User authentication & login system
- [ ] 📄 Pagination for large contact lists
- [ ] 🖼️ Profile picture upload per contact
- [ ] 📤 Export contacts as CSV / PDF
- [ ] 🔔 Duplicate email detection & alerts
- [ ] 📊 Contact activity log / audit trail
- [ ] 🐳 Docker support for easy deployment

---

## 🤝 Contributing

All contributions are warmly welcomed!

1. **Fork** the repository
2. **Create** a feature branch: `git checkout -b feature/your-feature`
3. **Commit** your changes: `git commit -m "Add: your feature description"`
4. **Push** to the branch: `git push origin feature/your-feature`
5. **Open** a Pull Request — describe what you changed and why

Please follow clean code principles and keep controllers thin, models fat.

---

## 📄 License

Distributed under the **MIT License** — free to use, modify, and distribute.
See [`LICENSE`](LICENSE) for full details.

---

<div align="center">

## 👨‍💻 Author

**Misagh Momeni Bashusqeh**
*Software Developer*

[![GitHub](https://img.shields.io/badge/GitHub-MisaghMomeniB-181717?style=for-the-badge&logo=github)](https://github.com/MisaghMomeniB)

---

*Built with 🐘 PHP and a love for clean architecture.*
*Found it useful? Drop a ⭐ — it goes a long way!*

</div>
