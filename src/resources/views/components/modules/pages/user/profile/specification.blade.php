<div>
    <h3>{{ $specificationTitle }}</h3>
    <ul>
        @forelse($specifications as $specification)
            <li>- {{ $specification->name }}</li>
        @empty
            <li>- Не указан</li>
        @endforelse
    </ul>
</div>
