<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Results</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
</head>
<body style="background-color:#3B3738">
    <div class = "jumbotron"> 
        <h1 class="text-center"> Results</h1>
    </div>
    <div class = "container" >
    
    <div class = "text-center"> 
            <?php 
                require 'db_connect.inc.php';
                $place = array("agra","varanasi","lek","hampi","darjeeling","goa");
                $count = array();
                for($i=0;$i<6;$i++){
                    $temp = $place[$i];
                    $query_val = "SELECT $temp FROM poll";
                    if($query_val_run = mysql_query($query_val)){
                        $y = mysql_result($query_val_run,0,$place[$i]);
                        array_push($count,$y);
                    }
                }   
            ?>

            <canvas id="polling_chart" width="400" height="400" class = "center" style="color:#005A31"></canvas>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js"></script>

            <script type="text/javascript" >
            var val = <?php echo json_encode($count) ?>;


                var ctx = document.getElementById("polling_chart").getContext("2d");
                var data =  {
                                labels: ["Agra", "Varanasi", "Ladakh", "Hampi", "Darjeeling", "Goa"],
                                datasets: [
                                    {
                                        label: "My First dataset",
                                        fillColor: "rgba(220,220,220,0.5)",
                                        strokeColor: "rgba(220,220,220,0.8)",
                                        highlightFill: "rgba(220,220,220,0.75)",
                                        highlightStroke: "rgba(220,220,220,1)",
                                        data: [ val[0],val[1],val[2],val[3],val[4],val[5] ]
                                    }
                                ]
                            };

                var pollingChart = new Chart(ctx).Bar(data);

            </script>

        </div>
    </div>
</body>
</html>
