function apartmentsProfile() {
    let chartData = {
        chartLabel: null,
        elementId: null,
        type: null,
        labels: {
            labelOne: null,
            labelTwo: null,
        },
        data: {
            firstData: null,
            secondData: null
        }
    }

    function chart(chartData) {
        let chartOne = document.getElementById(chartData.elementId).getContext("2d");
        if (chartOne) {
            let chart = new Chart(chartOne, {
                type: chartData.type,
                data: {
                    labels: [chartData["labels"]["labelOne"], chartData["labels"]["labelTwo"]],
                    datasets: [{
                        label: chartData.chartLabel,
                        data: [chartData["data"]["firstData"], chartData["data"]["secondData"]],
                        backgroundColor: [
                            'rgb(255, 255, 255)',
                            'rgb(255, 0, 0)',
                        ]

                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            })

        } else {
            alert("Could Not Access Chart One Canvas");
        }
    }

    let data = {
        chartData: "Occupied Vs Unoccupied",
        elementId: "apartments",
        type: "pie",
        labels: {
            labelOne: "Occupied Houses",
            labelTwo: "Empty Houses",
        },
        data: {
            firstData: occupied,
            secondData: empty
        }
    }

    // alert()
    chart(data);
}