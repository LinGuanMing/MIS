<div class="container">	
    <div class="row">		
        <div class="col-12">		
            <div class="col-md-12">
				<br>
                <h1>出勤資料表<br>
                    <!-- <div class="float-right"><a href="<?php echo base_url('/addDuty') ?>" class="btn btn-primary" data-toggle="DutyModal" data-target="#addDutyModal"><span class="fa fa-plus"></span>新增</a></div> -->
                    <br>
                </h1>
            </div>
            <table class="table table-striped" id="dutyListing">
                <thead>
                    <tr>
                        <th style="text-align: center;">員工編號</th>
						<th style="text-align: center;">員工姓名</th>
                        <th style="text-align: center;">部門</th>
						<th style="text-align: center;">班別</th>
						<th style="text-align: center;">上班打卡時間</th>
                        <th style="text-align: center;">下班打卡時間</th>
                        <th style="text-align: center;">操作</th>
                    </tr>
                </thead>
                <tbody id="listRecords">
                    <?php if($dutys): ?>
                    <?php foreach($dutys as $duty): ?>
                    <tr>
                        <td style="text-align: center;"><?php echo $duty['EmpID']; ?></td>
                        <td style="text-align: center;"><?php echo $duty['EmpName']; ?></td>
                        <td style="text-align: center;"><?php echo $duty['OrgID'].($duty['OrgID'] != "" ? ' ('.$duty['OrgName'].')' : ""); ?></td>
                        <td style="text-align: center;"><?php echo $duty['DutyID'].($duty['DutyName'] != "" ? ' ('.$duty['DutyName'].')' : ""); ?></td>
                        <td style="text-align: center;"><?php echo $duty['ActualOnDutyTime']; ?></td>
                        <td style="text-align: center;"><?php echo $duty['ActualOffDutyTime']; ?></td>
                        <td style="text-align: center;">
                        <!-- <a href="<?php echo base_url('editDuty/'.$duty['EmpID'].'/'.$duty['ActualOnDutyTime']); ?>" class="btn btn-primary btn-sm">編輯</a> -->
                        <a href="<?php echo base_url('deleteDuty/'.$duty['EmpID'].'/'.$duty['ActualOnDutyTime']); ?>" class="btn btn-danger btn-sm">刪除</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>