<div class="container">
    <br>
    <h1>員工班別新增</h1>
    <div class="row justify-content-center">
        <form method="post" id="add_create" name="add_create" action="<?= base_url('/submit-SchedulRuleForm') ?>">
            <div class="form-group row">
                <label class="col-md-4 col-form-label">EmpID*</label>
                <div class="col-md-8">
                    <input type="text" name="EmpID" id="EmpID" class="form-control" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-4 col-form-label">OrgID*</label>
                <div class="col-md-8">
                    <input type="text" name="OrgID" id="OrgID" class="form-control" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-4 col-form-label">DutyID*</label>
                <div class="col-md-8">
                    <input type="text" name="DutyID" id="DutyID" class="form-control" required>
                </div>
            </div>
            <div class="form-group row">
                <!-- Date input -->
                <label class="col-md-4 col-form-label" for="From_Time">From_Time</label>
                <div class="col-md-8">
                    <input type="text" name="From_Time" id="date" placeholder="YYYY/MM/DD" class="form-control" />
                </div>
            </div>
            <div class="form-group row">
                <!-- Date input -->
                <label class="col-md-4 col-form-label" for="End_Time">End_Time</label>
                <div class="col-md-8">
                    <input type="text" name="End_Time" id="date" placeholder="YYYY/MM/DD" class="form-control" />
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">新增資料</button>
            </div>
        </form>
    </div>
</div>