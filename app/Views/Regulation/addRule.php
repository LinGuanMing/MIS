<div class="container">
    <br>
    <h1>設定檔新增</h1>
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
                <label class="col-md-4 col-form-label">RuleValue1</label>
                <div class="col-md-8">
                    <input type="text" name="RuleValue1" id="RuleValue1" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-4 col-form-label">RuleValue2</label>
                <div class="col-md-8">
                    <input type="text" name="RuleValue2" id="RuleValue2" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-4 col-form-label">RuleValue3</label>
                <div class="col-md-8">
                    <input type="text" name="RuleValue3" id="RuleValue3" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-4 col-form-label">RuleValue4</label>
                <div class="col-md-8">
                    <input type="text" name="RuleValue4" id="RuleValue4" class="form-control">
                </div>
            </div>

            <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">新增資料</button>
            </div>
        </form>
    </div>
</div>