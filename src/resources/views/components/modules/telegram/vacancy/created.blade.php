Создана новая вакансия:
ФИО владельца: {{ $vacancy->owner->fullName() }}
ID владельца: {{ $vacancy->owner->id }}
Номер: <b>{{ $vacancy->id }}</b>
Название: <b>{{ $vacancy->title }}</b>
Город: <b>{{ $vacancy->city->name }}</b>
