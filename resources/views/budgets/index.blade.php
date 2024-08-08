<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Treemap Orçamentário</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@500;700&display=swap">
    <script src="https://d3js.org/d3.v6.min.js"></script>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #282c34;
            color: #ffffff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        #treemap {
            width: 960px;
            height: 600px;
        }
        text {
            font-size: 14px;
            fill: #ffffff;
            text-anchor: middle;
            dominant-baseline: central;
            pointer-events: none;
            font-weight: 500;
        }
        rect {
            stroke: #ffffff;
            rx: 5;
            ry: 5;
        }
    </style>
</head>
<body>
    <div id="treemap"></div>

    <script>
        const data = @json($treemapData);

        const width = 960, height = 600;

        const treemap = d3.treemap()
            .size([width, height])
            .padding(2)
            .round(true);

        const root = d3.hierarchy({children: data})
            .sum(d => d.value);

        treemap(root);

        const svg = d3.select("#treemap").append("svg")
            .attr("width", width)
            .attr("height", height);

        const cell = svg.selectAll("g")
            .data(root.leaves())
            .enter().append("g")
            .attr("transform", d => `translate(${d.x0},${d.y0})`);

        cell.append("rect")
            .attr("id", d => d.data.name)
            .attr("width", d => d.x1 - d.x0)
            .attr("height", d => d.y1 - d.y0)
            .attr("fill", d => d.data.color);

        cell.append("text")
            .attr("x", d => (d.x1 - d.x0) / 2)
            .attr("y", d => (d.y1 - d.y0) / 4)
            .text(d => d.data.name);

        cell.append("text")
            .attr("x", d => (d.x1 - d.x0) / 2)
            .attr("y", d => (d.y1 - d.y0) / 2)
            .text(d => `${d.data.value}%`);

        cell.append("text")
            .attr("x", d => (d.x1 - d.x0) / 2)
            .attr("y", d => (3 * (d.y1 - d.y0)) / 4)
            .text(d => d.data.variation > 0 ? `+${d.data.variation.toFixed(2)}%` : `${d.data.variation.toFixed(2)}%`);
    </script>
</body>
</html>
