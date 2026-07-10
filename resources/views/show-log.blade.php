<!DOCTYPE html>
<html>
<head>
    <title>Application Log</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        pre {
            white-space: pre-wrap; /* Preserve formatting and line breaks */
            word-wrap: break-word;  /* Prevent long lines from overflowing */
            background-color: #f4f4f4;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <h1>Application Log</h1>
    <pre>{{ $logContents }}</pre>
</body>
</html>
