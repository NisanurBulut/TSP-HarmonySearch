function loadColorsToTable() {
    var table = $("#dtColor").DataTable({
        serverSide: false,
        ajax: {
            url: "/settings/getColors",
            dataSrc: "",
        },
        columns: [
            { data: "id" },
            { data: "name" },
            { data: "description" },
            {
                data: "id",
                render: function (data, type) {
                    return (
                        `<a class="btnModalOpen" id='${data}' href="/settings/editColor/${data}">`
                        +`<i class="blue edit icon"></i></a>`
                        +`<a class="btnConfirmModalOpen" id='${data}' href="/settings/destroyColor/${data}">`
                        +`<i class="red trash icon"></i></a>`
                    );
                },
            },
        ],
        bPaginate: true,
        bLengthChange: false,
        pageLength: 5,
    });
}
function loadSituationsToTable() {
    var table = $("#dtStatus").DataTable({
        serverSide: false,
        ajax: {
            url: "/settings/getSituations",
            dataSrc: "",
        },
        columns: [
            { data: "id" },
            { data: "name" },
            { data: "color" },
            {
                data: "id",
                render: function (data, type) {
                    return (
                        `<a class="btnModalOpen" id='${data}' href="/settings/editStatus/${data}">`
                        +`<i class="blue edit icon"></i></a>`
                        +`<a class="btnConfirmModalOpen" id='${data}' href="/settings/destroyStatus/${data}">`
                        +`<i class="red trash icon"></i></a>`
                    );
                },
            },
        ],
        bPaginate: true,
        bLengthChange: false,
        pageLength: 5,
    });
}
function loadStatesToTable() {
    var table = $("#dtState").DataTable({
        serverSide: false,
        ajax: {
            url: "/settings/getStates",
            dataSrc: "",
        },
        columns: [
            { data: "id" },
            { data: "name" },
            {
                data: "id",
                render: function (data, type) {
                    return (
                         `<a class="btnModalOpen" id='${data}' href="/settings/editState/${data}">`
                        +`<i class="blue edit icon"></i></a>`
                        + `<a class="btnConfirmModalOpen" id='${data}' href="/settings/destroyState/${data}">`
                        + `<i class="red trash icon"></i></a>`
                    );
                },
            },
        ],
        bPaginate: true,
        bLengthChange: false,
        pageLength: 5,
    });
}
loadColorsToTable();
loadSituationsToTable();
loadStatesToTable();
