$(document).ready(function () {
    get_department();
    $('.sidebar-menu').tree();
    activities_table();

    $("#activities-table tbody").on("click", "#ed", function () {
        var table = $('#activities-table').DataTable().row( $(this).parents('tr')  ).data();
        edit_acvity(table['0']);
    });

    $("#activities-table tbody").on("click", "#del", function () {
        var table = $('#activities-table').DataTable().row( $(this).parents('tr')  ).data();
        confirm_delete_acvity(table['0']);
    });

    $('#fc').on('change', function() {
        $('#activities-table').DataTable().ajax.url("./php/sub_admin_table_acti.php/?fc="+ $('#fc option:selected').val() + "&dp=" + $('#dp option:selected').val()).load();
    });

    $('#dp').on('change', function() {
        $('#activities-table').DataTable().ajax.url("./php/sub_admin_table_acti.php/?fc="+ $('#fc option:selected').val() + "&dp=" + $('#dp option:selected').val()).load();
    });

  });

  function activities_table() {
    $('#activities-table').DataTable( {
        "autoWidth" : false,
        "columnDefs": [
            {
              "targets": [ 0 ],
              "visible": false,
              "searchable": false
            },
            {
              "targets": [ 1,2,3,4,5,6],
              "className": "text-center",
            },
            {
                "width": '15%',
              "targets": [ 2,3,4,5,6],
              "className": "text-center",
            },
        ],
        "processing": true,
        "serverSide": true,
        "responsive": true,
        "retrieve": true,
        "ajax": "./php/sub_admin_table_acti.php/?fc="+ $('#fc option:selected').val() + "&dp=" + $('#dp option:selected').val(),
    } );
  }

  function check_add_activity() {
      if ($('#fc option:selected').val() == 0) {
        $.notify({
            message: 'Please select faculty and department.'
        },{
            type: 'danger'
        });
      } else {
        $('#modal-addevent').modal('show');
      }
  }

  function add_activity (event) {
    event.preventDefault();
    var title = $('#title').val();
    var detail = $('#detail').val();
    var url = $('#url').val();
    var startDate = $('#reservationtime').data('daterangepicker').startDate.format('YYYY-MM-DD H:mm');
    var endDate = $('#reservationtime').data('daterangepicker').endDate.format('YYYY-MM-DD H:mm');
    var faculty = $('#fc option:selected').val();
    var department = $('#dp option:selected').val();
    var place = $('#place').val();
    $.ajax({
        method: 'POST',
        url: './php/add_event.php',
        dataType: "json",
        data: {
            'title': title,
            'detail': detail,
            'url': url,
            'startDate': startDate,
            'endDate': endDate,
            'faculty': faculty,
            'department': department,
            'place' : place
        },
    }).done(function (data) {
        res_add_activity(data);
    }).fail(function (jqXHR, ajaxOptions, thrownError) {
        console.log(jqXHR + ajaxOptions + thrownError);
    });
}

function res_add_activity(data) {
    $('#modal-addevent').modal('hide');
    $('#title').val('');
    $('#detail').val('');
    $('#url').val('');
    $('#place').val('');
    if (data == 1) {
        $('#activities-table').DataTable().ajax.reload();
        $.notify({
            message: 'Add event success.'
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

function confirm_delete_acvity(id) {
    $('#id_delete_event').val(id);
    $('#modal-dlevent').modal('show');
}

function delete_acvity() {
    $.ajax({
        method: 'POST',
        url: './php/delete_event.php',
        dataType: "json",
        data: {
            id :  $('#id_delete_event').val(),
        },
    }).done(function (data) {
        res_delete_acvity(data);
    }).fail(function (jqXHR, ajaxOptions, thrownError) {
        console.log(jqXHR + ajaxOptions + thrownError);
    });
}

function res_delete_acvity(data) {
    $('#modal-dlevent').modal('hide');
    if (data == 1) {
        $('#activities-table').DataTable().ajax.reload();
        $.notify({
            message: 'Delete event success.'
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

function edit_acvity(id) {
    $.ajax({
        method: 'POST',
        url: './php/get_edit_event.php',
        dataType: "json",
        data: {
            id :  id,
        },
    }).done(function (data) {
        show_edit_acvity(data);
    }).fail(function (jqXHR, ajaxOptions, thrownError) {
        console.log(jqXHR + ajaxOptions + thrownError);
    });
}

function show_edit_acvity(data) {
    $('#id-edit').val(data['0'].id);
    $('#title-edit').val(data['0'].name);
    $('#detail-edit').val(data['0'].detail);
    $('#url-edit').val(data['0'].url);
    $('#place-edit').val(data['0'].place);
    $('#reservationtime-edit').daterangepicker({
        timePicker: true,
        timePickerIncrement: 15,
        timePicker24Hour: true,
        startDate: moment(data['0'].start, 'DD/MM/YYYY H:mm').toDate(),
        endDate: moment(data['0'].end, 'DD/MM/YYYY H:mm').toDate(),
        timeZone:'Asia/Bangkok',
        locale: {
            format: 'DD/MM/YYYY H:mm'
        },
        drops:'up'
      })
    // $('#reservationtime-edit').val(data['0'].start + ' - ' + data['0'].end);
    $('#location-edit').val(data['0'].locations);
    $('#modal-edevent').modal('show');
}

function edited_acvity(event) {
    event.preventDefault();
    var id = $('#id-edit').val();
    var name = $('#title-edit').val();
    var detail = $('#detail-edit').val();
    var url = $('#url-edit').val();
    var startDate = $('#reservationtime-edit').data('daterangepicker').startDate.format('YYYY-MM-DD H:mm');
    var endDate = $('#reservationtime-edit').data('daterangepicker').endDate.format('YYYY-MM-DD H:mm');
    var place = $('#place-edit').val();
    $.ajax({
        method: 'POST',
        url: './php/edited_event.php',
        dataType: "json",
        data: {
            id :  id,
            name :  name,
            detail :  detail,
            url :  url,
            startDate :  startDate,
            endDate :  endDate,
            place :  place,
        },
    }).done(function (data) {
        res_edited_acvity(data);
    }).fail(function (jqXHR, ajaxOptions, thrownError) {
        console.log(jqXHR + ajaxOptions + thrownError);
    });
}

function res_edited_acvity(data) {
    $('#modal-edevent').modal('hide');
    if (data == 1) {
        $('#activities-table').DataTable().ajax.reload();
        $.notify({
            message: 'Edit event success.'
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

function get_department() {
    $.ajax({
        method: 'POST',
        url: './php/get_department.php',
        dataType: "json",
        data: {
            id :  $('#fc option:selected').val(),
        },
    }).done(function (data) {
        res_get_department(data)
    }).fail(function (jqXHR, ajaxOptions, thrownError) {
        console.log(jqXHR + ajaxOptions + thrownError);
    });
}

function res_get_department(data) {
    $("#dp").empty();
    for (let index = 0; index < data.length; index++) {
        if (index == 0) {
            $("#dp").append('<option value="'+data[index]['id']+'" selected>'+data[index]['dname']+'</option>');
        } else {
            $("#dp").append('<option value="'+data[index]['id']+'">'+data[index]['dname']+'</option>');
        }
    }
    $('#activities-table').DataTable().ajax.url("./php/sub_admin_table_acti.php/?fc="+ $('#fc option:selected').val() + "&dp=" + $('#dp option:selected').val()).load();
}