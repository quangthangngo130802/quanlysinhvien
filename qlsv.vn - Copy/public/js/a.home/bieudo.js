$(document).ready(function () {
   
    showGraph();
});

// setInterval(function(){
//     showGraph();
// }, 4000);

function showGraph() {
    
    $.ajax({
        url: "?mod=home&action=bieudo_sv",
        type: "POST",
        dataType: "json",
        success: function (data) {
         
            var formStatusVar = [];
            var total = [];

            for (var i in data) {
                formStatusVar.push(data[i].year);
                total.push(data[i].size_status);
            }

            var options = {
                legend: {
                    display: false
                },
                scales: {
                    xAxes: [{
                        display: true
                    }],
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                },

                title: {
                    display: true,
                    text: "Sinh viên theo khóa"
                },

                barPercentage: 0.5, 
                categoryPercentage: 0.8 
            };

            var myChart = {
                labels: formStatusVar,
                datasets: [{
                    label: 'Tổng số',
                    backgroundColor: '#17cbd1',
                    borderColor: '#46d5f1',
                    hoverBackgroundColor: '#0ec2b6',
                    hoverBorderColor: '#42f5ef',
                    data: total
                }]
            };

            var bar = $("#chart1");
            var barGraph = new Chart(bar, {
                type: 'bar',
                data: myChart,
                options: options
            });
        }
    });

   

////////////////////////////////////////////
    
    $.ajax({
        url: "?mod=home&action=bieudo_teacher",
        type: "POST",
        dataType: "json",
        success: function (data) {
         
            var labels = [];
            var result = [];
            for (var i in data) {
                labels.push(data[i].education);
                result.push(data[i].size_education);
            }
           
            $('#chart2').css('width', '150');
            $('#chart2').attr('height', 'auto');

            var pie = document.getElementById('chart2').getContext('2d');
            var myChart = new Chart(pie, {
                type: 'pie',
                options: {
                    title: {
                        display: true,
                        text: "Trình độ giảng viên"
                    }
                },
                data: {           
                    datasets: [
                        {  
                            borderColor: ["rgba(217, 83, 72,1)","rgba(240, 173, 78, 1)","rgba(92, 184, 92, 1)", "rgba(666, 1111, 81, 1)"],
                            backgroundColor: ["rgba(217, 83, 72.2)","rgba(240, 173, 78, 1.2)","rgba(92, 184, 92, 1.2)", "rgba(666, 1111, 81, 1.2)"],
                            borderWidth: 1,
                            data: result,
                        }
                    ],
                    labels: labels
                },
                
            });
        }
    });
}
