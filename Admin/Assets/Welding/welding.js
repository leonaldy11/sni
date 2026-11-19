var weldingTable;

function loadData() {
    weldingTable = $('#weldingTable').DataTable({
        pageLength: 10,
        ordering: true,
        searching: true,
        responsive: true,
        ajax: {
            url: weldingUrl + '/getData',
            type: 'GET',
            dataType: 'json',
            dataSrc: function(response) {
                console.log('Data loaded:', response);
                return response.data;
            },
            error: function(xhr, status, error) {
                console.error('Status:', status);
                console.error('Error:', error);
                console.error('Response:', xhr.responseText);
            }
        },
        columns: [
             {
                data: null,
                render: function (data, type, row, meta) {
                    return meta.row + 1;
                }
            },
            { data: 'name' },
            { data: 'description' },
            {
                data: null,
                render: function(data, type, row) {
                    return `
                        <button class='btn btn-sm btn-warning me-2' onclick='editData(${row.id})'>Edit</button>
                        <button class='btn btn-sm btn-danger' onclick='deleteData(${row.id})'>Delete</button>
                    `;
                }
            }
        ],
        columnDefs: [
            {
                targets: [0, -1],
                className: 'text-start'
            }
        ],
    });
}

$(document).ready(function() {
    loadData();
})

$('#saveButton').on('click', function() {
    // Get form values
    var name = $('#addModal input[type="text"]').val();
    var description = $('#addModal textarea').val();

    // Perform validation
    if (name.trim() === '') {
        alert('Name is required.');
        return;
    }

    // Send data to the server (you can use AJAX here)
    $.ajax({
        url: weldingUrl + "/store",
        method: 'POST',
        data: {
            name: name,
            description: description
        },
        dataType: "json",
        success: function(response) {
            // Handle success response
            alert('Data saved successfully!');
            $('#addModal').modal('hide');
            weldingTable.ajax.reload(null, false);
        },
        error: function(xhr, status, error) {
            // Handle error response
            alert('Error saving data: ' + error);
        }
    });
});

function editData(id) {
    $.ajax({
        url: weldingUrl + "/show/" + id,
        method: 'GET',
        dataType: "json",
        success: function(response) {
            // Populate the edit modal with the data from the server
            $('#id').val(response.id);
            $('#nameEdit').val(response.name);
            $('#descriptionEdit').val(response.description);
            $('#editModal').modal('show');
        }
    });   
};

$("#updateButton").on('click', function() {
    var id = $('#id').val();
    var name = $('#nameEdit').val();
    var description = $('#descriptionEdit').val();
    // Perform validation
    if (name.trim() === '') {
        alert('Name is required.');
        return;
    }

    // Send updated data to the server (you can use AJAX here)
    $.ajax({
        url: weldingUrl + "/update",
        method: 'POST',
        data: {
            id: id,
            name: name,
            description: description
        },
        dataType: "json",
        success: function(response) {
            // Handle success response
            alert('Data updated successfully!');
            $('#editModal').modal('hide');
            weldingTable.ajax.reload(null, false);
        },
        error: function(xhr, status, error) {
            // Handle error response
            alert(error);
        }
    });
});

function deleteData(id) {
    if (confirm('Are you sure you want to delete this item?')) {
        $.ajax({
            url: weldingUrl + "/delete/" + id,
            method: 'POST',
            dataType: "json",
            success: function(response) {
                // Handle success response
                alert('Data deleted successfully!');
                weldingTable.ajax.reload(null, false);
            },
            error: function(xhr, status, error) {
                // Handle error response
                alert('Error deleting data: ' + error);
            }
        });     
    }
}

