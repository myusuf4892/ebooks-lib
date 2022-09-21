<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Print Report</title>
    <style class="text/css">
        body{
            counter-reset: chapternum figurenum;
        }
        table thead tr th{
            border-collapse: collapse;
            border: 1px solid black;
            color: #fff;
            text-align: center;
            background: rgb(116, 113, 113);
            font-size: 8px;
        }
        table tbody tr td{
            border-collapse: collapse;
            border: 1px solid black;
            font-size: 7px;
        }
    </style>
</head>
<body>
    <div class="row justify-content-center">
        <div class="col-12 text-center">
            <h1>Report History Borrow</h1>
        </div>
    </div>
    <hr>
    <table width="100%">
        <thead>
            <tr>
                <th>Title</th>
                <th>Category</th>
                <th>Donatur</th>
                <th>Borrower</th>
                <th>Lent</th>
                <th>Due</th>
                <th>Return</th>
                <th>Status Returned</th>
                <th>Payment Status</th>
                <th>Price</th>
                <th>Amercement</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reports as $report)
                <tr>
                    <td>{{ $report->book->title }}</td>
                    <td>{{ $report->book->category->name }}</td>
                    <td>{{ $report->book->user->name }}</td>
                    <td>{{ $report->user->name }}</td>
                    <td>{{ $report->lent_at }}</td>
                    <td>{{ $report->due_at }}</td>
                    <td>{{ $report->return_at }}</td>
                    <td>{{ $report->status_returned }}</td>
                    <td class="text-center">{{ $report->payment_status }}</td>
                    <td>Rp. {{ number_format($report->price, 0, ',', '.') }}</td>
                    <td>Rp. {{ number_format($report->amercement, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
