# 🚀 Contact Management System (PHP)

A **powerful and intuitive Contact Management System** built with **PHP**, **MySQL**, and **MVC architecture**. Easily manage, track, and organize your contacts with a clean and responsive interface. 💻📇

---

## 🔍 Features

* ✅ **Add Contacts** – Create new contacts with name, email, phone, and address.
* ✏️ **Edit Contacts** – Update existing contact information effortlessly.
* 🗑️ **Delete Contacts** – Remove contacts safely with confirmation prompts.
* 📋 **List / View Contacts** – Display all contacts in a sortable and searchable table.
* 🔐 **Secure** – Uses **PDO with prepared statements** to prevent SQL injection & XSS protection.
* 📱 **Responsive Design** – Mobile-friendly layout powered by **Bootstrap**.
* 🕒 **Timestamps** – Automatically track creation and update times.
* 🧩 **MVC Architecture** – Clean separation of **Models**, **Views**, and **Controllers**.

---

## 🛠️ Technologies

* **Backend:** PHP (Object-Oriented)
* **Database:** MySQL / MariaDB
* **Frontend:** HTML, CSS, JavaScript, Bootstrap
* **Architecture:** MVC (Model-View-Controller)
* **Server:** Apache or any PHP-compatible web server

---

## ✅ Prerequisites

Before running locally, ensure you have:

1. Apache, Nginx, or any PHP-compatible web server
2. PHP ≥ 7.x with PDO / MySQLi extensions
3. MySQL / MariaDB
4. Composer (optional for dependency management)
5. Git (optional, for cloning)

---

## 🚧 Installation

1. **Clone the repository**

   ```bash
   git clone https://github.com/MisaghMomeniB/contact-management-system-php.git
   cd contact-management-system-php
   ```

2. **Database setup**

   * Create a database (e.g., `contact_management`).
   * Import the `.sql` file if provided or manually create tables.

3. **Configure database connection**

   * Edit the config file (e.g., `config/database.php`) and set your database host, name, username, and password.

4. **Serve the project**

   * Place the project in your web server's root (e.g., `htdocs` for XAMPP).
   * Start Apache & MySQL.
   * Access the app at `http://localhost/contact-management-system-php/public`.

---

## 💡 Usage

* **Add Contact** – Click "Add Contact", fill the form, and submit.
* **Edit Contact** – Click "Edit" next to a contact, modify the details, and save.
* **Delete Contact** – Click "Delete" and confirm removal.

---

## 🔧 Project Structure

```
contact-management-system-php/
├── config/            # Database configuration & settings
├── controllers/       # Controller logic
├── models/            # Database models
├── views/             # Frontend templates
├── helpers/           # Utility functions
├── public/            # Public files (CSS, JS, images)
└── README.md          # Project documentation
```

---

## 🛡️ Security

* **Prepared statements** for SQL queries to prevent SQL injection
* **Input sanitization** (e.g., `htmlspecialchars`) to avoid XSS attacks
* Proper validation for forms to prevent malicious input

---

## 🎯 Future Enhancements

* Advanced **search/filtering** of contacts
* **Profile pictures** for contacts
* Server-side and client-side **form validation**
* **User authentication** for secure access
* **Export contacts** as CSV or PDF
* **Pagination** for large contact lists
* Activity logging for auditing

---

## 🤝 Contributing

Contributions are welcome!

1. Fork the repository
2. Create a new branch: `git checkout -b feature/your-feature`
3. Commit your changes: `git commit -m "Add awesome feature"`
4. Push to the branch: `git push origin feature/your-feature`
5. Open a Pull Request

---

## 📄 License

This project is licensed under the **MIT License**. See the `LICENSE` file for details.

---

## 🙏 Acknowledgments

* PHP & MySQL for backend power 💪
* MVC architecture for clean, maintainable code 🧩
* Bootstrap for responsive and modern UI 🎨
* Open-source community inspiration 🌐
