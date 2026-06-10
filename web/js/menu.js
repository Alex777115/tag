$(document).ready(function () {

    $('#selectAllCheckbox').change(function () {
        var isChecked = $(this).prop('checked');


        $('.user-checkbox').prop('checked', isChecked);
    });


    $('.user-checkbox').change(function () {
        var allChecked = $('.user-checkbox').length === $('.user-checkbox:checked').length;
        $('#selectAllCheckbox').prop('checked', allChecked);
    });


    $('#saveChangesButton').click(function (e) {
        e.preventDefault();


        var selectedUserIds = [];
        $('.user-checkbox:checked').each(function () {
            selectedUserIds.push($(this).data('id'));
        });

        if (selectedUserIds.length === 0) {
            alert('Пожалуйста, выберите хотя бы одного пользователя.');
            return;
        }


        var menuData = {};
        $('[name^="menu_item_"]').each(function () {
            var menuItemId = $(this).attr('name').replace('menu_item_', '');
            menuData[menuItemId] = $(this).prop('checked') ? 1 : 0;
        });

        $.ajax({
            url: '/index.php/admin/menu/edit-menu',
            type: 'POST',
            data: {
                selected_user_ids: selectedUserIds.join(','), // Отправляем ID выбранных пользователей
                menu_data: menuData,
                _csrf: $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                if (response.status === 'success') {
                    $('#messageBox').html('Изменения сохранены успешно!');
                    $('#messageModal').modal('show');
                    setTimeout(function() {
                        $('#messageModal').modal('hide');
                    }, 3000);
                } else {
                    $('#messageBox').html('Произошла ошибка. Попробуйте позже.');
                    $('#messageModal').modal('show');
                    setTimeout(function() {
                        $('#messageModal').modal('hide');
                    }, 10000);
                }
            },
            error: function() {
                $('#messageBox').html('Произошла ошибка при сохранении данных.');
                $('#messageModal').modal('show');
                setTimeout(function() {
                    $('#messageModal').modal('hide');
                }, 10000);
            }
        });
    });
});
