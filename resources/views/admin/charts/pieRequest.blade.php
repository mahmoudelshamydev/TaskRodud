<canvas id="request" width="400" height="400"></canvas>
<script>
    $(function () {

        var config = {
            type: 'pie',
            data: {
                datasets: [{
                    data: [
                        {{ $dataset['paidRequests'] }},
                        {{ $dataset['notPaidRequests'] }},
                        {{ $dataset['pendingRequests'] }}
                    ],
                    backgroundColor: [
                        'rgb(54, 162, 235)',
                        'rgb(255, 99, 132)',
                        'rgb(255, 205, 86)'
                    ]
                }],
                labels: [
                    'Paid',
                    'Not Paid',
                    'Pending'
                ]
            },
            options: {
                maintainAspectRatio: false
            }
        };

        var ctx = document.getElementById('request').getContext('2d');
        new Chart(ctx, config);
    });
</script>
