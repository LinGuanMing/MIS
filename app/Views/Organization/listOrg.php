<div class="container">	
    <div class="row">		
        <div class="col-12">		
            <div class="col-md-12">
				<br>
                <h1>部門資料維護<br>
                    <div class="float-right"><a href="<?php echo base_url('/addOrg') ?>" class="btn btn-primary" data-toggle="OrgModal" data-target="#addOrgModal"><span class="fa fa-plus"></span>新增</a></div><br>
                </h1>
            </div>
            <table class="table table-striped" id="organizationListing">
                <thead>
                    <tr>
                        <th style="text-align: center;">部門編號</th>
						<th style="text-align: center;">部門名稱</th>
						<th style="text-align: center;">主管</th>
                        <th style="text-align: center;">操作</th>
                    </tr>
                </thead>
                <tbody id="listRecords">
                    <?php if($orgs): ?>
                    <?php foreach($orgs as $org): ?>
                    <tr>
                        <td style="text-align: center;"><?php echo $org['OrgID']; ?></td>
                        <td style="text-align: center;"><?php echo $org['OrgName']; ?></td>
                        <td style="text-align: center;"><?php echo $org['MgrID']; ?></td>
                        <td style="text-align: center;">
                        <a href="<?php echo base_url('editOrg/'.$org['OrgID']); ?>" class="btn btn-primary btn-sm">編輯</a>
                        <a href="<?php echo base_url('deleteOrg/'.$org['OrgID']); ?>" class="btn btn-danger btn-sm">刪除</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>