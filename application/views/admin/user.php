<div class="page-content">
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">
                Admin Users
            </h1>
        </div>
        <div class="row row-cards row-deck">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Users</h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table card-table table-vcenter text-nowrap">
                            <thead>
                            <tr>
                                <th class="w-1">S.N.</th>
                                <th>Username</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Created</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (isset($users)) {

                                if (isset($row)) $sn = $row + 1; else $sn = 1;

                                foreach ($users as $user): ?>
                                    <tr>
                                        <td>
                                            <span class="text-muted"><?php echo $sn; ?></span>
                                        </td>

                                        <td>
                                            <a class="text-inherit"><?php echo $user->user_name; ?></a>
                                        </td>
                                        <td>
                                            <?php echo $user->full_name; ?>
                                        </td>
                                        <td>
                                            <?php echo $user->email; ?>
                                        </td>
                                        <td>
                                            <?php echo $user->role_type; ?>
                                        </td>
                                        <td>
                                            <?php if ($user->status == 1) { ?>
                                                <span class="status-icon bg-success"></span>  <?php echo $user->user_status;
                                            } else { ?>
                                                <span class="status-icon bg-secondary"></span>  <?php echo $user->user_status;
                                            } ?>
                                        </td>
                                        <td>
                                            <?php echo date('l, F d, Y', strtotime($user->created_date)); ?>
                                        </td>
                                        <td class="text-right">
                                            <?php if (isset($user_permission))
                                            foreach ($user_permission

                                            as $up): if ($up->permission_id == 2) { ?>
                                            <a href="javascript:void(0)" class="btn btn-secondary btn-sm">Reset
                                                Password</a>
                                            <div class="dropdown">
                                                <button class="btn btn-secondary btn-sm dropdown-toggle"
                                                        data-toggle="dropdown">Actions
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item"
                                                       href="<?= admin_url('user/changeStatus/' . $user->status) ?>/<?php echo $user->user_id ?>">
                                                                        <span> <?php if ($user->status == 1) {
                                                                                echo "Deactivate";
                                                                            } else {
                                                                                echo "Activate";
                                                                            }; ?> </span>
                                                    </a>
                                                    <a class="dropdown-item"
                                                       href="<?= admin_url('user/userSuspend/' . $user->user_id) ?>">
                                                        <span>Suspend</span>
                                                    </a>
                                                </div>
                                                <?php } endforeach; ?>
                                        </td>
                                        <td>
                                            <?php if (isset($user_permission))
                                                foreach ($user_permission as $up): if ($up->permission_id == 2) { ?>
                                                    <a class="icon"
                                                       href="<?= admin_url('user/update/' . $user->user_id) ?>">
                                                        <i class="fe fe-edit"></i>
                                                    </a>
                                                <?php } endforeach; ?>
                                        </td>
                                        <td>
                                            <?php if (isset($user_permission))
                                                foreach ($user_permission as $up): if ($up->permission_id == 3) { ?>
                                                    <a class="icon" onClick="return doConfirm();"
                                                       href="<?= admin_url('user/user_delete/' . $user->user_id) ?>">
                                                        <i class="fe fe-delete"></i>
                                                    </a>
                                                <?php } endforeach; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                <?php if (count($users) == 0) {
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
