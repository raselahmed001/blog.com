<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>{{ !empty($meta_title) ? $meta_title : '' }}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    @if(!empty($meta_keywords))
    <meta content="{{ $meta_keywords }}" name="keywords" />
    @endif
    @if(!empty($meta_description))
      
    <meta content="{{ $meta_description }}" name="description" />
    @endif

  <!-- Favicons -->
  <link href="{{ url('assets/img/favicon.png') }}" rel="icon">
  <link href="{{ url('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ url('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ url('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ url('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ url('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
  <link href="{{ url('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
  <link href="{{ url('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ url('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ url('assets/css/style.css') }}" rel="stylesheet">

  {{-- data table --}}
  <link href="https://cdn.datatables.net/v/dt/dt-2.0.8/datatables.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js">
  

  @yield('style')

<body>

    @include('backend.layouts._header')
    @include('backend.layouts._sidebar')
    <main id="main" class="main" style="min-height:100vh">
        @yield('content')
    </main>
    @include('backend.layouts._footer')

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="{{ url('assets/js/jquery.min.js') }}"></script>
<script src="{{ url('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ url('assets/vendor/chart.js/chart.umd.js') }}"></script>
<script src="{{ url('assets/vendor/echarts/echarts.min.js') }}"></script>
<script src="{{ url('assets/vendor/quill/quill.js') }}"></script>
<script src="{{ url('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
<script src="{{ url('assets/vendor/tinymce/tinymce.min.js') }}"></script>
<script src="{{ url('assets/vendor/php-email-form/validate.js') }}"></script>
{{-- data table --}}
<script src="https://cdn.datatables.net/v/dt/dt-2.0.8/datatables.min.js"></script>


<!-- Template Main JS File -->
<script src="{{ url('assets/js/main.js') }}"></script>
<script>
  tinymce.init({
      selector: 'textarea.tinymce-edito',
      plugins: 'advlist autolink lists link image charmap print preview anchor',
      toolbar: 'undo redo | formatselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
      menubar: true,
      setup: function (editor) {
          // Custom function to set content of the TinyMCE editor
          editor.setContentFromTextarea = function(content) {
              this.setContent(content);
          };
      }
   });
</script>



@yield('script')

</body>

</html>