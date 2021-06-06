<div class="container">
    <br>
    <h1>班別規則修改</h1>
    <div class="row justify-content-center">
        <form method="post" id="update_dutyRule" name="update_dutyRule" action="<?= base_url('/updateDutyRule') ?>">
            <div class="form-group row">
                <label class="col-md-6 col-form-label">DutyID*</label>
                <div class="col-md-6">
                    <input type="text" name="DutyID" id="DutyID" class="form-control" value="<?php echo $duty_obj['DutyID']; ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-6 col-form-label">DutyName*</label>
                <div class="col-md-6">
                    <input type="text" name="DutyName" id="DutyName" class="form-control" value="<?php echo $duty_obj['DutyName']; ?>" readonly> 
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-6 col-form-label">RegularOnDutyTime</label>
                <div class="col-md-6">
                    <input type="text" name="RegularOnDutyTime" id="RegularOnDutyTime" class="form-control" value="<?php echo $duty_obj['RegularOnDutyTime']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-6 col-form-label">RegularOffDutyTime</label>
                <div class="col-md-6">
                    <input type="text" name="RegularOffDutyTime" id="RegularOffDutyTime" class="form-control" value="<?php echo $duty_obj['RegularOffDutyTime']; ?>">
                </div>
            </div>


            <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">更新資料</button>
            </div>
        </form>
    </div>
</div>