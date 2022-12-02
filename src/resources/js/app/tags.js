let table = $('#list_tags').DataTable({
    columnDefs: [
        {
            target: 0,
            visible: false,
            searchable: false,
        }
    ],
});
