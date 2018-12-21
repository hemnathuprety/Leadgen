  <div class="page-content">
    <div class="container">
      <div class="page-header">
        <h1 class="page-title">
          Dashboard
        </h1>
      </div>
      <div class="row row-cards row-deck">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Admin User</h3>
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
                  </tr>
                </thead>
                <tbody>
                  <?php $sn= 1; foreach($users as $user): ?>
                  <tr>
                    <td>
                      <span class="text-muted"><?php echo $sn; $sn ?></span>
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
                        <span class="status-icon bg-success"></span>  <?php echo $user->user_status;   }else { ?>
                        <span class="status-icon bg-secondary"></span>  <?php echo $user->user_status;   } ?>
                    </td>
                    <td>
                      <?php echo date('l, F d, Y', strtotime($user->created_date)); ?>
                    </td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
