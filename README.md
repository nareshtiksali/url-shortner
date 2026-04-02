# 🔗 URL Shortener (Laravel)

A simple URL Shortener application built with Laravel. This project allows users to generate short URLs, track usage (hits), and manage links via role-based dashboards (SuperAdmin, Admin, User).

---

## 🚀 Features

- Short URL generation
- Redirect to original URL
- Track number of visits (hits)
- Role-based dashboards:
    - SuperAdmin
    - Admin
    - User

- Authentication system (Login only)
- Company-based URL management

---

## 🛠️ Tech Stack

- **Backend:** Laravel 10.5
- **Frontend:** Blade
- **Database:** MySQL
- **Auth:** Laravel UI

---

## 📦 Installation Guide

Follow these steps to run the project locally:

### 1. Clone the Repository

```bash
git clone https://github.com/nareshtiksali/url-shortner.git
cd your-repo-name
```

---

### 2. Install PHP Dependencies

```bash
composer install
```

---

### 3. Install Node Modules

```bash
npm install
```

---

Then update `.env` with your database credentials:

```
DB_DATABASE=your_database_name
DB_USERNAME=root
DB_PASSWORD=
```

---

### 4. Generate Application Key

```bash
php artisan key:generate
```

---

### 5. Run Migrations

```bash
php artisan migrate
```

---

### 6. Run Seeders (Important)

```bash
php artisan db:seed
```

Or if specific seeders:

```bash
php artisan db:seed --class=RoleSeeder
php artisan db:seed --class=SuperAdminSeeder
```

---

### 7. Compile Assets

```bash
npm run dev
```

---

### 8. Start the Server

```bash
php artisan serve
```

Visit:

```
http://127.0.0.1:8000
```

---

## 🔐 Default Credentials (if seeded)

| Role       | Email                                         | Password  |
| ---------- | --------------------------------------------- | --------- |
| SuperAdmin | [admin@example.com](mailto:admin@example.com) | admin@123 |

_(Update based on your seeders)_

---

## ⚙️ Useful Commands

```bash
php artisan migrate:fresh --seed   # Reset DB and seed
php artisan route:list             # View routes
php artisan cache:clear            # Clear cache
php artisan config:clear           # Clear config
```

---

## ❗ Common Issues

### 1. Migration Issues

```bash
php artisan migrate:fresh
```

### 2. .env Not Working

```bash
php artisan config:clear
```

---

## 🤝 Contributing

Feel free to fork and improve the project.

---

## 📄 License

This project is open-source and available under the MIT License.

---

## 👨‍💻 Author

**Naresh Tiksali**
