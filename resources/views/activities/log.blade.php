<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Activity Logs</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid py-3 py-sm-4 px-sm-4">
        <div class="card">
            <div class="card-header bg-white py-3">
                <h5>Recent Activities</h5>
            </div>

            <ul class="list-group list-group-flush">
                @foreach ($activities as $activity)
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-sm-1 fw-bold">{{ $activity->created_at?->fromNow() }}</div>
                                <div class="col-sm-2">{{ $activity->organisation?->name }}</div>
                                <div class="col-sm-2">{{ $activity->causer?->member->name }}</div>
                                <div class="col-sm-6 mt-2 mt-sm-0">{{ $activity->description }}</div>
                                <div class="col-sm-1"></div>
                            </div>
                        </li>
                    @endforeach
            </ul>

            <div class="card-footer d-flex justify-content-center">
                {{ $activities->links() }}
            </div>
        </div>

    </div>

</body>

</html>
