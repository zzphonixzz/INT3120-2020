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
            <?= $this->Form->create() ?>
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">
                        Thêm từ mới
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
                        <label for="">Từ</label>
                        <input type="text" class="form-control" name="word"  placeholder="Từ">
                    </div>
                    <div class="mb-3">
                        <label for="">Phiên âm</label>
                        <input type="text" class="form-control" name="sound"  placeholder="Phiên âm">
                    </div>
                    <div class="mb-3">
                        <label for="">Ý nghĩa</label>
                        <textarea class="textarea" placeholder="Ý nghĩa" name="meaning"
                                  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                </textarea>
                    </div>
                    <div class="mb-3">
                        <h4 for="">Từ đồng nghĩa</h4>
                        <div id="synonymous-word" class="row">

                        </div>
                        <button type="button" class="btn btn-primary" onclick="addSynonymousWord(this)">Thêm từ đồng nghĩa</button>
                    </div>
                    <div class="mb-3">
                        <h4 for="">Từ trái nghĩa</h4>
                        <div id="antonymous-word" class="row">

                        </div>
                        <button type="button" class="btn btn-primary" onclick="addAntonymousWord(this)">Thêm từ trái nghĩa</button>
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
