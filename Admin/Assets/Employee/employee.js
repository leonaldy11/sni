var employeeTable;
var formEmployee = document.getElementById('formEmployee');

$(document).ready(function() {
    loadData();
})

function loadData() {
    employeeTable = $('#employeeTable').DataTable({
        pageLength : 10,
        ordering : true,
        searching : true,
        responsive : true,
        ajax : {
            url : employeeUrl + '/getData',
            method : 'GET',
            dataType : 'JSON',
            dataSrc : function(response) {
                return response.data;
            }
        },
        columns : [
            {
                data : null,
                render : function(data,type,row,meta){
                    return meta.row + 1;
                }
            },
            {
                data: 'name'
            },
            {
                data : 'username'
            },
            {
                data : null,
                render : function (data, type, row){
                    return `
                        <button class='btn btn-sm btn-warning me-2' onclick='editData(${row.id})'>Edit</button>
                        <button class='btn btn-sm btn-danger' onclick='deleteData(${row.id})'>Delete</button>
                    `;
                }
            }
        ],
        columnDefs : [
             {
                targets: [0, -1],
                className: 'text-start'
            }
        ]
    })
}

$("#saveButton").click(function(){
    var name = $("#name").val();
    var username = $("#username").val();

    if (name.trim() === '') {
        alert('Name is required.');
        return;
    }
    if (username.trim() === '') {
        alert('Username is required.');
        return;
    }

    $.ajax({
        url : employeeUrl + '/store',
        method : "POST",
        dataType : "JSON",
        data : {
            name : name,
            username : username
        },
        success : function(response) {
            alert('Employee added successfully.');
            if (response.success) {
                $('#addModal').modal('hide');
                if(formEmployee){
                    formEmployee.reset();
                }
                employeeTable.ajax.reload();
            } else {
                alert('Failed to add Employee: ' + response.message);
            }
        },
        error: function (xhr, status, error) {
            console.error('Error adding material:', error);
            alert('An error occurred while adding the employee.');
        }
    })
})