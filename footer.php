<!--newsletter strat -->
<section id="newsletter"  class="newsletter">
	<div class="container">
		<div class="hm-footer-details">
			<div class="row">
				<div class=" col-md-3 col-sm-6 col-xs-12">
					<div class="hm-footer-widget">
						<div class="hm-foot-title">
							<h4>ChillEnglish</h4>
						</div><!--/.hm-foot-title-->
						<div class="hm-foot-menu">
							<ul>
								<p>Phá bỏ rào cản ngôn ngữ, mở cửa tương lai cùng ChillEnglish</p>
							</ul><!--/ul-->
						</div><!--/.hm-foot-menu-->
					</div><!--/.hm-footer-widget-->
				</div><!--/.col-->
				<div class=" col-md-3 col-sm-6 col-xs-12">
					<div class="hm-footer-widget">
						<div class="hm-foot-title">
							<h4>Thông tin</h4>
						</div><!--/.hm-foot-title-->
						<div class="hm-foot-menu">
							<ul>
								<li><a href="/WEB_MXH/user/index.php">Trang chủ</a></li><!--/li-->
								<li><a href="/WEB_MXH/user/new-arrivals.php">Khóa học</a></li><!--/li-->
								<li><a href="/WEB_MXH/user/Artists/Artists.php">Giảng viên</a></li><!--/li-->
								<li><a href="/WEB_MXH/user/genre/genres.php">Lĩnh vực</a></li><!--/li-->
								<li><a href="/WEB_MXH/user/accessories.php">Tài liệu</a></li><!--/li-->
							</ul><!--/ul-->
						</div><!--/.hm-foot-menu-->
					</div><!--/.hm-footer-widget-->
				</div><!--/.col-->
				<div class=" col-md-3 col-sm-6 col-xs-12">
					<div class="hm-footer-widget">
						<div class="hm-foot-title">
							<h4>Chính sách</h4>
						</div><!--/.hm-foot-title-->
						<div class="hm-foot-menu">
							<ul>
								<p>Thông tin cá nhân của người dùng được bảo vệ nghiêm ngặt theo tiêu chuẩn mã hóa quốc tế. Đồng thời, đội ngũ giảng viên và hỗ trợ kỹ thuật luôn sẵn sàng đồng hành 24/7 để giải đáp mọi thắc mắc trong suốt quá trình tiếp thu kiến thức.</p>
							</ul><!--/ul-->
						</div><!--/.hm-foot-menu-->
					</div><!--/.hm-footer-widget-->
				</div><!--/.col-->
				<div class=" col-md-3 col-sm-6  col-xs-12">
					<div class="hm-footer-widget">
						<div class="hm-foot-title">
							<h4>Liên hệ</h4>
						</div><!--/.hm-foot-title-->
						<div class="hm-foot-para">
							<p>Nếu có bất kỳ câu hỏi, nhận xét nào hãy nhớ liên hệ với chúng tôi thông qua 0392003496</p>
						</div><!--/.hm-foot-para-->
					</div><!--/.hm-footer-widget-->
				</div><!--/.col-->
			</div><!--/.row-->
		</div><!--/.hm-footer-details-->

	</div><!--/.container-->

</section><!--/newsletter-->	
<!--newsletter end -->

<!--footer start-->
<footer id="footer"  class="footer">
	<div class="container">
		<div class="hm-footer-copyright text-center">
			<p>
				&copy; 2025 ChillEnglish. Tất cả quyền được bảo lưu. Thiết kế và phát triển bởi <a href="#">ChillEnglish Team</a>
			</p><!--/p-->
		</div><!--/.text-center-->
	</div><!--/.container-->

	<!-- Scroll to top button removed -->
	
</footer><!--/.footer-->
<!--footer end-->

<style>
/* Newsletter styles */
.newsletter{
    padding: 20px 0;  /* Giảm padding trên dưới */
    background: #7c6e78;
    min-height: 300px;  /* Thêm min-height để đảm bảo chiều cao tối thiểu */
    display: flex;
    align-items: center;
}
.newsletter, .newsletter * { color: #111 !important; }

/* Container và layout */
.newsletter .container { 
    padding-left: 15px;  /* Giảm padding */
    padding-right: 15px;
}
.newsletter .row {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin: 0 -15px;  /* Negative margin để cân bằng padding của columns */
}
.newsletter .col-md-3 {
    padding: 0 15px;  /* Padding đều cho các cột */
}

/* Widget styling */
.hm-footer-widget {
    margin-bottom: 0;  /* Bỏ margin bottom */
    height: 100%;  /* Chiều cao 100% để các cột bằng nhau */
}
.newsletter .hm-footer-widget:first-child { margin-left: 0; }  /* Reset margin left */

.hm-foot-title {
    margin-bottom: 15px;  /* Giảm margin dưới tiêu đề */
}
.hm-foot-title h4 {
    font-size: 18px;
    font-weight: 700;
    margin-bottom: 10px;
    text-align: left;
}

/* Menu và text content */
.hm-foot-menu ul, 
.hm-foot-para, 
.hm-foot-menu ul p {
    margin: 0;
    text-align: left;
    font-size: 14px;
    line-height: 1.6;
}

.hm-foot-menu ul li a {
    color: #111;
    font-size: 14px;
    font-weight: 400;
    margin-bottom: 8px;
    display: inline-block;
    transition: .3s;
}

.hm-foot-menu ul li a:hover {
    color: #e99c2e;
    transform: translateX(10px);
}

/* Footer styles */
.footer {
    background: #f8f9fd;
    padding: 20px 0;
    margin-top: 0;
}
.hm-footer-copyright p,
.hm-footer-copyright p a {
    color: #a5adb3;
    font-size: 14px;
    margin: 0;
}

/* Scroll to top styles removed */

/* Responsive adjustments */
@media (max-width: 991px) {
    .newsletter {
        padding: 30px 0;
    }
    .hm-footer-widget {
        margin-bottom: 30px;
    }
}
</style>
