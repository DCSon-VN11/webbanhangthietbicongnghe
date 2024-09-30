<body>
    <!-- footer -->
    <div class="footer">
        <div class="container d-flex m-auto gx-0" style="width: 80%;">
            <div class="w-25 m-3">
                <div>
                    <p>Tổng đài hỗ trợ miễn phí</p>
                    <ul>
                        <li>Gọi mua hàng <span style="font-weight: bold;">0123456789</span> (7h30 - 22h00)</li>
                        <li>Gọi khiếu nại,huỷ đơn hàng <span style="font-weight: bold;">0123456789</span> (8h00 - 21h30)</li>
                        <li>Gọi bảo hành <span style="font-weight: bold;">0123456789</span> (8h00 - 21h00)</li>
                    </ul>
                </div>
                <div style="margin-top: -10px;">
                    <p style="margin-bottom: 0;">Đăng ký nhân tin Khuyến mãi</p>
                    * Nhận ngay voucher 10%
                    <span style="color: red;">
                        <br>*chỉ áp dụng cho khách hàng mới
                    </span>
                    <form>
                        <div class="mb-1 mt-2">
                            <input type="email" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="Email">
                        </div>
                        <div class="mb-0">
                            <input type="tel" class="form-control" id="exampletel1" placeholder="Số điện thoại">
                        </div>
                        <div class="mb-0 form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1" checked>
                            <label class="form-check-label" for="exampleCheck1" style="font-size: 13px;color: red;">Tôi
                                đồng ý với điều khoản của CSphone</label>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Đăng ký ngay</button>
                    </form>
                </div>
            </div>
            <div class="w-25 m-3">
                <div>
                    <p>Thông tin và chính sách</p>
                    <ul>
                        <li>Mua hàng và thanh toán Online</li>
                        <li>Mua hàng trả góp Online</li>
                        <li>Mua hàng trả góp bằng thẻ tín dụng</li>
                        <li>Chính sách giao hàng</li>
                        <li>Tra thông tin bảo hành</li>
                        <li>Tra cứu hoá đơn điện tử</li>
                        <li>Thông tin hoá đơn mua hàng</li>
                        <li>Trung tâm bảo hành chính hãng</li>
                    </ul>
                </div>
            </div>
            <div class="w-25 m-3">
                <div>
                    <p>Thông tin và chính sách</p>
                    <ul>
                        <li>Mua hàng và thanh toán Online</li>
                        <li>Mua hàng trả góp Online</li>
                        <li>Mua hàng trả góp bằng thẻ tín dụng</li>
                        <li>Chính sách giao hàng</li>
                        <li>Tra thông tin bảo hành</li>
                        <li>Tra cứu hoá đơn điện tử</li>
                        <li>Thông tin hoá đơn mua hàng</li>
                        <li>Trung tâm bảo hành chính hãng</li>
                    </ul>
                </div>
            </div>
            <div class="w-25 m-3">
                <div>
                    <p>Kết nối với CSphone</p>
                    <ul class="d-flex">
                        <li><img src="../webbanhang/image/iconlogo/cellphones-youtube.png" alt=""></li>
                        <li><img src="../webbanhang/image/iconlogo/cellphones-facebook.png" alt=""></li>
                        <li><img src="../webbanhang/image/iconlogo/cellphones-instagram.png" alt=""></li>
                        <li><img src="../webbanhang/image/iconlogo/cellphones-tiktok.png" alt=""></li>
                        <li><img src="../webbanhang/image/iconlogo/cellphones-zalo.png" alt=""></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="w-100">
            <p style="text-align: center;font-size: 12px;font-weight: 100;margin: 0;">
                Công ty TNHH Thương Mại Tổng Hợp HTV- GPĐKKD: 0108075931 cấp tại Sở KH & ĐT TP. Hà Nội. Địa chỉ văn
                phòng: 543 Nguyễn Trãi, phường Thanh Xuân Nam. quận Thanh Xuân, Thành phố Hà Nội, Việt Nam. Điện thoại:
                0123456789.
            </p>
        </div>
    </div>
    <!-- end-footer -->
    <script>
        window.addEventListener('beforeunload', function(event) {
            sessionStorage.setItem('scrollPosition', window.scrollY);
            sessionStorage.setItem('scrollUrl', window.location.href);
            var modalIsOpen = $('#exampleModal2').hasClass('show');
            sessionStorage.setItem('modalIsOpen', modalIsOpen);
        });
        window.addEventListener('load', function() {
            var scrollPosition = sessionStorage.getItem('scrollPosition');
            var savedUrl = sessionStorage.getItem('scrollUrl');
            if (scrollPosition && savedUrl === window.location.href) {
                window.scrollTo(0, parseInt(scrollPosition));
                sessionStorage.removeItem('scrollPosition');
                sessionStorage.removeItem('scrollUrl');
                var modalIsOpen = sessionStorage.getItem('modalIsOpen') === 'true';
                if (modalIsOpen) {
                    $('#exampleModal2').modal('show');
                    sessionStorage.removeItem('modalIsOpen');
                }
            }
        });
    </script>
</body>