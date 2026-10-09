@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-1">Order Management</h1>
            <p class="text-muted mb-0">View customer orders and update their status.</p>
        </div>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary">
            Back to Dashboard
        </a>
    </div>

    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
        <div>{{ $error }}</div>
        @endforeach
    </div>
    @endif

    <div class="card border-0 shadow-sm">
        <div class="card-body">
            @forelse ($orders as $order)
            <div class="border rounded p-3 mb-3">
                <div class="row g-3">
                    <div class="col-md-7">
                        <h5 class="mb-1">Order #{{ $order->id }}</h5>
                        <p class="mb-1">
                            <strong>Customer:</strong>
                            {{ $order->user?->name ?? 'Unknown customer' }}
                        </p>
                        <p class="mb-1">
                            <strong>Email:</strong>
                            {{ $order->user?->email ?? 'N/A' }}
                        </p>
                        <p class="mb-1">
                            <strong>Total:</strong>
                            ৳{{ number_format((float) $order->total_amount, 2) }}
                        </p>
                        <p class="mb-1">
                            <strong>Payment:</strong>
                            {{ ucfirst($order->payment_status) }}
                        </p>
                        <p class="mb-1">
                            <strong>Shipping Address:</strong>
                            {{ $order->shipping_address }}
                        </p>
                        <p class="mb-2 text-muted">
                            {{ $order->created_at?->format('d M Y, h:i A') ?? 'Date unavailable' }}
                        </p>

                        <strong>Items</strong>
                        <ul class="mb-0">
                            @forelse ($order->items as $item)
                            <li>
                                {{ $item->product?->name ?? 'Product unavailable' }}
                                × {{ $item->quantity }}
                                — ৳{{ number_format((float) $item->price, 2) }} each
                            </li>
                            @empty
                            <li>No items recorded.</li>
                            @endforelse
                        </ul>
                    </div>

                    <div class="col-md-5">
                        <form
                            action="{{ route('admin.orders.updateStatus', $order) }}"
                            method="POST"
                            class="border rounded p-3">
                            @csrf
                            @method('PATCH')

                            <label class="form-label" for="status-{{ $order->id }}">
                                Order Status
                            </label>

                            <select
                                name="status"
                                id="status-{{ $order->id }}"
                                class="form-select mb-3"
                                required>
                                @foreach ([
                                'pending' => 'Pending',
                                'processing' => 'Processing',
                                'shipped' => 'Shipped',
                                'delivered' => 'Delivered',
                                'cancelled' => 'Cancelled',
                                ] as $value => $label)
                                <option
                                    value="{{ $value }}"
                                    @selected($order->status === $value)
                                    >
                                    {{ $label }}
                                </option>
                                @endforeach
                            </select>

                            <button type="submit" class="btn btn-primary w-100">
                                Update Status
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @empty
            <div class="text-center py-5">
                <h5>No orders found</h5>
                <p class="text-muted mb-0">Orders will appear here when customers place them.</p>
            </div>
            @endforelse

            <div class="mt-4">
                {{ $orders->links() }}
            </div>
        </div>
    </div>
</div>
@endsection