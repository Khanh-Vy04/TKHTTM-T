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
