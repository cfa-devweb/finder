@if (session('successadd'))
<div class="alert alert-primary text-center" role="alert">
  {{ session('successadd') }}
</div>
@endif

@if (session('successdelete'))
<div class="alert alert-danger text-center" role="alert">
  {{ session('successdelete') }}
</div>
@endif

@if (session('successedit'))
<div class="alert alert-warning text-center" role="alert">
  {{ session('successedit') }}
</div>
@endif

<script>
  function delete_alert() {
    if ($(".alert").is(":visible")) {
      setTimeout(function() {
        $(".alert").addClass("status_animation");
      }, 3000);
      setTimeout(function() {
        $(".alert").remove();
      }, 4000);
    }
  }

  delete_alert();
</script>