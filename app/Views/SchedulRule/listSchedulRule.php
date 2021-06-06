<div class="container">	
    <div class="row">		
        <div class="col-12">		
            <div class="col-md-12">
				<br>
                <h1>員工班別維護<br>
                    <div class="float-right"><a href="<?php echo base_url('/addSchedulRule') ?>" class="btn btn-primary" data-toggle="SchedulRuleModal" data-target="#addSchedulRuleModal"><span class="fa fa-plus"></span>新增</a></div><br>
                </h1>
            </div>
            <table class="table table-striped" id="schedulRuleListing">
                <thead>
                    <tr>
						<th style="text-align: center;">員工編號</th>
						<th style="text-align: center;">部門</th>
                        <th style="text-align: center;">班別</th>
						<th style="text-align: center;">開始時間</th>
						<th style="text-align: center;">結束時間</th>
						<th style="text-align: center;">異動時間</th>
                        <th style="text-align: center;">操作</th>
                    </tr>
                </thead>
                <tbody id="listRecords">
                    <?php if($scheduls): ?>
                    <?php foreach($scheduls as $schedul): ?>
                    <tr>
                        <td style="text-align: center;"><?php echo $schedul['EmpID']; ?></td>
                        <td style="text-align: center;"><?php echo $schedul['OrgID'].($schedul['OrgID'] != "" ? ' ('.$schedul['OrgName'].')' : ""); ?></td>
                        <td style="text-align: center;"><?php echo $schedul['DutyID']; ?></td>
                        <td style="text-align: center;"><?php echo $schedul['From_Time']; ?></td>
                        <td style="text-align: center;"><?php echo $schedul['End_Time']; ?></td>
                        <td style="text-align: center;"><?php echo $schedul['TXDate']; ?></td>
                        <td style="text-align: center;">
                        <a href="<?php echo base_url('editSchedulRule/'.$schedul['EmpID']); ?>" class="btn btn-primary btn-sm">編輯</a>
                        <a href="<?php echo base_url('deleteSchedulRule/'.$schedul['EmpID']); ?>" class="btn btn-danger btn-sm">刪除</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>