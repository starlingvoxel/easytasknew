$(function () {

    function addLabelGroups() {
      $(".category-selector .badge-group-item")
        .off("click")
        .on("click", function (event) {
          event.preventDefault();
          /* Act on the event */
          var getclass = this.className;
          var getSplitclass = getclass.split(" ")[0];
          if ($(this).hasClass("badge-business")) {
            $(this).parents(".single-note-item").removeClass("note-social");
            $(this).parents(".single-note-item").removeClass("note-important");
            $(this).parents(".single-note-item").toggleClass(getSplitclass);
          } else if ($(this).hasClass("badge-social")) {
            $(this).parents(".single-note-item").removeClass("note-business");
            $(this).parents(".single-note-item").removeClass("note-important");
            $(this).parents(".single-note-item").toggleClass(getSplitclass);
          } else if ($(this).hasClass("badge-important")) {
            $(this).parents(".single-note-item").removeClass("note-social");
            $(this).parents(".single-note-item").removeClass("note-business");
            $(this).parents(".single-note-item").toggleClass(getSplitclass);
          }
        });
    }
  
    var $btns = $(".note-link").click(function () {
      if (this.id == "all-category") {
        var $el = $("." + this.id).fadeIn();
        $("#note-full-container > div").not($el).hide();
      }
      if (this.id == "important") {
        var $el = $("." + this.id).fadeIn();
        $("#note-full-container > div").not($el).hide();
      } else {
        var $el = $("." + this.id).fadeIn();
        $("#note-full-container > div").not($el).hide();
      }
      $btns.removeClass("active");
      $(this).addClass("active");
    });
  

  

  

  
 
    addLabelGroups();

  });
  
  $("#note-has-title").keyup(function () {
    var empty = false;
    $("#note-has-title").each(function () {
      if ($(this).val() == "") {
        empty = true;
      }
    });
  
    if (empty) {
      $("#btn-n-add").attr("disabled", "disabled");
    } else {
      $("#btn-n-add").removeAttr("disabled");
    }
  });