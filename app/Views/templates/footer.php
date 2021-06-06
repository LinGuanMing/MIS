        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                Page rendered in {elapsed_time} seconds. Environment: <?= ENVIRONMENT ?>
            </div>
            <!-- Default to the left -->
            <strong>&copy; 2021 資料庫系統 - 第一組</strong>
        </footer>
        <script type="text/javascript" src="/js/jquery-3.2.1.min.js"></script>
        <!-- <script type="text/javascript" src="/js/jquery-1.19.2.validate.min.js"></script> -->
        <script type="text/javascript" src="/js/bootstrap.min.js"></script>
        <script type="text/javascript">
            $(function() {
                $('#form-data').on('submit', function(e) {
                    e.preventDefault();

                    var formData = new FormData(this);

                    $.ajax({
                        url: "<?= base_url('Login/attend') ?>",
                        type: "POST",
                        cache: false,
                        data: formData,
                        processData: false,
                        contentType: false,
                        dataType: "JSON",
                        success: function(response){
                            console.log(response);
                            //console.log(response.msg);
                            if (response.success) {
                                alert("簽到成功!");
                            } else {
                                alert("簽到失敗!\r\n" + "Error Message：" + response.msg);
                            }
                        },
                        error: function() {
                            alert("簽到失敗!");
                        }
                    });
                });
            });
        </script>
    </body>
</html>