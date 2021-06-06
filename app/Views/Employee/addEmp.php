<div class="container">
    <br>
    <h1>員工資料新增</h1>
    <div class="row justify-content-center">
        <form method="post" id="add_create" name="add_create" action="<?= base_url('/submit-EmpForm') ?>">
            <div class="form-group row">
                <label class="col-md-4 col-form-label">EmpID*</label>
                <div class="col-md-8">
                    <input type="text" name="EmpID" id="EmpID" class="form-control" value="<?php echo $SEQID['EmpID']; ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-4 col-form-label">EmpName*</label>
                <div class="col-md-8">
                    <input type="text" name="EmpName" id="EmpName" class="form-control" required> 
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-4 col-form-label">OrgID</label>
                <div class="col-md-8">
                    <input type="text" name="OrgID" id="OrgID" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-4 col-form-label">Phone*</label>
                <div class="col-md-8">
                    <input type="text" name="Phone" id="Phone" class="form-control" required>
                </div>
            </div>

            <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">新增資料</button>
            </div>
        </form>
    </div>
</div>