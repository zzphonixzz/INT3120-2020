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
                            <?php foreach ($tests as $k => $test): ?>
                                <option value="<?= $test->id ?>" <?= $exercise->test_id == $test->id ? 'selected' : '' ?>><?= $test->name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="">Tên bài bài tập</label>
                        <input type="text" class="form-control" name="name" value="<?= $exercise->name ?>" placeholder="Tên bài kiểm tra">
                    </div>
                    <div class="mb-3">
                        <label for="">Đề bài</label>
                        <textarea name="description" class="form-control" id="" cols="30" rows="2"><?= $exercise->description ?></textarea>
                    </div>
                    <div class="mb-3">
                        <h4 for="">Thêm câu hỏi</h4>
                        <div id="list-question" class="row">
                            <?php foreach($exercise->questions as $questionKey => $question): ?>
                                <div class="col-sm-12 mb-3 single-question">
                                    <input type="hidden" name="questions[<?= $questionKey ?>][id]" value="<?= $question->id ?>">
                                    <h3>Câu hỏi</h3>
                                    <div class="row">
                                        <div class="col-sm-11">
                                            <div class="form-group">
                                                <label for="">Nội dung</label>
                                                <input class="form-control" name="questions[<?= $questionKey ?>][content]" value="<?= $question->content ?>" placeholder="Tên">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Ảnh</label>
                                                <input type="file" class="form-control" name="questions[<?= $questionKey ?>][image]" value="" placeholder="Tên">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Audio</label>
                                                <input type="file" class="form-control" name="questions[<?= $questionKey ?>][audio]" value="" placeholder="Tên">
                                            </div>
                                            <h3>Đáp án</h3>
                                            <div class="row mt-2">
                                                <div class="col-sm-6">
                                                    <div class="form-row align-items-center">
                                                        <div class="col-sm-11 my-1">
                                                            <div class="input-group">
                                                                <input type="hidden" name="questions[<?= $questionKey ?>][answers][0][id]" value="<?= $question->answers[0]->id ?>">
                                                                <input type="text" class="form-control" name="questions[<?= $questionKey ?>][answers][0][content]" value="<?= $question->answers[0]->content ?>" placeholder="Đáp án A">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-1">
                                                            <div class="form-check">
                                                                <input class="form-check-input" name="questions[<?= $questionKey ?>][answers][is_true]" <?= $question->answers[0]->is_true == 1? 'checked':'' ?> value="0" type="radio">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-row align-items-center">
                                                        <div class="col-sm-11 my-1">
                                                            <div class="input-group">
                                                                <input type="hidden" name="questions[<?= $questionKey ?>][answers][1][id]" value="<?= $question->answers[1]->id ?>">
                                                                <input type="text" class="form-control" name="questions[<?= $questionKey ?>][answers][1][content]" value="<?= $question->answers[1]->content ?>" placeholder="Đáp án B">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-1">
                                                            <div class="form-check">
                                                                <input class="form-check-input" name="questions[<?= $questionKey ?>][answers][is_true]" <?= $question->answers[1]->is_true == 1? 'checked':'' ?> value="1" type="radio">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-row align-items-center">
                                                        <div class="col-sm-11 my-1">
                                                            <div class="input-group">
                                                                <input type="hidden" name="questions[<?= $questionKey ?>][answers][2][id]" value="<?= $question->answers[2]->id ?>">
                                                                <input type="text" class="form-control" name="questions[<?= $questionKey ?>][answers][2][content]" value="<?= $question->answers[2]->content ?>" placeholder="Đáp án C">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-1">
                                                            <div class="form-check">
                                                                <input class="form-check-input" name="questions[<?= $questionKey ?>][answers][is_true]" <?= $question->answers[2]->is_true == 1? 'checked':'' ?> value="2" type="radio">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-row align-items-center">
                                                        <div class="col-sm-11 my-1">
                                                            <div class="input-group">
                                                                <input type="hidden" name="questions[<?= $questionKey ?>][answers][3][id]" value="<?= $question->answers[3]->id ?>">
                                                                <input type="text" class="form-control" name="questions[<?= $questionKey ?>][answers][3][content]" value="<?= $question->answers[3]->content ?>" placeholder="Đáp án D">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-1">
                                                            <div class="form-check">
                                                                <input class="form-check-input" name="questions[<?= $questionKey ?>][answers][is_true]" <?= $question->answers[3]->is_true == 1? 'checked':'' ?> value="3" type="radio">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-1 text-left">
                                            <a onclick="deleteQuestion(this, '.single-question')" class="text-danger"><i class="fas fa-times"></i></a>
                                        </div>
                                    </div>
                                </div>

                            <?php endforeach; ?>
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
