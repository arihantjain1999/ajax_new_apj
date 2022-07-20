var editor = new FroalaEditor('#example');

$('#myModal').on('shown.bs.modal', function() {
    $('#myInput').trigger('focus')
});

function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    // document.getElementById("main").style.marginLeft = "250px";
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
            // {data: 'dob', name: 'dob'},
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            },
        ]
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
                    '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>data deleted succesfully </strong>!!!!!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button></div>'
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
        var editordata = $(".fr-element").html();
        console.log(updateurl, id, name, email, username, dob, editordata);
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
            },
            success: function(data) {
                $('.modal-body').prepend(
                    '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Successfully Edited  </strong>!!!!!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button></div>'
                );
                table.draw()
            },
            error: function(data) {
                $('.modal-body').prepend(
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

    // checkbox click button show ajax 
    $(document).on('click', '.chechbox', function() {
        if (this.checked) {
            $('.deleteall').removeClass('d-none');
            console.log('hello');
        } else {
            $('.deleteall').addClass('d-none');

        }
    });


    // delete all ajax button action
    $(document).on('click', '.deleteall', function() {
        var myCheckboxes = new Array();
        $('input:checked').each(function() {
            myCheckboxes.push($(this).val());
        });

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

    $(document).on('click', '.selectallcheckbox', function() {
        if (this.checked) {
            $('.deleteall').removeClass('d-none');

            $('.chechbox:checkbox').each(function() {
                this.checked = true;
            });
        } else {
            // alert('i am  not checked ')
            $('.deleteall').addClass('d-none');

            $('.chechbox:checkbox').each(function() {
                this.checked = false;
            });
        }
    });


});

