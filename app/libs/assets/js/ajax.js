$(document).ready(function () {
    
    // plist.php
    
    $(".btn-delete").click(function() {
        var r = confirm("Do you sure you want to delete?");
        if (r == true) {
            var pid = $(this).attr("pid");
            var oTable = $('#data-table').dataTable();
            var result = false;
            $.ajax({
                type: "POST",
                url: ROOT+"product/delete",
                data: { id: pid }, 
                success: function(data) {
                    if (data == "true") {
                        result = true;
                    }
                },
                async: false
            });
        }
        
        if (result == true) {
            var row = $(this).closest("tr").get(0);
            oTable.fnDeleteRow(oTable.fnGetPosition(row));
        }
    });
    
    $(".btn-activate").click(function() {
        var pid = $(this).attr("pid");;
        var span = $(this).children("span");
        var status = $.trim(span.text());
        var data = "Activated";
        if (status == "Activated") {
            // deactivate it
            data = "Deactivated";
        }
        
        $.ajax({
            type: "POST",
            url: ROOT+"product/activate",
            data: { status: data, id: pid }, 
            success: function(data) {
                if (data == "true") {
                    if (status == "Deactivated") {
                        span.removeClass("label-danger");
                        span.addClass("label-success");
                        span.text("Activated");
                    } else {
                        span.removeClass("label-success");
                        span.addClass("label-danger");
                        span.text("Deactivated");
                    }
                }
            }
        });
        
    });
    
    
});