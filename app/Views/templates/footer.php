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
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
        <script type="text/javascript">
            $(function() {
                $('#form-data').on('submit', function(e) {
                    e.preventDefault();

                    var formData = new FormData(this);
                    var EMPID_input = $('input[id="EMPID"]');

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
                                EMPID_input.val('');
                                $.confirm({
                                    title: 'Success!',
                                    content: response.msg,
                                    type: 'green',
                                    typeAnimated: true,
                                    buttons: {
                                        tryAgain: {
                                            text: '確認',
                                            btnClass: 'btn-green'
                                        }
                                    }
                                });
                            } else {
                                $.confirm({
                                    title: 'Error!',
                                    content: 'Message：' + response.msg,
                                    type: 'orange',
                                    typeAnimated: true,
                                    buttons: {
                                        tryAgain: {
                                            text: '確認',
                                            btnClass: 'btn-orange'
                                        }
                                    }
                                });
                            }
                        },
                        error: function() {
                            $.confirm({
                                title: 'Error!',
                                type: 'orange',
                                typeAnimated: true,
                                buttons: {
                                    tryAgain: {
                                        text: '確認',
                                        btnClass: 'btn-orange'
                                    }
                                }
                            });
                        }
                    });
                });
            });

            $(document).ready(function() {
                var date_input=$('input[id="date"]'); //our date input has the name "date"
                var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
                var options={
                    format: 'yyyy/mm/dd',
                    container: container,
                    todayHighlight: true,
                    autoclose: true,
                };
                date_input.datepicker(options);
            });

            function current() {
                var today = new Date();
                str = '現在時間：';
                str += String(today.getFullYear()).padStart(4, '0') + '-'; // 西元年
                str += String(today.getMonth() + 1).padStart(2, '0') + '-'; // 月
                str += String(today.getDate()).padStart(2, '0') + ' '; // 日
                str += String(today.getHours()).padStart(2, '0') + ':'; // 時
                str += String(today.getMinutes()).padStart(2, '0') + ':'; // 分
                str += String(today.getSeconds()).padStart(2, '0'); // 秒
                return str;
            }
            setInterval(function(){$("#nowTime").html(current)}, 1000);
        </script>
    </body>
</html>