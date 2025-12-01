@props(['sort', 'status', 'statuses'])

<div>
    <label for="sort-select" class="block mb-1 font-semibold">Сортировка по дате создания</label>
    <select id="sort-select" class="border rounded p-1" onchange="location = this.value;">
        <option value="{{ route('reports.index', ['sort' => 'desc', 'status' => $status]) }}" {{ $sort == 'desc' ? 'selected' : '' }}>Сначала новые</option>
        <option value="{{ route('reports.index', ['sort' => 'asc', 'status' => $status]) }}" {{ $sort == 'asc' ? 'selected' : '' }}>Сначала старые</option>
    </select>
</div>

<div class="mt-4">
    <label for="status-select" class="block mb-1 font-semibold">Фильтрация по статусу заявки</label>
    <select id="status-select" class="border rounded p-1" onchange="location = this.value;">
        @foreach($statuses as $s)
            <option value="{{ route('reports.index', ['sort' => $sort, 'status' => $s->id]) }}" {{ $status == $s->id ? 'selected' : '' }}>
                {{ $s->name }}
            </option>
        @endforeach
    </select>
</div>
