<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="<?= admin_url("module/module_post") ?>" method="post" class="card">
                    <div class="card-header">
                        <h3 class="card-title"><?php echo isset($module) || set_value('module_id') !== 0 ? "Edit Module" : "Add Module" ?></h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <input type="text" name="module_id"
                                           value="<?php if (isset($module)) echo $module->module_id; ?>" hidden>
                                    <input type="text" name="module_old_name"
                                           value="<?php if (isset($module)) echo $module->module_name; ?>" hidden>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Module Name</label>
                                    <input type="text"
                                           class="form-control <?php if (trim(form_error('module_name') !== '')) echo "is-invalid"; ?>"
                                           placeholder="Module Name"
                                           name="module_name" <?php if (isset($module)) echo 'readonly'; ?>
                                           value="<?php if (isset($module)) echo $module->module_name; else echo set_value('module_name'); ?>">
                                    <div class="invalid-feedback"><?php echo form_error('module_name'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Display Name</label>
                                    <input type="text"
                                           class="form-control <?php if (trim(form_error('display_name') !== '')) echo "is-invalid"; ?>"
                                           placeholder="Display Name" name="display_name"
                                           value="<?php if (isset($module)) echo $module->display_name; else echo set_value('display_name'); ?>">
                                    <div class="invalid-feedback"><?php echo form_error('display_name'); ?></div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Order No.</label>
                                    <input type="number"
                                           class="form-control <?php if (trim(form_error('order_no') !== '')) echo "is-invalid"; ?>"
                                           placeholder="Order No." name="order_no"
                                           value="<?php if (isset($module)) echo $module->order_no; else echo set_value('order_no'); ?>">
                                    <div class="invalid-feedback"><?php echo form_error('order_no'); ?></div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Icon</label>
                                    <?php include 'font_icon_picker.php'; ?>
                                    <div class="invalid-feedback"><?php echo form_error('icon'); ?></div>
                                </div>

                                <?php if (isset($modules)) { ?>
                                    <div class="form-group">
                                        <label class="form-label">Parent Module</label>
                                        <select name="parent_module" class="form-control custom-select">
                                            <option value="0" <?php if (isset($module)) if (!$module->is_submodule) echo "selected" ?>>
                                                Null
                                            </option>
                                            <?php foreach ($modules as $m): ?>
                                                <option value="<?php echo $m->module_id; ?>" <?php if (isset($module)) if ($m->module_id == $module->parent_module) echo "selected" ?>><?php echo $m->module_name; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                <?php } ?>

                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <div class="d-flex">
                            <a href="<?php echo admin_url("module") ?>" class="btn btn-link">Cancel</a>
                            <button type="submit"
                                    class="btn btn-primary ml-auto"><?php if (isset($module) || set_value('module_id') !== 0) echo "Submit"; else echo "Add"; ?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
