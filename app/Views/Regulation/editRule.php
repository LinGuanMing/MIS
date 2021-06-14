<div class="container">
    <br>
    <h1>設定檔修改</h1>
    <div class="row justify-content-center">
        <form method="post" id="update_user" name="update_user" action="<?= base_url('/updateRule') ?>">
            <div class="form-group row">
                <label class="col-md-4 col-form-label">RuleKind*</label>
                <div class="col-md-8">
                    <input type="text" name="RuleKind" id="RuleKind" class="form-control" value="<?php echo $reg_obj['RuleKind']; ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-4 col-form-label">RuleID*</label>
                <div class="col-md-8">
                    <input type="text" name="RuleID" id="RuleID" class="form-control" value="<?php echo $reg_obj['RuleID']; ?>" readonly> 
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-4 col-form-label">RuleValue1</label>
                <div class="col-md-8">
                    <input type="text" name="RuleValue1" id="RuleValue1" class="form-control" value="<?php echo $reg_obj['RuleValue1']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-4 col-form-label">RuleValue2</label>
                <div class="col-md-8">
                    <input type="text" name="RuleValue2" id="RuleValue2" class="form-control" value="<?php echo $reg_obj['RuleValue2']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-4 col-form-label">RuleValue3</label>
                <div class="col-md-8">
                    <input type="text" name="RuleValue3" id="RuleValue3" class="form-control" value="<?php echo $reg_obj['RuleValue3']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-4 col-form-label">RuleValue4</label>
                <div class="col-md-8">
                    <input type="text" name="RuleValue4" id="RuleValue4" class="form-control" value="<?php echo $reg_obj['RuleValue4']; ?>">
                </div>
            </div>

            <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">更新資料</button>
            </div>
        </form>
    </div>
</div>