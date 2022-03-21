<style>
    td {
        border: 1px solid black !important;
    }
</style>


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


<table id="tablePreview" class="table">
    <!--Table head-->
    <thead>
        <tr>
            <th>Agent</th>
            <th>Horaires</th>
            <th>Total Traffic</th>
            <th>Date</th>
            <th>Temperature</th>
            <th>Entrée</th>
            <th>Sortie</th>
            <th>Durée</th>
        </tr>
    </thead>
    <!--Table head-->
    <!--Table body-->
    <tbody>
        @foreach ($users as $l)
        <tr>
            <td rowspan="{{$l->userTraffic->count() + 1}}">{{ $l->name }}</td>
            <td rowspan="{{$l->userTraffic->count() + 1}}">
                @foreach ($l->userHoraires as $h) <span> {{ $h->name }} </span> @endforeach
            </td>
            <td rowspan="{{$l->userTraffic->count() + 1}}">{{ $l->userTraffic->count() }}</td>
            <td rowspan="{{$l->userTraffic->count() + 1}}">{{ $l->traffic_groupby_date->count() }}</td>

            @foreach ($l->traffic_groupby_date as $key=>$traffics)
        <tr>
            {{-- <td rowspan="">{{ $traffics->created_at }}</td>
            <td rowspan="">{{ $traffics->temperature }}</td>
            <td rowspan="">{{ $traffics->entre }}</td>
            <td rowspan="">{{ $traffics->sortie }}</td>
            <td rowspan="">{{ $traffics->duration }}</td> --}}
            <td rowspan="{{ $traffics->count() }}">{{ $traffics->count() }} {{ $loop->iteration }}</td>

            @foreach ($traffics as $t)
            <td rowspan="">{{ $t->temperature }}</td>
            <td rowspan="">{{ $t->entre }}</td>
            <td rowspan="">{{ $t->sortie }}</td>
            <td rowspan="">{{ $t->duration }}</td>
            @endforeach
        </tr>
        @endforeach




        {{-- @foreach ($l->userTraffic as $t)
                <tr>
                    {{-- <td rowspan="">{{ $t->created_at }}</td>
        <td rowspan="">{{ $t->temperature }}</td>
        <td rowspan="">{{ $t->entre }}</td>
        <td rowspan="">{{ $t->sortie }}</td>
        <td rowspan="">{{ $t->duration }}</td>
        <td rowspan="">{{ $t->entre }}</td>
        </tr>
        @endforeach --}}


        </tr>
        {{-- <td rowspan="{{$l->userTraffic->count() + 1}}">{{ $l->created_at }}</td>
        @foreach ($l->userTraffic as $t)
        <tr>
            <td rowspan="">{{ $t->temperature }}</td>
            <td rowspan="">{{ $t->entre }}</td>
            <td rowspan="">{{ $t->sortie }}</td>
            <td rowspan="">{{ $t->duration }}</td>
        </tr>
        @endforeach
        </tr> --}}
        @endforeach
    </tbody>
    <!--Table body-->
</table>
<!--Table-->
