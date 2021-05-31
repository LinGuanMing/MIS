<div class="container">
    <br>
    <h1>部門資料新增</h1>
    <div class="row justify-content-center">
        <form method="post" id="add_create" name="add_create" action="<?= base_url('/submit-RuleForm') ?>">
            <div class="form-group row">
                <label class="col-md-4 col-form-label">RuleKind*</label>
                <div class="col-md-8">
                    <input type="text" name="RuleKind" id="RuleKind" class="form-control" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-4 col-form-label">RuleID*</label>
                <div class="col-md-8">
                    <input type="text" name="RuleID" id="RuleID" class="form-control" required> 
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-4 col-form-label">RuleValue</label>
                <div class="col-md-8">
                    <input type="text" name="RuleValue" id="RuleValue" class="form-control">
                </div>
            </div>

            <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">新增資料</button>
            </div>
        </form>
    </div>
</div>