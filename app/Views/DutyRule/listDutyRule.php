<div class="container">	
    <div class="row">		
        <div class="col-12">		
            <div class="col-md-12">
				<br>
                <h1>班別規則維護<br>
                    <div class="float-right"><a href="<?php echo base_url('/addDutyRule') ?>" class="btn btn-primary" data-toggle="DutyRuleModal" data-target="#addDutyRuleModal"><span class="fa fa-plus"></span>新增</a></div><br>
                </h1>
            </div>
            <table class="table table-striped" id="dutyRuleListing">
                <thead>
                    <tr>
                        <th style="text-align: center;">班別</th>
						<th style="text-align: center;">班別名稱</th>
						<th style="text-align: center;">上班時間</th>
						<th style="text-align: center;">下班時間</th>
                        <th style="text-align: center;">操作</th>
                    </tr>
                </thead>
                <tbody id="listRecords">
                    <?php if($dutys): ?>
                    <?php foreach($dutys as $duty): ?>
                    <tr>
                        <td style="text-align: center;"><?php echo $duty['DutyID']; ?></td>
                        <td style="text-align: center;"><?php echo $duty['DutyName']; ?></td>
                        <td style="text-align: center;"><?php echo $duty['RegularOnDutyTime']; ?></td>
                        <td style="text-align: center;"><?php echo $duty['RegularOffDutyTime']; ?></td>
                        <td style="text-align: center;">
                        <a href="<?php echo base_url('editDutyRule/'.$duty['DutyID']); ?>" class="btn btn-primary btn-sm">編輯</a>
                        <a href="<?php echo base_url('deleteDutyRule/'.$duty['DutyID']); ?>" class="btn btn-danger btn-sm">刪除</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>