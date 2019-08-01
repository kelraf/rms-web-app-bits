// import { Data }  from "./module.js";


function dashboard() {
    
    (function headermenu() {
        let header = document.getElementById("header");
        let menu = document.getElementById("menu");

        let header_height = header.offsetHeight;

        menu.style.top = `-${header_height}px`;

        console.log(`-${header_height}px`);
    }())

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

    // Dashboard Tab
    let dashboardTab = document.getElementById("dashboard");
    dashboardTab.onclick = function() {

        let element = document.querySelector(".active-custom");
        element.classList.remove("active-custom");
        this.classList.add("active-custom")

    }

    // apartments
    let apartments = document.getElementById("apartments");
    apartments.onclick = function() {
        // alert("Success");

        let element = document.querySelector(".active-custom");
        element.classList.remove("active-custom");

        this.classList.add("active-custom");

    }

    // houses
    let houses = document.getElementById("houses");
    houses.onclick = function() {

        let element = document.querySelector(".active-custom");
        element.classList.remove("active-custom");
        this.classList.add("active-custom");

    }


    // tenants 
    let tenants = document.getElementById("tenants");
    tenants.onclick = function() {

        let element = document.querySelector(".active-custom");
        element.classList.remove("active-custom");

        this.classList.add("active-custom");

    }


    // payment
    let payment = document.getElementById("payment");
    payment.onclick = function() {

        let element = document.querySelector(".active-custom");
        element.classList.remove("active-custom");

        this.classList.add("active-custom");

    }



    // Create Data Object for Chart
    let data = {
        chartData: "Occupied Vs Unoccupied",
        elementId: "chart-one",
        type: "pie",
        labels: {
            labelOne: "Occupied",
            labelTwo: "UnOccupied",
        },
        data: {
            firstData: occupied,
            secondData: empty
        }
    }

    // Create Chart For Dashboard On Load of the Page
    // Chart One
    chart(data);


    // Edit The Data Object Then Call The Method To Create chart Two
    data.elementId = "chart-two";
    data.labels.labelOne = "Placed Tenants";
    data.labels.labelTwo = "Not Placed Tenants";
    data.data.firstData = placed_count;
    data.data.secondData = not_placed_count;
    chart(data);

    data.elementId = "chart-three";
    chart(data);

    data.elementId = "chart-four";
    chart(data);

    data.elementId = "chart-five";
    data.labels.labelOne = "Total Tenants";
    data.labels.labelTwo = "Expected Tenants";
    data.data.firstData = tenant_count;
    data.data.secondData = total_h;

    // console.log(tenant_count, house_count);
    chart(data);

    data.elementId = "chart-six";
    chart(data);

    data.elementId = "chart-seven";
    chart(data);

    // Apartment Profile
    data.elementId = "apartments";
    chart(data);


}



// Mobile Responsive Menu
let lines_box = document.getElementById("lines-box");
lines_box.onclick = function() {
    let menu = document.getElementById("menu");

    // menu.classList.toggle("menu-show");

    // Check to see if the element has the class to show the menu
    if (menu.classList.contains("menu-show")) {

        // If it has the class add the menu hide class which animates to hide the menu
        menu.classList.add("menu-hide");

        // After SomeTimes remove The class menu show menu hide 
        setTimeout(function() {
            menu.classList.remove("menu-show");
            menu.classList.remove("menu-hide");
        }, 500);


    } else {
        menu.classList.add("menu-show");
    }
}