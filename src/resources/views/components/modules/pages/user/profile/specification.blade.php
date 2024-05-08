<div>
    <h3>{{ $specificationTitle }}</h3>
    <ul>
        @forelse($specifications as $specification)
            <li>- {{ $specification->name }}</li>
        @empty
            <p>- Информация отсутствует</p>
        @endforelse
    </ul>
</div>
