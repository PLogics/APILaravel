<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link rel="stylesheet" href="{{asset('http://localhost/UserProfile/resources/css/userstyle.css')}}"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container fluid mt-5">
        <div class="row justify-content text-center d-flex">
            <div>
                <h5 class="alert alert-primary">Topics of Post</h5>
                {{-- <a href="http://localhost/UserProfile/public/index"><input class="btn btn-primary btn-sm" type="submit" value="Go Back" /></a> --}}
            </div>
            @foreach ($data as $row)
            <div class="col-lg-3 mt-3 mb-4">
                <div class="card" style="width: 18rem;border-top-left-radius: 10em;
                border-top-right-radius: 10em;">
                    {{-- <img src="storage/images/{{$row->photo}}" height="210px" class="card-img-top" alt="..."> ---}}
                    <div class="card-body">
                        <h5 class="card-title fw-bold">{{$row->id}}.{{$row->post}}</h5>
                        {{-- <p class="card-text">{{$row->emailid}}</p> --}}
                        <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>

</html>
<!-- https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg -->