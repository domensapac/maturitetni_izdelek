<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Records</title>
    </head>
    <body>
        <h1>RECORDS</h1>
        <!--<a href="{{ route('admin.export.qr-scans') }} " class="btn btn-primary">Izvozi evidenco malic</a>!-->
        <form action="{{ url('/admin/export-qr-scans') }}" method="GET">
            <label for="month">Month:</label>
            <select name="month" id="month">
                <option value="">All Months</option>
                @for ($i = 1; $i <= 12; $i++)
                    <option value="{{ $i }}">{{ date('F', mktime(0, 0, 0, $i, 1)) }}</option>
                @endfor
            </select>

            <label for="year">Year:</label>
            <input type="number" name="year" id="year" min="2000" max="{{ date('Y') }}" value="{{ date('Y') }}">

            <button type="submit">Export QR Scans</button>
        </form>
    </body>
</html>