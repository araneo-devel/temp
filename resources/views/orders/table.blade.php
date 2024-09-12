<table class="nexaris-table nexaris-table-striped">
    <thead>
    <tr>
        <th>Customer name</th>
        <th>Customer email</th>
        <th>Total price</th>
        <th>Financial status</th>
        <th>Fulfillment status</th>
    </tr>
    </thead>
    <tbody>
    @forelse($orders as $order)
        <tr>
            <td>{{ $order->customer->name }}</td>
            <td>{{ $order->customer->email }}</td>
            <td>${{ number_format($order->total_price, 2) }}</td>
            <td>{{ $order->financial_status }}</td>
            <td>{{ $order->fulfillment_status }}</td>
        </tr>
    @empty
        <tr>
            <td colspan="5" class="text-center">No orders found</td>
        </tr>
    @endforelse
    </tbody>
</table>

<div id="pagination" class="nexaris-pagination" style="margin-top: 20px;">
    {{ $orders->links() }}
</div>
