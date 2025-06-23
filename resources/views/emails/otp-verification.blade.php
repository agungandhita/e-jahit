<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Verifikasi OTP</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: linear-gradient(135deg, #f59e0b, #ea580c); color: white; padding: 20px; text-align: center; border-radius: 8px 8px 0 0; }
        .content { background: #f9f9f9; padding: 30px; border-radius: 0 0 8px 8px; }
        .otp-code { background: #fff; border: 2px solid #f59e0b; padding: 20px; text-align: center; margin: 20px 0; border-radius: 8px; }
        .otp-number { font-size: 32px; font-weight: bold; color: #f59e0b; letter-spacing: 5px; }
        .footer { text-align: center; margin-top: 20px; color: #666; font-size: 14px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>E-Jahit</h1>
            <p>Verifikasi Email Anda</p>
        </div>
        <div class="content">
            <h2>Halo, {{ $userName }}!</h2>
            <p>Terima kasih telah mendaftar di E-Jahit. Untuk melengkapi proses registrasi, silakan masukkan kode OTP berikut:</p>
            
            <div class="otp-code">
                <p>Kode Verifikasi OTP Anda:</p>
                <div class="otp-number">{{ $otpCode }}</div>
            </div>
            
            <p><strong>Penting:</strong></p>
            <ul>
                <li>Kode OTP ini berlaku selama 10 menit</li>
                <li>Jangan bagikan kode ini kepada siapa pun</li>
                <li>Jika Anda tidak merasa mendaftar, abaikan email ini</li>
            </ul>
            
            <p>Jika Anda mengalami kesulitan, silakan hubungi tim support kami.</p>
        </div>
        <div class="footer">
            <p>&copy; 2024 E-Jahit. Semua hak dilindungi.</p>
        </div>
    </div>
</body>
</html>