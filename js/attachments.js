$.ajax({
    type: 'GET',
    url: '/ajax/attchment-data.php',
    success: function (data) {
        var d = data.all_attachments;
        createTable(d);
    },
    error: function (request, status, error) {
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
        <td>${element.class}</td><td>${element.alt_phone}</td>
        <td>${element.attached_dep}</td><td>${element.supervisor_no}</td><td>${element.org_email}</td>
        <td>${element.org_no}</td><td>${element.insured}</td><td>${element.org_name}</td>
        <td>${element.start_date}</td><td>${element.completion_date}</td><td>${element.remark}</td><td>${element.town}</td>`
        let td = document.createElement('td');
        let img = document.createElement('img');
        img.src = `https://maps.google.com/maps/api/staticmap?center=${element.latitude},${element.longitude}&zoom=8&size=40x30&sensor=false&key=`;
        td.appendChild(img)
        tr.appendChild(td);
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


// 'latitude' => $latitude,
// 'longitude' => $longitude,
