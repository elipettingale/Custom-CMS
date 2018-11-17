
$('.card-accordion .collapsible-card .card-header').click(function() {
    let currentCard = $(this).closest('.collapsible-card');
    let ref = currentCard.data('ref');

    // window.history.pushState(null, null, `#${ref}`);
    currentCard.siblings().find('.card-body').collapse('hide');
});

$(document).ready(function() {
    $(`#collapsible-card-${window.location.hash.substr(1)}`).collapse('show');
});
