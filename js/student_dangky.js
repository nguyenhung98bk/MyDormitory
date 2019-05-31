$(document).ready(function(){
    var max_height = 0;
    //Duyệt qua 3 cột để lấy kích thước của cột lớn nhất
    $(".trangchu,.menu").each(function(){
        if($(this).height() > max_height)
        max_height = $(this).height();
    });
    //Gán độ cao 3 cột theo giá trị max_height
    $(".menu,.trangchu").height(max_height+100);
    });