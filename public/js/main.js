$(document).ready(function () {
    $("#search-student").keyup(function () {
        // console.log(4);
        var value_search = $("#search-student").val();
        $.ajax({
            type: 'get',
            url: 'search-student',
            dataType: 'text',
            data: {search: value_search},
            success: function (result) {
                $('#table-manager-student').html(result);
            }
        });
    });
    $("#list-course").click(function () {
        $.ajax({
            type: 'get',
            url: 'list-course',
            dataType: 'json',
            data:{},
            success: function (result) {
                $('#content_ajax').html(result);
            }
        });
    });
});

