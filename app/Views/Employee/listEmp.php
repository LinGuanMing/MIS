<div class="container">	
    <div class="row">		
        <div class="col-12">		
            <div class="col-md-12">
				<br>
                <h1>員工資料維護<br>
                    <div class="float-right"><a href="<?php echo base_url('/addEmp') ?>" class="btn btn-primary" data-toggle="EmpModal" data-target="#addEmpModal"><span class="fa fa-plus"></span>新增</a></div><br>
                </h1>
            </div>
            <table class="table table-striped" id="employeeListing">
                <thead>
                    <tr>
                        <th style="text-align: center;">員工編號</th>
						<th style="text-align: center;">員工姓名</th>
                        <th style="text-align: center;">部門</th>
						<th style="text-align: center;">聯絡電話</th>
						<th style="text-align: center;">主管</th>
                        <th style="text-align: center;">操作</th>
                    </tr>
                </thead>
                <tbody id="listRecords">
                    <?php if($emps): ?>
                    <?php foreach($emps as $emp): ?>
                    <tr>
                        <td style="text-align: center;"><?php echo $emp['EmpID']; ?></td>
                        <td style="text-align: center;"><?php echo $emp['EmpName']; ?></td>
                        <td style="text-align: center;"><?php echo $emp['OrgID'].($emp['OrgID'] != "" ? ' ('.$emp['OrgName'].')' : ""); ?></td>
                        <td style="text-align: center;"><?php echo $emp['Phone']; ?></td>
                        <td style="text-align: center;"><?php echo ($emp['MgrID'] != $emp['EmpID']) ? $emp['MgrID'] : "" ; ?></td>
                        <td style="text-align: center;">
                        <a href="<?php echo base_url('editEmp/'.$emp['EmpID']); ?>" class="btn btn-primary btn-sm">編輯</a>
                        <a href="<?php echo base_url('deleteEmp/'.$emp['EmpID']); ?>" class="btn btn-danger btn-sm">刪除</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>