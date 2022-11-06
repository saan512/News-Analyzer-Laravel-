
const ctx = document.getElementById('polarArea').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'polarArea',
    data: {
        labels: ['Positive', 'Nuetral', 'Negative'],
        datasets: [{
            // label: '# of Votes',
            data: [50, 30, 20],
            backgroundColor: [
                'rgba(10, 206, 50, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 0, 0, 1)'
            ],
            
            borderWidth: 1
        }]
    },
    options: {
        Response: true,
    }
});

const charti = document.getElementById('myChart').getContext('2d');
const myChart2 = new Chart(charti, {
    type: 'bar',
    data: {
        labels: ['Positive', 'Nuetral', 'Negative'],
        datasets: [{
            label: 'English News',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 2)',
                'rgba(54, 162, 235, 2)',
                'rgba(255, 206, 86, 2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        Response: true,
    }
});

