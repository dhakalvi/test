<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Class Data Pie Chart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Set a specific height and ensure canvas is responsive */
        #pieChart {
            height: 200px; /* Set height to 200px */
            width: 100%; /* Ensure canvas width is responsive */
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
<?php include 'nav.php'; ?>
<div class="container mt-5">
    <h2>Class Data Distribution</h2>
    <canvas id="pieChart"></canvas>
</div>
<hr>
<div class="container mt-5">
    <h2>Data Distribution by Year</h2>
    <canvas id="barChart"></canvas>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    fetch('db/ojt.json')
        .then(response => response.json())
        .then(data => {
            // Count the number of entries for each class
            const counts = { '10': 0, '12': 0 };
            data.forEach(entry => {
                if (entry.CLASS === '10' || entry.CLASS === '12') {
                    counts[entry.CLASS]++;
                }
            });

            // Create the pie chart
            const ctx = document.getElementById('pieChart').getContext('2d');
            new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ['Class 10', 'Class 12'],
                    datasets: [{
                        label: 'Number of Entries',
                        data: [counts['10'], counts['12']],
                        backgroundColor: ['#FF6384', '#36A2EB'],
                        borderColor: ['#fff', '#fff'],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        tooltip: {
                            callbacks: {
                                label: function(tooltipItem) {
                                    const label = tooltipItem.label || '';
                                    const value = tooltipItem.raw || 0;
                                    return `${label}: ${value}`;
                                }
                            }
                        }
                    }
                }
            });
        })
        .catch(error => console.error('Error loading the JSON data:', error));
});
// for bargraph
document.addEventListener('DOMContentLoaded', function() {
    fetch('db/ojt.json')
        .then(response => response.json())
        .then(data => {
            // Initialize the counts for each year from 2071 to 2085
            const yearCounts = {};
            for (let year = 2071; year <= 2085; year++) {
                yearCounts[year] = 0;
            }

            // Count the number of entries for each year
            data.forEach(entry => {
                const year = parseInt(entry.PASSED);
                if (year >= 2071 && year <= 2085) {
                    yearCounts[year]++;
                }
            });

            // Prepare data for the bar chart
            const years = Object.keys(yearCounts);
            const counts = years.map(year => yearCounts[year]);

            // Create the bar chart
            const ctx = document.getElementById('barChart').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: years,
                    datasets: [{
                        label: 'Number of Entries',
                        data: counts,
                        backgroundColor: '#36A2EB',
                        borderColor: '#2A1A2D',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true,
                            max: 50 // Maximum value for the y-axis
                        }
                    },
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        tooltip: {
                            callbacks: {
                                label: function(tooltipItem) {
                                    const label = tooltipItem.label || '';
                                    const value = tooltipItem.raw || 0;
                                    return `${label}: ${value}`;
                                }
                            }
                        }
                    }
                }
            });
        })
        .catch(error => console.error('Error loading the JSON data:', error));
});
</script>
</body>
<?php include 'footer.php'; ?>
</html>
