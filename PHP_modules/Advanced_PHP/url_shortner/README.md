# 🔗 PHP URL Shortener — Evaluation + Theory

---

# 📌 Project Goal

Build a **URL Shortener API** using PHP demonstrating Advanced PHP concepts (Note: I have use AI agents to help me to build this project):

* REST API
* MVC Architecture
* Namespaces
* Composer (PSR-4 Autoloading)
* Magic Methods
* Regular Expressions
* Apache Deployment

---

# 🧪 Quick Evaluation Checklist

| Feature       | File                      | How to Verify                |
| ------------- | ------------------------- | ---------------------------- |
| API           | `UrlController.php`       | Call `/api/shorten`          |
| Namespace     | `app/`                    | Check `namespace App\...`    |
| Composer      | `composer.json`           | Run `composer dump-autoload` |
| Magic Methods | `Database.php`, `Url.php` | Check `__get()`              |
| Regex         | `Url.php`                 | Check `preg_match()`         |
| Routing       | `Router.php`              | Test `/abc123`               |
| Deployment    | `.htaccess`               | Pretty URLs work             |

---

# 📁 Project Structure

```
url_shortner/
├── app/
│   ├── Controllers/
│   ├── Models/
│   └── Core/
├── public/
├── routes/
├── composer.json
├── .env
└── database.sql
```

---

# 🌐 API Endpoints

| Method | Endpoint       | Description      |
| ------ | -------------- | ---------------- |
| POST   | `/api/shorten` | Create short URL |
| GET    | `/api/urls`    | Get all URLs     |
| GET    | `/{code}`      | Redirect         |

---

# 🧠 THEORY + IMPLEMENTATION

---

## 🔹 1. API (Application Programming Interface)

### 📖 Theory

An **API** allows communication between systems using HTTP requests.

Types:

* GET → Fetch data
* POST → Send data
* PUT → Update
* DELETE → Remove

REST API uses:

* JSON format
* Stateless communication

### 🧪 In This Project

* JSON responses returned
* Endpoints created

📍 File:

```
UrlController.php
```

---

## 🔹 2. Namespace

### 📖 Theory

A **namespace** is used to avoid class name conflicts.

Example:

```php
namespace App\Controllers;
```

👉 Similar to packages in Java.

### 🧪 In This Project

* All classes organized under `App\`

📍 Example:

```php
use App\Models\Url;
```

---

## 🔹 3. Composer (PSR-4 Autoloading)

### 📖 Theory

**Composer** is a dependency manager in PHP.

PSR-4:

* Maps namespace → folder
* Automatically loads classes

### 🧪 In This Project

```json
"autoload": {
  "psr-4": {
    "App\\": "app/"
  }
}
```

Run:

```bash
composer dump-autoload
```

---

## 🔹 4. Magic Methods

### 📖 Theory

Magic methods are special methods starting with `__` that PHP calls automatically.

Common:

* `__construct()` → runs when object created
* `__get()` → access private property
* `__set()` → assign value

### 🧪 In This Project

```php
public function __get($name)
```

📍 Files:

* `Database.php`
* `Url.php`

---

## 🔹 5. Regular Expressions (Regex)

### 📖 Theory

Regex is used to **validate patterns** in strings.

Example:

```php
preg_match("/pattern/", $string);
```

### 🧪 In This Project

* Used to validate URL format

📍 File:

```
Url.php
```

---

## 🔹 6. Apache Deployment

### 📖 Theory

Apache is a web server that serves PHP applications.

Problem:

* Apache looks for physical files

Solution:

* Use `.htaccess` for routing

### 🧪 In This Project

```apache
RewriteEngine On
RewriteRule ^ index.php [QSA,L]
```

👉 Routes all requests to `index.php`

---

# 🚀 How to Run

### 1. Install Dependencies

```bash
composer dump-autoload
```

### 2. Setup Database

```sql
CREATE DATABASE url_shortener;
```

Import `database.sql`

---

### 3. Run Project

```
http://localhost/url_shortner/public/
```

---

# 🧪 Test API

```bash
# Create short URL
curl -X POST http://localhost/url_shortner/public/api/shorten \
-H "Content-Type: application/json" \
-d '{"url":"https://google.com"}'

# Get all URLs
curl http://localhost/url_shortner/public/api/urls
```

---

# 🗄️ Database Schema

```sql
CREATE TABLE urls (
    id INT AUTO_INCREMENT PRIMARY KEY,
    original_url TEXT,
    short_code VARCHAR(10),
    clicks INT DEFAULT 0
);
```

---

