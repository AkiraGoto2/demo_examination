<div class="bg-gray-50 border rounded p-4 mb-3">
    <div class="mb-3">
        <div class="flex items-center gap-3 mb-2">
            <div class="font-bold">
                <a href="{{ route('reports.show', $report->id) }}" class="text-blue-600">
                    {{ $report->number }}
                </a>
            </div>
            <x-status :type="$report->status->id">
                {{ $report->status->name }}
            </x-status>
        </div>
        
        <div class="mb-2">{{ $report->description }}</div>
        <div class="text-sm text-gray-500">{{ $report->created_at->format('d.m.Y H:i') }}</div>
    </div>
    
    <div class="flex gap-2">
        <a href="{{ route('reports.edit', $report->id) }}" class="px-3 py-1 bg-blue-500 text-white rounded text-sm">
            Редактировать
        </a>
        <form method="POST" action="{{ route('reports.destroy', $report->id) }}">
            @method('delete')
            @csrf
            <button type="submit" onclick="return confirm('Удалить?')" class="px-3 py-1 bg-red-500 text-white rounded text-sm">
                Удалить
            </button>
        </form>
    </div>
</div>