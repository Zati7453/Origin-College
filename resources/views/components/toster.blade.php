@if (session()->has('SESSION_RETURN'))
<script>
    @if(session('type') == 'success')
        toastr.success("{{session('message')}}")
    @endif

    @if(session('type') == 'danger')
        toastr.error("{{session('message')}}")
    @endif

    @if(session('type') == 'warning')
        toastr.warning("{{session('message')}}")
    @endif
</script>
@endif