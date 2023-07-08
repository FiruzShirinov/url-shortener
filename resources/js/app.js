import './bootstrap';

$(function () {
    $('#store_and_list_button').on('click', function () {
        var original = $('#original')
        var tableBody = $('#all_urls tbody')
        if (original.hasClass('is-invalid')) {
            original.removeClass('is-invalid')
            original.parents().find('div.invalid-feedback').empty()
        }
        $.post('/urls/store-and-list', {original: original.val()}, function (urls) {
            tableBody.empty()
            $.each(urls, function (key, url) {
                tableBody.append(`
                    <tr data-url="${url.original}">
                        <td>${url.id}</td>
                        <td>${url.original}</td>
                        <td>${url.shortened}</td>
                    </tr>
                `)
            })

            var firstTableRow = $("#all_urls tbody tr:first td")
            firstTableRow.addClass('pulse')
            setTimeout(function(){
                firstTableRow.removeClass('pulse');
            }, 2000)

            original.val('')
            original.trigger('focus')
        })
        .fail(function(xhr) {
            original.addClass('is-invalid')
            if (xhr.status == 422) {
                original.parents().find('div.invalid-feedback').text(xhr.responseJSON.errors.original).show()
            } else {
                original.parents().find('div.invalid-feedback').text(xhr.responseJSON.message).show()
            }
            original.trigger('focus')
        })
    })

    $('#all_urls').on('click', 'tr', function () {
        window.open($(this).data('url'), '_blank')
    })
})
