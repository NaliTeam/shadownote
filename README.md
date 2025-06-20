# shadownote
🔒 Self-Destructing Text Sharing System
# 🔒 Self-Destructing Text Sharing System
A simple PHP-based web tool to share sensitive or private text with others using one-time links that automatically expire after 10 minutes.

## Features
- Admin panel for text input
- Generates a simple URL (e.g., `/abc123`)
- Each link is valid only for 10 minutes
- Automatically deletes the file after expiration or access
- No database required — files are saved locally

---

# 📦 سیستم اشتراک‌گذاری متن با انقضای خودکار
این ابزار ساده‌ی وب با استفاده از PHP نوشته شده و برای ارسال امن متن‌های حساس یا خصوصی طراحی شده است. هر لینک تنها ۱۰ دقیقه اعتبار دارد و سپس منقضی شده یا حذف می‌شود.

## امکانات
- پنل مدیریت برای افزودن متن
- تولید لینک ساده برای کاربران
- اعتبار ۱۰ دقیقه‌ای برای هر لینک
- حذف خودکار فایل بعد از انقضا یا مشاهده
- بدون نیاز به دیتابیس (فایل‌ها محلی ذخیره می‌شوند)

---

## 📁 Files Structure / ساختار فایل‌ها

project/
├── admin.php ← برای افزودن متن توسط مدیر
├── text.php ← برای مشاهده متن با لینک
├── .htaccess ← برای ریدایرکت آدرس‌ها به text.php
├── abc123.txt ← فایل‌های متنی که به صورت موقت ذخیره می‌شن

---

## 🔐 Security Notes
- Admin panel can be protected with basic authentication (username/password).
- Do **not** expose `.txt` files directly — ideally, place them in a non-public directory or use `.htaccess` to prevent direct access.

## ⚠️ نکات امنیتی
- پنل مدیریت را با رمز عبور محافظت کنید (Basic Auth).
- فایل‌های `.txt` را در دسترس مستقیم کاربران قرار ندهید.

---

## 🧪 How to Use
1. Open `admin.php` in your browser.
2. Paste the text you want to share.
3. Get a unique link and share it with others.
4. The link will expire in 10 minutes.

---

## 🚀 License
This project is open-source and free to use under the MIT License.
