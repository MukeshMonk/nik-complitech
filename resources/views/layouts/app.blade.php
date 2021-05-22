<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Hindustani Web</title>
        @yield('styles')
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <!-- Styles -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        @toastr_css
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            span.fs-4 {
                background: orangered;
                color: #fff;
                font-weight: 600;
                padding: 7px 40px;
                border-radius: 7px;
            }
            .btn {
                display: inline-block;
                font-weight: 600;
            }
            .text-dark,h5.modal-title {
                font-weight: 600;
                color: #000;
            }
            span.father {
                background: green;
                color: #fff;
                padding: 1px 10px;
                border-radius: 10px;
            }

            span.mother {
                background: #0d6efd;
                color: #fff;
                padding: 1px 10px;
                border-radius: 10px;
            }

            span.child {
                background: #664d03;
                color: #fff;
                padding: 1px 10px;
                border-radius: 10px;
            }
            #toast-container>div{
                opacity:1 !important;
            }
        </style>

    </head>
    <body>
        <div class="container">
            <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
                <span class="fs-4">Hindustani</span>
            </a>
            @if(\Request::is('detail'))
            <ul class="nav nav-pills">
                <li class="nav-item"><a href="{{url('/')}}" class="nav-link active" aria-current="page">Back To Home</a></li>
            </ul>
            @endif
            @if(\Request::is('/'))
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Add People
            </button>
            @endif
            </header>
        </div>
        @yield('content')
        

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Add Hindustani People</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addpeople" action="{{url('/store')}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label text-dark">Full Name *</label>
                        <input type="text" name="fullname" class="form-control" placeholder="Please Enter Full Name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-dark">Birthday *</label>
                        <input type="date" name="dob" class="form-control" required>
                    </div>
                    <div class="mb-3">
                       <label class="form-label text-dark">Gender</label> <br/>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="chkgender" value="male" checked>
                            <label class="form-check-label">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                           <input class="form-check-input" type="radio" name="chkgender" value="female">
                            <label class="form-check-label">Female</label>
                        </div>
                    </div>
                    <div class="mb-3">
                       <label class="form-label text-dark">You have already <span class="father">father</span> aadhar card (yes/no) ?</label> <br/>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input chkAadhar" type="radio" name="chkfather" value="yes_f">
                            <label class="form-check-label">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input chkAadhar" type="radio" name="chkfather" value="no_f" checked>
                            <label class="form-check-label">No</label>
                        </div>
                    </div>
                    <div class="mb-3" id="fAadhar">
                        <label class="form-label text-dark">Father Aadhar Card *</label>
                        <input type="text" name="faadhar" class="form-control" placeholder="Example:- 111122223333">
                    </div>
                    <div class="mb-3" id="fathername">
                        <label class="form-label text-dark">Father Name *</label>
                        <input type="text" name="fathername" class="form-control" placeholder="Please Enter Father Name">
                    </div>
                    <div class="mb-3">
                       <label class="form-label text-dark">You have already <span class="mother">mother</span> aadhar card (yes/no) ?</label> <br/>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input chkAadhar" type="radio" name="chkmother" value="yes_m">
                            <label class="form-check-label">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input chkAadhar" type="radio" name="chkmother"  value="no_m" checked>
                            <label class="form-check-label">No</label>
                        </div>
                    </div>
                    <div class="mb-3" id="mAadhar">
                        <label class="form-label text-dark">Mother Aadhar Card *</label>
                        <input type="text" name="maadhar" class="form-control" placeholder="Example:- 111122223333">
                    </div>
                    <div class="mb-3" id="mothername">
                        <label class="form-label text-dark">Mother Name *</label>
                        <input type="text" name="mothername" class="form-control" placeholder="Please Enter Mother Name">
                    </div>
                    <div class="mb-3">
                       <label class="form-label text-dark">You have already <span class="child">children</span> aadhar card(yes/no) ?</label> <br/>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input chkAadhar" type="radio" name="chkchild" value="yes_c">
                            <label class="form-check-label">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input chkAadhar" type="radio" name="chkchild"  value="no_c" checked>
                            <label class="form-check-label">No</label>
                        </div>
                    </div>
                    <div class="mb-3" id="cAadhar">
                        <label class="form-label text-dark">Children Aadhar Card *</label>
                        <input type="text" name="caadhar" class="form-control" placeholder="Example:- 111122223333">
                    </div>
                    <div class="mb-3" id="childname">
                        <label class="form-label text-dark">Children Name</label>
                        <input type="text" name="childname" class="form-control" placeholder="Please Enter Children Name">
                    </div>
                    <button type="submit" class="btn btn-primary" id="send_data">Submit</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </form>
            </div>
            </div>
        </div>
        </div>
        @yield('scripts')

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script>
        $('#staticBackdrop').on('hidden.bs.modal', function () {
                $("#fAadhar").hide();
                $("#fathername").show();
                $("#mAadhar").hide();
                $("#mothername").show();
                $("#cAadhar").hide();
                $("#childname").show();
                $("#fathername").find("input").prop('required',true);
                $("#mothername").find("input").prop('required',true);
                $("#childname").find("input").prop('required',false);

                $('#staticBackdrop form')[0].reset();
            });

            $(document).ready(function(){
                $("#fAadhar").hide();
                $("#fathername").show();
                $("#mAadhar").hide();
                $("#mothername").show();
                $("#cAadhar").hide();
                $("#childname").show();
                $("#fathername").find("input").prop('required',true);
                $("#mothername").find("input").prop('required',true);
                $("#childname").find("input").prop('required',false);

            });
            // $(document).on("click","#send_data",function(){
            //         $(this).text('Processing...');
            // });
            $(document).on("change",".chkAadhar",function(){
                    var chkAadhar = $(this).val();
                    //father
                    if(chkAadhar=="yes_f")
                    {
                        $("#fAadhar").show();
                        $("#fathername").hide();
                        $("#fAadhar").find("input").prop('required',true);
                        $("#fathername").find("input").prop('required',false);

                    }else if(chkAadhar=="no_f"){
                        $("#fAadhar").hide();
                        $("#fathername").show();
                        $("#fAadhar").find("input").prop('required',false);
                        $("#fathername").find("input").prop('required',true);
                    }
                    //mother
                    if(chkAadhar=="yes_m")
                    {
                        $("#mAadhar").show();
                        $("#mothername").hide();
                        $("#mAadhar").find("input").prop('required',true);
                        $("#mothername").find("input").prop('required',false);

                    }else if(chkAadhar=="no_m"){
                        $("#mAadhar").hide();
                        $("#mothername").show();
                        $("#mAadhar").find("input").prop('required',false);
                        $("#mothername").find("input").prop('required',true);
                    }
                    //children
                    if(chkAadhar=="yes_c")
                    {
                        $("#cAadhar").show();
                        $("#childname").hide();
                        $("#cAadhar").find("input").prop('required',true);
                        //$("#childname").find("input").prop('required',false);

                    }else if(chkAadhar=="no_c"){
                        $("#cAadhar").hide();
                        $("#childname").show();
                        $("#cAadhar").find("input").prop('required',false);
                        //$("#childname").find("input").prop('required',true);
                    }
            });
        </script>
    </body>
    @jquery
@toastr_js
@toastr_render
</html>
