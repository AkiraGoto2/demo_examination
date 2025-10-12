<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
	@vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
     @foreach ($reports as $report)
	 <div class="card">
                <tr>
                    <td>{{ $report->number }}</td>
                    <td>{{ $report->description }}</td>
                    <td>{{ $report->created_at->format('d.m.Y H:i') }}</td>
                </tr></div>
    @endforeach
</body>
</html>