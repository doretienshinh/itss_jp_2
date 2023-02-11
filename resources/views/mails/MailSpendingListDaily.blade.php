<h2>Xin chào, {{ $user->name }}</h2>
<br>
<p>Đây là thống kê thu chi hôm nay của bạn.</p>
@foreach ($results as $result)
    <div>Ví: {{ $result->name }}</div>
    <table>
        @if ($result->spendings->isNotEmpty())
            <tr>
                <th>Tiền</th>
                <th>Kiểu</th>
                <th>Ghi chú</th>
                <th>Thời gian</th>
            </tr>
            @foreach ($result->spendings as $spending)
                <tr>
                    <td>{{ number_format($spending->amount) }}đ</td>
                    <td>{{ $spending->spendingType->name }}</td>
                    <td>{{ $spending->note }}</td>
                    <td>{{ $spending->created_at }}</td>
                </tr>
            @endforeach
        @else
            <div>Không có thu chi nào cả.</div>
        @endif
    </table>
    <br>
    <br>
@endforeach
Arigathanks.
