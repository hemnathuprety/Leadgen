<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="<?= admin_url("leadgen/leadGenPost") ?>" enctype="multipart/form-data" method="post"
                      class="card" id="usrform">
                    <div class="card-header">
                        <h3 class="card-title"><?php if (isset($leadgen) || set_value('id') !== 0) echo "Edit LeadGen"; else echo "Add LeadGen"; ?></h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <input type="text" name="id"
                                           value="<?php if (isset($leadgen)) echo $leadgen->id; else echo set_value('id'); ?>"
                                           hidden>
                                </div>
                                <div class="pasal_form">
                                    <div class="form-group">
                                        <label class="form-label">Organization Name</label>
                                        <input type="text"
                                               class="form-control <?php if (trim(form_error('organization_name') !== '')) echo "is-invalid"; ?>"
                                               placeholder="Organization Name" name="organization_name"
                                               value="<?php if (isset($leadgen)) echo $leadgen->organization_name; else echo set_value('organization_name'); ?>">
                                        <div class="invalid-feedback"><?php echo form_error('organization_name'); ?></div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Address</label>
                                        <input type="text"
                                               class="form-control <?php if (trim(form_error('address') !== '')) echo "is-invalid"; ?>"
                                               placeholder="Address" name="address"
                                               value="<?php if (isset($leadgen)) echo $leadgen->address; else echo set_value('address'); ?>">
                                        <div class="invalid-feedback"><?php echo form_error('address'); ?></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Contact No.</label>
                                        <input type="text"
                                               class="form-control <?php if (trim(form_error('contact_no') !== '')) echo "is-invalid"; ?>"
                                               placeholder="Contact No." name="contact_no"
                                               value="<?php if (isset($leadgen)) echo $leadgen->contact_no; else echo set_value('contact_no'); ?>">
                                        <div class="invalid-feedback"><?php echo form_error('contact_no'); ?></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Email</label>
                                        <input type="email"
                                               class="form-control <?php if (trim(form_error('email') !== '')) echo "is-invalid"; ?>"
                                               placeholder="Email" name="email"
                                               value="<?php if (isset($leadgen)) echo $leadgen->email; else echo set_value('email'); ?>">
                                        <div class="invalid-feedback"><?php echo form_error('email'); ?></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Color</label>
                                        <input type="text"
                                               class="jscolor form-control <?php if (trim(form_error('color') !== '')) echo "is-invalid"; ?>"
                                               placeholder="Color" name="color"
                                               value="<?php if (isset($leadgen)) echo $leadgen->color; else echo set_value('color'); ?>">
                                        <div class="invalid-feedback"><?php echo form_error('color'); ?></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Disclosure</label>
                                        <textarea rows="4" cols="50" placeholder="Disclosure"
                                                  class="form-control <?php if (trim(form_error('disclosure') !== '')) echo "is-invalid"; ?>"
                                                  name="disclosure"
                                                  form="usrform"><?php if (isset($leadgen)) echo $leadgen->disclosure; else echo trim(set_value('disclosure')); ?>
                                        </textarea>
                                        <div class="invalid-feedback"><?php echo form_error('disclosure'); ?></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Disclosure Link</label>
                                        <input type="url"
                                               class="form-control <?php if (trim(form_error('disclosure_link') !== '')) echo "is-invalid"; ?>"
                                               placeholder="Disclosure Link" name="disclosure_link"
                                               value="<?php if (isset($leadgen)) echo $leadgen->disclosure_link; else echo set_value('disclosure_link'); ?>">
                                        <div class="invalid-feedback"><?php echo form_error('disclosure_link'); ?></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Privacy Policy</label>
                                        <input type="url"
                                               class="form-control <?php if (trim(form_error('privacy_policy') !== '')) echo "is-invalid"; ?>"
                                               placeholder="Privacy Policy" name="privacy_policy"
                                               value="<?php if (isset($leadgen)) echo $leadgen->privacy_policy; else echo set_value('privacy_policy'); ?>">
                                        <div class="invalid-feedback"><?php echo form_error('privacy_policy'); ?></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Terms of Use</label>
                                        <input type="url"
                                               class="form-control <?php if (trim(form_error('terms_of_use') !== '')) echo "is-invalid"; ?>"
                                               placeholder="Terms of Use" name="terms_of_use"
                                               value="<?php if (isset($leadgen)) echo $leadgen->terms_of_use; else echo set_value('terms_of_use'); ?>">
                                        <div class="invalid-feedback"><?php echo form_error('terms_of_use'); ?></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">License Disclosure</label>
                                        <input type="url"
                                               class="form-control <?php if (trim(form_error('licens_disclosure') !== '')) echo "is-invalid"; ?>"
                                               placeholder="License disclosure" name="licens_disclosure"
                                               value="<?php if (isset($leadgen)) echo $leadgen->licens_disclosure; else echo set_value('licens_disclosure'); ?>">
                                        <div class="invalid-feedback"><?php echo form_error('licens_disclosure'); ?></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="image_upload">Select Logo</label>
                                        <input type="file"
                                               class="form-control-file" name="logo" id="logo">
                                        <div style="color: #491217"><?php echo form_error('logo'); ?></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="image_upload">Select Fab Icon</label>
                                        <input type="file"
                                               class="form-control-file" name="fab_icon" id="fab_icon">
                                        <div style="color: #491217"><?php echo form_error('fab_icon'); ?></div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <div class="d-flex">
                            <a href="<?php echo admin_url("leadgen") ?>" class="btn btn-link">Cancel</a>
                            <button type="submit"
                                    class="btn btn-primary ml-auto"><?php if (isset($leadgen) || set_value('id') !== 0) echo "Submit"; else echo "Add"; ?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>