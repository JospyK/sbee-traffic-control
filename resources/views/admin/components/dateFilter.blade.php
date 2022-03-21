<div class="row">
    <div class="container">
    <form class="form-inline float-right" name="date" action="{{route('admin.traffic.filter')}}" method="GET">
            <div class="input-group mb-2 mr-sm-2">
                <div class="input-group-prepend">
                    <div class="input-group-text"> <i class="fa fa-time"></i> </div>
                </div>
                <input type="date" class="form-control" id="datef" name="date" value="{{$date}}" required>
            </div>
            <button type="submit" class="btn btn-primary mb-2">Filtrer suivant ce jour</button>
        </form>
    </div>
</div>



