$(document).ready(function() {

	// поля картинок галереи
    var max = 10;
    var min = 1;
    $("#del").attr("disabled", true);
    $("#add").click(function(){
        var total = $("input[name='galleryimg[]']").length;
        if(total < max){
            $("#btnimg").append('<div><input class="btn btn-sm btn-info" type="file" data-bfi-disabled name="galleryimg[]" /></div>');
            if(max == total + 1){
                $("#add").attr("disabled", true);
            }
            $("#del").removeAttr("disabled");
        }
    });
    $("#del").click(function(){
        var total = $("input[name='galleryimg[]']").length;
        if(total > min){
           $("#btnimg div:last-child").remove();
           if(min == total - 1){
                $("#del").attr("disabled", true);
           }
           $("#add").removeAttr("disabled");
        }
    });
    // поля картинок галереи

	// удаление картинок
    $("#prodform").on("click", ".slideimg" ,function(){
        var res = confirm("Подтвердите удаление");
        if(!res) return false;
        
        var img = $(this).attr("alt"); // имя картинки
        var id = $(this).attr("attr-id"); // ID товара
        var loop = $(this).attr("attr-loop"); // Loop iteration ID
        
        $.ajax({
            dataType: "json",
            url: $(this).attr('attr-route'),
            type: "POST",
            data: {img: img, id: id},
            headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: function(res){
                $(".slide_" + loop).hide(500);
                $(".results").empty().fadeIn(500).html(res).delay(2000).fadeOut(500);
            },
            error: function(){
                alert("Error");
            }
        });
    });
    // удаление картинок


});