@extends('layouts.app')
@section('body')
<x-header />
<x-sidebar />

<script>
    $(document).ready(function() {
        $('#table-artikel').DataTable();
    });

</script>
@endsection
