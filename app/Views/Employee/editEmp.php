<div class="container">
    <br>
    <h1>員工資料修改</h1>
    <div class="row justify-content-center">
        <form method="post" id="update_user" name="update_user" action="<?= base_url('/updateEmp') ?>">
            <div class="form-group row">
                <label class="col-md-4 col-form-label">EmpID*</label>
                <div class="col-md-8">
                    <input type="text" name="EmpID" id="EmpID" class="form-control" value="<?php echo $emp_obj['EmpID']; ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-4 col-form-label">EmpName*</label>
                <div class="col-md-8">
                    <input type="text" name="EmpName" id="EmpName" class="form-control" value="<?php echo $emp_obj['EmpName']; ?>" required> 
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-4 col-form-label">OrgID</label>
                <div class="col-md-8">
                    <input type="text" name="OrgID" id="OrgID" class="form-control" value="<?php echo $emp_obj['OrgID']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-4 col-form-label">Phone*</label>
                <div class="col-md-8">
                    <input type="text" name="Phone" id="Phone" class="form-control" value="<?php echo $emp_obj['Phone']; ?>" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-4 col-form-label">MgrID</label>
                <div class="col-md-8">
                    <input type="text" name="MgrID" id="MgrID" class="form-control" value="<?php echo $emp_obj['MgrID']; ?>">
                </div>
            </div>

            <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">更新資料</button>
            </div>
        </form>
    </div>
</div>