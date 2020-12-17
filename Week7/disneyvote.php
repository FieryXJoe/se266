<?php
    require __DIR__ . "/model/model_disney.php";
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>JavaScript data Attribute</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../style.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
    </head>
    <body id="disneyvote">
        <ul>
            <li><a href="http://se266-sherry-j-2020.herokuapp.com/">Home</a></li>
            <li><a href="http://se266-sherry-j-2020.herokuapp.com/otherWork.html">Other Work</a></li>
        </ul>
        <div style="margin-left:50px; margin-top:50px;">
            <table id = "disneychars">
                <tr id="disneyimages">
                </tr>
                <tr id="disneybuttons">
                </tr>
            </table>
            <div id = "chartContainer" style="width:800px;height:800px;margin:auto;">
            
            </div>
        </div>
        
    </body>
</html>
<script>
    function displayVoteOptions (characters) {
        characters=JSON.parse(characters)
        for (i=0; i<characters[0].length;i++) {
            document.getElementById("disneyimages").innerHTML += '<td><img src="images/' + characters[2][i] +'"></td>';
            document.getElementById("disneybuttons").innerHTML += '<td><input type="button" class="btn" data-character-id="' + characters[0][i] +'" value = "Vote for ' + characters[1][i] + '"></td>';
        }
    }
    window.addEventListener('load', loadPage);

    function addButtonListeners() {
        document.querySelectorAll('.btn').forEach(item => {
            item.addEventListener('click', insertVote);
        })
    };

    async function insertVote(event)
    {
        var id = event.target.getAttribute('data-character-id');

        const url = 'insertDisneyVote.php';
        const data = {charID : id};
    
        try {
            const response = await fetch(url, {
              method: 'POST',
              body: JSON.stringify(data),
              headers:{
                  'Content-Type': 'application/json'
              }
            });
            const json = await response.json(); 
        } catch (error) {
            console.error (error);
        }
        getVotes()
    }

    async function loadPage (event) {   
        const url = 'getDisneyCharacters.php';
    
        try {
            const response = await fetch(url, {
              method: 'GET'
            });
            const json = await response.json();
            displayVoteOptions (json);
            
          } catch (error) {
              console.error (error);
          }
          addButtonListeners();
    }

    async function getVotes (event) {   
        const url = 'getDisneyVotes.php';
    
        try {
            const response = await fetch(url, {
              method: 'POST'
            });
            const json = await response.json();
            drawGraph(json);
          } catch (error) {
              console.error (error);
          }          
    }

    function drawGraph(json)
    {
        json = JSON.parse(json);
        colors = [];

        document.getElementById("chartContainer").innerHTML = '<canvas id="myChart"></canvas>';

        for(var i = 0; i < json[0].length; i++)
            colors[i] = "#" + Math.floor(Math.random()*16777215).toString(16)

        new Chart(document.getElementById("myChart"), {
            scaleFontColor: "white",
            type: 'bar',
            data: {
                labels: json[0],
                datasets: [
                {
                    label: "Number of Votes",
                    backgroundColor: colors,
                    hoverBackgroundColor: colors,
                    data: json[1],
                    borderWidth: 10
                }
                ]
            },
            options: {
                legend: { 
                    fontColor:"white",
                    display: false
                },
                label:{
                    fontColor:"white"
                },
                title: {
                    fontColor:"white",
                    display: true,
                    text: 'Number of Votes by Character'
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            fontColor:"white",
                            beginAtZero:true
                        }
                    }],
                    xAxes: [{
                        ticks:{
                            fontColor:"white"
                        }
                    }]
                }
            }
        });
    }

</script>
    
    
