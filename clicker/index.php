<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clicker</title>
    <script src="script.js"></script>
    <style>
        body{
            font-size: 50px;
            }
        #rawr{
            padding: 20px;
            margin-top: 20px;
            margin-left: 20px;
            margin-bottom: -30px;
            font-size: 50px;
        }
        #size{
            font-size: 50px;
        }

    </style>
</head>
<body>
    <button id="rawr" onclick="count()">Press me! :D</button>
    <p>How many times clicked: <span id="clickCount">0</span></p>


<form id="size" method="POST" action="handle-click.php">
<input id="size" type="text" id="input" name="clicks"/><br><br>
<button id="size">Save your count! :D</button>







</body>
</html>
