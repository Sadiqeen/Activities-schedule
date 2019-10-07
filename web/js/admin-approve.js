$(document).ready(function () {
    $('#event-table').DataTable( {
        "autoWidth" : false,
        "columnDefs": [
            {
              "targets": [ 0 ],
              "visible": false,
              "searchable": false
            },
            {
                "targets": [ 3,8,9,2],
                "visible": false,
            },
            {
              "targets": [ 1,3,4,5,6],
              "className": "text-center",
            },
            {
                "width" : '20%',
              "targets": [ 7],
              "className": "text-center",
            },
            {
                "width" : '13%',
              "targets": [ 10],
              "className": "text-center",
            }
        ],
        "processing": true,
        "serverSide": true,
        "responsive": true,
        "retrieve": true,
        "ajax": "./php/sub_admin_table_event.php",
    } );

    $("#event-table tbody").on("click", "#info", function () {
        var table = $('#event-table').DataTable().row( $(this).parents('tr')  ).data();
        $('#tt').text(table[2]);
        $('#dt').text(table[3]);
        $('#st').text(table[4]);
        $('#et').text(table[5]);
        $('#fc').text(table[6]);
        $('#dp').text(table[7]);
        $('#cb').text(table[8]);
        $('#url').text(table[9]);
        $("#url").attr("href", table[9])
        $('#modal-info').modal('show');
    });

    $("#event-table tbody").on("click", "#ap", function () {
        var table = $('#event-table').DataTable().row( $(this).parents('tr')  ).data();
        approve (table[0]);
    });
    $("#event-table tbody").on("click", "#rj", function () {
        var table = $('#event-table').DataTable().row( $(this).parents('tr')  ).data();
        reject (table[0]);
    });
});

function approve (id) {
    $.ajax({
        method: 'POST',
        url: './php/approve_event.php',
        dataType: "json",
        data: {
            id :  id,
        },
    }).done(function (data) {
        res_approve(data);
    }).fail(function (jqXHR, ajaxOptions, thrownError) {
        console.log(jqXHR + ajaxOptions + thrownError);
    });
}

function res_approve(data) {
    $('#event-table').DataTable().ajax.reload();
    if (data == 1) {
        $.notify({
            message: 'Approve event success.'
        },{
            type: 'success'
        });
    } else {
        $.notify({
            message: data
        },{
            type: 'danger'
        });
    }
}

function reject (id) {
    $.ajax({
        method: 'POST',
        url: './php/reject_event.php',
        dataType: "json",
        data: {
            id :  id,
        },
    }).done(function (data) {
        res_reject(data);
    }).fail(function (jqXHR, ajaxOptions, thrownError) {
        console.log(jqXHR + ajaxOptions + thrownError);
    });
}

function res_reject(data) {
    $('#event-table').DataTable().ajax.reload();
    if (data == 1) {
        $.notify({
            message: 'Reject event success.'
        },{
            type: 'success'
        });
    } else {
        $.notify({
            message: data
        },{
            type: 'danger'
        });
    }
}