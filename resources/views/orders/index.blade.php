@extends('layouts.app')

@section('title', 'Orders List')

@section('content')
    <div class="nexaris-toolbar">
        <button class="nexaris-button" id="import-data-btn">Import data</button>
    </div>

    <div class="nexaris-card" id="orders">
        @include('orders.table')
    </div>
@endsection

@section('scripts')
    <script>
        $('#importData').click(function() {
            $.ajax({
                url: '/import-data',
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    alert(response.message);
                    location.reload();
                },
                error: function(response) {
                    alert('Error');
                }
            });
        });

        $(document).on('click', '[role="navigation"] a', function(event) {
            event.preventDefault();
            let page = $(this).attr('href').split('page=')[1];

            $.ajax({
                url: '/orders?page=' + page,
                success: function(data) {
                    $('#orders').html(data);
                },
                error: function() {
                    alert('Error page loading');
                }
            });
        });
    </script>
@endsection
