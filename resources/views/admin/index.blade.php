<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>
<body>
    <x-app-layout>
        <h1>Админ панель</h1>

        <table>
            <thead>
                <tr>
                    <th>Имя</th>
                    <th>Номер</th>
                    <th>Описание</th>
                    <th>Дата</th>
                    <th>Статус</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($reports as $report)
                    <tr>
                        <td>{{ $report->user->name }}</td>
                        <td> <a href="{{route('reports.show',$report->id)}}"> {{ $report->number }}</a></td>
                        <td>{{ $report->description }}</td>
                        <td>{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $report->created_at)->translatedFormat('j F Y h:i') }}</td>
                        <!-- <td>{{ $report->created_at->format('d.m.Y H:i') }}</td> -->
                        <td>
                            <div>
                                <form class="status-form" action="{{route('reports.status.update', $report->id)}}" method="POST">
                                    @method('patch')
                                    @csrf
                                    <select name="status_id" id="status_id" data-current-status="{{ $report->status_id }}">
                                        @foreach($statuses as $status)
                                        <option value="{{$status->id}}" {{$status->id === $report->status_id ? 'selected' : ''}}>
                                            {{$status->name}}
                                        </option>
                                        @endforeach
                                    </select>
                                </form> 
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </x-app-layout>
</body>
</html>