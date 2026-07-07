# User Management REST API

REST API sederhana menggunakan Laravel dengan autentikasi JWT untuk mengelola data pengguna.

## Features

* JWT Authentication
* Login menggunakan username
* Get All Users
* Get User Detail
* Create User
* Update User
* Delete User
* Relasi User dan User Detail

---

## Requirements

* PHP >= 8.2
* Composer
* MySQL / MariaDB
* Laravel
* JWT Authentication Package

---

## Installation

### 1. Clone Repository

```bash
git clone <repository-url>
cd <project-folder>
```

### 2. Install Dependency

```bash
composer install
```

### 3. Copy Environment File

```bash
cp .env.example .env
```

Jika menggunakan Windows:

```bash
copy .env.example .env
```

### 4. Generate Application Key

```bash
php artisan key:generate
```

### 5. Konfigurasi Database

Edit file `.env`

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database
DB_USERNAME=root
DB_PASSWORD=
```

### 6. Generate JWT Secret

```bash
php artisan jwt:secret
```

### 7. Jalankan Migration

```bash
php artisan migrate
```

Apabila tersedia seeder:

```bash
php artisan db:seed
```

atau

```bash
php artisan migrate:fresh --seed
```

---

## Running Project

Jalankan server:

```bash
php artisan serve
```

Akses aplikasi:

```text
http://127.0.0.1:8000
```

Base API:

```text
http://127.0.0.1:8000/api
```

---

## Authentication

Login terlebih dahulu melalui endpoint:

```http
POST /api/login
```

Response:

```json
{
    "access_token": "your-jwt-token",
    "token_type": "Bearer"
}
```

Gunakan token tersebut pada seluruh endpoint yang membutuhkan autentikasi.

Header:

```http
Authorization: Bearer your-jwt-token
```

---

## Available Endpoints

| Method | Endpoint        | Description     |
| ------ | --------------- | --------------- |
| POST   | /api/login      | Login           |
| GET    | /api/users      | Get all users   |
| GET    | /api/users/{id} | Get user detail |
| POST   | /api/users      | Create user     |
| PUT    | /api/users/{id} | Update user     |
| DELETE | /api/users/{id} | Delete user     |

---

## Project Structure

```text
app/
 ├── Http/
 │    └── Controllers/
 │          ├── AuthController.php
 │          └── UserController.php
 ├── Models/
 │     ├── User.php
 │     └── UserDetail.php
routes/
 └── api.php
```

---

## Testing

API dapat diuji menggunakan:

* Postman
* Insomnia
* Thunder Client (VS Code)

Pastikan setiap request selain login menggunakan JWT Token pada header Authorization.

API Documentation : https://docs.google.com/document/d/1C7YdxikFp9fKic8FoadRX2uf5kMeTZYX-dxBv9RKX1w/edit?usp=sharing
