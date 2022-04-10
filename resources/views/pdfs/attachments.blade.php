<!DOCTYPE html>
<html lang="en">

<head>
    <title>ZIWA TTI ATTACHMENT REPORT</title>
</head>

<body>
    <div style="margin-left: 35px;margin-right: 25px; margin-top:2px;">
        <span style="font-weight: bold;">ZIWA TECHNICAL TRAINING INSTITUTE</span><br />
        <span style="font-weight: bold;">ATTACHMENT REPORT</span><br />
        <div>
            <span> Generated on {{Carbon\Carbon::now()}}</span></br>
        </div>
        <hr>
        <table class="table table-striped table-bordered table-responsive" style=" border: 1px solid aquamarine; border-collapse: collapse; width: 100%;">
            <thead>
                <tr style="font-size: x-small;">
                    <th style=" border: 1px solid aquamarine;">Student Name</th>
                    <th style=" border: 1px solid aquamarine;">Contact</th>
                    <th style=" border: 1px solid aquamarine;">Department</th>
                    <th style=" border: 1px solid aquamarine;">course</th>
                    <th style=" border: 1px solid aquamarine;">Company</th>
                    <th style=" border: 1px solid aquamarine;">Insurance</th>
                    <th style=" border: 1px solid aquamarine;">Starts</th>
                    <th style=" border: 1px solid aquamarine;">Ends</th>
                    <th style=" border: 1px solid aquamarine;">Town</th>
                </tr>
            </thead>
            <tbody>
                @foreach($applications as $applied)
                <tr style="font-size: xx-small;">
                    <td style=" border: 1px solid aquamarine;">{{$applied->student->user->name}}</td>
                    <td style=" border: 1px solid aquamarine;">{{$applied->student->phone_number}}</td>
                    <td style=" border: 1px solid aquamarine;">{{$applied->student->department->name}}</td>
                    <td style=" border: 1px solid aquamarine;">{{$applied->student->course->name}}</td>
                    <td style=" border: 1px solid aquamarine;">{{$applied->org_name}}</td>
                    <td style=" border: 1px solid aquamarine;">{{$applied->insurance}}</td>
                    <td style=" border: 1px solid aquamarine;">{{$applied->start_date}}</td>
                    <td style=" border: 1px solid aquamarine;">{{$applied->completion_date}}</td>
                    <td style=" border: 1px solid aquamarine;">{{$applied->town}}</td>
                </tr>
                @endforeach

            </tbody>
        </table>




    </div>

</body>

</html>