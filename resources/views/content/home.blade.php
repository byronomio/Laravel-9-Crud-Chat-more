@extends('layouts/head')

@section('title', 'Layout Blank')

@section('content')
@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif

<div class="card">
  <div class="card-header">
    <h4 class="card-title">Blank Page</h4>
  </div>
  <div class="card-body">
    <div class="card-text">
      <p>
        Gettings start with your project custom requirements using a ready template which is quite difficult and time
        taking process, Vuexy Admin provides useful features to kick start your project development with no efforts !
      </p>
      <ul>
        <li>
          Vuexy Admin provides you getting start pages with different layouts, use the layout as per your custom
          requirements and just change the branding, menu &amp; content.
        </li>
        <li>
          Every components in Vuexy Admin are decoupled, it means use use only components you actually need! Remove
          unnecessary and extra code easily just by excluding the path to specific SCSS, JS file.
        </li>
      </ul>
    </div>
  </div>
</div>
@endsection

{{-- @push('alert-script')
<script>
alert('I\'m coming from child')
</script>
@endpush --}}
