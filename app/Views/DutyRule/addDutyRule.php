<div class="container">
    <br>
    <h1>班別規則新增</h1>
    <div class="row justify-content-center">
        <form method="post" id="add_create" name="add_create" action="<?= base_url('/submit-DutyRuleForm') ?>">
            <div class="form-group row">
                <label class="col-md-4 col-form-label">DutyID*</label>
                <div class="col-md-8">
                    <input type="text" name="DutyID" id="DutyID" class="form-control" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-4 col-form-label">DutyName*</label>
                <div class="col-md-8">
                    <input type="text" name="DutyName" id="DutyName" class="form-control" required> 
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-4 col-form-label">RegularOnDutyTime</label>
                <div class="col-md-8">
                    <input type="text" name="RegularOnDutyTime" id="RegularOnDutyTime" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-4 col-form-label">RegularOffDutyTime</label>
                <div class="col-md-8">
                    <input type="text" name="RegularOffDutyTime" id="RegularOffDutyTime" class="form-control">
                </div>
            </div>

            <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">新增資料</button>
            </div>
        </form>
    </div>
</div>