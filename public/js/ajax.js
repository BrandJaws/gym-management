$("#add").click(function () {
    $.ajax({
        type: 'post',
        url: 'shop/storeCategory',
        data: {
            '_token': $('input[name=_token]').val(),
            'name': $('input[name=name]').val()
        },
        success: function (data) {
            if ((data.errors)) {
                $('.error').removeClass('hidden');
                $('.error').text(data.errors.name);
            } else {
                $('.error').remove();
                $('#table').append("<tr class='item" + data.id + "'><td>" + data.id + "</td><td>" + data.name + "</td><td><button class='edit-modal btn btn-info' data-id='" + data.id + "' data-name='" + data.name + "'><span class='fa fa-edit'></span> </button> <button class='delete-modal btn btn-danger' data-id='" + data.id + "' data-name='" + data.name + "'><span class='fa fa-trash'></span> </button></td></tr>");
            }
        },
    });
    $('#name').val('');
});
// Edit
$(document).on('click', '.edit-modal', function () {
    $('#footer_action_button').text(" Update");
    $('#footer_action_button').addClass('glyphicon-check');
    $('#footer_action_button').removeClass('glyphicon-trash');
    $('.actionBtn').addClass('btn-success');
    $('.actionBtn').removeClass('btn-danger');
    $('.actionBtn').addClass('edit');
    $('.modal-title').text('Edit');
    $('.deleteContent').hide();
    $('.form-horizontal').show();
    $('#fid').val($(this).data('id'));
    $('#n').val($(this).data('name'));
    $('#myModal').modal('show');
});
$('.modal-footer').on('click', '.edit', function () {
    $.ajax({
        type: 'post',
        url: 'shop/editItem',
        data: {
            '_token': $('input[name=_token]').val(),
            'id': $("#fid").val(),
            'name': $('#n').val()
        },
        success: function (data) {
            $('.item' + data.id).replaceWith("<tr class='item" + data.id + "'><td>" + data.id + "</td><td>" + data.name + "</td><td><button class='edit-modal btn btn-info' data-id='" + data.id + "' data-name='" + data.name + "'><span class='fa fa-edit'></span> </button> <button class='delete-modal btn btn-danger' data-id='" + data.id + "' data-name='" + data.name + "' ><span class='fa fa-trash''></span></button></td></tr>");
        }
    });
});

// Delete
$(document).on('click', '.delete-modal', function() {
    $('#footer_action_button').text(" Delete");
    $('#footer_action_button').removeClass('glyphicon-check');
    $('#footer_action_button').addClass('glyphicon-trash');
    $('.actionBtn').removeClass('btn-success');
    $('.actionBtn').addClass('btn-danger');
    $('.actionBtn').addClass('delete');
    $('.modal-title').text('Delete');
    $('.did').text($(this).data('id'));
    $('.deleteContent').show();
    $('.form-horizontal').hide();
    $('.dname').html($(this).data('name'));
    $('#myModal').modal('show');
});

$('.modal-footer').on('click', '.delete', function() {
    $.ajax({
        type: 'post',
        url: 'shop/destroyCategory',
        data: {
            '_token': $('input[name=_token]').val(),
            'id': $('.did').text()
        },
        success: function(data) {
            $('.item' + $('.did').text()).remove();
        }
    });
});
