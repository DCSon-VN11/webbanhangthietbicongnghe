<body>
    <div class="d-flex align-items-center justify-content-center w-100">
        <span style="font-weight:bold;font-size:30px;">Thông tin người dùng</span>
    </div>
    <form class="mx-auto mt-5" action="" method="post" style="width:50%">
        <div class="d-flex justify-content-between mt-3">
            <div style="width: 30%;">
                <label>Họ và tên: </label>
            </div>
            <div style="width:60%">
                <label class="info-label"><?php echo $_SESSION['ttnd']['TenNguoiDung']; ?></label>
                <input name="ten" class="rounded info-input" type="text" value="<?php echo $_SESSION['ttnd']['TenNguoiDung']; ?>" hidden>
            </div>
            <button type="button" class="edit-btn border-0 bg-white"><i class="bi bi-pencil-square"></i></button>
        </div>
        <hr style="height:2px; margin: 10px 0 15px; background-color: #cfcece; border:none;">

        <div class="d-flex justify-content-between mt-3">
            <div style="width: 30%;">
                <label>Giới tính: </label>
            </div>
            <div style="width:60%">
                <label class="info-label"><?php echo $_SESSION['ttnd']['Gioitinh']; ?></label>
                <input name="gt" class="rounded info-input" type="text" value="<?php echo $_SESSION['ttnd']['Gioitinh']; ?>" hidden>
            </div>
            <button type="button" class="edit-btn border-0 bg-white"><i class="bi bi-pencil-square"></i></button>
        </div>
        <hr style="height:2px; margin: 10px 0 15px; background-color: #cfcece; border:none;">

        <div class="d-flex justify-content-between mt-3">
            <div style="width: 30%;">
                <label>Ngày sinh: </label>
            </div>
            <div style="width:60%">
                <label class="info-label"><?php echo date('Y-m-d', strtotime($_SESSION['ttnd']['Ngaysinh'])); ?></label>
                <input name="ns" class="rounded info-input" type="text" value="<?php echo date('Y-m-d', strtotime($_SESSION['ttnd']['Ngaysinh'])); ?>" hidden>
            </div>
            <button type="button" class="edit-btn border-0 bg-white"><i class="bi bi-pencil-square"></i></button>
        </div>
        <hr style="height:2px; margin: 10px 0 15px; background-color: #cfcece; border:none;">

        <div class="d-flex justify-content-between mt-3">
            <div style="width: 30%;">
                <label>Số điện thoại: </label>
            </div>
            <div style="width:60%">
                <label class="info-label"><?php echo $_SESSION['ttnd']['Sodienthoai']; ?></label>
                <input name="sdt" class="rounded info-input" type="text" value="<?php echo $_SESSION['ttnd']['Sodienthoai']; ?>" hidden>
            </div>
            <button type="button" class="edit-btn border-0 bg-white"><i class="bi bi-pencil-square"></i></button>
        </div>
        <hr style="height:2px; margin: 10px 0 15px; background-color: #cfcece; border:none;">

        <div class="d-flex justify-content-between mt-3">
            <div style="width: 30%;">
                <label>Địa chỉ: </label>
            </div>
            <div style="width:60%">
                <label class="info-label"><?php echo $_SESSION['ttnd']['Diachi']; ?></label>
                <input name="dc" class="rounded info-input" type="text" value="<?php echo $_SESSION['ttnd']['Diachi']; ?>" hidden>
            </div>
            <button type="button" class="edit-btn border-0 bg-white"><i class="bi bi-pencil-square"></i></button>
        </div>
        <hr style="height:2px; margin: 10px 0 15px; background-color: #cfcece; border:none;">

        <div class="d-flex justify-content-between mt-3">
            <div style="width: 30%;">
                <label>Email: </label>
            </div>
            <div style="width:60%">
                <label class="info-label"><?php echo $_SESSION['ttnd']['Email']; ?></label>
                <input name="email" class="rounded info-input" type="text" value="<?php echo $_SESSION['ttnd']['Email']; ?>" hidden>
            </div>
            <button type="button" class="edit-btn border-0 bg-white"><i class="bi bi-pencil-square"></i></button>
        </div>
        <hr style="height:2px; margin: 10px 0 15px; background-color: #cfcece; border:none;">

        <div class="d-flex justify-content-between mt-3">
            <div style="width: 30%;">
                <label>Ngày tham gia: </label>
            </div>
            <div style="width:60%">
                <label class="info-label"><?php echo $_SESSION['tkkh']['NgayTao']; ?></label>
            </div>
            <button disabled type="button" class="border-0 bg-white"><i class="bi bi-pencil-square"></i></button>
        </div>
        <hr style="height:2px; margin: 10px 0 15px; background-color: #cfcece; border:none;">

        <button name="dtt" id="submitBtn" disabled class="btn btn-primary mt-5 w-100">Đổi thông tin</button>
    </form>
    <?php
    if (isset($_POST['dtt'])) {
        $up = $get->up_tt_id($_SESSION['ttnd']['UserID'], $_POST['ten'], $_POST['gt'], $_POST['ns'], $_POST['sdt'], $_POST['dc'], $_POST['email']);
        if ($up) {
            $up = $get->up_tk_id_username($_SESSION['ttnd']['UserID'], $_POST['email'], 2);
            $_SESSION['ttnd'] = [
                'UserID' => $_SESSION['ttnd']['UserID'],
                'TenNguoiDung' => $_POST['ten'],
                'Gioitinh' => $_POST['gt'],
                'Ngaysinh' => $_POST['ns'],
                'Sodienthoai' => $_POST['sdt'],
                'Diachi' => $_POST['dc'],
                'Email' => $_POST['email']
            ];
            echo "<script>alert('Thành công')</script>";
        } else
            echo "<script>alert('Không thành công')</script>";
        echo "<script>window.location='user.php';</script>";
    }
    ?>
    <script>
        const editButtons = document.querySelectorAll('.edit-btn');
        const submitBtn = document.getElementById('submitBtn');

        editButtons.forEach(button => {
            button.addEventListener('click', function() {
                const parent = this.parentElement;
                const input = parent.querySelector('.info-input');
                const label = parent.querySelector('.info-label');

                // Toggle hidden status
                input.hidden = !input.hidden;
                label.hidden = !label.hidden;

                // Set input value to label text when input is shown
                if (!input.hidden) {
                    input.value = label.textContent;
                }

                // Check if any input field is shown
                toggleSubmitButton();
            });
        });

        function toggleSubmitButton() {
            // Enable the button if any input field is visible
            const anyInputVisible = [...document.querySelectorAll('.info-input')].some(input => !input.hidden);
            submitBtn.disabled = !anyInputVisible;
        }
    </script>
</body>