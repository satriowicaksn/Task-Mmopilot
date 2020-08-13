<section class="no-padding-top no-padding-bottom">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-header bg-dark text-white">
        <span class="fa fa-archive"></span>&nbsp&nbsp
        Shift Hari ini
      </div>
      <div class="card-body">
        <div class="alert alert-warning" id="alert">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <span class="fa fa-n"></span> Laporan shift dan login hari ini
      </div>
        <div class="table-responsive">
          <br>
          <table class="table table-striped table-sm text-center mt-1">
            <thead class="text-white bg-info">
              <tr>
                <th>Operator</th>
                <th>Shift</th>
                <th>Client</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              

              <?php foreach ($laporan as $l): ?>
                <?php if ($l->status_shift == 'login'): ?>

                  <tr>
                    <td><?= $l->name ?></td>
                    <td><?= $l->shift ?></td>
                    <td><?= $l->nama_client ?></td>
                    <td>
                        <a href="#" class="btn btn-sm btn-success"> <span class="fa fa-check"></span>&nbsp&nbsp Login </a>
                    </td>
                  </tr>
                <?php endif; ?>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
