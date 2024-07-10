<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Panel Administrativo </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="/admin/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="/admin/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  {{-- SummerNote editor --}}
  <link rel="stylesheet" type="text/css" href="/admin/plugins/summernote/summernote.css">

  @yield('styles')

</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  @include('admin.layouts.navbar')

  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('admin.layouts.aside')

  <!-- Content Wrapper. Contains page content -->
  @yield('content')

  <!-- /.content-wrapper -->
  @include('admin.users.edit-profile')
  @include('admin.layouts.footer')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('admin/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/admin/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/admin/dist/js/demo.js"></script>

<script src="{{ asset('admin/plugins/jQueryBlockUI/jquery.blockUI.js') }}"></script>
<script src="{{ asset('admin/plugins/Jcrop/jquery.Jcrop.js') }}"></script>

{{-- Dropzone --}}
  <script src="{{ asset('admin/plugins/dropzone/dropzone.js') }}"></script>

 {{-- Swiper Carousel --}}
  <script src="{{ asset('admin/plugins/carousel_swiper/swiper.min.js') }}"></script>

  <script src="{{ asset('admin/panel/js/custom-app.js') }}"></script>

  {{-- Recargar el slider --}}
  <script src="{{ asset('admin/panel/js/slider/charge_slider.js') }}"></script>


  <script src="{{ asset('admin/panel/js/Images/my-dropzone.js') }}"></script>

  {{-- ajax general --}}
  <script src="{{ asset('admin/panel/js/ajax.js') }}"></script>

  {{-- Sweet alert --}}
  <script src="/admin/plugins/sweetalert2/sweetalert2.min.js"></script>

  {{-- SummerNote editor --}}
  <script src="{{asset('admin/plugins/summernote/summernote.js')}}"></script>
  <script src="{{asset('admin/plugins/summernote/summernote-es-ES.js')}}"></script>
  
  {{-- Common js functions --}}
  <script src="{{ asset('admin/panel/js/helpers.js') }}"></script>

  <script type="text/javascript">
    function callModalToEditUser(){
      $('#modalProfileUser').modal('show');
    }

    document.querySelector('#user-profile-update').addEventListener('click',(e) => {
        e.preventDefault();
        lockWindow();
        cleanError();

        const route = `/admin/user/${document.querySelector(`#modalProfileUser form input[name="id"]`).value}/profile`;
        let formData = new FormData(document.querySelector(`#modalProfileUser form`));

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('input[name=_token]').val()
            }
        });
        $.ajax({
            url : route,
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(e){
                unlockWindow();
                Swal.fire(e.title, e.message, e.symbol);
                location.reload();
            },
            error:function(jqXHR, textStatus, errorThrown)
            {
                unlockWindow();
                $('#modalProfileUser').scrollTop(0);
                $.each(jqXHR.responseJSON.errors, function( key, value ) {
                        $.each(value, function( errores, eror ) {
                            $(`#user-profile-${key}-error`).append("<li class='error-block'>"+eror+"</li>");
                        });
                });
            }
         });
    });

  </script>

@yield('scripts')

</body>
</html>
