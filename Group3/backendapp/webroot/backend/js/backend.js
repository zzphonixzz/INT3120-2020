function updateOrder() {
    var order = $("#dropzone-upload .dz-preview").map(function () {
        var src = $(this).data('path');
        return src;
    }).get();
    var json = JSON.stringify(order);
    console.log(json);
    $('input[name=tmp_files]').val(json);
}

function updateOrderImage() {
    var order = $("#dropzone-upload-image .dz-preview").map(function () {
        var src = $(this).data('path');
        return src;
    }).get();
    var json = JSON.stringify(order);
    console.log(json);
    $('input[name=tmp_files]').val(json);
}

function updateIndexInput(selector, cls) {
    $(selector).find(cls).each(function (index, value) {
        $(value).find('input, select, textarea').each(function () {
            var $this = $(this);
            if ($this[0].hasAttribute('name')) {
                $this.attr('name', $this.attr('name').replace(/\[(\d+)\]/, function ($0, $1) {
                    var order = '[' + index + ']';
                    return order;
                }));
            }
            var newName = $this.attr('name');
            var newId = newName.replace("][", "_");
            newId = newId.replace("[", "_");
            newId = newId.replace("]", "");
            $this.attr('id', newId);

            var next = $this.next();
            var parent = $this.parent();
            if (parent.hasClass('input-group')) {
                if (parent.next().is("p")) {
                    parent.next().attr('id', 'error_' + newId);
                }
            } else {
                if (next.is("p")) {
                    next.attr('id', 'error_' + newId);
                }
            }
        });

    });

}

function deleteSynonymousWord(e, parentClass) {
    $(e).removeAttr('href');
    console.log(parentClass);
    var parent = $(e).parents(parentClass);
    // console.log(parent);
    parent.remove();
    updateIndexInput('#synonymous-word', parentClass);
}

function addSynonymousWord(e){
    $.ajax({
        type: "Get",
        url: baseUrl + 'Words/addSynonymousWord',
        dataType: 'html',
        success: function (res) {
            var clone = $($.parseHTML(res));
            var cls = clone.attr('class');
            $('#synonymous-word').append(clone);
            updateIndexInput('#synonymous-word', '.single-synonymous-word');
        },
        failure: function () {

        }
    });
}

function deleteAntonymousWord(e, parentClass) {
    $(e).removeAttr('href');
    console.log(parentClass);
    var parent = $(e).parents(parentClass);
    // console.log(parent);
    parent.remove();
    updateIndexInput('#antonymous-word', parentClass);
}

function addAntonymousWord(e){
    $.ajax({
        type: "Get",
        url: baseUrl + 'Words/addAntonymousWord',
        dataType: 'html',
        success: function (res) {
            var clone = $($.parseHTML(res));
            var cls = clone.attr('class');
            $('#antonymous-word').append(clone);
            updateIndexInput('#antonymous-word', '.single-antonymous-word');
        },
        failure: function () {

        }
    });
}

function addGrammar(e){
    $.ajax({
        type: "Get",
        url: baseUrl + 'Lessons/addGrammar',
        dataType: 'html',
        success: function (res) {
            var clone = $($.parseHTML(res));
            var cls = clone.attr('class');
            $('#list-grammar').append(clone);
            updateIndexInput('#list-grammar', '.single-grammar');
        },
        failure: function () {

        }
    });
}
function deleteGrammar(e, parentClass) {
    $(e).removeAttr('href');
    console.log(parentClass);
    var parent = $(e).parents(parentClass);
    // console.log(parent);
    parent.remove();
    updateIndexInput('#list-grammar', parentClass);
}
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $(input).next().attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

function addQuestion(e) {
    $.ajax({
        type: "Get",
        url: baseUrl + 'Questions/addQuestion',
        dataType: 'html',
        success: function (res) {
            var clone = $($.parseHTML(res));
            var cls = clone.attr('class');
            $('#list-question').append(clone);
            updateIndexInput('#list-question', '.single-question');
        },
        failure: function () {

        }
    });
}
function deleteQuestion(e, parentClass) {
    $(e).removeAttr('href');
    console.log(parentClass);
    var parent = $(e).parents(parentClass);
    // console.log(parent);
    parent.remove();
    updateIndexInput('#list-question', parentClass);
}
