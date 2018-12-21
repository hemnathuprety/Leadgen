<div class="container-fluid text-center">
    <h4>Are you currently employed?</h4>
    <br>
    <div class="btn-option">
        <form method="post" action="<?php echo base_url("leadgen/purchase"); ?>">
            <input value="9" type="text" hidden name="form_page"/>
            <div class="form-group">
                <button type="submit" name="submitForm" class="btn btn-success"
                        value="Full-time">
                    Full-time
                </button>
            </div>
            <div class="form-group">
                <button type="submit" name="submitForm" class="btn btn-success"
                        value="Part-time">
                    Part-time
                </button>
            </div>
            <div class="form-group">
                <button type="submit" name="submitForm" class="btn btn-success"
                        value="Self-employed">
                    Self-employed
                </button>
            </div>
            <div class="form-group">
                <button type="submit" name="submitForm" class="btn btn-success"
                        value="No, I am not employed">
                   No, I am not employed
                </button>
            </div>
        </form>
    </div>
</div>

