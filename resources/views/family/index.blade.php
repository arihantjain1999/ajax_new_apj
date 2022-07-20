<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dynamic form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="container m-5">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href=" {{route('students.index')}} ">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Dynamic form</li>
            </ol>
          </nav>
        {{-- <a href=" {{ route('students.index') }} " class="btn btn-secondary my-2"> back</a> --}}
        <div class="form">
            {!! Form::open(['method' => 'POST'  ,'route' => 'family.store' , 'class' => 'form-horizontal from111']) !!}
          
            <div class="formrow">
                <div class="row">
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} col-md-6">
                        <div class="row">
                            <div class="col-md-1">
                                {!! Form::label('name', 'name') !!}
                            </div>
                            {{-- <div class="row"></div>
                            <div class="col-md-3"></div> --}}
                            <div class="col-md-11">
                                {!! Form::text('name[]', null, ['class' => 'form-control name', 'required' => 'required', 'placeholder' => 'name']) !!}
                            </div>
                            <small class="text-danger">{{ $errors->first('name') }}</small>
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('surname') ? ' has-error' : '' }} col-md-6">
                        <div class="row">
                            <div class="col-md-2">
                                {!! Form::label('surname', 'surname') !!}
                            </div>
                            <div class="col-md-10">
                                {!! Form::text('surname[]', null, ['class' => 'form-control surname', 'required' => 'required', 'placeholder' => 'surname']) !!}
                                <small class="text-danger">{{ $errors->first('surname') }}</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="btn-group pull-right my-3">
            
            {!! Form::reset("Reset", ['class' => 'btn btn-outline-warning']) !!}
            {!! Form::submit('Submit', ['class' => 'btn btn-outline-success']) !!}
        </div>
        {!! Form::close() !!}
        {{-- <button class="addform btn btn-outline-secondary">Add form</button> --}}
        <button type="button" class="addform btn btn-outline-secondary position-relative">
            Add form
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-secondary ">
              0
            <span class="visually-hidden">unread messages</span>
            </span>
          </button>
        {{-- <button class="addform btn btn-secondary">Add form</button>
        <button class="submit btn btn-success my-2">save data</button> --}}
    </div>

    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
</body>
<script>
    $(function() {




        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $(document).on('click', '.submit', function() {
            var count = $(".form").children().length;
            console.log(count);
            // console.log($('.name').val());
            // console.log($('.surname').val());
        });
            var id = 0;
        $(document).on('click', '.addform', function() {
            id = id+1;
            $('.translate-middle').text(id);
            var formclone = "<div class='row' id="+id+" >"+'<div class="form-group{{ $errors->has("name") ?  "has-error" : '' }} col-md-5">{!! Form::label("name", "name") !!}{!! Form::text("name[]", null, ["class" => "form-control name", "required" => "required", "placeholder" => "name"]) !!}<small class="text-danger">{{ $errors->first("name") }}</small></div><div class="form-group{{ $errors->has("surname") ?  "has-error" : '' }} col-md-5">{!! Form::label("surname", "surname") !!}{!! Form::text("surname[]", null, ["class" => "form-control surname", "required" => "required", "placeholder" => "surname"]) !!}<small class="text-danger">{{ $errors->first("surname") }}</small></div><button class="remove btn btn-danger col-md-2  btn-sm my-2" value = '+id+'>Remove<span class="badge text-bg-primary">'+id+'</span></button></div>';
                $(".from111").append(formclone);
                console.log(id);
                // $(".formrow").children().clone().appendTo(".from111"); 
        });



        $(document).on('click' ,'.remove' , function(){
            $(this).parent().remove();
            var value  = parseInt($('.translate-middle').text());
            console.log(value);
            // console.log( value, 'value before -- ');
            $('.translate-middle').text(value-1);
            value = value - 1 ;
            // console.log(value , 'value after --')
            id = value;
        });


    });
</script>


</html>
