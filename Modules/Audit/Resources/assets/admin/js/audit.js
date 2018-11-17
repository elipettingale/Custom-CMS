
import swal from 'sweetalert';

$('.audit-log-field').click(function() {
    swal({
        title: $(this).attr('id'),
        text: $(this).val(),
        buttons: false
    });
});
