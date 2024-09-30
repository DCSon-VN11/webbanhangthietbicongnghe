<?php
require_once 'header.php';
?>

<body>
    <div class="d-flex align-items-center container border rounded p-2" style="width:80%">
        <div>
            <img src="../webbanhang/image/image22.jpg" width="360px" height="260px" alt="">
        </div>
        <div class="ms-3">
            <div>
                <div class="w-100 d-flex justify-content-center">
                    <div>
                        <div class="w-100 d-flex justify-content-center">
                            <img src="../webbanhang/image/logo.jpg" width="50px" height="50px" alt="">
                        </div>
                        <div class="w-100 d-flex justify-content-center" style="font-weight:bold;font-size:20px">
                            200 Cửa hàng
                        </div>
                    </div>
                </div>
            </div>
            <div style="text-align: justify;">
                CSPhone là một chuỗi cửa hàng bán lẻ hàng đầu chuyên cung cấp các thiết bị công nghệ hiện đại và chất lượng. Với phương châm "Công nghệ trong tầm tay", CSPhone cam kết mang đến cho khách hàng những sản phẩm tiên tiến nhất từ các thương hiệu nổi tiếng như Apple, Samsung, Sony, Dell, HP và nhiều hơn nữa.
                Tại CSPhone, chúng tôi hiểu rằng mỗi khách hàng đều có nhu cầu và sở thích riêng biệt. Vì vậy, chúng tôi không ngừng nỗ lực đa dạng hóa các dòng sản phẩm từ điện thoại thông minh, máy tính bảng, laptop, đồng hồ thông minh đến các phụ kiện công nghệ độc đáo. Mỗi sản phẩm được bày bán tại CSPhone đều được kiểm tra kỹ lưỡng về chất lượng và nguồn gốc, đảm bảo đem lại sự hài lòng tuyệt đối cho khách hàng.
            </div>
        </div>
    </div>
    <div class="container border rounded p-2 mt-3" style="width:80%;background-color: rgb(243, 248, 253);">
        <div class="w-100 d-flex justify-content-center">
            <h1>Hệ thống cửa hàng</h1>
        </div>
        <div class="mt-4 d-flex">
            <input id="store-search" type="text" placeholder="Nhập vị trí cửa hàng" class="rounded border-1" style="width:35%;font-size:20px">
        </div>

        <div class="mt-2 d-flex">
            <div style="width:35%;background-color:#CEE3F6;height: 500px;">
                <div class="d-flex justify-content-center border" style="background-color:#81DAF5;height:25px">
                    Có&nbsp;<span id="store-count">0</span>&nbsp;cửa hàng
                </div>
                <div id="store-list" class="ms-1 overflow-x-hidden" style="overflow:auto;height:475px">
                    <!-- Danh sách cửa hàng sẽ được AJAX tải về -->
                    <div class="text-center" id="loading-message">Đang tải dữ liệu...</div>
                </div>
            </div>
            <div class="ms-3">
                <iframe id="map-iframe" src="" width="750" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
        <input type="hidden" id="selected-city" value="">
        <input type="hidden" id="selected-district" value="">
    </div>

    <script>
        $(document).ready(function() {
            // Khi nhập vào ô tìm kiếm
            $('#store-search').on('input', function() {
                var searchValue = $(this).val();
                loadStores(searchValue, $('#selected-city').val(), $('#selected-district').val());
            });

            // Hàm tải danh sách cửa hàng
            function loadStores(searchValue = '', city = '', district = '') {
                console.log('Tìm kiếm:', searchValue, 'Thành phố:', city, 'Huyện:', district);
                $('#loading-message').show(); // Hiện thông báo đang tải
                $.ajax({
                    url: 'data/search_stores.php',
                    method: 'POST',
                    data: {
                        search: searchValue,
                        city: city,
                        district: district
                    },
                    success: function(response) {
                        console.log('Phản hồi:', response);
                        $('#store-list').html(response.html);
                        $('#store-count').text(response.count);
                        $('#map-iframe').attr('src', response.map);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log('Error: ' + textStatus + ' - ' + errorThrown);
                        $('#store-list').html("<div class='text-center'>Đã xảy ra lỗi khi tải dữ liệu.</div>");
                    },
                    complete: function() {
                        $('#loading-message').hide(); // Ẩn thông báo khi hoàn thành
                    }
                });
            }

            // Mặc định hiển thị tất cả cửa hàng
            loadStores();
        });
    </script>


    <?php
    require_once 'footer.php';
    ?>
</body>