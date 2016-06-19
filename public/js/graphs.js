
var randomColorFactor = function() {
    return Math.round(Math.random() * 255);
};
var randomColor = function(opacity) {
    return 'rgba(' + randomColorFactor() + ',' + randomColorFactor() + ',' + randomColorFactor() + ',' + (opacity || '.3') + ')';
};

function draw(data, cat) {

	var dataset = new Array();
	var dates = new Array();

	for(key in data) {
		dates[key] = data[key]['date'];
		dataset[key] = data[key]['data'][cat];
	}

    var config = {
        type: 'line',
        data: {
            labels: dates.reverse(),
            datasets: [{
                label: cat.toUpperCase(),
                data: dataset.reverse(),
                fill: false,
                borderDash: [5, 5],
            }]
        },
        options: {
            responsive: true,
            legend: {
                position: 'bottom',
            },
            hover: {
                mode: 'label'
            },
            scales: {
                xAxes: [{
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: 'Categories'
                    }
                }],
                yAxes: [{
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: 'Value'
                    }
                }]
            },
            title: {
                display: true,
                text: 'ShapeLog data Graphs'
            }
        }
    };

    $.each(config.data.datasets, function(i, dataset) {
        var background = randomColor(0.5);
        dataset.borderColor = background;
        dataset.backgroundColor = background;
        dataset.pointBorderColor = background;
        dataset.pointBackgroundColor = background;
        dataset.pointBorderWidth = 1;
    });

    var ctx = document.getElementById("canvas").getContext("2d");
    window.myLine = new Chart(ctx, config);
}