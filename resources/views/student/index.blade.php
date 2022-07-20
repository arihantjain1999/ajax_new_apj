<!DOCTYPE html>

<html>

<head>

    <title>Datatable project</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- bootstap css --}}
    {{-- <link rel="stylesheet" href="/resources/css/model.css"> --}}
    <link rel="stylesheet" type="text/css" href="{{ url('css/style.css') }}" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    {{-- FLORALA EDITOR --}}
    <link href='https://cdn.jsdelivr.net/npm/froala-editor@latest/css/froala_editor.pkgd.min.css' rel='stylesheet'
        type='text/css' />
    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/froala-editor@latest/js/froala_editor.pkgd.min.js'>
    </script>
    {{-- datatable css --}}
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    {{-- datatable bootstrap css --}}
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    {{-- jquerry script --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    {{-- datatable jquerry --}}
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    {{-- bootstrap script --}}
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    {{-- datepicker --}}
    {{-- <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script> --}}
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    {{-- datatable bootstrap script --}}
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>



    {{-- SELECT2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>

<body>
    {{-- navbar --}}
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href=" {{ route('students.index') }} ">Student Data</a>
        <a href="  {{ route('family.index') }}  ">Dynamic Form</a>
        <a href="  {{ route('subject.index') }}  ">Subject Data</a>
    </div>

    @php
        $options = ['Andhra Pradesh', 'Arunachal Pradesh', 'Assam', 'Bihar', 'Chhattisgarh', 'Goa', 'Gujarat', 'Haryana', 'Himachal Pradesh', 'Jammu and Kashmir', 'Jharkhand', 'Karnataka', 'Kerala', 'Madhya Pradesh', 'Maharashtra', 'Manipur', 'Meghalaya', 'Mizoram', 'Nagaland', 'Odisha', 'Punjab', 'Rajasthan', 'Sikkim', 'Tamil Nadu', 'Telangana', 'Tripura', 'Uttarakhand', 'Uttar Pradesh', 'West Bengal', 'Andaman and Nicobar Islands', 'Chandigarh', 'Dadra and Nagar Haveli', 'Daman and Diu', 'Delhi', 'Lakshadweep', 'Puducherry'];
    @endphp
    <!-- bootstrap modal for edit user  -->
    <!-- Modal -->
    <div class="modal fade" id="editmodal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body m-2 ">
                    <div class="row">

                        <div class="form-group{{ $errors->has('id') ? ' has-error' : '' }} col-md-6">
                            <div class="row">
                                {!! Form::label('id', 'Id', ['class' => 'col-md-3']) !!}
                                {!! Form::number('id', null, ['class' => 'form-control id col-md-9', 'required' => 'required', 'readonly']) !!}
                            </div>
                            <small class="text-danger">{{ $errors->first('id') }}</small>
                        </div>
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} col-md-6">
                            <div class="row">
                                {!! Form::label('name', 'Name', ['class' => 'col-md-3']) !!}
                                {!! Form::text('name', null, ['class' => 'form-control name col-md-9', 'required' => 'required']) !!}
                            </div>
                            <small class="text-danger">{{ $errors->first('name') }}</small>
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} col-md-6">
                            <div class="row">
                                {!! Form::label('email', 'Email address', ['class' => 'col-md-3']) !!}
                                {!! Form::email('email', null, ['class' => 'form-control email col-md-9', 'required' => 'required', 'placeholder' => 'eg: foo@bar.com']) !!}
                            </div>
                            <small class="text-danger">{{ $errors->first('email') }}</small>
                        </div>
                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }} col-md-6">
                            <div class="row">
                                {!! Form::label('username', 'User Name', ['class' => 'col-md-3']) !!}
                                {!! Form::text('username', null, ['class' => 'form-control username col-md-9', 'required' => 'required']) !!}
                            </div>
                            <small class="text-danger">{{ $errors->first('username') }}</small>
                        </div>
                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }} col-md-4">
                            <div class="row">
                                {!! Form::label('phone', 'Phone Number ', ['class' => 'col-md-3']) !!}
                                {!! Form::text('phone', null, ['class' => 'form-control phone col-md-9', 'required' => 'required']) !!}
                            </div>
                            <small class="text-danger">{{ $errors->first('phone') }}</small>
                        </div>
                        <div class="form-group{{ $errors->has('dob') ? ' has-error' : '' }} col-md-4">
                            <div class="row">
                                {!! Form::label('dob', 'DOB', ['class' => 'col-md-3']) !!}
                                {!! Form::text('dob', null, ['class' => 'form-control  datetimepicker col-md-9 dob', 'required' => 'required']) !!}
                            </div>
                            <small class="text-danger">{{ $errors->first('dob') }}</small>
                        </div>
                        <div class="form-group col-md-4">
                            <div class="row">
                                <div class="col-md-3">State</div>
                                <div class="col-md-9">
                                    {!! Form::select('state', $options, null, ['class' => 'form-select js-example-basic-single', 'required' => 'required', 'multiselect' => 'multiselect']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <div class="row">
                                {{-- @dump($family); --}}
                                @php
                                $familyids =[null];
                                    foreach ($family as $singlefamily) {
                                        $familyids[$singlefamily->id] = $singlefamily->name;
                                    }
                                    // dump($familyids);
                                    $familyname= ['1' , '2' , '3'];
                                @endphp
                                <div class="col-md-3">Fmaily</div>
                                <div class="col-md-9">
                                    {!! Form::select('family', $familyids, null, ['class' => 'form-select js-example-basic-single family', 'required' => 'required', 'multiselect' => 'multiselect']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <div class="row">
                                {{-- @dump($family); --}}
                                {{-- @dump($subjects) --}}
                                <div class="col-md-3">subject</div>
                                <div class="col-md-9">
                                    {!! Form::select('subject', $subjects, null, ['class' => 'form-select js-example-basic-single subject', 'required' => 'required', 'multiselect' => 'multiselect']) !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="example" class="m-2"></div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    {{-- navbar --}}
                    <div id="mySidenav" class="sidenav">
                        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()" >&times;</a>
                   
                    </div> <button type="button" class="btn btn-primary saveeditdata " data-dismiss="modal">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    {{-- modal --}}

    <div id="main">

        
        <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
        
        
        <div class="container my-4">
            <button type="button" class="btn btn-primary newuser " data-toggle="modal" data-target="#editmodal">
                Create New User
            </button>
            <a href=" {{ route('family.index') }} " class="btn btn-outline-secondary"> Dynamic Form Demo </a>
            
            <div class="row">
                  <div class="card  my-3 position-relative col-md-3 m-1" style="width: 15rem; border-left : 5px solid blue ; border-radius: 10px ; ">
                      <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-primary text-light totalaccountcount" style="margin-left: 53%">
                          {{$studentcount}}
                          <span class="visually-hidden">Total Student</span>
                        </span>
                      <div class="card-body">
                        <h5 class="card-title">Total Student</h5>
                        {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                        <p class="card-text"></p>
      
                      </div>
                    </div>
      

                  @foreach ($items as $item)
                  <div class="card  my-3 position-relative col-md-2 m-1" style="width: 15rem; border-left : 5px solid blue ; border-radius: 10px ; ">
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-primary text-light totalaccountcount" style="margin-left: 53%">
                            {{$item->count}}
                        <span class="visually-hidden">Total Student</span>
                      </span>
                      <div class="card-body">
                          <h5 class="card-title">Subject {{ $item->subject_id }} </h5>
                          <p class="card-text"></p>
                        </div>
                    </div>
                    
                    @endforeach
                </div>
            <h1 style="text-align: center">Students Data</h1>
            {{-- <button class="deleteall d-none btn btn-danger my-2"> Delete all</button> --}}
            <div class="my-2">

                <button type="button" class="deleteall d-none btn btn-danger position-relative mx-3">
                    Delete all
                    <span class="updatecount position-absolute top-0 start-100 translate-middle badge rounded-pill bg-primary">
                        0
                    </span>
                </button> <button type="button" class="updateall d-none btn btn-warning position-relative" data-toggle="modal" data-target="#editmodal"> 
                    Update all
                    <span class="updatecount updateall d-none position-absolute top-0 start-100 translate-middle badge text-light rounded-pill bg-primary">
                        0
                    </span>
                </button>
            </div>
            {{-- datatable table code  --}}
            <table class="display data-table">
                <thead>
                    <tr>
                        <th width = '70px' ><input type="checkbox" class="mr-1 selectallcheckbox" id="all" value="0">Mass</th>
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Username</th>
                        {{-- <th>Dob</th> --}}
                        <th width="200px">Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
            
            
        </div>
    </div>
</body>
<script type="text/javascript">
    var editor = new FroalaEditor('#example');

    $('#myModal').on('shown.bs.modal', function() {
        $('#myInput').trigger('focus')
    });

    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
        // document.getElementById("main").style.marginLeft = "250px";
        document.getElementById("main").style.marginLeft = "250px";
        // document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        document.getElementById("main").style.marginLeft = "0";
        document.body.style.backgroundColor = "white";
    }

    $(function() {


        // $('.datetimepicker').daterangepicker();
        $('.datetimepicker').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            timePicker: true,
            minYear: 1901,
            maxYear: parseInt(moment().format('YYYY'), 10)
        }, function(start, end, label) {
            var years = moment().diff(start, 'years');
            alert("You are " + years + " years old!");
        });
        $('.js-example-basic-single').select2({
            placeholder: 'This is my placeholder',
            allowClear: true
        });

        // csrf toke 
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // datatable ajax 
        var table = $('.data-table').DataTable({    
            processing: true,
            serverSide: true,
            ajax: "{{ route('students.index') }}",
            columns: [{
                    data: 'checkbox',
                    name: 'checkbox',
                    orderable: false,
                    searchable: false
                },

                {
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'username',
                    name: 'username'
                },
                // {data: 'dob', name: 'dob'},
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ],
            success: function(data){
                console.log(data);
            }
        });


        // show ajax
        $(document).on('click', '.myshow', function() {
            var studentId = $(this).val();
            var url1 = 'students/'.concat(studentId);
            $('.saveeditdata').addClass('d-none');
            // $('.createuser').addClass('d-none');

            $.ajax({
                url: url1,
                type: 'GET',
                success: function(data) {
                    console.log(data);
                    $('.modal-body').children().addClass('d-none');
                    $('.modal-body').children('.text').remove();
                    $('.modal-body').append(data);
                }
            });
        });

        // delete button ajax 
        $(document).on('click', '.datadelete', function() {
            var studentDeleteid = $(this).val();
            var selector = ".".studentDeleteid;
            console.log(selector);
            var deleteurl = 'students/'.concat(studentDeleteid);
            console.log(deleteurl);
            $.ajax({
                url: deleteurl,
                context: this,
                type: 'DELETE',
                success: function(data) {
                    // console.log(data);
                    $(this).parent().parent().html('');
                    console.log(data);
                    $('.container').prepend(
                        '<div class="alert alert-danger  alert-dismissible fade show" role="alert"><strong>data deleted succesfully </strong>!!!!!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button></div>'
                        // '<div class="toast" role="alert" aria-live="assertive" aria-atomic="true"><div class="toast-header"><img src="..." class="rounded me-2" alt="..."><strong class="me-auto">Bootstrap</strong><small>11 mins ago</small><button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button></div><div class="toast-body">Hello, world! This is a toast message.</div></div>'
                        );

                }
            });
        });



        // my edit model ajax 
        $(document).on('click', '.myedit', function() {
            var studentEditId = $(this).val();
            var editurl = 'students/' + studentEditId + '/edit';
            $('.modal-body').children().removeClass('d-none');
            $('.text').remove();
            $('.saveeditdata').addClass('editdata');
            $('.saveeditdata').removeClass('d-none');
            $('.saveeditdata').removeClass('upadateallbutton');
            // $('.createuser').removeClass('d-none');
            // $('.editdata').removeClass('d-none');
            $('.createuser').addClass('editdata');
            $('.createuser').removeClass('createuser');

            $.ajax({
                url: editurl,
                type: 'GET',
                success: function(data) {
                    $('.name').val(data.name);
                    $('.id').val(data.id);
                    $('.email').val(data.email);
                    $('.username').val(data.username);
                    $('.phone').val(data.phone);
                    $('.dob').val(data.dob);
                    // $('.fr-element').child().html(data.dob)
                }
            });

        });
        // edit ajax 

        // save changes edit

        $(document).on('click', '.editdata', function() {
            var id = $('.id').val();
            var name = $('.name').val();
            var email = $('.email').val();
            var phone = $('.phone').val();
            var username = $('.username').val();
            var dob = $('.dob').val();
            var updateurl = 'students/'.concat(id);
            // let editor =   ;
            var reletedfmailyid = $('.family').val();
            var reletedsubject = $('.subject').val();
            // console.log($reletedsubject);
            var editordata = $(".fr-element").html();
            console.log(updateurl, id, name, email, username, dob, editordata , $('.family').val() ,$('.subject').val());
            $.ajax({
                url: updateurl,
                type: 'PUT',
                data: {
                    id: id,
                    name: name,
                    email: email,
                    username: username,
                    phone: phone,
                    dob: dob,
                    reletedfmailyid : reletedfmailyid,
                    reletedsubject : reletedsubject,
                },
                success: function(data) {
                    $('#main').prepend(
                        '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Successfully Edited  </strong>!!!!!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button></div>'
                    );
                    table.draw()
                },
                error: function(data) {
                    $('#main').prepend(
                        '<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Error please check all fields </strong>!!!!!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button></div>'
                    );

                }
            });
        });


        // save new user button ajax model
        $(document).on('click', '.newuser', function() {
            $('.name').val('');
            $('.id').val('');
            $('.email').val('');
            $('.username').val('');
            $('.phone').val('');
            $('.dob').val('');
            $('.modal-body').children().removeClass('d-none');
            $('.text').remove();
            $('.saveeditdata').removeClass('d-none');
            $('.saveeditdata').removeClass('upadateallbutton');
            // $('.editdata').removeClass('d-none');
            $('.saveeditdata').addClass('createuser');
            $('.editdata').removeClass('editdata');
        });

        // save data of new user ajax
        $(document).on('click', '.createuser', function() {
            var name = $('.name').val();
            var email = $('.email').val();
            var phone = $('.phone').val();
            var username = $('.username').val();
            var dob = $('.dob').val();
            var newuserurl = 'students';
            $.ajax({
                url: newuserurl,
                type: "POST",
                data: {
                    name: name,
                    email: email,
                    phone: phone,
                    username: username,
                    dob: dob,
                },
                success: function(data) {
                    // console.log(JSON.parse(data));
                    if (JSON.parse(data)) {
                        // $('tbody').append(data);
                        $('.container').prepend(
                            '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Student Profile created!!!!!1</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button></div>'
                        );

                        table.draw();
                    } else {
                        alert('Email already exists')
                    }
                },
                error: function() {
                    $('.modal-body').prepend(
                        '<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>user cannot be created !</strong> You should check in on some of those fields below.  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button></div>'
                    );
                }


            });
        });

       


        // delete all ajax button action
        $(document).on('click', '.deleteall', function() {
            var myCheckboxes = new Array();
            $('input:checked').each(function() {
                myCheckboxes.push($(this).val());
            });
            $('.updatecount').text('0');
            $('.deleteall').addClass('d-none');
            $('.updateall').addClass('d-none');
            
            console.log('hello', myCheckboxes, myCheckboxes['input']);
            // alert('HELLO')
            $.ajax({
                url: 'students/deleteall',
                type: "POST",
                data: {
                    data: myCheckboxes,
                },
                success: function(data) {
                    console.log(data);
                    table.draw();
                    // config(JSON.parse(data));
                }
            });
        });
        
        // checkbox click button show ajax 
        
        $(document).on('click', '.chechbox', function() {
             var idsedit = [];
             var length11 ;
            //  idsedit = new Array();
            $('input:checked').each(function() {
                  idsedit.push($(this).val());
           });
            length11 = idsedit.length;
            if (this.checked) {
              $('.updatecount').text(length11);
                console.log(length11 , idsedit);
                $('.myedit').prop('disabled' , true);
                $('.deleteall').removeClass('d-none');
                $('.updateall').removeClass('d-none');
                console.log('hello');
            } else if(length11 == 0) {
                // length11 = length11 -1 ;
                $('.myedit').prop('disabled' , false);
                $('.deleteall').addClass('d-none');
                $('.updateall').addClass('d-none');
            }
        });


        // updateall ajax

        $(document).on('click', '.updateall', function() {
            idsedit = new Array();
            $('input:checked').each(function() {
                idsedit.push($(this).val());
            });
            $('.saveeditdata').removeClass('d-none');
            $('.saveeditdata').removeClass('createuser');   
             $('.saveeditdata').removeClass('editdata');
             $('.saveeditdata').addClass('upadateallbutton');
            console.log(idsedit);
            $('.modal-body').children().addClass('d-none');
            // $('.modal-body').text('');
            $('.modal-body').append('Choose Field to be edited  <select class="fields" name="field"> <option value="none">None</option><option value="name">Name</option><option value="username">Username</option><option value="phone">Phone</option></select>');

        });


        // dropdown select and adding input field
        var selectedField ;
        $(document).on('change' , '.fields' , function(){
            $('.fields').prop('disabled' , true);
             selectedField = $('.fields').val();
             console.log($('.fields').val());
             if(selectedField == 'name' || selectedField == 'email'|| selectedField == 'username'){
                $('.modal-body').append(''+selectedField+' : <input type="text" class='+selectedField+'1 name = '+selectedField+'>');
            }
        });

        // select all checkbox ajax 
        $(document).on('click', '.selectallcheckbox', function() {
            // var count = 0  ; 
            if (this.checked) {
                $('.myedit').prop('disabled' , true);
                $('.deleteall').removeClass('d-none');
                $('.updateall').removeClass('d-none');
                $('.chechbox:checkbox').each(function() {
                    this.checked = true;
                });
                idsedit = new Array();
            $('input:checked').each(function() {
                idsedit.push($(this).val());
            });
            $('.updatecount').text(idsedit.length-1);
            } else {
                $('.myedit').prop('disabled' , false);
                // alert('i am  not checked ')
                $('.deleteall').addClass('d-none');
                $('.updateall').addClass('d-none');
                $('.chechbox:checkbox').each(function() {
                    this.checked = false;
                });
            }
        });

        $(document).on('click', '.upadateallbutton' , function(){
            var classa = '.'+selectedField;
            var datas = $('.'+selectedField+'1').val();
            console.log( datas , idsedit);
            $.ajax({
                url : 'students/updateall' , 
                type: 'POST',
                data: {
                    field: selectedField,
                    name: datas , 
                    ids: idsedit,
                },
                success :function(data){
                    console.log(data);
                    table.draw();
                } 
                // $('.'+selectedField+'1').val('');
            });
        });

    });
</script>

</html>
