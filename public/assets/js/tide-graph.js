$(function() {

    var margin = {top:20, right: 20, bottom: 30, left: 40};
    var width = 700 - margin.left - margin.right;
    var height = 400 - margin.top - margin.bottom;
    var parseDate = d3.time.format("%Y-%m-%d %H:%M:%S").parse;

    var svg = d3.select('#graph').append("svg")
        .attr("width", width + margin.left + margin.right)
        .attr("height", height + margin.bottom + margin.top)
        .append("g")
        .attr("transform", "translate(" + margin.left + "," + margin.top + ")");

    var tide = [
        {"tide":"155", "time":"2007-7-16 20:57"},
        {"tide":"69", "time":"2007-7-17 02:40"},
        {"tide":"153", "time":"2007-7-17 08:09"},
        {"tide":"27", "time":"2007-7-17 14:56"},
        {"tide":"143", "time":"2007-7-17 21:45"},
        {"tide":"87", "time":"2007-7-18 03:12"}
    ];

    var parseDate = d3.time.format("%Y-%m-%d %H:%M").parse;

    //データセットの型変換
    tide.forEach(function(d){
        d["time"] = parseDate(d["time"]);
    });

    var xScale = d3.time.scale()
        .domain([new Date('2007-7-17 00:00'), new Date('2007-7-17 23:59')])
        .range([0, width]);

    var yScale = d3.scale.linear()
        .domain([0, 180])
        .range([height, 0]);

    var xAxis = d3.svg.axis()
        .scale(xScale)
        .orient("bottom")
        .tickSize(6, height)
        .tickFormat(d3.time.format("%H:%M"));

    var yAxis = d3.svg.axis()
        .ticks(7)
        .scale(yScale)
        .orient("left")
        .tickSize(6, -width);

    // lineの設定
    var line = d3.svg.line()
        .x(function(d){return xScale(d["time"]);})
        .y(function(d){return yScale(d["tide"]);})
        .interpolate("cardinal");

    // lineの表示
    svg.append("path")
        .datum(tide)
        .attr("class", "line")
        .attr("d", line);

    svg.selectAll("circle")
        .data(tide)
        .enter()
        .append("circle")
        .attr("r",2)
        .attr("fill","blue")
        .attr("cx", function(d){console.log(xScale(d["time"]));return xScale(d["time"]); })
        .attr("cy", function(d){console.log(yScale(d["tide"])); return yScale(d["tide"]); });


    svg.append("g")
        .attr("class", "y axis")
        .call(yAxis);

    svg.append("g")
        .attr("class", "x axis")
        .attr("transform", "translate(0," + height + ")")
        .call(xAxis);

});

