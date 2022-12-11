
let table = $('#list_posts').DataTable({
    columnDefs: [
        {
            target: 0,
            visible: false,
            searchable: false,
        }
    ],
});
