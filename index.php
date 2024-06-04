<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // メールの内容を設定
    $to = 'kokochi.0207@gmail.com'; // 送信先のメールアドレスに変更してください
    $subject = 'お問い合わせフォームからのメッセージ';
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // メール本文を作成
    $email_body = "名前: $name\n";
    $email_body .= "メールアドレス: $email\n\n";
    $email_body .= "メッセージ:\n$message\n";

    // メール送信
    if (mail($to, $subject, $email_body, $headers)) {
        echo "お問い合わせありがとうございます。メッセージが送信されました。";
    } else {
        echo "申し訳ありませんが、メッセージの送信に失敗しました。後ほど再度お試しください。";
    }
} else {
    echo "不正なリクエストです。";
}