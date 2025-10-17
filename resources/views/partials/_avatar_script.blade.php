<script>
    document.addEventListener('DOMContentLoaded', function () {
        const avatar = document.getElementById('avatar'); // Đảm bảo có ID cho avatar
        const avatarInput = document.getElementById('avatarInput'); // Đảm bảo có ID cho input file
        const avatarForm = document.getElementById('avatarForm'); // Đảm bảo có ID cho form

        // Sự kiện click vào avatar để mở hộp thoại upload ảnh
        avatar.addEventListener('click', function () {
            avatarInput.click(); // Mở hộp thoại upload ảnh
        });

        // Khi người dùng chọn ảnh, submit form
        avatarInput.addEventListener('change', function () {
            if (avatarInput.files.length > 0) {
                avatarForm.submit(); // Submit form nếu có ảnh được chọn
            }
        });
    });
</script>
