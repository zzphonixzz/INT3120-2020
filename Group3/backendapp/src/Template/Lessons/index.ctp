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
                            <th>Tên bài học</th>
                            <th>Thumbnail</th>
                            <th>Mô tả</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($lessons as $key => $lesson): ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $lesson->name ?></td>
                                <td><?= $lesson->thumbnail ?></td>
                                <td><?= $lesson->description ?></td>
                                <td>
                                    <a class="btn btn-sm btn-primary" href="<?= $this->Url->build(['controller' => 'Lessons', 'action' => 'view', $lesson->id]) ?>">Xem</a>
                                    <a class="btn btn-sm btn-primary" href="<?= $this->Url->build(['controller' => 'Lessons', 'action' => 'edit', $lesson->id]) ?>">Sửa</a>
                                    <a class="btn btn-sm btn-danger" href="<?= $this->Url->build(['controller' => 'Lessons', 'action' => 'delete', $lesson->id]) ?>">Xóa</a>
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
