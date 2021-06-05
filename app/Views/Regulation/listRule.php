<div class="container">	
    <div class="row">		
        <div class="col-12">		
            <div class="col-md-12">
				<br>
                <h1>設定檔維護<br>
                    <div class="float-right"><a href="<?php echo base_url('/addRule') ?>" class="btn btn-primary" data-toggle="RuleModal" data-target="#addRuleModal"><span class="fa fa-plus"></span>新增</a></div><br>
                </h1>
            </div>
            <table class="table table-striped" id="regulationListing">
                <thead>
                    <tr>
                        <th style="text-align: center;">設定檔種類</th>
						<th style="text-align: center;">設定檔類別</th>
						<th style="text-align: center;">設定值</th>
                        <th style="text-align: center;">操作</th>
                    </tr>
                </thead>
                <tbody id="listRecords">
                    <?php if($regs): ?>
                    <?php foreach($regs as $reg): ?>
                    <tr>
                        <td style="text-align: center;"><?php echo $reg['RuleKind']; ?></td>
                        <td style="text-align: center;"><?php echo $reg['RuleID']; ?></td>
                        <td style="text-align: center;"><?php echo $reg['RuleValue']; ?></td>
                        <td style="text-align: center;">
                        <a href="<?php echo base_url('editRule/'.$reg['RuleKind'].'/'.$reg['RuleID']); ?>" class="btn btn-primary btn-sm">編輯</a>
                        <a href="<?php echo base_url('deleteRule/'.$reg['RuleKind'].'/'.$reg['RuleID']); ?>" class="btn btn-danger btn-sm">刪除</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>