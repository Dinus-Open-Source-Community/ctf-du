<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Udinus clonner</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
            text-align: center;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #333333;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            border-radius: 4px;
            border: 1px solid #cccccc;
            font-size: 16px;
            margin-bottom: 10px;
        }

        button {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            background-color: #007BFF;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        .result {
            margin-top: 20px;
            border: 1px solid #e0e0e0;
            padding: 10px;
            border-radius: 4px;
            background-color: #f9f9f9;
            overflow: auto;
            max-height: 400px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>web clonner</h1>
        <form id="cloneForm">
            <input type="text" id="urlInput" placeholder="Enter URL to clone" required>
            <button type="submit">CLONE</button>
        </form>
        <div id="resultContainer" class="result"></div>
    </div>

    <script>
        document.getElementById('cloneForm').addEventListener('submit', function(event) {
            event.preventDefault();
            const url = document.getElementById('urlInput').value;
            if (url) {
                fetch(`clone.php?url=${encodeURIComponent(url)}`)
                    .then(response => response.text())
                    .then(data => {
                        document.getElementById('resultContainer').innerHTML = data;
                    })
                    .catch(error => {
                        document.getElementById('resultContainer').innerHTML = 'Error: ' + error;
                    });
            }
        });
    </script>
</body>
</html>

