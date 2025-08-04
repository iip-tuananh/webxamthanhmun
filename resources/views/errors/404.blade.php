<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>404 - Không tìm thấy trang</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font & Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <style>
        body {
            margin: 0;
            font-family: 'Roboto', sans-serif;
            background-color: #f4f6f9;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .error-container {
            text-align: center;
            max-width: 500px;
            padding: 30px;
        }
        .error-container img {
            width: 200px;
            margin-bottom: 20px;
        }
        .error-container h1 {
            font-size: 72px;
            margin-bottom: 10px;
            color: #007bff;
        }
        .error-container p {
            font-size: 18px;
            margin-bottom: 30px;
        }
        .error-container a {
            display: inline-block;
            padding: 12px 24px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            font-weight: bold;
            transition: background 0.3s ease;
        }
        .error-container a:hover {
            background-color: #0056b3;
        }
        .error-icon {
            font-size: 80px;
            color: #dc3545;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

<div class="error-container">
    <div class="error-icon"><i class="fas fa-triangle-exclamation"></i></div>
    <img src="https://cdn-icons-png.flaticon.com/512/2748/2748558.png" alt="404">
    <h1>404</h1>
    <p>Xin lỗi, trang bạn tìm kiếm không tồn tại hoặc đã bị xóa.</p>
    <a href="{{ route('front.home-page') }}"><i class="fas fa-home me-1"></i> Quay về trang chủ</a>
</div>

</body>
</html>
