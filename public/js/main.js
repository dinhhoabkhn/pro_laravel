$(document).ready(function () {
    $("#search-student").keyup(function () {

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
    // $("#list-course").click(function () {
    //     $.ajax({
    //         type: 'get',
    //         url: 'list-course',
    //         dataType: 'json',
    //         data: {},
    //         success: function (result) {
    //             $('#content_ajax').html(result);
    //         }
    //     });
    // });
    // $("#list-student").click(function () {
    //     $.ajax({
    //         type: 'get',
    //         url: 'list-student-ajax',
    //         dataType: 'json',
    //         data: {},
    //         success: function (result) {
    //             $('#content_ajax').html(result);
    //         }
    //     });
    // });
    $("#print").click(function () {
        // print()
        // $('#table-manager-student').print()
        var html = $('#table-manager-student').html();
        var print_window = window.open('', 'print_offline', 'status=1,width=700,height=700');
        print_window.document.write(html);
        print_window.print();
    });
    $('.alert').delay(1500).fadeOut(2000);
});

