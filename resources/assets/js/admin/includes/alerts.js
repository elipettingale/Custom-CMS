import swal from 'sweetalert';

$('button[data-alert="confirm-delete"]').click(function(event) {
    event.preventDefault();
    swal({
        title: 'Are you sure?',
        text: 'This will permanently delete this item!',
        icon: 'warning',
        buttons: ['Cancel', 'Delete'],
        dangerMode: true
    })
    .then((confirm) => {
        if (confirm) {
            $(this).closest('form').submit();
        }
    });
});

let successAlert = $('.swal-alert.alert-success');

if (successAlert.length > 0) {
    swal({
        text: successAlert.attr('data-message'),
        className: "alert-success",
        buttons: false,
        timer: 3000
    });
}

let errorAlert = $('.swal-alert.alert-danger');

if (errorAlert.length > 0) {
    swal({
        text: errorAlert.attr('data-message'),
        className: "alert-danger",
        buttons: false,
        timer: 3000
    });
}

let infoAlert = $('.swal-alert.alert-info');

if (infoAlert.length > 0) {
    swal({
        text: infoAlert.attr('data-message'),
        className: "alert-info",
        buttons: false,
        timer: 3000
    });
}

$('a[data-alert="confirm"]').click(function(event) {
    event.preventDefault();
    let text = $(event.target).attr('data-alert-message');
    swal({
        title: 'Are you sure?',
        text: text,
        icon: 'warning',
        buttons: ['Cancel', 'Confirm']
    })
    .then((confirm) => {
        if (confirm) {
           window.location.replace(event.target.getAttribute('href'));
        }
    });
});

$('button[data-alert="confirm"]').click(function(event) {
    event.preventDefault();
    let text = $(event.target).attr('data-alert-message');
    swal({
        title: 'Are you sure?',
        text: text,
        icon: 'warning',
        buttons: ['Cancel', 'Confirm']
    })
    .then((confirm) => {
        if (confirm) {
            $(this).closest('form').submit();
        }
    });
});
