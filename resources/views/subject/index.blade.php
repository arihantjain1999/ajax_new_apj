<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
    <div class="container mt-5">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href=" {{route('students.index')}} ">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page"> <a href=" {{route('family.index')}} ">Family Data</a> </li>
              <li class="breadcrumb-item active" aria-current="page">Subject Data</li>
            </ol>
          </nav>
        <table class="table table-hover">
            <thead>
          <tr>
              <th scope="col">id</th>
            <th scope="col">Subject</th>
            <th scope="col">Releted Students</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($subjects as $subject)
            <tr>
                <th scope="row">{{$subject->id}}</th>
                <td>{{$subject->subject}}</td>
                <td>
                    @foreach ($subject->student as $relstudent)    
                    {{ $relstudent->name }} ,   
                    @endforeach
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
    {{-- <h1>Hello, world!</h1> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>