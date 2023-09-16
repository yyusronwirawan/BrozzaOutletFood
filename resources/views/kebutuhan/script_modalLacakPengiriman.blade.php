@if (session('searchResult'))
    @foreach (session('searchResult') as $item)
        <script>
            $(document).ready(function() {
                $('#exampleModal-{{ $item->id }}').modal('show');
            });
        </script>
    @endforeach
@endif
<script>
    $(document).ready(function() {
        @if (session('searchResult'))
            $('#exampleModal').modal('show');
        @endif
    });
</script>
