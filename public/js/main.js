

var ctx = document.getElementById('myChart1').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'pie',

    // The data for our dataset
    data: {
        labels: ['January', 'February', 'March'],
        datasets: [{
            label: 'My First dataset',
            backgroundColor: ['rgb(255, 99, 132)',
                              '#81ecec',
                              '#fdcb6e'
                             ],
            borderColor: '#FFF',
            data: [2, 10, 5]
        }]
    },

    // Configuration options go here
    options: {}
});


var ctx = document.getElementById('myChart').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'bar',

    // The data for our dataset
    data: {
        labels: ['Aleksandar', 'Nikola', 'Nemanja', 'Sanja', 'Jovana'],
        datasets: [{
            label: 'My First dataset',
            backgroundColor: ['rgb(255, 99, 132)',
                              '#81ecec',
                              '#d63031',
                              '#a29bfe',
                              '#fdcb6e',
                              '#d63031'
                             ],
            borderColor: '#FFF',
            data: [2, 10, 5, 3, 6, 8]
        }]
    },

    // Configuration options go here
    options: {}
});

