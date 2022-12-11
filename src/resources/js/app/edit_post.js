
$("#select_tags_update").select2({
    tags: true,
    multiple: true,
    tokenSeparators: [',', ' '],
    minimumInputLength: 2,
    ajax: {
        url: '/api/admin/tags/search',
        dataType: "json",
        type: "GET",
        data: function (params) {

            return {
                term: params.term
            };
        },
        processResults: function (data) {
            if (data.total < 1) {
                throw false;
            }

            return {
                results: $.map(data.results, function (item) {
                    return {
                        text: item.title,
                        id: item.id
                    }
                })
            };
        }
    }
});
