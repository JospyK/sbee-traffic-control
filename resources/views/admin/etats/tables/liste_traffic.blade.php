{{-- <style>
    td, table {
        border: 1px solid black;
    }
</style> --}}
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
            <td colspan="8" style="text-align: center; text-decoration: underline;"> <b>Liste des trafics</b></td>
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
            <th>Date</th>
            <th>Temperature</th>
            <th>Entree</th>
            <th>Sortie</th>
            <th>Duree</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($traffics as $l)
        <tr>
            <td>{{ optional($l->user)->name }}</td>
            <td>{{ optional($l->user)->matricule }}</td>
            <td>
                @if($l->user)
                {{ optional($l->user->team)->name }}
                @endif
            </td>
            <td>
                @if($l->user)
                @forelse (optional($l->user)->horaires as $h)
                <span>{{ $h->name }}</span>
                @empty
                @endforelse
                @endif
            </td>

            <td>{{ $l->created_at->format('Y-m-d') }}</td>
            <td>{{ $l->temperature }}</td>
            <td>{{ $l->entre }}</td>
            <td>{{ $l->sortie }}</td>
            <td>{{ $l->duration }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<table>
    <tr>
        <td colspan="8" style="text-align: right;">COTONOU, le </td>
    </tr>
</table>
