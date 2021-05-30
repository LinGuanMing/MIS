<div class="container">
    <br>
    <h1>部門資料修改</h1>
    <div class="row justify-content-center">
        <form method="post" id="update_user" name="update_user" action="<?= base_url('/updateOrg') ?>">
            <div class="form-group row">
                <label class="col-md-4 col-form-label">OrgID*</label>
                <div class="col-md-8">
                    <input type="text" name="OrgID" id="OrgID" class="form-control" value="<?php echo $org_obj['OrgID']; ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-4 col-form-label">OrgName*</label>
                <div class="col-md-8">
                    <input type="text" name="OrgName" id="OrgName" class="form-control" value="<?php echo $org_obj['OrgName']; ?>" required> 
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-4 col-form-label">MgrID</label>
                <div class="col-md-8">
                    <input type="text" name="MgrID" id="MgrID" class="form-control" value="<?php echo $org_obj['MgrID']; ?>">
                </div>
            </div>

            <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">更新資料</button>
            </div>
        </form>
    </div>
</div>