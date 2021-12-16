$.ajax({
    type: 'GET',
    url: '/ajax/list_supervisors.php',
    success: function (data) {
        var d = data.all_supervisors;
        createTable(d);
    },
    error: function () {
        let message = 'Error Loading Supervisors';
        let msg = `<div class="text-danger"><span class="spinner-grow spinner-grow-sm text-white font-weight-bold" role="status"></span> ${message}</div>`
        $('#error-message').html(msg);
        $('#error-modal').modal('show');
    }
});

function createTable(array) {
    const table = document.getElementById('table_loaded');
    const tbody = document.createElement('tbody');
    array.forEach(element => {
        // const div = document.createElement('div');
        const tr = document.createElement('tr');
        var link = '';
        tr.innerHTML += `
        <td>${element.firstname} ${element.lastname}</td><td>${element.email}</td>
        <td>${element.phone_number}</td><td>${element.dob}</td><td>${element.department}</td>
        <td>${element.class_name}</td><td>${element.alt_phone}</td>`
        tbody.appendChild(tr);
    });
    table.appendChild(tbody)
    $('#table_loaded').DataTable({
        fixedHeader: true,
        fixedColumns: true,
        responsive: true,
        dom: 'Bfrtip',
        buttons: false
    });
}

