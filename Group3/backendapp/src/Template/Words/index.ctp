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
                            <th>Từ</th>
                            <th>Chữ bắt đầu</th>
                            <th>Phiên âm</th>
                            <th>Ý nghĩa</th>
                            <th>Đồng nghĩa</th>
                            <th>Trái nghĩa</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($words as $key => $word): ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $word->word ?></td>
                                <td><?= $word->start_character ?></td>
                                <td><?= $word->sound ?></td>
                                <td><?= $word->meaning ?></td>
                                <?php
                                $synWords = json_decode($word->synonymous);
                                $antWords = json_decode($word->antonymous);
                                ?>
                                <td>
                                    <?php
                                    if($synWords){
                                        foreach($synWords as $synWord){
                                            echo $synWord->name . "<br>";
                                        }
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if($antWords){
                                        foreach($antWords as $antWord){
                                            echo $antWord->name . "<br>";
                                        }
                                    }
                                    ?>
                                </td>
                                <td>
                                    <a class="btn btn-sm btn-primary" href="<?= $this->Url->build(['controller' => 'Words', 'action' => 'view', $word->id]) ?>">Xem</a>
                                    <a class="btn btn-sm btn-primary" href="<?= $this->Url->build(['controller' => 'Words', 'action' => 'edit', $word->id]) ?>">Sửa</a>
                                    <a class="btn btn-sm btn-danger" href="<?= $this->Url->build(['controller' => 'Words', 'action' => 'delete', $word->id]) ?>">Xóa</a>
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
