$.ajax({
    type: 'GET',
    url: '/ajax/attchment-data.php',
    success: function (data) {
        var d = data.all_attachments;
        appendGrpah(d);
    },
    error: function (request, status, error) {
        $('#error-modal').modal('show');
    }
});
function appendGrpah(data) {
    let towns_and_data = [];
    let label = [];
    let values = [];
    data.forEach(element => {
        let itempos = towns_and_data.findIndex((obj) => obj.name == element.town);
        if (itempos == -1) {
            let obj = {
                name: element.town,
                number: 1,
            }
            towns_and_data.unshift(obj);
            label.unshift(element.town);
            values.unshift(1);
        } else {
            towns_and_data[itempos].number += 1;
            values[itempos] += 1;
        }
    });

    // console.log(values);
    // console.log(label);


    const ctx = document.getElementById('myChart');
    const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: label,
            datasets: [{
                label: 'Towns Of Attachement',
                data: values,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
}


