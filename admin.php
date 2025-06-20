<?php
$username = 'USERNAME_HERE';
$password = 'PASSWORD_HERE';

if (!isset($_SERVER['PHP_AUTH_USER']) ||
    $_SERVER['PHP_AUTH_USER'] !== $username ||
    $_SERVER['PHP_AUTH_PW'] !== $password) {
    header('WWW-Authenticate: Basic realm="Admin Panel"');
    header('HTTP/1.0 401 Unauthorized');
    echo '🔒 Unauthorized';
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $text = trim($_POST['text'] ?? '');
    if ($text === '') {
        die("⚠️ متن خالی است.");
    }

    $id = bin2hex(random_bytes(3)); //هرچی عدد بیشتر رمز پیچیده تر
    $filename = __DIR__ . "/data/$id.txt";

    $data = json_encode([
        'text' => $text,
        'expire_at' => time() + 600 //حذف متن بعد از ۱۰ دقیقه(میتونید بیشتر یا کمترش کنید)
    ], JSON_UNESCAPED_UNICODE);

    file_put_contents($filename, $data);

    echo "<p>✅ کد تولید شده: <strong>$id</strong></p>";
    echo "<hr><a href='admin.php'>بازگشت</a>";
    exit;
}
?>

<form method="POST">
    <textarea name="text" rows="12" cols="70" placeholder="متن خود را وارد کنید"></textarea><br>
    <button type="submit">ایجاد کد</button>
</form>
