# 🔐 Shadow Note


📘 [فارسی بخوانید](README.fa.md)



**Shadow Note** is a lightweight PHP-based tool for securely sharing private or sensitive text messages via short access codes. Each message self-destructs after 10 minutes or upon expiration.

## 🚀 Features

- Simple code-based access system
- No database required (uses local `.txt` files)
- Messages expire automatically after N minutes
- Password-protected admin panel
- Easy to host on any PHP server
- Secure by design (doesn't expose file paths)

## 💡 How It Works

1. Admin logs into `/admin.php`
2. Admin enters a message → gets a short code like `abc123`
3. User visits the homepage (`/`) and enters the code
4. If the message exists and is still valid, it’s shown
5. If expired or not found, an error is displayed

## 📁 File Structure

project/

├── index.php # User interface for entering access code

├── admin.php # Admin panel to create messages

├── data/ # Stores temporary .txt files


## 🔐 Security

- Use HTTPS for secure transport
- You can protect `admin.php` with basic auth or session login
- Files are deleted after expiration automatically

## 🛠️ Installation Guide

### ✅ Requirements

- A domain name pointing to your server (or use server IP)
- A PHP-supported environment (Shared hosting or Linux VPS)
- Apache or Nginx with PHP installed
- Access to upload files (via FTP, SFTP, or control panel)

---

### 🚀 Setup Steps

1. Upload these files to your server’s root (e.g. `/var/www/html/` or `public_html/`):
    ```
    index.php
    admin.php
    data/ (create this folder manually)
    ```

2. Ensure the `data/` folder is writable:
    ```bash
    chmod 755 data
    ```

3. Access your domain:
    - Admin panel: `https://yourdomain.com/admin.php`
    - User page: `https://yourdomain.com` → enter the access code

---

### ⚙️ Customization

- Change admin credentials in `admin.php`:
    ```php
    $username = 'admin';
    $password = '12345';
    ```

- Change message expiration time (default 10 minutes):
    ```php
    'expire_at' => time() + 600
    ```

- Increase code complexity:
    ```php
    bin2hex(random_bytes(5));
    ```

---
## 📄 License

MIT — Use freely, credit appreciated!
