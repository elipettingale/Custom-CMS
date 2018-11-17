let table = $('table[data-table-ref="main"]');
let search = $('input[data-table-ref="main"]');

table.DataTable({
    columnDefs: [
        {
            targets: 'no-sort',
            orderable: false,
        },
        {
            targets: 'no-search',
            searchable: false
        }
    ],
    search: {
        search: search.val()
    },
    order: [
        [
            table.data('table-sort-column'),
            table.data('table-sort-direction')
        ]
    ],
    pageLength: table.data('table-per-page'),
    paging: table.data('table-pagination'),
    info: table.data('table-pagination')
});

search.keyup(function () {
    table.DataTable().search(search.val()).draw();
});
