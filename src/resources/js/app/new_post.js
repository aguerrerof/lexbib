window.jQuery = window.$ = require('jquery');
require('select2');
import "select2/dist/css/select2.css";

$("#select_tags").select2({
    tags: true,
    multiple: true,
    tokenSeparators: [',', ' '],
    minimumInputLength: 2,
    minimumResultsForSearch: 10,
    allowClear: true,
    templateSelection: function (data, container) {
        $(data.element).attr('id-db', data.id);
        return data.text;
    },
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
