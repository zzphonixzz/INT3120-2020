<section class="content-header">
    <div class="container-fluid">

    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Danh sách từ</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên bài kiểm tra</th>
                            <th>Mô tả</th>
                            <th>Icon</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($tests as $key => $test): ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $test->name ?></td>
                                <td><?= $test->description ?></td>
                                <td><?= $test->icon ?></td>
                                <td>
                                    <a class="btn btn-sm btn-primary" href="<?= $this->Url->build(['controller' => 'Tests', 'action' => 'view', $test->id]) ?>">Xem</a>
                                    <a class="btn btn-sm btn-primary" href="<?= $this->Url->build(['controller' => 'Tests', 'action' => 'edit', $test->id]) ?>">Sửa</a>
                                    <a class="btn btn-sm btn-danger" href="<?= $this->Url->build(['controller' => 'Tests', 'action' => 'delete', $test->id]) ?>">Xóa</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    <div class="row mt-4">
                        <div class="col-12 text-center">
                            <?= $this->element('Backend/admin_paging') ?>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
