var materialTable;

function loadData() {
    materialTable = $('#materialTable').DataTable({
        pageLength: 10,
        ordering: true,
        searching: true,
        responsive: true,
        ajax: {
            url: materialsUrl + '/getData',
            type: 'GET',
            dataType: 'json',
            dataSrc: function (response) {
                console.log('Data loaded:', response);
                return response.data;
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
                render: function (data, type, row) {
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

$(document).ready(function () {
    loadData();
});

$("#saveButton").click(function () {
    var name = $('#addModal input[type="text"]').val();
    var description = $('#addModal textarea').val();

    // Perform validation
    if (name.trim() === '') {
        alert('Name is required.');
        return;
    }

    $.ajax({
        url: materialsUrl + '/store',
        type: 'POST',
        dataType: 'json',
        data: {
            name: name,
            description: description
        },
        success: function (response) {
            alert('Material added successfully.');
            if (response.success) {
                $('#addModal').modal('hide');
                materialTable.ajax.reload();
            } else {
                alert('Failed to add material: ' + response.message);
            }
        },
        error: function (xhr, status, error) {
            console.error('Error adding material:', error);
            alert('An error occurred while adding the material.');
        }
    });
});

function editData(id) {
    $.ajax({
        url: materialsUrl + '/show/' + id,
        type: 'GET',
        dataType: 'json',
        success: function (response) {
            if (response.success) {
                $('input[name="id"]').val(response.data.id);
                $('input[name="name_edit"]').val(response.data.name);
                $('textarea[name="description_edit"]').val(response.data.description);
                $('#editModal').modal('show');
            } else {
                alert('Failed to fetch material data: ' + response.message);
            }
        },
        error: function (xhr, status, error) {
            console.error('Error fetching material data:', error);
            alert('An error occurred while fetching the material data.');
        }
    });
}

$("#updateButton").click(function () {
    var id = $('input[name="id"]').val();
    var name = $('input[name="name_edit"]').val();
    var description = $('textarea[name="description_edit"]').val();

    // Perform validation
    if (name.trim() === '') {
        alert('Name is required.');
        return;
    }

    $.ajax({
        url: materialsUrl + '/update',
        type: 'POST',
        dataType: 'json',
        data: {
            id: id,
            name: name,
            description: description
        },
        success: function (response) {
            if (response.success) {
                alert('Material updated successfully.');
                $('#editModal').modal('hide');
                materialTable.ajax.reload();
            } else {
                alert('Failed to update material: ' + response.message);
            }
        },
        error: function (xhr, status, error) {
            console.error('Error updating material:', error);
            alert('An error occurred while updating the material.');
        }
    });
});

function deleteData(id) {
    if (confirm('Are you sure you want to delete this material?')) {
        $.ajax({
            url: materialsUrl + '/delete/' + id,
            type: 'POST',
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    alert('Material deleted successfully.');
                    materialTable.ajax.reload();
                } else {
                    alert('Failed to delete material: ' + response.message);
                }
            },
            error: function (xhr, status, error) {
                console.error('Error deleting material:', error);
                alert('An error occurred while deleting the material.');
            }
        });
    }
}