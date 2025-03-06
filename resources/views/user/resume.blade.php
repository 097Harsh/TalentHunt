<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ATS Free Resume</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            line-height: 1.5;
        }
        .section-header {
            font-size: 1.5em;
            font-weight: bold;
            margin-bottom: 10px;
            border-bottom: 2px solid #000;
        }
        .section-content {
            margin-bottom: 20px;
        }
        .section-content ul {
            list-style-type: none;
            padding-left: 0;
        }
        .section-content li {
            margin-bottom: 8px;
        }
    </style>
</head>
<body>
    <header>
        <h1>{{ Auth::user()->name }}</h1>
        <p>Email: {{ Auth::user()->email }} | Phone: +91 {{ $data->contact }}| Address: {{ $data->address }} </p>
    </header>

    <section class="section-content">
        <div class="section-header">Professional Summary</div>
        <p>{{ $data->objective }}</p>
    </section>

    <section class="section-content">
        <div class="section-header">Skills</div>
        <ul>
            <li>{{ $data->skills }}</li>
        </ul>
    </section>

    

    <section class="section-content">
        <div class="section-header">Education</div>
        <p>{{ $data->course }}</p>
    </section>

    
</body>
</html>
