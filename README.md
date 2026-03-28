# Login and Registration System 

## Problem Statement

Create a signup page where a user can register and a login page to log in using the registered details.

After successful login, the user is redirected to a profile page where additional details such as age, contact, and address can be added or updated.

Flow:

Register → Login → Profile

---

## Tech Stack Used

Frontend:
- HTML
- CSS
- Bootstrap
- JavaScript
- jQuery AJAX

Backend:
- PHP

Database:
- MySQL (User Authentication Data)
- MongoDB (User Profile Data)

Session Management:
- Redis (Session Storage)
- Browser LocalStorage (Token Storage)

Security:
- Password hashing (PHP - BCRYPT)
- Prepared Statements
---

## Features

- User Registration
- Secure Login System
- Password Hashing using `password_hash()`
- Login Session using Token
- Redis Session Storage
- Profile Creation
- Profile Update
- MongoDB Profile Storage
- Responsive UI using Bootstrap
- AJAX-based communication (No form submission)

---

## Application Flow

Register → Login → Profile

1. User registers using Register Page.
2. Password is hashed before storing in MySQL.
3. User logs in using registered credentials.
4. PHP verifies password using `password_verify()`.
5. A session token is generated.
6. Token stored in Redis.
7. Token stored in browser localStorage.
8. Profile data stored in MongoDB.
9. User can update profile details.

---

## Folder Structure
```
web_app/
│
├── assets/
│
├── css/
│ ├── form.css
│ └── styles.css
│
├── db/
│ └── guvi.sql
│
├── js/
│ ├── index.js
│ ├── login.js
│ ├── profile.js
│ └── register.js
│
├── php/
│ ├── login.php
│ ├── profile.php
│ ├── register.php
│ └── test_redis.php
│
├── src/
│
├── vendor/
│ ├── composer.json
│ └── composer.lock
│
├── .gitignore
├── index.html
├── login.html
├── profile.html
├── register.html
└── README.md
```
---

## Database Details

### MySQL Table (Users)

```sql
CREATE TABLE user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    email VARCHAR(255) UNIQUE,
    password VARCHAR(255)
);
```


## MongoDB Collection

**Database:** `guvi`  
**Collection:** `profiles`  

**Example Document:**
```json
{
  "user_id": 8,
  "fullname": "John Doe Volkov",
  "phone": "9628730894",
  "address": "34,1st Cross, Rammurthy nagar, Bangalore - 560016",
  "age": 23
}
```
## Setup Instructions

Follow these steps to run the project locally:

### Step 1 — Start Required Services
Ensure the following services are running on your system:

- Apache (XAMPP)  
- MySQL  
- MongoDB  
- Redis  

---

### Step 2 — Import MySQL Database
1. Open your MySQL client .  
2. Import the provided database file `guvi.sql` into MySQL.

---

### Step 3 — Install MongoDB PHP Driver
1. Open your `php.ini` file.  
2. Enable the MongoDB extension by adding or uncommenting:

```ini id="mongodb-ext"
extension=mongodb
```
### Step 4 — Install Redis PHP Extension
1. Open your `php.ini` file.
2. Enable the Redis extension by adding or uncommenting the following line:

```ini
extension=php_redis
```
### Step 5 — Run the Project

1. Open your browser.  
2. Navigate to the index page:
```
http://localhost/GUVI/web_app/index.html
```

3. You can now **register, log in, and manage user profiles**.

**Demo video and Output Screenshots are added in /output folder.**
