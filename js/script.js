var arrayData = [];
var arrayTablesData = [];

function callPHP(table_name) {
    var url = "../joins/index.php?table_name=" + table_name;
    $.ajax({
        type: 'POST',
        url: url,
        data: {},
        success: function (data1) {
            setData(data1, url);
            arrayTablesData.push(table_name);
        }
    });
}

function setData(data1, url) {

    $('#data_table').append(
        '<table>' +
            '<thead>' +
            '<tr>' +
            '<td>' + "Campo" + '</td>' +
            '<td>' + "Tipo" + '</td>' +
            '<td>' + "Opciones" + '</td>' +
            '<tr>' +
            '</thead>');

    $.ajax({
        type: "POST",
        url: "../joins/index.php",
        data: data1,
        success: function () {
            $.getJSON(url, function (data) {
                $.each(data, function (index, item) {
//                        console.log(item.Field);
//                        var itemArray = item.Field;
                    $('#data_table').append(
                        '<tbody>' +
                            '<tr>' +
                            '<td>' + item.Field + '</td>' +
                            '<td>' + item.Type + '</td>' +
                            '<td>' + '<input onclick="addArrayData(' + "'" + item.Field + "'" + ')" type="checkbox">' + '</td>' +
                            '<tr>' +
                            '</tbody>' +
                            '</table>');
                });
            });
            alert("done");
        }
    });
}

function addArrayData(campo) {
    arrayData.push(campo);
    document.getElementById("array").innerHTML = arrayData;
    console.log(arrayData);
}

function sendData() {
    window.location.href = '../joins/get_data.php?data=' + JSON.stringify(arrayData) + '&dataTables=' + JSON.stringify(arrayTablesData);
}