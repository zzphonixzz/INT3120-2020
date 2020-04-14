<div class="col-sm-4 mb-3 single-grammar">
    <div class="row">
        <div class="col-sm-10">
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="">Từ</label>
                        <input class="form-control" name="grammars[0][word]" value="" placeholder="Từ">
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="">Phiên âm</label>
                        <input class="form-control" name="grammars[0][sound]" value="" placeholder="Phiên âm">
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="">Nghĩa</label>
                        <textarea class="form-control" placeholder="Nghĩa" name="grammars[0][meaning]"></textarea>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="">Thumbnail</label>
                        <input class="form-control" type="file" onchange="readURL(this)" name="grammars[0][thumbnail]">
                        <img class="preview-image mt-2" src=""/>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-2 text-left">
            <a onclick="deleteGrammar(this, '.single-grammar')" class="text-danger"><i class="fas fa-times"></i></a>
        </div>
    </div>
</div>
