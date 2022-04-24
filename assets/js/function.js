$('.counter').counterUp({
    delay: 10,
    time: 1000
});

let dataArry = ["Jul 21","Jul 20","Jul 19","Jul 14","Jul 13","Jul 12","Jul 10","Jul 5",];
let orderArry = [5,3,4,4,7,3,8,4];
let viewer = [7,8,11,12,9,6,10,9];





var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: dataArry,
        datasets: [{
            label: 'Order',
            data: orderArry,
            backgroundColor: [
                'rgba(54, 162, 235, 0.2)',
            ],
            borderColor: [
                'rgba(54, 162, 235, 1)',
            ],
            borderWidth: 1,
            tension: 0
        },
        {
            label: 'viewer',
            data: viewer,
            backgroundColor: [
                'rgba(50, 292, 291, 0.2)',
            ],
            borderColor: [
                'rgba(50, 292, 291, 1)',
            ],
            borderWidth: 1,
            tension: 0
        }
    ]
    },
    options: {
        scales: {
            yAxes: [{
                display: false
            }],
            y: {
                beginAtZero: true,
            },
            
        },

        legend: {
            display: true,
          position: 'top',
            labels: {
                fontColor: '#333',
                usePointStyle : true,
            }
        }
    }

});


var ctx1 = document.getElementById('myChartDo').getContext('2d');
var myChartDo = new Chart(ctx1, {
    type: 'doughnut',
    data: {
        labels: ['YGN', 'MDY', 'NPT', 'BGO'],
        datasets: [{
            label: '# of Votes',
            data: [19, 14, 13, 10],
            backgroundColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
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
        },
        legend: {
            display: true,
          position: 'bottom',
            labels: {
                fontColor: '#333',
                usePointStyle : true,
            }
        }
    }
});