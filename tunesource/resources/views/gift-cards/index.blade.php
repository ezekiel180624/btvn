<x-app-layout>

<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('TuneSource') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Gift Cards</div>

                    <div class="card-body">
                        <a href="{{ route('gift-cards.create') }}" class="btn btn-primary mb-3">Create Gift Card</a>

                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Code</th>
                                    <th>Amount</th>
                                    <th>Expiration Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($gift_cards as $giftCard)
                                    <tr>
                                        <td>{{ $giftCard->code }}</td>
                                        <td>{{ $giftCard->amount }}</td>
                                        <td>{{ $giftCard->expiration_date }}</td>
                                        <td>
                                            <a href="{{ route('gift-cards.show', $giftCard->id) }}" class="btn btn-sm btn-info">View</a>
                                            <a href="{{ route('gift-cards.edit', $giftCard->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                            <form action="{{ route('gift-cards.destroy', $giftCard->id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this gift card?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
        </div>
    </div>
</x-app-layout>

<style>
    .container {
        margin-top: 20px;
    }

    .card {
        border: none;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .card-header {
        background-color: #f8f9fa;
        font-weight: bold;
        padding: 10px 15px;
        border-bottom: 1px solid #dee2e6;
    }

    .card-body {
        padding: 20px;
    }

    .btn-primary {
        color: #000;
        border-color: #007bff;
        transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: greenyellow;
        border-color: #0062cc;
    }

    .btn-info {
        color: #000;
        border-color: #17a2b8;
        transition: background-color 0.3s ease;
    }

    .btn-info:hover {
        background-color: #138496;
        border-color: #117a8b;
    }

    .btn-danger {
        color: #000;
        border-color: #dc3545;
        transition: background-color 0.3s ease;
    }

    .btn-danger:hover {
        background-color: #c82333;
        border-color: #bd2130;
    }

    .table {
        margin-top: 20px;
        width: 100%;
        border-collapse: collapse;
    }

    .table th,
    .table td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #dee2e6;
    }

    .table th {
        font-weight: bold;
        background-color: #f8f9fa;
    }

    .table td:last-child {
        white-space: nowrap;
    }

    .table td a {
        margin-right: 5px;
    }
</style>
