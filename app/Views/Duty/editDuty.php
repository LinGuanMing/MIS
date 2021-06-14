<div class="container">
    <br>
    <h1>出勤資料修改</h1>
    <div class="row justify-content-center">
        <form method="post" id="update_user" name="update_user" action="<?= base_url('/updateDuty') ?>">
            <div class="form-group row">
                <label class="col-md-4 col-form-label">EmpID*</label>
                <div class="col-md-8">
                    <input type="text" name="EmpID" id="EmpID" class="form-control" value="<?php echo $duty_obj['EmpID']; ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-4 col-form-label">EmpName*</label>
                <div class="col-md-8">
                    <input type="text" name="EmpName" id="EmpName" class="form-control" value="<?php echo $duty_obj['EmpName']; ?>" required> 
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-4 col-form-label">OrgID</label>
                <div class="col-md-8">
                    <input type="text" name="OrgID" id="OrgID" class="form-control" value="<?php echo $duty_obj['OrgID']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-4 col-form-label">DutyID*</label>
                <div class="col-md-8">
                    <input type="text" name="DutyID" id="DutyID" class="form-control" value="<?php echo $duty_obj['DutyID']; ?>" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-4 col-form-label">ActualOnDutyTime*</label>
                <div class="col-md-8">
                    <input type="text" name="ActualOnDutyTime" id="ActualOnDutyTime" class="form-control" value="<?php echo $duty_obj['ActualOnDutyTime']; ?>" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-4 col-form-label">ActualOffDutyTime</label>
                <div class="col-md-8">
                    <input type="text" name="ActualOffDutyTime" id="ActualOffDutyTime" class="form-control" value="<?php echo $duty_obj['ActualOffDutyTime']; ?>">
                </div>
            </div>

            <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">更新資料</button>
            </div>
        </form>
    </div>
</div>