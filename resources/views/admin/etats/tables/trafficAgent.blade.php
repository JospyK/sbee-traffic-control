<table>
    <thead>
        <tr>
            <td colspan="2"> <img src="logo.jpg" width="100px;"></td>
            <td colspan="6">
                REPUBLIQUE DU BENIN <br> MINISTERE DE
                L'ENERGIE
                <br>SOCIETE
                BENINOISE D'ENERGIE ELECTRIQUE
            </td>
        </tr>
        <tr>
            <td colspan="8"></td>
        </tr>
        <tr>
            <td colspan="8" style="text-align: center; text-decoration: underline;"> <b>Trafics par utilisateurs</b>
            </td>
        </tr>
    </thead>
</table>

<table>
    <thead>
        <tr>
            <th>Agent</th>
            <th>Matricule</th>
            <th>Direction</th>
            <th>Horaires</th>
            <th>Total Trafic</th>
            <th>Date</th>
            <th>Temperature</th>
            <th>Entree</th>
            <th>Sortie</th>
            <th>Duree</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $l)
        <tr>
            <td rowspan="{{$l->userTraffic->count() + 1}}">{{ $l->name }}</td>
            <td rowspan="{{$l->userTraffic->count() + 1}}">{{ $l->matricule }}</td>
            <td rowspan="{{$l->userTraffic->count() + 1}}">{{ optional($l->team)->name }}</td>
            <td rowspan="{{$l->userTraffic->count() + 1}}">
                @foreach ($l->userHoraires as $h) <span> {{ $h->name }} </span> <br> @endforeach
            </td>
            <td rowspan="{{$l->userTraffic->count() + 1}}">{{ $l->userTraffic->count() }}</td>
        </tr>
        @foreach ($l->userTraffic as $t)
        <tr>
            <td>{{ $t->created_at->format('Y-m-d') }}</td>
            <td>{{ $t->temperature }}</td>
            <td>{{ $t->entre }}</td>
            <td>{{ $t->sortie }}</td>
            <td>{{ $t->duration }}</td>
        </tr>
        @endforeach
        @endforeach
    </tbody>
</table>
