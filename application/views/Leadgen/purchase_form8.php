<div class="container-fluid text-center">
    <?php if ($this->session->userdata('have_coBorrower') == 'yes') { ?>
        <h4>What is your combine annual household income?</h4>
    <?php } else { ?>
        <h4>What is your annual income?</h4>
    <?php } ?>

    <br>
    <div class="btn-option row-centered">
        <form method="post" action="<?php echo base_url("leadgen/purchase"); ?>">
            <input value="8" type="text" hidden name="form_page"/>
            <div class="form-group col-centered">
                <input type="number"
                       class="form-control <?php if (trim(form_error('income') !== '')) echo "is-invalid"; ?>" name="income">
                <div class="invalid-feedback"><?php echo form_error('income'); ?></div>
            </div>
            <div class="form-group">
                <button type="submit" name="submitForm" class="btn btn-success">
                    Continue
                </button>
            </div>
        </form>
    </div>
</div>

