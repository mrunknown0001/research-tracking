<!DOCTYPE html>
<html>
<head>
  <!-- Standard Meta -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <!-- Site Properties -->
  <title>Login</title>

  <link rel="stylesheet" type="text/css" href="{{ asset('dist/semantic.min.css') }}">

{{--   <link rel="stylesheet" type="text/css" href="{{ asset('dist/components/reset.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('dist/components/site.css') }}">

  <link rel="stylesheet" type="text/css" href="{{ asset('dist/components/container.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('dist/components/grid.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('dist/components/header.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('dist/components/image.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('dist/components/menu.css') }}">

  <link rel="stylesheet" type="text/css" href="{{ asset('dist/components/divider.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('dist/components/segment.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('dist/components/form.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('dist/components/input.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('dist/components/button.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('dist/components/list.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('dist/components/message.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('dist/components/icon.css') }}">

  <link rel="stylesheet" type="text/css" href="{{ asset('dist/components/modal.min.css') }}"> --}}

  <script src="{{ asset('dist/semantic.min.js') }}"></script>

  <script src="{{ asset('dist/library/jquery.min.js') }}"></script>
  <script src="{{ asset('/dist/components/form.js') }}"></script>
  <script src="{{ asset('dist/components/transition.js') }}"></script>


  <style type="text/css">
    body {
      background-color: #DADADA;
    }
    body > .grid {
      height: 100%;
    }
    .image {
      margin-top: -100px;
    }
    .column {
      max-width: 450px;
    }
  </style>
  <script>
  $(document)
    .ready(function() {
      $('.ui.form')
        .form({
          fields: {
            email: {
              identifier  : 'id_number',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'Please enter your ID Number'
                }
              ]
            },
            password: {
              identifier  : 'password',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'Please enter your password'
                },
                {
                  type   : 'length[6]',
                  prompt : 'Your password must be at least 6 characters'
                }
              ]
            }
          }
        })
      ;
    })
  ;
  </script>
</head>
<body>

<div class="ui middle aligned center aligned grid">
  <div class="column">

    <form action="{{ route('login.post') }}" method="POST" class="ui large form" autocomplete="off">
      {{ csrf_field() }}
      <div class="ui stacked segment">
        <h2 class="ui black image header">
          <img src="{{ asset('logo/tsu_logo.png') }}" class="image">
          <br>
          <div class="content">
            TSU - Research Office
          </div>
        </h2>
        <p>Faculty Research Monitoring and Tracking</p>
        <div class="field">
          <div class="ui left icon input">
            <i class="user icon"></i>
            <input type="text" name="id_number" placeholder="ID Number">

          </div>
        </div>
        <div class="field">
          <div class="ui left icon input">
            <i class="lock icon"></i>
            <input type="password" name="password" placeholder="Password">
          </div>
        </div>
        <div class="ui fluid large purple submit button">Login</div>
      </div>

      <div class="ui error message"></div>

    </form>
  </div>
</div>

</body>

</html>
