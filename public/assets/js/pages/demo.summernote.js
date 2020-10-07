! function(e) {
    "use strict";

    function o() {
        this.$body = e("body")
    }
    o.prototype.init = function() {
        e("#summernote-basic").summernote({
            placeholder: "Write something...",
            height: 230,
            callbacks: {
                onInit: function(o) {
                    e(o.editor).find(".custom-control-description").addClass("custom-control-label").parent().removeAttr("for")
                }
            }
        }), e("#summernote-airmode").summernote({
            airMode: !0,
            callbacks: {
                onInit: function(o) {
                    e(o.editor).find(".custom-control-description").addClass("custom-control-label").parent().removeAttr("for")
                }
            }
        });
        e("#summernote-edit").on("click", function() {
            e("#summernote-editmode").summernote({
                focus: !0,
                callbacks: {
                    onInit: function(o) {
                        e(o.editor).find(".custom-control-description").addClass("custom-control-label").parent().removeAttr("for")
                    }
                }
            }), e(this).hide(), e("#summernote-save").show()
        }), e("#summernote-save").on("click", function() {
            ! function() {
                e("#summernote-editmode").summernote("code");
                e("#summernote-editmode").summernote("destroy")
            }(), e(this).hide(), e("#summernote-edit").show()
        })
    }, e.Summernote = new o, e.Summernote.Constructor = o
}(window.jQuery),
function() {
    "use strict";
    window.jQuery.Summernote.init()
}();