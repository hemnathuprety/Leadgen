<div class="container-fluid text-center">
    <h4>Zip code of your property</h4>
    <br>
    <div class="btn-option">
        <form method="post" action="<?php echo base_url("leadgen/refinance"); ?>">
            <input value="2" type="text" hidden name="form_page"/>
            <div class="form-group col-centered">
                <input type="text"
                       class="form-control <?php if (trim(form_error('zip') !== '')) echo "is-invalid"; ?>"
                       name="zip">
                <div class="invalid-feedback"><?php echo form_error('zip'); ?>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" name="submitForm" class="btn btn-success">
                    Continue
                </button>
        </form>
    </div>
</div>

