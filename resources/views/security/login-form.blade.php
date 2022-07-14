@extends('layouts.public')
@section('content')

        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center position-relative"
            style="background:url({{url("/assets/images/big/auth-bg.jpg") }}) no-repeat center center;">
            <div class="auth-box row">
                <div class="col-lg-7 col-md-5 modal-bg-img" style="background-image: url({{url("/assets/images/big/3.jpg") }});">
                </div>
                <div class="col-lg-5 col-md-7 bg-white">
                    <div class="p-3">
                        <div class="text-center">
                            <img src="{{url("/assets/images/big/icon.png") }}" alt="wrapkit">
                        </div>
                        <h2 class="mt-3 text-center"></h2>
                        <p class="text-center">Ingrese sus credenciales para ingresar</p>
                        <form class="mt-4"  id="loginForm" method="POST" action="{{ route('authenticate-user') }}">

                            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}" />
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="text-dark" for="email">Correo electr&oacute;nico</label>
                                        <input class="form-control" id="email" name="email" type="text"
                                            placeholder="enter your username">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="text-dark" for="password">Contrase&ntilde;a</label>
                                        <input class="form-control" id="password" name="password" type="password"
                                            placeholder="enter your password">
                                    </div>
                                </div>
                                <div class="col-lg-12 text-center">
                                    <button type="submit" class="btn btn-block btn-dark">Ingresar</button>
                                </div>

                                <div class="col-lg-12 text-center mt-5">

                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Login box.scss -->


        @section('pagespecificscripts')
        <script src="{{ asset('assets/js/loadingObject.js') }}"></script>
        <script src="{{ asset('assets/js/handleResponse.js') }}"></script>

        <script>
            const headers = {
              "Content-Type": "application/json",
              "Accept": "application/json, text-plain, */*",
              "X-Requested-With": "XMLHttpRequest",
              "X-CSRF-TOKEN": $("#token").val(),
            };

            $("#loginForm").on('submit', function (event) {
                event.preventDefault();
                console.log('test');
                const urlReset = $("#loginForm").attr('action');
              const params = {
                'email': $("#email").val(),
                'password': $("#password").val(),

              };
              const loading = Swal.fire(loadingSwalObject);
              fetch(urlReset, {
                headers: headers,
                method: 'POST',
                body: JSON.stringify(params),
              })
              .then(response => {
                return response.json();
              })
              .then(jsonResponse => {
                if (jsonResponse.errors) {
                  showFormErrors(jsonResponse.errors);
                } else {
                    showSucessMessageWithTimeout(jsonResponse.msg, 1.4)
                    .then(() => location.replace(jsonResponse.url));
                }
              })
              .catch(error => showGenericError(error))
              .finally(() => loading.close());
            });

            </script>

        @stop



@endsection
