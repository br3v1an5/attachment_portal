<!DOCTYPE html>
<html lang="en">

<head>
    <title>ZIWA TTI STUDENTS PER COURSE</title>
</head>

<body>
    <div style="margin-left: 35px;margin-right: 25px; margin-top:2px;">
        <span style="font-weight: bold;">ZIWA TECHNICAL TRAINING INSTITUTE</span><br />
        <span style="font-weight: bold;">{{$course->name}} Student List</span><br />
        <span style="font-weight: bold;">Number of students: {{$students->count()}}</span><br />
        <div>
            <span> Generated on {{Carbon\Carbon::now()}}</span></br>
        </div>
        <hr>
        <table class="table table-striped table-bordered table-responsive" style=" border: 1px solid aquamarine; border-collapse: collapse; width: 100%;">
            <thead>
                <tr style="font-size: x-small;">
                    <th style=" border: 1px solid aquamarine;">Names</th>
                    <th style=" border: 1px solid aquamarine;">Email</th>
                    <th style=" border: 1px solid aquamarine;">Phone</th>
                    <th style=" border: 1px solid aquamarine;">Date Of Birth</th>
                    <th style=" border: 1px solid aquamarine;">Reg Number</th>

                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                <tr style="font-size: xx-small;">
                    <td style=" border: 1px solid aquamarine;">
                        <centre>{{$student->user->name}}</centre>
                    </td>
                    <td style=" border: 1px solid aquamarine;">
                        <centre>{{$student->user->email}}</centre>
                    </td>
                    <td style=" border: 1px solid aquamarine;">
                        <centre>{{$student->phone_number}}</centre>
                    </td>
                    <td style=" border: 1px solid aquamarine;">
                        <centre>{{$student->dob}}</centre>
                    </td>
                    <td style=" border: 1px solid aquamarine;">
                        <centre>{{$student->user->username}}</centre>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>




    </div>

</body>

</html>