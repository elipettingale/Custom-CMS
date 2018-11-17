$('form#image-upload-form').each(function() {
    let form = $(this);

    form.find('input[type="file"]').change(function() {
        if ($(this).val() !== '') {
            form.submit();
        }
    });
});
