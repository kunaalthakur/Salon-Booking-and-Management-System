
        $("#basicModal").on("show.bs.modal", function(e) {
            var link = $(e.relatedTarget);
            $(this).find(".modal-content").load(link.attr("href"));
        });

        //clear bootstrap modal every time modal close
        $(document).on("hidden.bs.modal", function(e) {
            $(e.target).removeData("bs.modal").find(".modal-content").empty();
        });
    