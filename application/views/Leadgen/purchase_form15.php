<div class="container-fluid text-center">
    <form method="post" action="<?php if ($this->session->userdata('purchase_type') == 'purchase') echo base_url("leadgen/purchase"); else echo base_url("leadgen/refinance"); ?>">
        <input value="15" type="text" hidden name="form_page"/>
        <div class="container text-center">
            <h4>What is your current street address?</h4>
            <div class="btn-option row-centered">
                <div class="form-group filter-panel col-centered">
                    <input type="text"
                           class="form-control <?php if (trim(form_error('street_address') !== '')) echo "is-invalid"; ?>"
                           name="street_address" placeholder="Street Address"
                           value="<?php echo set_value('street_address'); ?>"/>
                    <div class="invalid-feedback"><?php echo form_error('street_address'); ?></div>
                </div>
                <div class="form-group filter-panel col-centered">
                    <input type="text"
                           class="form-control <?php if (trim(form_error('zip') !== '')) echo "is-invalid"; ?>"
                           name="zip" placeholder="Enter Zip"
                           value="<?php echo set_value('zip'); ?>"/>
                    <div class="invalid-feedback"><?php echo form_error('zip'); ?></div>
                </div>
                <div class="form-group filter-panel col-centered">
                    <input type="text"
                           class="form-control <?php if (trim(form_error('city') !== '')) echo "is-invalid"; ?>"
                           name="city" placeholder="City"
                           value="<?php echo set_value('city'); ?>"/>
                    <div class="invalid-feedback"><?php echo form_error('city'); ?></div>
                </div>
            </div>
        </div>
        <br/>
        <div class="container text-center">
            <h4>What is your name?</h4>
            <div class="btn-option row-centered">
                <div class="form-group filter-panel col-centered">
                    <input type="text"
                           class="form-control <?php if (trim(form_error('first_name') !== '')) echo "is-invalid"; ?>"
                           name="first_name" placeholder="First Name"
                           value="<?php echo set_value('first_name'); ?>"/>
                    <div class="invalid-feedback"><?php echo form_error('first_name'); ?></div>
                </div>
                <div class="form-group filter-panel col-centered">
                    <input type="text"
                           class="form-control <?php if (trim(form_error('last_name') !== '')) echo "is-invalid"; ?>"
                           name="last_name" placeholder="Last Name"
                           value="<?php echo set_value('last_name'); ?>"/>
                    <div class="invalid-feedback"><?php echo form_error('last_name'); ?></div>
                </div>
            </div>
        </div>
        <br/>
        <div class="container text-center">
            <h4>What is your email?</h4>
            <div class="btn-option row-centered">
                <div class="form-group filter-panel col-centered">
                    <input type="text"
                           class="form-control <?php if (trim(form_error('email') !== '')) echo "is-invalid"; ?>"
                           name="email" placeholder="Email"
                           value="<?php echo set_value('email'); ?>"/>
                    <div class="invalid-feedback"><?php echo form_error('email'); ?></div>
                </div>
            </div>
        </div>
        <br/>
        <div class="container text-center">
            <h4>What is your mobile number?</h4>
            <div class="btn-option row-centered">
                <div class="form-group filter-panel col-centered">
                    <input type="text"
                           class="form-control <?php if (trim(form_error('mobile_number') !== '')) echo "is-invalid"; ?>"
                           name="mobile_number" placeholder="Mobile number"
                           value="<?php echo set_value('mobile_number'); ?>"/>
                    <div class="invalid-feedback"><?php echo form_error('mobile_number'); ?></div>
                </div>
            </div>
        </div>
        <br/>
        <div class="container text-center">
            <h4>What is your home number?</h4>
            <div class="btn-option row-centered">
                <div class="form-group filter-panel col-centered">
                    <input type="text"
                           class="form-control <?php if (trim(form_error('home_number') !== '')) echo "is-invalid"; ?>"
                           name="home_number" placeholder="Home number"
                           value="<?php echo set_value('home_number'); ?>"/>
                    <div class="invalid-feedback"><?php echo form_error('home_number'); ?></div>
                </div>
            </div>
        </div>
        <br/>
        <div class="container text-center">
            <div class="btn-option row-centered">
                <div class="form-group">
                    <button type="submit" name="submitForm" class="btn btn-success">
                        Submit
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>


