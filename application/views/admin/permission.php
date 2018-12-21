<div class="page-content">
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">
                Permission
            </h1>
        </div>
        <div class="row row-cards row-deck">
            <div class="col-12">
                <div class="card">
                    <div class="table-responsive">
                        <table class="table card-table table-vcenter text-nowrap">
                            <thead>
                            <tr>
                                <th class="w-1">S.N.</th>
                                <th>Role</th>
                                <th>Module</th>
                                <th>Permission</th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if (isset($permission_maps)) {

                                if (isset($row)) $sn = $row + 1; else $sn = 1;

                                foreach ($permission_maps as $permission_map): ?>
                                    <tr>
                                        <td>
                                            <span class="text-muted"><?php echo $sn; ?></span>
                                        </td>
                                        <td>
                                            <a class="text-inherit"><?php echo $permission_map->role_type; ?></a>
                                        </td>
                                        <td>
                                            <a class="text-inherit"><?php echo $permission_map->module_name; ?></a>
                                        </td>
                                        <td>
                                            <?php foreach ($permissions as $permission): ?>
                                                <?php if ($permission->module_mapping_id == $permission_map->id) {
                                                    echo '<a href="javascript:void(0)" class="btn btn-secondary btn-sm">';
                                                    echo $permission->name;
                                                    echo '</a>';
                                                }
                                                ?>
                                            <?php endforeach; ?>
                                        </td>
                                        <td>
                                            <?php if (isset($user_permission))
                                                foreach ($user_permission as $up): if ($up->permission_id == 2) { ?>
                                                    <a class="icon"
                                                       href="<?= admin_url("role/update_permission_mapping") ?>/<?php echo $permission_map->id ?>">
                                                        <i class="fe fe-edit"></i>
                                                    </a>
                                                <?php } endforeach; ?>
                                        </td>
                                        <td>
                                            <?php if (isset($user_permission))
                                                foreach ($user_permission as $up): if ($up->permission_id == 3) { ?>
                                                    <a class="icon" onClick="return doConfirm();"
                                                       href="<?= admin_url('role/permission_mapping_delete/' . $permission_map->id) ?>">
                                                        <i class="fe fe-delete"></i>
                                                    </a>
                                                <?php } endforeach; ?>
                                        </td>
                                    </tr>
                                    <?php $sn++; endforeach; ?>
                                <?php if (count($permission_maps) == 0) {
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