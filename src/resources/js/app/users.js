
let table = $('#list_users').DataTable({
    columnDefs: [
        {
            target: 0,
            visible: false,
            searchable: false,
        }
    ],
});
