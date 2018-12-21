<div class="page-content">
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">
                Lead Gens
            </h1>
        </div>
        <div class="row row-cards row-deck">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Lead Gens</h3>
                        <?php if (isset($user_permission))
                            foreach ($user_permission as $up): if ($up->permission_id == 1) { ?>
                                <a href="<?= admin_url("leadgen/add_leadgen") ?>" class="btn btn-primary ml-auto">
                                    Add
                                </a>
                            <?php } endforeach; ?>
                    </div>
                    <div class="table-responsive">
                        <table class="table card-table table-vcenter text-nowrap">
                            <thead>
                            <tr>
                                <th class="w-1">S.N.</th>
                                <th>Logo</th>
                                <th>Organization Name</th>
                                <th>Address</th>
                                <th>Contact No.</th>
                                <th>Email</th>
                                <th>Color</th>
                                <th>Created</th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if (isset($row)) $sn = $row + 1; else $sn = 1;
                            if (isset($leadgens)) {
                                foreach ($leadgens as $lead_gen): ?>
                                    <tr>
                                        <td>
                                            <span class="text-muted"><?php echo $sn; ?></span>
                                        </td>
                                        <td>
                                            <?php if (!isset($lead_gen->logo) || trim($lead_gen->logo) === '') { ?>
                                                <i class="fa fade-camera"></i>
                                            <?php } else { ?>
                                                <img src="<?= images_uri($lead_gen->logo) ?>">
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <a class="text-inherit"><?php echo $lead_gen->organization_name; ?></a>
                                        </td>
                                        <td>
                                            <a class="text-inherit"><?php echo $lead_gen->address; ?></a>
                                        </td>
                                        <td>
                                            <a class="text-inherit"><?php echo $lead_gen->contact_no; ?></a>
                                        </td>
                                        <td>
                                            <a class="text-inherit"><?php echo $lead_gen->email; ?></a>
                                        </td>
                                        <td>
                                            <a class="text-inherit"><?php echo $lead_gen->color; ?></a>
                                        </td>
                                        <td>
                                            <?php echo date('l, F d, Y', strtotime($lead_gen->created_at)); ?>
                                        </td>
                                        <td>
                                            <?php if (isset($user_permission))
                                                foreach ($user_permission

                                                         as $up): if ($up->permission_id == 2) { ?>
                                                    <a class="icon"
                                                       href="<?= admin_url('leadgen/edit/' . $lead_gen->id) ?>">
                                                        <i class="fe fe-edit"></i>
                                                    </a>
                                                <?php } endforeach; ?>
                                        </td>
                                        <td>
                                            <?php if (isset($user_permission))
                                                foreach ($user_permission as $up): if ($up->permission_id == 3) { ?>
                                                    <a class="icon" onClick="return doConfirm();"
                                                       href="<?= admin_url('leadgen/leadgen_delete/' . $lead_gen->id) ?>">
                                                        <i class="fe fe-delete"></i>
                                                    </a>
                                                <?php } endforeach; ?>
                                        </td>
                                    </tr>
                                    <?php $sn++; endforeach; ?>
                                <?php if (count($leadgens) == 0) {
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
