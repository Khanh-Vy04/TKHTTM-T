<?php
// 1. KẾT NỐI DATABASE
// Gọi file database.php của nhóm bạn vào đây
// Dùng require_once để đảm bảo file này bắt buộc phải có
try {
    require_once 'config/database.php';
} catch (Exception $e) {
    die("Lỗi: Không tìm thấy file cấu hình database.");
}

// Kiểm tra xem biến $conn có tồn tại không (đề phòng file database.php bị lỗi)
if (!isset($conn)) {
    die("Lỗi: Không thể kết nối đến cơ sở dữ liệu.");
}

// 2. LẤY ID KHÓA HỌC TỪ URL
if(isset($_GET['id']) && is_numeric($_GET['id'])){
    // Ép kiểu sang số nguyên để bảo mật (tránh hack SQL Injection cơ bản)
    $course_id = (int)$_GET['id'];
    
    // --- LƯU Ý QUAN TRỌNG: HÃY SỬA TÊN BẢNG Ở DÒNG DƯỚI ---
    // Ví dụ: Nếu bảng tên là 'tbl_course' thì sửa thành: SELECT * FROM tbl_course...
    $table_name = 'product'; // <--- SỬA TÊN BẢNG TẠI ĐÂY NẾU CẦN
    
    $sql = "SELECT * FROM $table_name WHERE id = $course_id";
    $result = $conn->query($sql); // Dùng cách gọi hàm query của đối tượng mysqli

    if ($result && $result->num_rows > 0) {
        $course = $result->fetch_assoc();
    } else {
        echo "<div style='text-align:center; padding:50px;'>Không tìm thấy khóa học này! <a href='index.php'>Quay lại</a></div>";
        exit();
    }
} else {
    // Nếu không có ID trên đường dẫn, chuyển hướng về trang chủ hoặc báo lỗi
    echo "<div style='text-align:center; padding:50px;'>Đường dẫn không hợp lệ!</div>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $course['title'] ?? $course['name']; ?> - Chi tiết khóa học</title>
    <style>
        * { box-sizing: border-box; }
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f9f9f9; margin: 0; padding: 0; }
        
        /* Container chính */
        .container { max-width: 1200px; margin: 30px auto; display: flex; gap: 30px; padding: 0 15px; }
        
        /* CỘT TRÁI (70%) */
        .left-column { flex: 7; background: #fff; padding: 30px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.05); }
        .course-title { font-size: 28px; color: #333; margin-bottom: 20px; border-bottom: 2px solid #eee; padding-bottom: 15px; }
        
        .section-box { margin-bottom: 30px; }
        .section-header { font-size: 18px; font-weight: bold; color: #2c3e50; margin-bottom: 10px; display: flex; align-items: center; }
        .section-header::before { content: ''; display: inline-block; width: 5px; height: 20px; background: #ff5722; margin-right: 10px; border-radius: 2px; }
        .content-text { line-height: 1.6; color: #555; text-align: justify; }
        
        /* CỘT PHẢI (30%) - Dính khi cuộn */
        .right-column { flex: 3; }
        .sticky-box { position: sticky; top: 20px; background: #fff; padding: 25px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); text-align: center; border: 1px solid #eee; }
        
        .course-img { width: 100%; height: auto; border-radius: 8px; margin-bottom: 20px; object-fit: cover; }
        
        .price-tag { font-size: 32px; color: #d32f2f; font-weight: bold; margin: 15px 0; }
        .price-label { font-size: 14px; color: #777; text-transform: uppercase; letter-spacing: 1px; }
        
        .btn-buy { 
            display: block; width: 100%; padding: 15px; 
            background: linear-gradient(to right, #ff5722, #ff8a65);
            color: white; font-size: 18px; font-weight: bold; text-transform: uppercase;
            text-decoration: none; border: none; border-radius: 50px; cursor: pointer;
            box-shadow: 0 4px 6px rgba(255, 87, 34, 0.3); transition: transform 0.2s;
        }
        .btn-buy:hover { transform: translateY(-2px); box-shadow: 0 6px 12px rgba(255, 87, 34, 0.4); }
        
        .guarantee { font-size: 13px; color: #666; margin-top: 15px; display: flex; justify-content: center; gap: 10px; }
        
        /* Responsive cho điện thoại */
        @media (max-width: 768px) {
            .container { flex-direction: column; }
            .right-column { order: -1; /* Đưa nút mua lên đầu trên mobile */ }
            .sticky-box { position: static; }
        }
    </style>
</head>
<body>

    <?php // include 'includes/header.php'; ?>

    <div class="container">
        
        <div class="left-column">
            <h1 class="course-title"><?php echo $course['title'] ?? $course['name']; ?></h1>

            <div class="section-box">
                <div class="section-header">Giới thiệu khóa học</div>
                <div class="content-text">
                    <?php echo $course['description']; ?>
                </div>
            </div>

            <div class="section-box">
                <div class="section-header">Lộ trình học</div>
                <div class="content-text">
                    <p>Khóa học này bao gồm các bài giảng chi tiết từ cơ bản đến nâng cao.</p>
                </div>
            </div>

            <div class="section-box">
                <div class="section-header">Quyền lợi học viên</div>
                <div class="content-text">
                    <ul>
                        <li>Truy cập trọn đời</li>
                        <li>Hỗ trợ trực tuyến 24/7</li>
                        <li>Cấp chứng chỉ hoàn thành</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="right-column">
            <div class="sticky-box">
                <img src="uploads/<?php echo $course['image'] ?? 'default.jpg'; ?>" alt="Khóa học" class="course-img">
                
                <p class="price-label">Giá ưu đãi</p>
                <div class="price-tag"><?php echo number_format($course['price']); ?> đ</div>
                
                <form action="checkout.php" method="GET">
                    <input type="hidden" name="course_id" value="<?php echo $course['id']; ?>">
                    <button type="submit" class="btn-buy">Đăng ký ngay</button>
                </form>
                
                <div class="guarantee">
                    <span>🛡️ Bảo mật</span>
                    <span>⚡ Kích hoạt ngay</span>
                </div>
            </div>
        </div>

    </div>

    <?php // include 'includes/footer.php'; ?>

</body>
</html>
