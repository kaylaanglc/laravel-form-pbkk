<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beauty Product Review Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body style="background-color: pink">
   <div class="container main-content center-content">
        <div class="position-absolute top-50 start-50 translate-middle bg-light bg-gradient text-dark rounded" style="box-shadow: 0px 0px 10px 2px rgba(0, 0, 0, 0.2); padding: 20px;">
            <div class="text-center fw-bold mb-5">
                BEAUTY PRODUCT REVIEW FORM
            </div>
            <div class="row">
                <!-- Image Column -->
                <div class="col-md-6">
                    @if(isset($results['image']))
                        <img src="{{ asset('storage/images/'.$results['image']) }}" style="height: 250px">
                    @endif
                </div>
                <!-- Data Column -->
                <div class="col-md-6">
                    @foreach($results as $key => $result)
                        <div class="p-1">
                            <strong>{{ $key }}:</strong> {{ $result }}
                        </div>
                    @endforeach
                    @if (session('status'))
                        <div class="alert alert-success mt-3">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
