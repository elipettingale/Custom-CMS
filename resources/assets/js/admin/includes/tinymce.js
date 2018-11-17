import tinymce from 'tinymce/tinymce';

import image from 'tinymce/plugins/image';
import link from 'tinymce/plugins/link';
import advlist from 'tinymce/plugins/advlist';
import lists from 'tinymce/plugins/lists';
import code from 'tinymce/plugins/code';

import 'tinymce/themes/modern/theme';

tinymce.init({
    selector: '.wysiwyg',
    theme: 'modern',
    menubar: false,
    height: 300,
    plugins: [
        'advlist lists link image code'
    ],
    toolbar1: "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | code",
    images_upload_handler: function(blobInfo, success, failure) {
        let textarea = $(`#${tinymce.activeEditor.id}`);

        let form = new FormData;
        form.append("entity_type", textarea.attr('data-entity-type'));
        form.append("entity_id", textarea.attr('data-entity-id'));
        form.append("media_files[]", blobInfo.blob());
        form.append("media_collection", tinymce.activeEditor.id + '_images');

        axios.post('/api/media', form)
        .then(({data}) => {
            if (data.success) {
                success(data.url);
            }
        })
        .catch((error) => failure(error));
    }
});
