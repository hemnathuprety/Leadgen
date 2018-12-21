<div class="page-content">
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">
                Roles
            </h1>
        </div>
        <div class="row row-cards row-deck">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Roles</h3>
                        <?php if (isset($user_permission))
                            foreach ($user_permission as $up): if ($up->permission_id == 1) { ?>
                                <a href="<?= admin_url("role/add") ?>" class="btn btn-primary ml-auto">
                                    Add
                                </a>
                            <?php } endforeach; ?>
                    </div>
                    <div class="table-responsive">
                        <table class="table card-table table-vcenter text-nowrap">
                            <thead>
                            <tr>
                                <th class="w-1">S.N.</th>
                                <th>Role</th>
                                <th>Created</th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if (isset($row)) $sn = $row + 1; else $sn = 1;
                            if (isset($roles)) {
                                foreach ($roles as $role): ?>
                                    <tr>
                                        <td>
                                            <span class="text-muted"><?php echo $sn; ?></span>
                                        </td>
                                        <td>
                                            <a class="text-inherit"><?php echo $role->role_type; ?></a>
                                        </td>
                                        <td>
                                            <?php echo date('l, F d, Y', strtotime($role->created_date)); ?>
                                        </td>
                                        <td>
                                            <?php if (isset($user_permission))
                                                foreach ($user_permission

                                                         as $up): if ($up->permission_id == 2) { ?>
                                                    <a class="icon"
                                                       href="<?= admin_url('role/edit/' . $role->role_id) ?>">
                                                        <i class="fe fe-edit"></i>
                                                    </a>
                                                <?php } endforeach; ?>
                                        </td>
                                        <td>
                                            <?php if (isset($user_permission))
                                                foreach ($user_permission as $up): if ($up->permission_id == 3) { ?>
                                                    <a class="icon" onClick="return doConfirm();"
                                                       href="<?= admin_url('role/role_delete/' . $role->role_id) ?>">
                                                        <i class="fe fe-delete"></i>
                                                    </a>
                                                <?php } endforeach; ?>
                                        </td>
                                    </tr>
                                    <?php $sn++; endforeach; ?>
                                <?php if (count($roles) == 0) {
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