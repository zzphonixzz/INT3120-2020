<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Thêm từ mới</h1>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <?= $this->Form->create(null, ['type' => 'file']) ?>
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">
                        Thêm bài học
                    </h3>
                    <!-- tools box -->
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                            <i class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove" data-toggle="tooltip"
                                title="Remove">
                            <i class="fas fa-times"></i></button>
                    </div>
                    <!-- /. tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body pad">
                    <div class="mb-3">
                        <label for="">Lựa chọn bài kiểm tra</label>
                        <select class="form-control" name="test_id" id="">
                            <?php foreach($tests as $k => $test): ?>
                                <option value="<?= $test->id ?>"><?= $test->name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="">Tên bài bài tập</label>
                        <input type="text" class="form-control" name="name"  placeholder="Tên bài kiểm tra">
                    </div>
                    <div class="mb-3">
                        <label for="">Đề bài</label>
                        <textarea name="description" class="form-control" id="" cols="30" rows="2"></textarea>
                    </div>
                    <div class="mb-3">
                        <h4 for="">Thêm câu hỏi</h4>
                        <div id="list-question" class="row">

                        </div>
                        <button type="button" class="btn btn-primary" onclick="addQuestion(this)">Thêm câu hỏi</button>
                    </div>
                    <button class="btn btn-success">
                        Submit
                    </button>
                </div>
            </div>
            <?= $this->Form->end() ?>
        </div>
        <!-- /.col-->
    </div>
    <!-- ./row -->
</section>
