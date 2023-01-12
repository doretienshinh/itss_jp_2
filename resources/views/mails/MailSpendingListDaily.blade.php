<h2>Hello, {{ $user->name }}</h2>
<br>
<p>Here are today's spendings.</p>
@foreach ($results as $result)
    <div>Wallet: {{ $result->name }}</div>
    <table>
        @if ($result->spendings->isNotEmpty())
            <tr>
                <th>Amount</th>
                <th>Type</th>
                <th>Note</th>
                <th>Time</th>
            </tr>
            @foreach ($result->spendings as $spending)
                <tr>
                    <td>{{ $spending->amount }}</td>
                    <td>{{ $spending->spendingType->name }}</td>
                    <td>{{ $spending->note }}</td>
                    <td>{{ $spending->created_at }}</td>
                </tr>
            @endforeach
        @else
            <div>non spendings.</div>
        @endif
    </table>
    <br>
    <br>
@endforeach
Thank you.
