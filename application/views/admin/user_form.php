<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="<?= admin_url("user/userPost") ?>" method="post" class="card">
                    <div class="card-header">
                        <h3 class="card-title"><?php echo isset($user) || set_value('user_id') !== 0 ? "Edit User" : "Add User"; ?></h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <input type="text" name="user_id"
                                           value="<?php if (isset($user)) echo $user->user_id; ?>" hidden>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Username</label>
                                    <input type="text"
                                           class="form-control <?php if (trim(form_error('user_name') !== '')) echo "is-invalid"; ?>"
                                           placeholder="Username" name="user_name"
                                           value="<?php if (isset($user)) echo $user->user_name; else echo set_value('user_name'); ?>" <?php if (isset($user)) echo "readonly"; ?> >
                                    <div class="invalid-feedback"><?php echo form_error('user_name'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Full Name</label>
                                    <input type="text"
                                           class="form-control <?php if (trim(form_error('full_name') !== '')) echo "is-invalid"; ?>"
                                           placeholder="Full Name" name="full_name"
                                           value="<?php if (isset($user)) echo $user->full_name; else echo set_value('user_name'); ?>">
                                    <div class="invalid-feedback"><?php echo form_error('full_name'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Email</label>
                                    <input type="text"
                                           class="form-control <?php if (trim(form_error('user_email') !== '')) echo "is-invalid"; ?>"
                                           name="user_email"
                                           value="<?php if (isset($user)) echo $user->email; else echo set_value('user_email'); ?>"
                                           placeholder="Email">
                                    <div class="invalid-feedback"><?php echo form_error('user_email'); ?></div>
                                </div>
                                <?php if (!isset($user)) { ?>
                                    <div class="form-group">
                                        <label class="form-label">Password</label>
                                        <input type="password"
                                               class="form-control <?php if (trim(form_error('password') !== '')) echo "is-invalid"; ?>"
                                               name="password" placeholder="Password">
                                        <div class="invalid-feedback"><?php echo form_error('password'); ?></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Confirm password</label>
                                        <input type="password"
                                               class="form-control <?php if (trim(form_error('confirm_password') !== '')) echo "is-invalid"; ?>"
                                               name="confirm_password" placeholder="Confirm password">
                                        <div class="invalid-feedback"><?php echo form_error('confirm_password'); ?></div>
                                    </div>

                                <?php } ?>
                                <?php if (isset($roles)) { ?>
                                    <div class="form-group">
                                        <label class="form-label">Role</label>
                                        <select name="user_role" class="form-control custom-select">
                                            <?php foreach ($roles as $role): ?>
                                                <option value="<?php echo $role->role_id; ?>"><?php echo $role->role_type; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                <?php } ?>
                                <?php if (!isset($user)) { ?>
                                    <div class="form-group">
                                        <label class="form-label">Status</label>
                                        <select name="user_status" class="form-control custom-select">
                                            <?php foreach ($status as $st): if ($st['id'] != 3) { ?>
                                                <option value="<?php echo $st['id']; ?>"><?php echo $st['name']; ?></option>
                                            <?php } endforeach; ?>
                                        </select>
                                    </div>
                                <?php } ?>

                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <div class="d-flex">
                            <a href="<?php echo site_url("admin/dashboard") ?>" class="btn btn-link">Cancel</a>
                            <button type="submit"
                                    class="btn btn-primary ml-auto"><?php if (isset($user) || set_value('user_id') !== 0) echo "Submit"; else echo "Add"; ?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
