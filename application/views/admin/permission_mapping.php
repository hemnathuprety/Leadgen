<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="<?= admin_url("role/permission_post") ?>" method="post" class="card">
                    <div class="card-header">
                        <h3 class="card-title">Manage Permission</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <input type="text" name="mapping_id"
                                           value="<?php if (isset($mapping)) echo $mapping->id; ?>" hidden>
                                </div>
                                <?php if (isset($roles)) { ?>
                                    <div class="form-group">
                                        <label class="form-label">Select role</label>
                                        <select name="user_role" class="form-control custom-select">
                                            <?php foreach ($roles as $role): ?>
                                                <option value="<?php echo $role->role_id; ?> <?php if (isset($mapping)) if ($role->role_id == $mapping->role_id) echo "selected" ?>"><?php echo $role->role_type; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                <?php } ?>
                                <?php if (isset($modules)) { ?>
                                    <div class="form-group">
                                        <label class="form-label">Select Module</label>
                                        <select name="system_module" class="form-control custom-select">
                                            <?php foreach ($modules as $m): ?>
                                                <option value="<?php echo $m->module_id; ?>" <?php if (isset($mapping)) if ($m->module_id == $mapping->module_id) echo "selected" ?>><?php echo $m->module_name; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                <?php } ?>
                                <?php if (isset($permissions)) { ?>
                                    <div class="form-group">
                                        <label class="form-label">Select Permission</label>
                                        <?php foreach ($permissions as $permission): ?>
                                            <input type="checkbox" name="<?php echo $permission->name; ?>"
                                                   value="<?php echo $permission->permission_id; ?>"
                                                <?php if (isset($permission_mapping))
                                                    foreach ($permission_mapping as $permissionM):
                                                        if ($permission->permission_id == $permissionM->permission_id) echo "checked"; endforeach; ?>>
                                            <?php echo $permission->name; ?>
                                            </br>
                                        <?php endforeach; ?>
                                    </div>
                                <?php } ?>
                                <?php if (isset($permission_check)) { ?>
                                    <div class="contact100-form">
                                    <span class="txt4" style="color:#491217">
                                       <?= $permission_check; ?>
                                    </span>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <div class="d-flex">
                            <a href="<?php echo admin_url("module") ?>" class="btn btn-link">Cancel</a>
                            <button type="submit"
                                    class="btn btn-primary ml-auto"><?php if (isset($mapping) || set_value('id') !== 0) echo "Submit"; else echo "Add"; ?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
