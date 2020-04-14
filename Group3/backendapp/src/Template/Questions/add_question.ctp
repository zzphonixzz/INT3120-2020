<div class="col-sm-12 mb-3 single-question">
    <h3>Câu hỏi</h3>
    <div class="row">
        <div class="col-sm-11">
            <div class="form-group">
                <label for="">Nội dung</label>
                <input class="form-control" name="questions[0][content]" value="" placeholder="Tên">
            </div>
            <div class="form-group">
                <label for="">Ảnh</label>
                <input type="file" class="form-control" name="questions[0][image]" value="" placeholder="Tên">
            </div>
            <div class="form-group">
                <label for="">Audio</label>
                <input type="file" class="form-control" name="questions[0][audio]" value="" placeholder="Tên">
            </div>
            <h3>Đáp án</h3>
            <div class="row mt-2">
                <div class="col-sm-6">
                    <div class="form-row align-items-center">
                        <div class="col-sm-11 my-1">
                            <div class="input-group">
                                <input type="text" class="form-control" name="questions[0][answers][0][content]" placeholder="Đáp án A">
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <div class="form-check">
                                <input class="form-check-input" name="questions[0][answers][is_true]" value="0" type="radio">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-row align-items-center">
                        <div class="col-sm-11 my-1">
                            <div class="input-group">
                                <input type="text" class="form-control" name="questions[0][answers][1][content]" placeholder="Đáp án B">
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <div class="form-check">
                                <input class="form-check-input" name="questions[0][answers][is_true]" value="1" type="radio">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-row align-items-center">
                        <div class="col-sm-11 my-1">
                            <div class="input-group">
                                <input type="text" class="form-control" name="questions[0][answers][2][content]" placeholder="Đáp án C">
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <div class="form-check">
                                <input class="form-check-input" name="questions[0][answers][is_true]" value="2" type="radio">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-row align-items-center">
                        <div class="col-sm-11 my-1">
                            <div class="input-group">
                                <input type="text" class="form-control" name="questions[0][answers][3][content]" placeholder="Đáp án D">
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <div class="form-check">
                                <input class="form-check-input" name="questions[0][answers][is_true]" value="3" type="radio">
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
