import './bootstrap';

$(function () {
    $('#store_and_list_button').on('click', function () {
        var original = $('#original')
        var tableBody = $('#all_urls tbody')
        if (original.hasClass('is-invalid')) {
            original.removeClass('is-invalid')
            original.parent().find('div.invalid-feedback').empty()
        }
        $.post('/urls/store-and-list', {original: original.val()}, function (urls) {
            tableBody.empty()
            $.each(urls, function (key, url) {
                tableBody.append(`
                    <tr>
                        <th scope="row">${url.id}</th>
                        <td>${url.original}</td>
                        <td>${url.shortened}</td>
                    </tr>
                `)
            })
            original.val('')
            original.trigger('focus')
        })
        .fail(function(xhr) {
            original.addClass('is-invalid')
            if (xhr.status == 422) {
                original.parent().find('div.invalid-feedback').text(xhr.responseJSON.errors.original)
            } else {
                original.parent().find('div.invalid-feedback').text(xhr.responseJSON.message)
            }
        })
    })
})
