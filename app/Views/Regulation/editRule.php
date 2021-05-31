<div class="container">
    <br>
    <h1>部門資料修改</h1>
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
                <label class="col-md-4 col-form-label">RuleValue</label>
                <div class="col-md-8">
                    <input type="text" name="RuleValue" id="RuleValue" class="form-control" value="<?php echo $reg_obj['RuleValue']; ?>">
                </div>
            </div>

            <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">更新資料</button>
            </div>
        </form>
    </div>
</div>