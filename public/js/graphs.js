
var randomColorFactor = function() {
    return Math.round(Math.random() * 255);
};
var randomColor = function(opacity) {
    return 'rgba(' + randomColorFactor() + ',' + randomColorFactor() + ',' + randomColorFactor() + ',' + (opacity || '.3') + ')';
};

var cats = [];

function draw(data) {

	var datasets = [];
	var dates = [];

    for(cat in cats) {
        dataset = [];
        
	    for(key in data) {
            dataset[key] = data[key]['data'][cats[cat]];
            dates[key] = data[key]['date'];
        }


        datasets[cat] = {
            label: cats[cat].toUpperCase(),
            data: dataset.reverse(),
            fill: false,
            borderDash: [20, 5]
        }
	}

    var config = {
        type: 'line',
        data: {
            labels: dates.reverse(),
            datasets: datasets
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
                text: 'Shape Log data graphs'
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

    var ctx = document.getElementById("graph").getContext("2d");
    window.myLine = new Chart(ctx, config);
}

$(document).ready(function() {    
    $(".tag-list li").click(function() {

        var cat = $(this).data("cat");

        if($(this).data("selected") == 1) {
            $(this).css({color: '#333'});
            $(this).data("selected", '0');
            cats.splice(cats.indexOf(cat), 1);
            draw(data, cats);
        } else {
            $(this).css({color: '#b23432'});
            $(this).data("selected", '1');
            cats.push(cat);
            draw(data, cats);
        }
    });
});