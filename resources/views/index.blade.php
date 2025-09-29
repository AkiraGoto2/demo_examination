<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     @foreach ($reports as $report)
                <tr>
                    <td>{{ $report->car_number }}</td>
                    <td>{{ $report->description }}</td>
                    <td>{{ $report->created_at->format('d.m.Y H:i') }}</td>
                </tr>
    @endforeach
</body>
</html>