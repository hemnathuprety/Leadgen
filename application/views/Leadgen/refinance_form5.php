<div class="container-fluid text-center">
    <h4>What is your current interest rate?</h4>
    <br>
    <div class="btn-option">
        <form method="post" action="<?php echo base_url("leadgen/refinance"); ?>">
            <input value="5" type="text" hidden name="form_page"/>
            <div class="form-group col-centered">
                <input type="number"
                       class="form-control <?php if (trim(form_error('interest_rate') !== '')) echo "is-invalid"; ?>"
                       name="interest_rate">
                <div class="invalid-feedback"><?php echo form_error('interest_rate'); ?>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" name="submitForm" class="btn btn-success">
                    Continue
                </button>
        </form>
    </div>
</div>

