$(function () {
    $("#myTable").DataTable({
        paging: false,
    });

    $('.datepicker').datepicker({
        changeMonth:true,
        changeYear:true,
        minDate:new Date(1980),
        maxDate:new Date(),
        dateFormat:'yy-mm-dd'
    });
    
});
