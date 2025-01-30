# 🏨 Hotel Management System

## Overview
This **Hotel Management System** is built using **Laravel Jetstream** for authentication and **Bootstrap** for a responsive UI. It allows users to book rooms, manage reservations, and contact hotel administration. The system supports **admin and user roles**, ensuring efficient hotel operations and a smooth customer experience.

---

## 🚀 Features

✅ **User Authentication** (Laravel Jetstream)  
✅ **Room Booking & Management**  
✅ **Admin Panel for Managing Reservations**  
✅ **Contact Form for Customer Support**  
✅ **Image Gallery for Hotel Showcase**  
✅ **Role-based Access Control (Admin & Users)**  
✅ **Notifications for Booking Updates**  
✅ **Secure Authentication & Authorization**  

---

## 🏗 Project Structure

📂 app/ # Application logic ├── Actions/ # Custom Jetstream actions ├── Http/Controllers/ # App controllers │ ├── AdminController.php │ ├── HomeController.php │ ├── Controller.php ├── Models/ # Eloquent models │ ├── Booking.php │ ├── Contact.php │ ├── Gallary.php │ ├── Room.php │ ├── User.php ├── Notifications/ # Notification system ├── Providers/ # Laravel service providers ├── View/Components/ # Jetstream UI components 📂 database/ # Database migrations & seeders ├── migrations/ # Table structures ├── seeders/ # Database seeding 📂 resources/ # Views & assets ├── views/ # Blade templates 📂 routes/ # Web & API routes 📂 public/ # Public assets 📂 config/ # Laravel configuration files 📂 storage/ # File storage

---

## 🎨 Frontend & UI

**Laravel Jetstream (Authentication)
**Bootstrap (Styling & Layout)
**Blade Templates (Dynamic Views)
**Tailwind CSS (Custom Styles)

---

## 🛠 Installation & Setup

### 1️⃣ Clone the Repository
```bash
git clone https://github.com/yourusername/hotel-management-system.git
```
### 2️⃣ Install Dependencies
```
composer install
npm install
```

### 3️⃣ Configure Environment Variables
```
cp .env.example .env
php artisan key:generate
```

### 4️⃣ Run Migrations & Seed Database

```
php artisan migrate --seed

```
### 5️⃣ Run the Application

```
php artisan serve

```














