<div class="container-fluid text-center">
    <h4>When where you born?</h4>
    <br>
    <div class="btn-option">
        <form method="post" action="<?php echo base_url("leadgen/purchase"); ?>">
            <input value="11" type="text" hidden name="form_page"/>
            <div class="form-group col-centered">
                <input type="date"
                       class="form-control <?php if (trim(form_error('birth_day') !== '')) echo "is-invalid"; ?>"
                       name="birth_day">
                <div class="invalid-feedback"><?php echo form_error('birth_day'); ?>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" name="submitForm" class="btn btn-success">
                    Continue
                </button>
        </form>
    </div>
</div>

