
// Convertiamo i dati dei conteggi dei messaggi in JSON

const voteChartContainer = document.getElementById('voteChartContainer');
const voteLabels = JSON.parse(voteChartContainer.getAttribute('data-vote-labels'));
const voteData = JSON.parse(voteChartContainer.getAttribute('data-vote-data'));

// Convertiamo i dati dei conteggi dei messaggi in JSON

const messageChartContainer = document.getElementById('messageChartContainer');
const messageLabels = JSON.parse(messageChartContainer.getAttribute('data-message-labels'));
const messageData = JSON.parse(messageChartContainer.getAttribute('data-message-data'));

const reviewChartContainer = document.getElementById('reviewChartContainer');
const reviewLabels = JSON.parse(reviewChartContainer.getAttribute('data-review-labels'));
const reviewData = JSON.parse(reviewChartContainer.getAttribute('data-review-data'));

/* const messageLabels = @json($messageLabels);
const messageData = @json($messageData);
const reviewLabels = @json($reviewLabels);
const reviewData = @json($reviewData); */


const voteChartConfig = {
    type: 'bar',
    data: {
        labels: voteLabels,
        datasets: [{
            label: 'Votes Received Per Month',
            data: voteData,
            backgroundColor: 'rgba(255, 99, 132, 0.6)',
            borderColor: 'rgba(255, 99, 132, 1)',
            borderWidth: 1
        }]
    },
    options: {
        maintainAspectRatio: false,
        scales: {
            x: {
                title: {
                    display: true,
                    text: 'Month'
                }
            },
            y: {
                beginAtZero: true,
                title: {
                    display: true,
                    text: 'Number of Votes'
                }
            }
        }
    }
};

const messageChartConfig = {
    type: 'bar',
    data: {
        labels: messageLabels,
        datasets: [{
            label: 'Messages Received Per Month',
            data: messageData,
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
        }]
    },
    options: {
        maintainAspectRatio: false,
        scales: {
            x: {
                title: {
                    display: true,
                    text: 'Month'
                }
            },
            y: {
                beginAtZero: true,
                title: {
                    display: true,
                    text: 'Number of Messages'
                }
            }
        }
    }
};

var reviewChartConfig = {
    type: 'bar',
    data: {
        labels: reviewLabels,
        datasets: [{
            label: 'Reviews Received Per Month',
            data: reviewData,
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
        }]
    },
    options: {
        maintainAspectRatio: false,
        scales: {
            x: {
                title: {
                    display: true,
                    text: 'Month'
                }
            },
            y: {
                beginAtZero: true,
                title: {
                    display: true,
                    text: 'Number of Reviews'
                }
            }
        }
    }
};

const voteChart = new Chart(
    document.getElementById('voteChart'),
    voteChartConfig
);

var reviewChart = new Chart(
    document.getElementById('reviewChart'),
    reviewChartConfig
);

const messageChart = new Chart(
    document.getElementById('messageChart'),
    messageChartConfig
);
