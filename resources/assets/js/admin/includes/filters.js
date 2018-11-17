$('form[data-auto-filter="true"]').each(function() {
    let form = $(this);

    form.find('select').on('change', () => form.submit());
});
