<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="<?= admin_url("role/post_data") ?>" method="post" class="card">
                    <div class="card-header">
                        <h3 class="card-title"><?php echo isset($role) || set_value('role_id') !== 0 ? "Edit Role" : "Add Role" ?></h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <input type="text" name="role_id"
                                           value="<?php if (isset($role)) echo $role->role_id; ?>" hidden>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Role Name</label>
                                    <input type="text"
                                           class="form-control <?php if (trim(form_error('role_type') !== '')) echo "is-invalid"; ?>"
                                           placeholder="Role Name" name="role_type"
                                           value="<?php if (isset($role)) echo $role->role_type; else echo set_value('role_type'); ?>">
                                    <div class="invalid-feedback"><?php echo form_error('role_type'); ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <div class="d-flex">
                            <a href="<?php echo site_url("admin/role") ?>" class="btn btn-link">Cancel</a>
                            <button type="submit"
                                    class="btn btn-primary ml-auto"><?php if (isset($role) || set_value('role_id') !== 0) echo "Submit"; else echo "Add"; ?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
