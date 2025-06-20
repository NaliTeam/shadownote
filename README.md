# 🔐 Shadow Note

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

