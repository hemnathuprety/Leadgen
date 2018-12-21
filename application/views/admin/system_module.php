<div class="page-content">
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">
                Modules
            </h1>
        </div>
        <div class="row row-cards row-deck">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Modules Table</h3>
                        <?php if (isset($user_permission))
                            foreach ($user_permission as $up): if ($up->permission_id == 1) { ?>
                                <a href="<?= admin_url("module/add_module") ?>" class="btn btn-primary ml-auto">
                                    Add
                                </a>
                            <?php } endforeach; ?>
                    </div>
                    <div class="table-responsive">
                        <table id="module_table" class="table card-table table-vcenter text-nowrap">
                            <thead>
                            <tr>
                                <th class="w-1">S.N.</th>
                                <th>Module</th>
                                <th>Label</th>
                                <th>Parent Module</th>
                                <th>Created</th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if (isset($modules)) {

                                if (isset($row)) $sn = $row + 1; else $sn = 1;

                                foreach ($modules as $module): ?>
                                    <tr>
                                        <td>
                                            <span class="text-muted"><?php echo $sn; ?></span>
                                        </td>
                                        <td>
                                            <a class="text-inherit"><?php echo $module->module_name; ?></a>
                                        </td>
                                        <td>
                                            <a class="text-inherit"><?php echo $module->display_name; ?></a>
                                        </td>
                                        <td>
                                            <?php if ($module->is_submodule) { ?>
                                                <a class="text-inherit">
                                                    <?php
                                                    foreach ($modules as $m):
                                                        if ($module->parent_module == $m->module_id) echo $m->module_name;
                                                    endforeach; ?>
                                                </a>
                                            <?php } else { ?>
                                                <a class="text-inherit">-</a>
                                            <?php } ?>

                                        </td>
                                        <td>
                                            <?php echo date('l, F d, Y', strtotime($module->created_date)); ?>
                                        </td>
                                        <td>
                                            <?php if (isset($user_permission))
                                                foreach ($user_permission as $up): if ($up->permission_id == 2) { ?>
                                                    <a class="icon"
                                                       href="<?= admin_url('module/edit_module/' . $module->module_id) ?>">
                                                        <i class="fe fe-edit"></i>
                                                    </a>
                                                <?php } endforeach; ?>
                                        </td>
                                        <td>
                                            <?php if (isset($user_permission))
                                                foreach ($user_permission as $up): if ($up->permission_id == 3) { ?>
                                                    <a class="icon" onClick="return doConfirm();"
                                                       href="<?= admin_url('module/module_delete/' . $module->module_id) ?>">
                                                        <i class="fe fe-delete"></i>
                                                    </a>
                                                <?php } endforeach; ?>
                                        </td>
                                    </tr>
                                    <?php $sn++; endforeach; ?>
                                <?php if (count($modules) == 0) {
                                    echo "<tr>";
                                    echo "<td colspan='3'>" . $this->lang->line('record_not_found') . "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr>";
                                echo "<td colspan='3'>" . $this->lang->line('record_not_found') . "</td>";
                                echo "</tr>";
                            } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-header">
                        <div class="ml-auto">
                            <?php if (isset($pagination)) { ?>
                                <?= $pagination; ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script>
    function doConfirm() {
        var job = confirm("Are you sure to delete permanently?");
        if (job !== true) {
            return false;
        }
    }
</script>